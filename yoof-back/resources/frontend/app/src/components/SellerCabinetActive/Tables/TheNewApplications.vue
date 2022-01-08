<template>
    <div>
        <a-table :columns="columns"
                 :data-source="data"
                 :scroll="{ x: 1050 }"
        >
            <notifications group="foo" class="text-notification" />
            <template slot="action">
                <div>
                    <div class="flex" @click="$emit('participate')"><img src="./../img/izmene.png" class="size17" style="cursor: pointer"><h1
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
    </div>
</template>

<script>
import Vue from 'vue'
import Antd from 'ant-design-vue'
import 'ant-design-vue/dist/antd.css'

Vue.use(Antd)



export default {
    emits: ['participate'],
    name: "TheNewApplications",
    data: () => ({
        data,
        columns
    })
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

</script>

<style scoped>

</style>
