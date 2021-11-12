<template>
    <a-modal v-model="visible" title="Города" @ok="handleOk" width="90%">
            <div class="body-city">
                <div class="header-city">
                    <div class="header-min">
                        <img src="../img/logo2.png" class="sizelog" >
                        <div class="wid75">
                            <a-input-search type="input" placeholder="Введите название города" size="large"/>

                        </div>
                    </div>
                </div>
                <div class="flex mar50 flex-wrap pb40">
                    <ul class="ul">
                        <li class="li-1" ><a class="li">Москва</a></li>
                        <li class="li-1"><a class="li">Санкт-Петербург</a></li>
                        <li class="li-1"><a class="li">Воронеж</a></li>
                        <li class="li-1"><a class="li">Волгоград</a></li>
                        <li class="li-1"><a class="li">Екатеринбург</a></li>
                        <li class="li-1"><a class="li">Казань</a></li>
                        <li class="li-1"><a class="li">Красноярск</a></li>
                        <li class="li-1"><a class="li">Новосибирск</a></li>
                        <li class="li-1"><a class="li">Нижний Новгород</a></li>
                        <li class="li-1"><a class="li">Омск</a></li>
                        <li class="li-1"><a class="li">Пермь</a></li>
                        <li class="li-1"><a class="li">Ростов-на-Дону</a></li>
                        <li class="li-1"><a class="li">Самара</a></li>
                        <li class="li-1"><a class="li">Челябинск</a></li>
                        <li class="li-1"><a class="li">Уфа</a></li>
                    </ul>
                </div>
                <a-list :grid="{ gutter: 16, xs: 1, sm: 2, md: 4, lg: 4, xl: 6, xxl: 3 }" :data-source="data">
                    <a-list-item slot="renderItem" slot-scope="item">
                        <a-card :title="item.title" :data-source="city">
                            <p v-for="city in item.city" :key="city">{{ city }}</p>
                        </a-card>
                    </a-list-item>
                </a-list>
                <hr class="hr-bot">
                <li class="lib"><a class="li-hr">— полноформатные магазины, в которых некоторые товары можно забрать в день покупки.</a></li>
            </div>
    </a-modal>
</template>

<script>
const data = [
    {
        title: 'А',
        city: ['Москва', 'Не Москва']
    },
    {
        title: 'Title 2',
        city: []
    },
    {
        title: 'Title 3',
        city: []
    },
    {
        title: 'Title 4',
        city: []
    },
    {
        title: 'Title 5',
        city: []
    },
    {
        title: 'Title 6',
        city: []
    },

];

const city = [
    {
        title: 'Hello'
    }
]
export default {
    props: {
        visible: Boolean
    },
    name: "ModalCity",
    data: () => ({
        data,
        city
    }),
    methods: {
        showModal() {
            console.log(this.visible)
            this.visible = true;
        },
        handleOk(e) {
            console.log(e, this.visible);
            this.visible = false;
        },
    },
}
</script>

<style scoped>

</style>
