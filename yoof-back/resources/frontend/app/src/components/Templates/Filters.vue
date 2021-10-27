<template>
    <div>
        <a-steps :current="current">
            <a-step v-for="item in steps" :key="item.title" :title="item.title" :description="item.description" />
        </a-steps>
        <div class="steps-action">
            <a-button v-if="current < steps.length - 1" type="primary" @click="next" style="width: 180px; height: 50px; background-color: #07bb14; border: #07bb14;">
                Следующий шаг
                <a-icon type="arrow-right" />
            </a-button>
            <a-button
                v-if="current == steps.length - 1"
                type="primary"
                @click="$message.success('Надеемся, наш фильтр помог Вам!')"
                v-on:click="modal.destroy()"
                style="width: 180px; height: 50px; background-color: #07bb14; border: #07bb14"

            >
                Завершить фильтрацию
            </a-button>
            <a-button type="primary" v-if="current > 0" @click="prev" class="btn-prev">
                <a-icon type="arrow-left" />
                На предыдущий шаг
            </a-button>
        </div>
        <div v-if="current === 0" style="margin-top: 30px;" align="center">
                <a-select :default-value="provinceData[0]" style="width: 300px; margin-bottom: 30px; " @change="handleProvinceChange">
                    <a-select-option v-for="province in provinceData" :key="province">
                        {{ province }}
                    </a-select-option>
                </a-select><br>
                <a-select v-model="secondCity" style="width: 200px">
                    <a-select-option v-for="city in cities" :key="city">
                        {{ city }}
                    </a-select-option>
                </a-select>
        </div>
        <div v-if="current === 1">
            <div class="flex-filter-block" style="margin-top: 30px">
                <div>
                    <h1 class="pppp">Диагональ</h1>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">23”–24” (58 см–60см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">30”–32” (76 см–81см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">40”–43” (101 см–109см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">49”–55” (127 см–139см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">60”–70” (152 см–178см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">70”–80” (178 см–203см)</p></div>
                    <h1 class="ppppp">Показать все ></h1>
                </div>
                <div>
                    <h1 class="pppp">Цвет</h1>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Цвет"><p class="p">Белый</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Цвет"><p class="p">Серебристый</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Цвет"><p class="p">Черный</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Цвет"><p class="p">Серый</p></div>
                    <h1 class="ppppp">Показать все ></h1>
                </div>
                <div>
                    <h1 class="pppp">Диагональ</h1>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">23”–24” (58 см–60см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">30”–32” (76 см–81см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">40”–43” (101 см–109см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">49”–55” (127 см–139см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">60”–70” (152 см–178см)</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Диагональ"><p class="p">70”–80” (178 см–203см)</p></div>
                    <h1 class="ppppp">Показать все ></h1>
                </div>
            </div>
            <div class="flex-filter-block">
                <div>
                    <h1 class="pppp">Бренд</h1>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">LG</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">SAMSUNG</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">SONY</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">TCL</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">BBK</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">XIAOMI</p></div>
                    <h1 class="ppppp">Показать все ></h1>
                </div>
                <div>
                    <h1 class="pppp">Бренд</h1>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">LG</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">SAMSUNG</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">SONY</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">TCL</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">BBK</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">XIAOMI</p></div>
                    <h1 class="ppppp">Показать все ></h1>
                </div>
                <div>
                    <h1 class="pppp">Бренд</h1>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">LG</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">SAMSUNG</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">SONY</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">TCL</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">BBK</p></div>
                    <div class="flex"><input class="checkbox" type="checkbox" name="Бренд"><p class="p">XIAOMI</p></div>
                    <h1 class="ppppp">Показать все ></h1>
                </div>
            </div>
        </div>

        <div v-if="current === 2" style="margin-top: 40px">
            <a-table :columns="columns" :data-source="data" class="components-table-demo-nested">
                <a slot="operation" >Publish</a>
                <a-table
                    slot="expandedRowRender"
                    :columns="innerColumns"
                    :data-source="innerData"
                    :pagination="false"
                >
                </a-table>
            </a-table>
        </div>
    </div>
</template>
<script>
const provinceData = ['Бытовая техника', 'Кухонная техника', 'Интеллектуально бытовая техника', 'Компьютеры и офис', 'Электроника', 'Мобильные телефоны и аксессуары',];
const cityData = {
    'Бытовая техника': ['Холодильник', 'Стиральная машина', 'Фен', 'Увлажнитель воздуха', 'Утюг', 'Швейная машинка', 'Электробритва'],
    'Кухонная техника': ['Газовая плита', 'Электрическая плита', 'Духовой шкаф', 'Микроволновая печь', 'Хлебопечка', 'Мультиварка'],
    'Интеллектуально бытовая техника': ['Робот пылесос', 'Интернет холодильник', 'Интернет кофемашина'],
    'Компьютеры и офис': ['Планшеты', 'Ноутбуки', 'Мини ПК', 'Мыши и клавиатуры', 'Хранение данных'],
    'Электроника': ['Роботы', 'Аудио- и видеотехника', 'Смарт-часы', 'Видеокамеры 360°', 'Шлемы и очки VR/AR', 'Электрические розетки'],
    'Мобильные телефоны и аксессуары': ['Мобильные телефоны', 'Смартфоны', 'Чехлы для смартфонов', 'Рации', 'Внешние аккумуляторы'],

};

const columns = [
    { title: 'Модель и характеристики', dataIndex: 'name', key: 'name' },


];

const data = [];
for (let i = 0; i < 3; ++i) {
    data.push({
        key: i,
        name: 'Asus ZenBook 14',
/*        platform: 'iOS',
        version: '10.3.4.5654',
        upgradeNum: 500,
        creator: 'Jack',
        createdAt: '2014-12-24 23:12:00',*/
    });

}

const innerColumns = [
/*    { title: 'Цвет', dataIndex: 'date', key: 'date' },
    { title: 'ОЗУ', dataIndex: 'name', key: 'name' },
    { title: 'SSD', dataIndex: 'ssd', key: 'ssd' },
    { title: 'Год выпуска', dataIndex: 'year', key: 'year' },
    { title: 'Страна производства', dataIndex: 'capital', key: 'capital' },*/
];

const innerData = [];
for (let i = 0; i < 1; ++i) {
    innerData.push({
/*        key: i,
        date: 'Черный',
        name: '8 ГБ',
        ssd: '512 ГБ',
        capital: 'Китай',
        year: '2017',*/
    });
}


export default {
    data() {
        return {
            current: 0,
            steps: [
                {
                    title: 'Категории и товар',
                    content: '',
                    description: 'Выберите интересующую Вас категорию товара и товар'

                },
                {
                    title: 'Применение фильтра',
                    description: 'Примените фильтры по характеристикам товара',
                    content: '',
                },
                {
                    title: 'Список товаров',
                    description: 'Вуаля! Наши фильтры подобрали вам список товаров',
                    content: '',
                },
            ],
            provinceData,
            cityData,
            cities: cityData[provinceData[0]],
            secondCity: cityData[provinceData[0]][0],
            data,
            columns,
            innerColumns,
            innerData,
        };
    },
    methods: {
        next() {
            this.current++;
        },
        prev() {
            this.current--;
        },
        handleProvinceChange(value) {
            this.cities = cityData[value];
            this.secondCity = cityData[value][0];
        },
    },
};
</script>
<style scoped>

.steps-content {
    margin-top: 16px;
    border: 1px dashed #e9e9e9;
    border-radius: 6px;
    background-color: #fafafa;
    min-height: 200px;
    text-align: center;
    padding-top: 80px;
}

.steps-action {
    margin-top: 24px;
}

.btn-prev {
    width: 180px;
    height: 50px;
    background-color: #07bb14;
    border: #07bb14;
    float: right;
    border: none;
}

@media screen and (max-width: 550px) {
    .btn-prev {
        margin-top: 15px;
    }
}
</style>
