<template>
    <div>
        <div class="main_bloc">
            <notifications group="foo" class="text-notification" max="2 " />
            <HeaderPanelButton   />
            <div class="body">

                <div class="flexcenter" >
                    <button class="button-1" :class="{ btnActive: !isActive }" v-on:click="onDataCompany"><span class="bh1 h1a">Данные компании</span></button>
                    <button class="button-2" :class="{ btnActive: isActive }" v-on:click="onNewApplication"><span class="bh2 h1a">Новые заявки</span><div class="boxcifra8" style="margin-left: 7px" v-if="counterNewOrders >= 1">{{ counterNewOrders }}</div></button>
                    <button class="button-3" v-on:click="error"><span class="bh3 h1a">Активные аукционы</span></button>
                    <button class="button-4" v-on:click="error"><span class="bh4 h1a">История аукционов</span></button>
                </div>

                <div class="CompanyData" v-bind:class="{ display:isActive }">
                    <div class="flex3001">
                        <div style="margin-top: 40px">
                            <div class="flex1"><h1 class="h1_1">Название организации или ИП</h1><input type="text" class="text1"></div>
                            <div class="flex1"><h1 class="h1_1">Юридический адрес</h1><a-input type="text" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">ИНН</h1><a-input type="number" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Банк</h1><a-input type="text" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Расчетный счет</h1><a-input type="number" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">КПП</h1><a-input type="number" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">БИК банка</h1><a-input type="number" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Адрес электронной почты</h1><a-input type="text" class="text1" /></div>
                            <div class="flex1"><h1 class="h1_1">Сменить пароль</h1><a-input-password class="input-pass" /></div>
                            <div class="flex1"><h1 class="h1_1">Повторить пароль</h1><a-input-password class="input-pass" /></div>
                            <div class="lrok"><a-button class="button-6 btnActive" style="height: 40px"><span class="bh1 h1a" style="font-size: 15px">Сохранить изменения</span></a-button></div>
                        </div>
                        <ModalCity :visible="visible" />
                        <div class="adres">
                            <div>
                                <h1 class="h1a-0 mtt">Продаваемые вами категории</h1>
                                <div>
                                    <div class="flex"><input type="checkbox" class="checkboxi"><h1 class="h1_1 m5t" >Смартфоны</h1></div>
                                    <div class="flex"><input  type="checkbox" class="checkboxi"><h1 class="h1_1 m5t">Холодильники</h1></div>
                                    <div class="flex"><input type="checkbox" class="checkboxi"><h1 class="h1_1 m5t">Телевизоры</h1></div>
                                    <div class="flex"><input type="checkbox" class="checkboxi"><h1 class="h1_1 m5t">Ноутбуки</h1></div>
                                    <h1 class="zeleni">Показать все ></h1>
                                </div>
                            </div>
                            <div >
                                <h1 class="h1a mtaw">Физическое расположение<br>магазина/склада (для самовывоза)</h1>
                                <div>
                                    <a-input type="text" class="text1 txt" placeholder="Физическое расположение" />
                                    <h1 class="h1_1 mdm">Возможные города доставки</h1>
                                    <a-input type="text" class="text1 txt" placeholder="Возможные города доставки" />
                                </div>
                            </div>
                            <h1 class="h1a" id="documents">Документы компании</h1>
                            <div class="flexalingce">
                                <h1 class="ogr">Свидетельство ОГРН (или<br>лист записи ЕГРЮЛ)</h1>
                                <div class="example-2">
                                    <div class="form-group">
                                        <a-upload
                                            action="https://www.mocky.io/v2/5cc8019d300000980a055e76"
                                            :transform-file="transformFile"
                                            status="done"
                                            width="100"
                                        >
                                            <a-button> <a-icon type="upload" /> Прикрепить </a-button>
                                        </a-upload>
                                    </div>
                                </div>
                            </div>
                            <div class="flexalingce">
                                <h1 class="ogr2">Свидетельство ИНН</h1>
                                <div class="example-2">
                                    <div class="form-group">
                                        <a-upload
                                            action="https://www.mocky.io/v2/5cc8019d300000980a055e76"
                                            :transform-file="transformFile"
                                        >
                                            <a-button> <a-icon type="upload" /> Прикрепить </a-button>
                                        </a-upload>
                                    </div>
                                </div>
                            </div>
                            <a-button class="button-6 btnActive" style="height: 39px; margin-top: 25px;"><span class="cox">АКТИВИРОВАТЬ АККАУНТ</span></a-button>
                            <h1 class="rdftgh">*Активация аккаунта занимает от 1 до 24 часов</h1>
                        </div>
                    </div>
                </div>

                <div class="applications" v-bind:class="{ displayTrue:dontActive }">
                    <div class="hr_big" style="margin-right: auto; margin-left: auto">
                        <ActiveAuctions/>
                    </div>
                </div>

            </div>

            <div class="footer">
                <div class="bodybetwenn">
                    <img src="./img/logo2.png" class="fsds3f">
                    <div class="asd24gd">
                        <h1 class="hh1">О сервисе</h1>
                        <div class="mr20"><a class="hh2">Как работает сервис?</a></div>
                        <div class="mr20"><a class="hh2">Правила использования</a></div>
                        <div class="mr20"><a class="hh2">Отзывы о нас</a></div>
                    </div>
                    <div class="asf04n">
                        <h1 class="hh1">Контакты</h1>
                        <div class="flexasf2"><img src="./img/ins.png" class="asd2b mr5"><a class="hh2" href="#">Instagram</a></div>
                        <div class="flexasf2"><img src="./img/fac.png" class="asd2b mr5"><a class="hh2" href="#">Facebook</a></div>
                        <div class="flexasf2"><img src="./img/tel.png" class="asd2b mr5"><a class="hh2" href="#">Telegram</a></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script>

import Vue from 'vue'
import Antd from 'ant-design-vue'
import 'ant-design-vue/dist/antd.css'
import Notifications from 'vue-notification'
import ActiveAuctions from "./Tables/ActiveAuctions";

import ModalCity from "./Modal/ModalCity";
import HeaderPanelButton from "./Templates/HeaderPanelButton";


Vue.use(Antd);
Vue.use(Notifications);

export default {
    name: "Index",
    components: {
        HeaderPanelButton,
        ActiveAuctions,
        ModalCity
    },
    data: () => ({
        visible: false,
        isActive: false,
        dontActive: false,
        counterNewOrders: 1,
        steps: [
            {
                target: '#start-tour',  // We're using document.querySelector() under the hood
                header: {
                    title: 'Демо-тур',
                },
                content: `Рады видеть Вас, наша система сейчас вам проведёт демо-тур по личному кабинету!`
            },
            {
                target: '#step-2',
                content: 'Выберите категории товаров, которые продаёт ваша компания',
                params: {
                    placement: 'left',
                }
            },
            {
                target: '#step-3',
                content: 'Try it, you\'ll love it!<br>You can put HTML in the steps and completely customize the DOM to suit your needs.',
                params: {
                    placement: 'top',
                }
            }
        ]
    }),
    methods: {
        error() {
            Vue.notify({
                group: 'foo',
                type: 'warn',
                speed: 500,
                width: 300,
                duration: 5000,
                title: 'Ошибка',
                text: '<span style="font-size: 13px">Ваш аккаунт <u>не активен</u>, поэтому доступ к данному разделу недоступен.<br><br>В разделе «Данные компании» активируйте аккаунт</span>'
            })
        },
        onNewApplication() {
            this.isActive = true;
            this.dontActive = true;
        },
        onDataCompany() {
            this.isActive = false;
            this.dontActive = false;
        },
        transformFile(file) {
            return new Promise(resolve => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    const canvas = document.createElement('canvas');
                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.onload = () => {
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0);
                        ctx.fillStyle = 'red';
                        ctx.textBaseline = 'middle';
                        ctx.fillText('Ant Design', 20, 20);
                        canvas.toBlob(resolve);
                    };
                };
            });
        },
        onModalCity() {
            this.visible = false;
            this.visible = true;

        }
    },
}
</script>

<style lang="css" src="./assets/Styles.css">


</style>

