<template>
    <div>
        <a-table :columns="columns"
                 :data-source="data[0]"
        >
            <notifications group="foo" class="text-notification" />
            <template slot="action">
                <div>
                    <div class="flex" @click="showParticipationModal" ><img src="./../img/izmene.png" class="size17" style="cursor: pointer"><h1
                        class="rededal2">Предложить цену</h1></div>
                    <div class="flex"><img src="./../img/ydal.png" class="size1419" style="cursor: pointer"><h1
                        class="rededal2" @click="showConfirm">Отказаться</h1></div>
                </div>
            </template>
            <template slot="status" slot-scope="status">
                <div v-if="status.active" class="flex">
                    <div class="boxcifra4" v-if="status.count >= 1">{{ status.count }}</div>
                    <div class="aoaa">
                        <h1 class="data4 color-zel">Прием заявок</h1>
                        <h2 class="ys4">Участников: {{ status.people }}</h2>
                    </div>
                </div>
                <div v-else>
                    <div class="aoaa"><h1 class="data4 color-zel">Не активен</h1></div>
                </div>
            </template>
        </a-table>


        <!--  start-modals  -->
        <a-modal v-model="activeParticipation" width="80%" cancel="false" cancel-text="Закрыть">
            <div class="block-information-product">
                <a-card title="Начальная стоимость" class="flex-wraps">
                    <p class="price-product">18 000Р</p>
                </a-card>
                <a-card title="Информация о товаре" class="flex-wraps">
                    <p>Диагональ/разрешение <span class="description-product">15.6"/1920х1080 пикс.</span></p>
                    <p>Процессор <span class="description-product">Intel Pentium N4200 1.1 ГГц</span></p>
                    <p>Оперативная память (RAM) <span class="description-product">4 ГБ</span></p>
                    <p>Графический контроллер <span class="description-product">GeForce 810M 2ГБ</span></p>
                    <p>Объем HDD <span class="description-product">520 ГБ</span></p>
                </a-card>
                <a-card title="Доставка" class="flex-wraps">
                    <p>123456, Москва, ул. Багратиона, д.9, кв.35</p>
                </a-card>
                <a-card title="Отклики компаний" class="flex-wraps">
                    <div style="display: flex; flex-flow: wrap row">
                        <div class="data-company">М.Видео</div>
                        <div class="data-company">Эльдорадо</div>
                        <div class="data-company">Online</div>
                        <div class="data-company">Ситилинк</div>
                    </div>
                </a-card>
                <a-card title="Добавить комментарий">
                </a-card>
                <a-textarea :auto-size="{ minRows: 5, maxRows: 5 }" class="textarea-modal" placeholder="Введите комментарий..."></a-textarea>
            </div>
            <div class="block-button">
                <button class="ant-btn btn-modals" @click="showConfirm">Отклонить</button>
                <button class="ant-btn-primary btn-modals" style="background-color: #07bb14; border: 1px solid green">Участвовать</button>
            </div>
        </a-modal>


        <a-modal v-model=activeModalStage width="80%" cancel="false" cancel-text="Закрыть">
            <div v-if="activeModalSecondStage">
                <a-steps :current="1">
                    <a-step title="Приём заявок">
                        <span slot="description">Приём заявок окончен</span>
                    </a-step>
                    <a-step title="Торги" sub-title="до окончания 01:10:08" description="Перебивайте цены других компаний и предложите самую выгодную!" />
                    <a-step title="Завершение" description="Оплата товара покупателем, передача товара" />
                </a-steps>

                <div class="bidding">
                    <h1 class="title-modal">Аукцион №325478</h1>
                    <h3 class="description-modal">Ноутбук ASUS VivoBook Max X541NC-DM114T</h3>
                    <div class="block-information-product" style="margin-top: 50px;">
                        <a-card title="Начальная стоимость" class="flex-wraps">
                            <p class="price-product">18 000Р</p>
                        </a-card>
                        <a-card title="Информация о товаре" class="flex-wraps">
                            <p>Диагональ/разрешение <span class="description-product">15.6"/1920х1080 пикс.</span></p>
                            <p>Процессор <span class="description-product">Intel Pentium N4200 1.1 ГГц</span></p>
                            <p>Оперативная память (RAM) <span class="description-product">4 ГБ</span></p>
                            <p>Графический контроллер <span class="description-product">GeForce 810M 2ГБ</span></p>
                            <p>Объем HDD <span class="description-product">520 ГБ</span></p>
                        </a-card>
                        <a-card title="Доставка" class="flex-wraps">
                            <p>123456, Москва, ул. Багратиона, д.9, кв.35</p>
                        </a-card>
                        <a-card title="Предложения продавцов" class="flex-wraps">
                            <div>
                                <div class="data-company width-company">
                                    <div class="block-info-price">
                                        Online <strong class="price-sellers">17 500Р</strong>
                                    </div>
                                    <p class="date-modal">03.01.2022 09:22</p>
                                </div>
                                <div class="data-company width-company">
                                    <div class="block-info-price">
                                        М.Видео <strong class="price-sellers">16 000Р</strong>
                                    </div>
                                    <p class="date-modal">03.01.2022 10:09</p>
                                </div>
                                <div class="data-company width-company">
                                    <div class="block-info-price">
                                        Эльдорадо <strong class="price-sellers">13 500Р</strong>
                                    </div>
                                    <p class="date-modal">03.01.2022 10:40</p>
                                </div>
                                <div class="data-company width-company">
                                    <div class="block-info-price">
                                        Ситилинк <strong class="price-sellers">8 500Р</strong>
                                    </div>
                                    <p class="date-modal">03.01.2022 11:46</p>
                                </div>
                            </div>
                        </a-card>
                        <a-card title="Моя цена" class="flex-wraps">
                            <a-input type="number" class="input-price" placeholder="Моя цена..."></a-input>
                        </a-card>
                    </div>
                    <div class="block-button">
                        <button class="ant-btn-primary btn-modals" style="background-color: #07bb14; border: 1px solid green">ПРЕДЛОЖИТЬ</button>
                    </div>
                </div>
            </div>

            <div v-if="activeModalThirdStage">
                <a-steps :current="2">
                    <a-step title="Приём заявок">
                        <span slot="description">Приём заявок окончен</span>
                    </a-step>
                    <a-step title="Торги" description="Перебивайте цены других компаний и предложите самую выгодную!" />
                    <a-step title="Завершение" description="Оплата товара покупателем, передача товара" />
                </a-steps>

                <div class="bidding">
                    <h1 class="title-modal">Завершение аукциона №325478</h1>
                    <h3 class="description-modal">Ноутбук ASUS VivoBook Max X541NC-DM114T</h3>
                    <div class="block-information-product" style="margin-top: 50px;">
                        <a-card title="Итоговая стоимость" class="flex-wraps">
                            <p class="price-product">9 000Р</p>
                        </a-card>
                        <a-card title="Информация о товаре" class="flex-wraps">
                            <p>Диагональ/разрешение <span class="description-product">15.6"/1920х1080 пикс.</span></p>
                            <p>Процессор <span class="description-product">Intel Pentium N4200 1.1 ГГц</span></p>
                            <p>Оперативная память (RAM) <span class="description-product">4 ГБ</span></p>
                            <p>Графический контроллер <span class="description-product">GeForce 810M 2ГБ</span></p>
                            <p>Объем HDD <span class="description-product">520 ГБ</span></p>
                        </a-card>
                        <a-card title="Доставка" class="flex-wraps">
                            <p>123456, Москва, ул. Багратиона, д.9, кв.35</p>
                        </a-card>
                    </div>
                    <div class="block-button">
                        <button class="ant-btn-primary btn-modals" style="background-color: #07bb14; border: 1px solid green">ПОНЯТНОа</button>
                    </div>
                </div>
            </div>
        </a-modal>
    </div>
</template>

<script>

import Vue from 'vue'
import Notifications from "vue-notification";
Vue.use(Notifications)

const component = {
    name: 'ActiveAuctions',
    props: ['accountIsActive'],
    data: () => ({
        columns,
        data,
        activeParticipation: false,
        activeModalStage: false,
        activeModalSecondStage: false,
        activeModalThirdStage: false,
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
        showConfirm() {
            if(this.accountIsActive) {
                this.$confirm({
                    title: 'Вы подтверждаете, что отказываетесь от участия в данном аукционы?',
                    width: '30%',
                    okText: 'Да!',
                    cancelText: 'Закрыть',
                    onOk() {
                        return new Promise((resolve, reject) => {
                            setTimeout(Math.random() > 0.0 ? resolve : reject, 1000);
                        })
                    },
                    onCancel() {
                        return new Promise((resolve, reject) => {
                            setTimeout(Math.random() > 0.0 ? resolve : reject, 500);
                        })
                    }
                });
                this.activeParticipation = false
            } else {
                this.error()
            }
        },
        showParticipationModal() {
            if (!this.activeParticipation && this.accountIsActive) {
                this.activeModalStage = true
                this.activeModalSecondStage = true
            } else {
                this.error()
            }
        },
        showRefusalToParticipateModal() {
            if (!this.activeRefusalToParticipate) {
                this.activeRefusalToParticipate = true
            }
        }
    }
}
const data = [[
    {
        key: '0',
        number: '№324515 от 03.11.2021',
        name: 'Ноутбук ASUS VivoBook Max X541NC-DM114T',
        myPrice: '15 000 ₽',
        price: '18 000 ₽',
        status: {
            count: 1,
            active: true,
            people: 4,
        },
        companyParticipates: true
    },
    {
        key: '1',
        number: '№324515 от 29.10.2021',
        name: 'IPHONE 6s',
        myPrice: '4 000 ₽',
        price: '5 000 ₽',
        status: {
            count: 6,
            active: true,
            people: 4,
        },
        companyParticipates: false
    },
    {
        key: '2',
        number: '№324515 от 10.11.2021',
        name: 'Холодильник Samsung XX-3131',
        myPrice: '22 000₽',
        price: '30 000 ₽',
        status: {
            count: 8,
            active: false,
            people: 4,
        },
        companyParticipates: false
    },

]];

const columns = [
    {
        title: 'Номер заявки',
        dataIndex: 'number',
        key: 'number',
        width: 140,
        slots: {title: 'customTitle'},
    },
    {
        title: 'Наименование товара',
        width: 220,
        dataIndex: 'name',
        key: 'name',
    },
    {
        title: 'Текущая цена',
        width: 120,
        dataIndex: 'price',
        key: 'price',
    },
    {
        title: 'Моя цена',
        key: 'myPrice',
        dataIndex: 'myPrice',
        width: 120,
        scopedSlots: {customRender: 'myPrice'},
    },
    {
        title: 'Статус',
        dataIndex: 'status',
        key: 'status',
        scopedSlots: {customRender: 'status'},
    },
    {
        title: 'Настройки',
        key: 'action',
        scopedSlots: {customRender: 'action'},
    },
];

export default component;
</script>
