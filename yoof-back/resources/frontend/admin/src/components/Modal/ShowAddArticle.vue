<template>
    <div>
        <a-modal
            :visible="visible"
            width="60%"
            style="padding: 2%"
            @ok="handleOk"
            @cancel="$emit('onClose')"
        >
            <a-upload
                v-if="action === 'loadTitleImage'"
                name="upload"
                list-type="picture-card"
                class="avatar-uploader"
                :data="{
                    action: 'loadTitleImage'
                }"
                :show-upload-list="false"
                :headers="{
                    'Authorization': 'Bearer ' + this.$store.state.user.api_token,
                    'Accept': 'application/json'
                }"
                action="/api/admin/article/upload-title-image"
                :before-upload="beforeUpload"
                @change="handleChange"
                style="display: flex; justify-content: center"
            >
                <img v-if="imageUrl" :src="imageUrl" alt="avatar"/>
                <div v-else>
                    <a-icon :type="loading ? 'loading' : 'plus'"/>
                        <div class="ant-upload-text" style="width: 300px">
                            Загрузить картинку новости
                        </div>
                </div>
            </a-upload>

            <div v-else-if="action === 'loadTitleText'">
                <h5 style="text-align: center;">Введите название (заголовок) новости </h5>
                <a-input v-model="title" style="margin: 18px 0" placeholder="Название новости" id="inpTitle"/>
                <div style="display: flex; justify-content: center">
                    <a-button type="primary" @click="saveTitle">Дальше</a-button>
                </div>
            </div>
            <div v-else-if="action === 'loadDescription'">
                <h5 style="text-align: center;">Введите краткое описание новости </h5>
                <a-textarea v-model="description" style="margin: 18px 0; height: 100px" placeholder="Краткое описание новости" id="inpDescription"/>
                <div style="display: flex; justify-content: center">
                    <a-button type="primary" @click="saveDescription">Дальше</a-button>
                </div>
            </div>
            <CardArticleEditor @editorDataChange="handleArticleContent" :id="id" v-else/>
        </a-modal>
    </div>
</template>
<script>

import CardArticleEditor from "../Cards/CardArticleEditor";

const axios = require('axios')

function getBase64(img, callback) {
    const reader = new FileReader();
    reader.addEventListener('load', () => callback(reader.result));
    reader.readAsDataURL(img);
}

export default {
    props: ['visible'],
    data() {
        return {
            action: 'loadTitleImage',
            loading: false,
            imageUrl: '',
            title: '',
            id: null,
            content: '',
            description: '',
        }
    },
    computed: {
        axiosConfig() {
            return this.$store.getters.axiosConfig
        }
    },
    components: {
        CardArticleEditor
    },
    methods: {
        handleArticleContent(content) {
            this.content = content;
        },
        saveDescription() {
            axios.post(
                '/api/admin/article/upload-description',
                {description: this.description, id: this.id},
                this.axiosConfig
            ).then(r => {
                if (r.data.code === 'success') {
                    this.action = 'addArticle'
                }
            })
        },
        handleOk() {
            axios.post('/api/admin/article/save', {
                content: this.content,
                id: this.id
            }, {
                headers: {
                    'Authorization': 'Bearer ' + this.$store.state.user.api_token,
                    'Accept': 'application/json'
                }
            }).then(r => {
                let data = r.data
                if (data.code === 'success') {
                    this.action = 'loadTitleImage'
                    this.imageUrl = '';
                    this.$emit('close')
                }
            })
        },
        beforeUpload(file) {
            const isJpgOrPng = file.type === 'image/jpeg' || file.type === 'image/png';
            if (!isJpgOrPng) {
                this.$message.error('You can only upload JPG file!');
            }
            const isLt2M = file.size / 1024 / 1024 < 2;
            if (!isLt2M) {
                this.$message.error('Image must smaller than 2MB!');
            }
            return isJpgOrPng && isLt2M;
        },
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
                        this.imageUrl = imageUrl;
                        this.loading = false;
                    });
                    this.action = 'loadTitleText'
                    this.id = r.data.id
                }
            }
        },
        saveTitle() {
            axios.post('/api/admin/article/upload-title', {
                title: this.title,
                id: this.id
            }, {
                headers: {
                    'Authorization': 'Bearer ' + this.$store.state.user.api_token,
                    'Accept': 'application/json'
                }
            }).then(r => {
                let data = r.data
                if (data.code === 'success') {
                    this.action = 'loadDescription'
                }
            })
        },
    }
};
</script>
