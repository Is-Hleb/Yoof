<template>
    <div>
        <a-layout>
            <a-layout id="components-layout-demo-side" style="min-height: 100vh">
                <Header></Header>
                <a-layout>
                    <a-modal
                        width="80%"
                        v-if="curArticle"
                        :visible="articleModalVisible"
                        @close="() => this.articleModalVisible = false"
                        @ok="() => this.articleModalVisible = false"
                        @cancel="() => this.articleModalVisible = false"
                    >
                        <div class="article-content" style="padding: 2%">
                            <div v-html="curArticle.content"/>
                        </div>
                    </a-modal>
                    <a-layout-content>
                        <hr class="line">
                        <Search></Search>
                        <div class="bloc_2">
                            <div class="body">
                                <div id="service">
                                    <h1 class="H1">Как это работает?</h1>
                                    <hr class="line666">
                                    <h2 class="help">Помогаем покупателям и продавцам электроники находить друг
                                        друга</h2>
                                </div>
                                <div style="display: block">
                                    <div style="float: left">
                                        <img src="./img/1.png" class="slider-icon">
                                        <h3 class="H34">Зарегистрируйтесь, или войдите в свой <br>личный кабинет</h3>
                                    </div>
                                    <div style="float: right; margin-top: 100px">
                                        <img src="./img/2.png" class="slider-icon2">
                                        <h3 class="H34">Введите в форму поиска модель нужного вам товара,<br>или
                                            подберите его при помощи наших умных фильтров</h3>
                                    </div>
                                    <div style="float: left; margin-top: 100px">
                                        <img src="./img/3.png" class="slider-icon">
                                        <h3 class="H34">Поздравляем, вы почти у цели. Ваша заявка отправлена нашим<br>партнёрам,
                                            которые готовы предложить вам лучшую цену. Вы<br>можете видеть сколько
                                            продавцов выразили заинтересованность поторговаться, снижая цену на
                                            интересующий вас товар</h3>
                                    </div>
                                    <div style="float: right; margin-top: 120px">
                                        <img src="./img/4.png" class="slider-icon2">
                                        <h3 class="H34">Для запуска аукциона, вам нужно внести необходимую сумму, обычно
                                            это минимальная цена на вашу модель, найденная в интернет-магазинах. После
                                            того как вы запустите аукцион, продавцы начнут торги</h3>
                                    </div>
                                    <div style="float: left; margin-top: 140px">
                                        <img src="./img/5.png" class="slider-icon3">
                                        <h3 class="H34">Ура!!! Торги завершились. Вы можете быть уверены, что купили
                                            свой товар по самой лучшей цене. Вам остаётся только дождаться, когда вам
                                            привезут вашу покупку</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="middle_down">
                                <div>
                                    <div class="body">
                                        <h1 class="text-service" style="margin-top: 150px;">ПРЕИМУЩЕСТВА СЕРВИСА</h1>
                                        <div class="ddsa">
                                            <hr class="line666">
                                        </div>
                                        <h2 class="fghfgh">Наш сервис предоставляет широкие возможности</h2>
                                        <div class="FLEXspectest">
                                            <div class="block-service-benefits">
                                                <div>
                                                    <h2 class="h4"><img src="./img/clock.png" class="size"
                                                                        style="margin-right: 10px">ЭКОНОМИЯ ВРЕМЕНИ</h2>
                                                </div>
                                                <h3 class="h5">Вам не нужно тратить время на посещение магазинов в
                                                    поиске нужного товара</h3>
                                            </div>
                                            <div class="block-service-benefits">
                                                <div>
                                                    <h2 class="h4"><img src="./img/money.png" class="size"
                                                                        style="margin-right: 10px">ЭКОНОМИЯ ДЕНЕГ</h2>
                                                </div>
                                                <h3 class="h5">Вы приобретаете товар по минимальной цене</h3>
                                            </div>
                                        </div>
                                        <div class="FLEXspectest">
                                            <div class="block-service-benefits">
                                                <div>
                                                    <h2 class="h4"><img src="../../baseAssets/img/ocenka.png"
                                                                        class="size" style="margin-right: 10px">ЧЕСТНЫЙ
                                                        СЕРВИС</h2>
                                                </div>
                                                <h3 class="h5">Yoof – место, где покупатели знают, что сделанные им
                                                    предложения абсолютно честны, и условия будут исполнены магазинами
                                                    так, как они это обещали</h3>
                                            </div>
                                            <div class="block-service-benefits">
                                                <div>
                                                    <h2 class="h4"><img src="../../baseAssets/img/star.png" class="size"
                                                                        style="margin-right: 10px">ЗАБОТА О КЛИЕНТАХ
                                                    </h2>
                                                </div>
                                                <h3 class="h5">Мы стоим на стороне покупателей, и будем делать все, что
                                                    в наших силах, для того, чтобы покупатели были довольны.</h3>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div v-if="rows" class="news">
                                                <h1 class="asdasdf" id="news" style="margin-top: 200px">ПОПУЛЯРНЫЕ
                                                    НОВОСТИ</h1>
                                                <div class="ddsa">
                                                    <hr class="line666">
                                                </div>
                                                <h2 class="fghfgh">Статьи, обзоры, новости рынка</h2>
                                                <div v-for="row in rows" :key="row.key" class="news-card">
                                                    <div v-for="article in row" :key="article.id" class="image">
                                                        <a-card v-if="article">
                                                            <a-row>
                                                                <a-col :span="30">
                                                                    <span class="name-news-text">{{
                                                                            article.title
                                                                        }}</span>
                                                                    <span v-if="article.created_at" class="data-news-text">{{
                                                                            article.created_at.substr(0, 10)
                                                                        }}</span>
                                                                    <img :src="article.image" class="news-image"
                                                                         style="margin-top: 10px">
                                                                    <p>
                                                                        {{
                                                                            article.description
                                                                                ? article.description.size() >= 500
                                                                                    ? article.description.substr(0, 500) + '...'
                                                                                    : article.description
                                                                                : 'Автор не добавил описание '
                                                                        }}
                                                                    </p>
                                                                    <a-button @click="openArticleModal(article)" type="primary" class="btn-read" block>
                                                                        Читать
                                                                    </a-button>
                                                                </a-col>
                                                            </a-row>
                                                        </a-card>
                                                    </div>
                                                </div>
                                                <a-button v-if="addArticlesButtonVisible" @click="() => this.rowsCount++" type="primary" class="btn-read-all">Посмотреть ещё</a-button>
                                            </div>
                                        </div>
                                    </div>
                                    <Footer/>
                                </div>
                            </div>
                        </div>
                    </a-layout-content>
                </a-layout>
            </a-layout>
        </a-layout>
    </div>
</template>
<script>

import Vue from 'vue'
import Antd from 'ant-design-vue'
import 'ant-design-vue/dist/antd.css'
import Header from "../Templates/Header";
import Search from "./Search";
import Footer from "../Templates/Footer";

Vue.use(Antd);
export default {
    name: 'Index',
    components: {
        Search,
        Header,
        Footer,
    },
    beforeCreate() {
        this.form = this.$form.createForm(this, {name: 'normal_login'});
    },
    data() {
        return {
            collapsed: false,
            visible: false,
            passwordRecovry: false,
            login: {
                action: true,
                isUser: false,
            },
            addArticlesButtonVisible: true,
            rowsCount: 1,
            articleModalVisible: false,
            curArticle: null,
        }
    },
    computed: {
        articles() {
            return this.$store.getters.articles;
        },
        rows() {
            let articles = this.articles,
                rows = [],
                curArticle = 0,
                rowsCount = this.rowsCount

            if(!articles.length) {
                return []
            }

            for (let i = 1; i <= rowsCount; i++) {
                let row = []
                for (let article_num = 0; article_num < 3; article_num++) {
                    row.push({
                        ...articles[curArticle],
                        key: curArticle * (rowsCount + 1),
                    })
                    curArticle++;
                    if(curArticle >= articles.length) {
                        this.setArticlesButtonUnvisible()
                        break
                    }
                }
                rows.push(row)
            }
            return rows;
        }

    },
    mounted() {
        this.$store.dispatch('loadArticles');
    },
    methods: {
        showModal() {
            this.visible = true;
        },
        handleExit() {
            this.passwordRecovry = false;
            this.visibleModalFilter = false;
        },
        handleSubmit(e) {
            e.preventDefault();
            this.form.validateFields(() => {
            });
        },
        setArticlesButtonUnvisible() {
            this.addArticlesButtonVisible = false
        },
        openArticleModal(article) {
            this.curArticle = article
            this.articleModalVisible = true
        }

    }
}

</script>

<style>

.text-service {
    margin-top: 10px;
    margin-bottom: 0;
    font-family: "Cormorant Garamond";
    font-weight: 600;
    font-size: 50px;
    color: #000000;
}

.ant-form-item {
    margin-bottom: 1px;
}

.article-content table {
    width: 100%;
    margin-bottom: 20px;
    border: 1px solid #dddddd;
    border-collapse: collapse;
}

.article-content th {
    font-weight: bold;
    padding: 5px;
    background: #efefef;
    border: 1px solid #dddddd;
}

.article-content th:first-child {
    text-align: left;
}


.article-content td {
    border: 1px solid #dddddd;
    padding: 5px;
    font-size: 20px;
}

.article-content img {
    width: 100%;
    object-fit: cover;
    height: 500px;
}

.article-content p {
    font-size: 20px;
    margin: 0;
}



.ant-carousel .slick-slide {
    text-align: center;
    height: 350px;
    line-height: 160px;
    background: white;
    overflow: hidden;
}

.ant-carousel .custom-slick-arrow {
    width: 25px;
    height: 25px;
    font-size: 25px;
    color: black;
    background-color: rgba(31, 45, 61, 0.11);
    opacity: 0.3;
}

.ant-carousel .custom-slick-arrow:before {
    display: none;
}

.ant-carousel .custom-slick-arrow:hover {
    opacity: 0.5;
}

.ant-input-search-button {
    background-color: #07bb14;
    border: yellowgreen 2px #07bb14;
}

.ant-carousel .slick-slide h3 {
    color: #fff;
}

.ant-carousel >>> .slick-slide h3 {
    color: #fff;
}

.slider-icon {
    width: 200px;
    margin-right: auto;
    margin-left: auto;
}

.slider-icon2 {
    width: 130px;
    margin-right: auto;
    margin-left: auto;
}

.slider-icon3 {
    width: 150px;
    margin-right: auto;
    margin-left: auto;
}

.slider-image {
    width: 400px;
    height: 360px;
}

.flex-filter-block {
    justify-content: space-between;
    width: 100%;
    position: relative;
    display: flex;
}

#components-layout-demo-side .logo {
    height: 40px;
    width: 150px;
}

.menu {
    cursor: pointer;
    margin-top: 15px;
    margin-left: 25px;
    margin-bottom: 15px;
}

.icon-city {
    width: 15px;
    height: 20px;
    margin-right: 5px;
    margin-bottom: 5px;
    cursor: pointer;
}

.background-image {
    background-image: url("./img/background.png");
    height: 510px;
}

.none {
    display: none;
}

.body {
    padding: 0 15px;
    max-width: 1250px;
    position: relative;
    height: 100%;
    margin: 0 auto;
    background-color: white;
}

.text-slider {
    font-size: 18px;
    color: black;
    font-family: "Calibri Light", Roboto, sans-serif;
    font-weight: 600;
}

.auth-button-text {
    font-family: Roboto;
    font-style: normal;
    font-weight: 900;
    font-size: 18px;
    line-height: 21px;

    align-items: center;
    letter-spacing: 0.1em;

    color: #000000;

}

.width-input {
    width: 80%;
    margin-left: auto;
    margin-right: auto;
}

.text-city {
    color: black;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
}

.text-add-filter {
    cursor: pointer;
    position: absolute;
    z-index: 10;
    font-family: Roboto;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 21px;
    color: white;
    right: 15px;
    margin-right: 10px;
}

.h1 {

    margin-top: -15px;
    font-family: "Cormorant Garamond";
    font-style: normal;
    font-weight: bold;
    font-size: 50px;
    line-height: 124.68%;
    text-align: center;
    color: white;

}

.ant-modal-footer {
    display: none;
}

.checkbox {
    margin-bottom: 10px;
    width: 20px;
    height: 20px;
    margin-right: 10px;
}

.block-service-benefits {
    margin-bottom: 100px;
    text-align: left;
    height: 143px;
    width: 300px;
}


.enterButton {
    background-color: yellow;
}


.login-form-button {
    font-family: Roboto;
    margin-top: 15px;
}

.button-filter-search {
    border: 0;
    width: 200px;
    height: 60px;
    background: #EBF005;
    border-radius: 10px;
    cursor: pointer;
}

.middle-background-image {
    background-image: url("./img/middle.png");
    width: 100%;
    height: 48%;
}

.name-news-text {
    color: black;
    font-family: "Calibri Light", Roboto, sans-serif;
    letter-spacing: -1px;
    font-size: 21px;
    font-weight: 600;
    background: white;
    top: 85%;
    display: block;
    justify-content: center;
    width: 100%;
    height: 40px;
    text-align: left;
    margin-bottom: 20px;
}

.btn-read {
    margin-bottom: 8px;
    position: relative;
    margin-top: 15px;
    font-family: Roboto;
    background-color: yellowgreen;
    border: yellowgreen;
}

.btn-read-all {
    margin-top: 40px;
    height: 40px;
    width: 300px;
    background-color: yellowgreen;
    border: yellowgreen;
}

.ant-btn-primary:hover, .ant-btn-primary:focus {
    background-color: #07bb14;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 5px 10px rgba(0, 0, 0, 0.22);
    border: none;
}

.ant-btn-primary {
    border: #07bb14;;
}

.data-news-text {
    color: black;
    font-family: "Calibri Light", Roboto, sans-serif;
    letter-spacing: -1px;
    font-size: 15px;
    font-weight: 600;
    background: white;
    top: 85%;
    display: block;
    text-align: left;
    justify-content: center;
    width: 100%;
    height: 40px;
}

.news-card {
    margin-top: 3%;
    justify-content: space-between;
    position: relative;
    display: flex;
}

.news {
    margin-top: 150px;
}

.news-image {
    width: 250px;
    height: 230px;
}

.block-button-auth {
    position: relative;
    display: flex;
    justify-content: center;
}

.block-checkbox {
    z-index: 1000;
    position: relative;
    display: flex;
    justify-content: center;
}

.checkbox-button {
    margin-left: 50px;
    transform: scale(1.5);
}

.text-socilite {
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 23px;
    text-align: center;
    color: #000000;
}

.block-icon-socilite {
    position: relative;
    display: flex;
    justify-content: center;
}

.flex {
    position: relative;
    display: flex;
}

.icon-socilite {
    width: 50px;
    height: 50px;
}

.icon-socilite2 {
    width: 50px;
    height: 50px;
    margin: 10px;
}

.line {
    background-color: #EBF005;
    width: 100%;
    height: 3px;
    padding: 0;
    margin: 0;
    border: 0;
    border-radius: 3px;
}

.people {
    display: flex;
    justify-content: center;
    margin: 0;
    margin-top: 8%;
}

.h1 {
    color: white;
    margin-bottom: 3%;
    font-family: 'Montserrat', sans-serif;
    font-style: normal;
    font-weight: bold;
    font-size: 45px;
    letter-spacing: 0.02em;
}

.connect {
    margin: 0;
}

.connect2 {
    margin: 0;
    font-family: 'Montserrat', sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 150%;
    line-height: 124.68%;
    color: white;
}

.mt80 {
    margin-top: 80px;
}

.block-work {
    margin-left: 130px;
    margin-right: -150px;
}

@media screen and (max-width: 550px) {
    #components-layout-demo-side .logo {
        height: 30px;
        width: 100px;
        margin-left: -50px;
    }

    .authBtn {
        width: 120px;
        font-size: 10px;
        margin-left: -80px;
    }

    .width-input {
        width: 98%;
    }

    .checkbox {
        font-size: 12px
    }

    .flex-filter-block {
        display: block;
    }

    .saving-text-mobile {
        margin-bottom: 200px;
    }

    .h1 {
        font-size: 36px;
    }

    .news-card {
        display: block;
    }

    .FLEXspectest {
        margin-left: 15px;
    }

    .block-work {
        display: block;
    }

    .text-service, .asdasdf {
        font-size: 38px;
    }

    .name-news-text {
        margin-bottom: 30px;
    }

}


</style>



