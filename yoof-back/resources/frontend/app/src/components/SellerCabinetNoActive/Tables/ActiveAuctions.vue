<template>
    <a-table :columns="columns"
             :data-source="data"
    >
        <notifications group="foo" class="text-notification" />
        <template slot="action">
            <div>
                <div class="flex" @click="error"><img src="./../img/izmene.png" class="size17" style="cursor: pointer"><h1
                    class="rededal2">Участвовать</h1></div>
                <div class="flex" @click="error"><img src="./../img/ydal.png" class="size1419" style="cursor: pointer"><h1
                    class="rededal2">Отказаться</h1></div>
            </div>
        </template>
        <template slot="status" slot-scope="status">
            <div v-if="status.active" class="flex">
                <div class="boxcifra4" v-if="status.count >= 1">{{ status.count }}</div>
                <div class="aoaa">
                    <h1 class="data4 color-zel" @click="error" >Прием заявок</h1>
                    <h2 class="ys4">Участников: {{ status.people }}</h2>
                </div>
            </div>
            <div v-else>
                <div class="aoaa"><h1 class="data4 color-zel">Не активен</h1></div>
            </div>
        </template>
        <template slot="chat" slot-scope="chat">
            <div class="flex" @click="error">
                <div class="boxcifra4" v-if="chat.unreadCount >= 1">{{ chat.unreadCount }}</div>
                <h1 class="data0103 color-zel mess">Сообщения</h1>
            </div>
        </template>
    </a-table>

</template>

<script>

import Vue from 'vue'
import Notifications from "vue-notification";
Vue.use(Notifications)

const component = {
    data: () => ({
        columns,
        data,
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
    }
}
const data = [
    {
        key: '1',
        number: '№324515 от 03.11.2021',
        name: 'Ноутбук ASUS VivoBook Max X541NC-DM114T',
        price: '18 000 ₽',
        status: {
            count: 1,
            active: true,
            people: 4,
        },
        chat: {
            unreadCount: 3,
        }
    },
    {
        key: '2',
        number: '№324515 от 29.10.2021',
        name: 'IPHONE 6s',
        price: '5 000 ₽',
        status: {
            count: 6,
            active: true,
            people: 4,
        },
        chat: {
            unreadCount: 1,
        }
    },
    {
        key: '3',
        number: '№324515 от 10.11.2021',
        name: 'Холодильник Samsung XX-3131',
        price: '30 000 ₽',
        status: {
            count: 8,
            active: false,
            people: 4,
        },
        chat: {
            unreadCount: 5,
        }
    },

];

const columns = [
    {
        title: 'Номер заявки',
        dataIndex: 'number',
        key: 'number',
        width: 150,
        slots: {title: 'customTitle'},
    },
    {
        title: 'Наименование товара',
        width: 200,
        dataIndex: 'name',
        key: 'name',
    },
    {
        title: 'Текущая цена',
        width: 150,
        dataIndex: 'price',
        key: 'price',
    },
    {
        title: 'Статус',
        dataIndex: 'status',
        key: 'status',
        scopedSlots: {customRender: 'status'},
    },
    {
        title: 'Чат с покупателем',
        dataIndex: 'chat',
        key: 'chat',
        scopedSlots: {customRender: 'chat'},
    },

    {
        title: 'Настройки',
        key: 'action',
        scopedSlots: {customRender: 'action'},
    },
];

export default component;
</script>
