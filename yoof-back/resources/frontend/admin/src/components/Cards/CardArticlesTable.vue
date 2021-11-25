<template>
    <div>
        <a-modal
            width="80%"
            v-if="curArticle"
            @close="() => this.showArticleModal = false"
            @ok="() => this.showArticleModal = false"
            v-model="showArticleModal"
            okText="Закрыть"
            cancelText="Закрыть"
        >
            <div class="card-article">
                <div class="content" v-html="curArticle.content"/>
            </div>
        </a-modal>
        <a-modal
            width="95%"
            v-if="newArticle"
            @close="() => this.editArticleModal = false"
            @ok="saveArticle"
            v-model="editArticleModal"
        >
            <div style="padding: 2%">
                <a-row>
                    <a-col :span="5">
                        <div style="justify-content: center"> <!-- Редактор карточки -->
                            <a-input v-model="newArticle.title"
                                     type="text"
                                     :value="newArticle.title"
                                     placeholder="Введите название новости.."
                            />
                            <img
                                style="object-fit: cover; width: 100%; height: 300px"
                                alt="Картинка статьи"
                                :src="newArticle.image"
                            />
                            <a-upload-dragger
                                name="upload"
                                list-type="picture-card"
                                class="avatar-uploader"
                                :show-upload-list="false"
                                :headers="axiosConfig.headers"
                                action="/api/admin/article/upload-title-image"
                                :data="{
                                    id: newArticle.id
                                }"
                                :before-upload="beforeUpload"
                                @change="handleChange"
                            >
                                <p class="ant-upload-drag-icon">
                                    <a-icon type="inbox" />
                                </p>
                                <p class="ant-upload-text">
                                    Нажмите или перетащите картинку в эту область
                                </p>
                            </a-upload-dragger>
                            <a-textarea v-model="newArticle.description"
                                        style="min-height: 200px"
                                        :value="newArticle.description"
                                        placeholder="Введите краткое описание новости.."
                            />
                        </div>
                        <hr>
                        <div style="justify-content: center; margin-top: 2%"> <!-- Итог -->
                            <h4 style="text-align: center; margin: 0;">{{ newArticle.title }}</h4>
                            <img
                                style="object-fit: cover; width: 100%; height: 300px"
                                alt="Картинка статьи"
                                :src="newArticle.image"
                            />
                            <p>{{ newArticle.description ? newArticle.description.substr(0, 100) : '' + '...' }}</p>
                        </div>
                    </a-col>
                    <a-col :span="19">
                        <div style="width: 100%; padding-left: 2%">
                            <ckeditor @upload width="100%" :editor="editor" v-model="newArticle.content" :config="editorConfig"/>
                        </div>
                    </a-col>
                </a-row>
            </div>
        </a-modal>
        <a-row v-for="row in rows" :key="row.key" :gutter="16" style="margin-top: 2%;">
            <a-col v-for="col in row" :key="col.key" :span="8">
                <a-card hoverable style="width: 300px;">
                    <h4 @click="setCurArticle(col.article.id)" style="text-align: center; margin: 0;">
                        {{ col.article.title }}</h4>
                    <img
                        @click="setCurArticle(col.article.id)"
                        slot="cover"
                        style="object-fit: cover; width: 100%; height: 300px"
                        alt="Картинка статьи"
                        :src="col.article.image"
                    />
                    <p>{{ col.article.description ? col.article.description.substr(0, 100) : '' + '...' }}</p>
                    <template slot="actions" class="ant-card-actions">
                        <a-icon @click="editArticle(col.article.id)" key="edit" type="edit"/>
                        <a-icon @click="deleteArticle(col.article.id)" type="delete"/>
                    </template>
                </a-card>
            </a-col>
        </a-row>
    </div>
</template>

<script>
import  ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import CKEditor from '@ckeditor/ckeditor5-vue2';
import '@ckeditor/ckeditor5-build-classic/build/translations/ru';
import Vue from 'vue'
import UploadAdapter from "../../adapters/UploadAdapter";

Vue.use(CKEditor)

const axios = require('axios');

function getBase64(img, callback) {
    const reader = new FileReader();
    reader.addEventListener('load', () => callback(reader.result));
    reader.readAsDataURL(img);
}

export default {
    data() {
        return {
            curArticle: null,
            showArticleModal: false,
            editArticleModal: false,
            editor: ClassicEditor,
            newArticle: null,
            editorData: '',
            editorConfig: {
                // The configuration of the editor.
                language: 'ru',
                defaultLanguage: 'ru',
                extraPlugins: [this.upload(this.newArticle ? this.newArticle.id : 0, this.$store.state.user.api_token)],
            },
            loading: false,
            imageUrl: '',
        }
    },
    computed: {
        rows() {
            return this.$store.getters.articlesRows
        },
        articles() {
            return this.$store.getters.articles;
        },
        axiosConfig() {
            return this.$store.getters.axiosConfig
        }
    },
    methods: {
        handleChange(info) {
            let r = info.file.response
            if (info.file.status === 'uploading') {
                this.loading = true;
                return;
            }
            if (info.file.status === 'done') {
                // Get this url from response in real world.
                if (r.data.code !== 'err') {
                    getBase64(info.file.originFileObj, imageUrl => {
                        this.newArticle.image = imageUrl;
                        this.loading = false;
                    });
                }
            }
        },
        beforeUpload(file) {
            const isJpgOrPng = file.type === 'image/jpeg' || file.type === 'image/png';
            if (!isJpgOrPng) {
                this.$message.error('Картинка должна именить разрешение JPG или PNG');
            }
            const isLt2M = file.size / 1024 / 1024 < 2;
            if (!isLt2M) {
                this.$message.error('Картинка слишком большая (больше 2мб)');
            }
            return isJpgOrPng && isLt2M;
        },
        upload: (id, token) => (editor) => {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new UploadAdapter(loader, id, token);
            };
        },
        setCurArticle(id) {
            let articles = this.articles;
            this.curArticle = articles.filter(article => article.id === id)[0];
            this.showArticleModal = true;
        },
        editArticle(id) {
            let articles = this.articles;
            this.newArticle = articles.filter(article => article.id === id)[0];
            this.editArticleModal = true;
        },
        async saveArticle() {
            await axios.post('/api/admin/article/edit', {article: this.newArticle}, this.axiosConfig).then(r => {
               let data = r.data
               if(data.code === 'success') {
                   this.$notification.open({
                       message: 'СТАТЬЯ УСПЕШНО СОХРАНЕНА',
                       description: 'Статья с названием ' + this.newArticle.title + ' успешно сохранена',
                       icon: <a-icon type="check" style="color: #108ee9"/>,
                   });
                   this.newArticle = null
                   this.editArticleModal = false
               }
            }).catch(e => {
                this.$notification.open({
                    message: 'ОШИБКА СЕРВЕРА',
                    description: e.message,
                    icon: <a-icon type="close-circle" style="color: red"/>,
                });
            });
        },
        deleteArticle(id) {
            let article = this.curArticle = this.articles.filter(article => article.id === id)[0];
            axios.delete('/api/admin/article/' + id, this.axiosConfig).then(r => {
                let data = r.data
                if (data.code === 'success') {
                    this.$notification.open({
                        message: 'СТАТЬЯ УСПЕШНО УДАЛЕНА',
                        description: 'Статья с названием ' + article.title + ' успешно удалена',
                        icon: <a-icon type="smile" style="color: #108ee9"/>,
                    });
                    this.$store.dispatch('loadArticles');
                } else {
                    this.$notification.open({
                        message: 'ОШИБКА НА СТОРОНЕ КЛИЕНТА',
                        description: 'Статья с названием ' + article.title + ' не удалена ',
                        icon: <a-icon type="close-circle" style="color: red"/>,
                    });
                }
            }).catch(e => {
                this.$notification.open({
                    message: 'ОШИБКА СЕРВЕРА',
                    description: e.message,
                    icon: <a-icon type="close-circle" style="color: red"/>,
                });
            })
        }
    },
    beforeMount() {
        this.$store.dispatch('loadArticles');
    },
    mounted() {

    }

}
</script>

<style scoped>
.ant-carousel >>> .slick-slide {
    text-align: center;
    /*height: 160px;*/
    line-height: 160px;
    /*background: #364d79;*/
    overflow: hidden;
}

.ant-carousel >>> .custom-slick-arrow {
    width: 25px;
    height: 25px;
    font-size: 25px;
    color: #0eacc7;
    background-color: rgba(31, 45, 61, 0.11);
    opacity: 0.3;
}

.card-greed {
    display: flex;
    margin: 2% 2% 0 0;
}

.ant-carousel >>> .custom-slick-arrow:before {
    display: none;
}

.ant-carousel >>> .custom-slick-arrow:hover {
    opacity: 0.5;
}

.ant-carousel >>> .slick-slide h3 {
    /*color: #bb2222;*/
}

.card-article {
    background-color: #fff;
    justify-content: center;
    padding: 2%;
}
</style>

<style type="text/css">
.card-article .content table {
    width: 100%;
    margin-bottom: 20px;
    border: 1px solid #dddddd;
    border-collapse: collapse;
}

.card-article .content th {
    font-weight: bold;
    padding: 5px;
    background: #efefef;
    border: 1px solid #dddddd;
}

.card-article .content th:first-child {
    text-align: left;
}


.card-article .content td {
    border: 1px solid #dddddd;
    padding: 5px;
    font-size: 20px;
}

.card-article .content img {
    width: 100%;
    object-fit: cover;
    height: 300px;
}

.card-article .content p {
    font-size: 20px;
    margin: 0;
}
@media screen and (max-width: 500px) {
    .ant-row {
        display: grid;
        margin-left: 10px;
    }

}


</style>

