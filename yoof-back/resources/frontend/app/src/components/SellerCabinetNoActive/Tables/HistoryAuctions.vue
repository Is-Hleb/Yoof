<template>
    <div>
        <a-table :columns="columns"
                 :data-source="data[0]"
        >
            <notifications group="foo" class="text-notification" />
            <template slot="delivery" slot-scope="delivery">
                <div class="pickup">
                    <p>{{ delivery.text ? "Доставка" : "Самовывоз" }}</p>
                    <p class="delivery-address-text" v-if="delivery.text">{{ delivery.address }}</p>
                </div>
            </template>
            <template slot="result" slot-scope="result">
                <img v-if="result === 'win'" src="../img/win.png" alt="" class="result-icon">
                <img v-if="result === 'loss'" src="../img/lose.png" alt="" class="result-icon">
            </template>
        </a-table>
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
        price: '12 000 ₽',
        delivery: {
            text: true,
            address: '123456, Москва, ул. Багратиона, д.9, кв.35'
        },
        result: 'win'
    },
    {
        key: '1',
        number: '№324515 от 29.10.2021',
        name: 'IPHONE 6s',
        price: '4 000 ₽',
        delivery: {
            text: false,
        },
        result: 'loss'
    },
    {
        key: '2',
        number: '№324515 от 10.11.2021',
        name: 'Холодильник Samsung XX-3131',
        price: '20 000 ₽',
        delivery: {
            text: false,
        },
        result: 'win'
    },

]];

const columns = [
    {
        title: 'Номер заявки',
        dataIndex: 'number',
        key: 'number',
        width: 160,
        slots: {title: 'customTitle'},
    },
    {
        title: 'Наименование товара',
        width: 260,
        dataIndex: 'name',
        key: 'name',
    },
    {
        title: 'Итоговя цена',
        width: 150,
        dataIndex: 'price',
        key: 'price',
    },
    {
        title: 'Результат',
        dataIndex: 'result',
        key: 'result',
        width: 150,
        scopedSlots: {customRender: 'result'},
    },
    {
        title: 'Доставка',
        key: 'delivery',
        width: 270,
        dataIndex: 'delivery',
        scopedSlots: {customRender: 'delivery'},
    },
];

export default component;
</script>
