<template>
    <div>
        <a-layout>
            <a-layout id="components-layout-demo-side" style="min-height: 100vh">
                <Header></Header>
                <a-layout>
                    <a-layout-content>
                        <hr class="line">
                        <Search></Search>
                        <div class="bloc_2">
                            <div>
                                <div>
                                    <h1 class="H1">Как это работает?</h1>
                                    <hr class="line_2">
                                    <h2 class="help">Помогаем покупателям и продавцам электроники находить друг друга</h2>
                                </div>
                                <div>
                                    <a-tabs default-active-key="1">
                                        <a-tab-pane key="1" tab="Шаг 1">
                                            <img src="./img/1.png" class="slider-icon">
                                            <h1 class="text-slider">Зарегистрируйтесь, или войдите в свой личный кабинет</h1>
                                            <img src="./img/img_1.png" class="slider-image">
                                        </a-tab-pane>
                                        <a-tab-pane key="2" tab="Шаг 2" force-render>
                                            <img src="./img/2.png" class="slider-icon2">
                                            <h1 class="text-slider">Введите в форму поиска модель нужного вам товара,или подберите его <br> при помощинаших умных фильтров</h1>
                                            <img src="./img/img_2.png" class="slider-image">
                                        </a-tab-pane>
                                        <a-tab-pane key="3" tab="Шаг 3">
                                            <img src="./img/3.png" class="slider-icon">
                                            <h1 class="text-slider">Поздравляем, вы почти у цели. Ваша заявка отправлена нашим партнёрам, которые готовы предложить вам лучшую цену.<br> Вы можете видеть сколько продавцов выразили заинтересованность поторговаться, снижая цену на интересующий вас товар</h1>
                                            <img src="./img/img_3.png" class="slider-image">
                                        </a-tab-pane>
                                        <a-tab-pane key="4" tab="Шаг 4">
                                            <img src="./img/4.png" class="slider-icon2">
                                            <h1 class="text-slider">Для запуска аукциона, вам нужно внести необходимую сумму, обычно это минимальная цена на вашу модель,<br> найденная в интернет-магазинах. После того как вы запустите аукцион, продавцы начнут торги</h1>
                                            <img src="./img/img_4.png" class="slider-image">
                                        </a-tab-pane>
                                        <a-tab-pane key="5" tab="Шаг 5">
                                            <img src="./img/5.png" class="slider-icon3">
                                            <h1 class="text-slider">Ура! Торги завершились. Вы можете быть уверены, что купили свой товар по самой лучшей цене.<br> Вам остаётся только дождаться, когда вам привезут вашу покупку</h1>
                                            <img src="./img/img_5.png" class="slider-image">
                                        </a-tab-pane>
                                    </a-tabs>
                                </div>
                            </div>

                            <div class="middle_down">
                                <div>
                                    <div class="body">
                                        <h1 class="text-service" style="margin-top: 150px;">ПРЕИМУЩЕСТВА СЕРВИСА</h1>
                                        <div class="ddsa"><hr class="line666"></div>
                                        <h2 class="fghfgh">Наш сервис предоставляет широкие возможности</h2>
                                        <div class="FLEXspectest">
                                            <div class="block-service-benefits">
                                                <img src="./img/clock.png" class="size">
                                                <h2 class="h4">ЭКОНОМИЯ ВРЕМЕНИ</h2>
                                                <h3 class="h5">Вам не нужно тратить время на посещение магазинов в поиске нужного товара</h3>
                                            </div>
                                            <div class="block-service-benefits">
                                                <img src="./img/money.png" class="size">
                                                <h2 class="h4">ЭКОНОМИЯ ДЕНЕГ</h2>
                                                <h3 class="h5">Вы приобретаете товар по минимальной цене</h3>
                                            </div>
                                            <div class="block-service-benefits saving-text-mobile">
                                                <img src="./img/ocenka.png" class="size">
                                                <h2 class="h4">ЧЕСТНЫЙ СЕРВИС</h2>
                                                <h3 class="h5">Yoof – место, где покупатели знают, что сделанные им предложения абсолютно честны, и условия будут исполнены магазинами так, как они это обещали</h3>
                                            </div>
                                            <div class="block-service-benefits">
                                                <img src="./img/star.png" class="size">
                                                <h2 class="h4">ЗАБОТА О КЛИЕНТАХ</h2>
                                                <h3 class="h5">Мы стоим на стороне покупателей, и будем делать все, что в наших силах, для того, чтобы покупатели были довольны.</h3>
                                            </div>
                                        </div>
                                        <div class="news">
                                            <h1 class="asdasdf" style="margin-top: 200px">ПОПУЛЯРНЫЕ НОВОСТИ</h1>
                                            <div class="ddsa">
                                                <hr class="line777">
                                            </div>
                                            <h2 class="fghfgh">Статьи, обзоры, новости рынка</h2>
                                            <div class="news-card">
                                                <div class="image">
                                                    <a-card>
                                                        <a-row>
                                                            <a-col :span="20">
                                                                <span class="name-news-text">Apple выпускает новую модель</span>
                                                                <span class="data-news-text">01.01.2021</span>
                                                                <img src="./img/news-image2.jpg" class="news-image" style="margin-top: 10px">
                                                                <a-button type="primary" style="margin-bottom: 8px; position: relative; margin-top: 15px; font-family: Roboto;" block>Читать</a-button>
                                                            </a-col>
                                                        </a-row>
                                                    </a-card>
                                                </div>
                                                <div class="image">
                                                    <a-card>
                                                        <a-row>
                                                            <a-col :span="20">
                                                                <span class="name-news-text">Apple выпускает новую модель</span>
                                                                <span class="data-news-text">01.01.2021</span>
                                                                <img src="./img/news-image2.jpg" class="news-image" style="margin-top: 10px">
                                                                <a-button type="primary" style="margin-bottom: 8px; position: relative; margin-top: 15px; font-family: Roboto;" block>Читать</a-button>
                                                            </a-col>
                                                        </a-row>
                                                    </a-card>
                                                </div>
                                            </div>
                                            <button class="buton"><span class="jkj">Посмотреть ещё</span></button>
                                        </div>
                                    </div>
                                    <Footer />
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
import Header from "./Header";
import Search from "./Search";
import Footer from "./Footer";

Vue.use(Antd);
export default {
    name: 'Index',
    components: {
        Search,
        Header,
        Footer
    },
    beforeCreate() {
        this.form = this.$form.createForm(this, { name: 'normal_login' });
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
        };
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
    }
};
</script>

<style>

.text-service {
    margin-top: 10px;
    margin-bottom: 0;
    font-family: Oswald;
    font-style: normal;
    font-weight: bold;
    font-size: 50px;
    line-height: 124.68%;
    color: #000000;
}

.ant-form-item {
    margin-bottom: 1px;
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
    background-color: yellowgreen;
    border: yellowgreen 2px solid;
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
    justify-content: space-between;width: 100%;
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
    max-width: 1200px;
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

.auth-button-text{
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
    font-family: Oswald;
    font-style: normal;
    font-weight: bold;
    font-size: 50px;
    line-height: 124.68%;
    text-align: center;
    color: white;
    -webkit-text-stroke: 0.5px black;

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

.p {

}
.block-service-benefits {
    margin-bottom: 100px;
    text-align: left;
    height: 143px;
    width: 240px;
    margin-top: -25px;
}

.button-auth {
    cursor: pointer;
    margin-left: 2.5%;
    margin-right: 2.5%;
    border: 3px solid #EBF005;
    border-radius: 10px;
    margin-top: 5%;
    width: 200px;
    height: 60px;
    z-index: 1;
    background-color: white;
    padding-left: 8px;
    margin-bottom: 60px;
}

.enterButton {
    background-color: yellow;
}

.text-auth-registration {
    text-align: center;
    height: 60px;
    margin: 0;
    font-family: Roboto;
    font-style: normal;
    font-weight: 900;
    font-size: 22px;
    line-height: 26px;
    color: #000000;
}
.button-active {
    background: yellow;
}

.login-form-button {
    font-family: Roboto;
    margin-top: 15px;
}

.button-filter-search{
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
    justify-content: space-between;
    position: relative;
    display: flex;
}
.news {
    margin-top: 150px;
}

.news-image {
    width: 350px;
    height: 250px;
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
    transform:scale(1.5);
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
@media screen and (max-width: 550px) {
    #components-layout-demo-side .logo {
        height: 30px;
        width: 100px;
        margin-left: -30px;
    }
    .authBtn {
        width: 120px;
        font-size: 10px;
        margin-left: -50px;
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
}


</style>



