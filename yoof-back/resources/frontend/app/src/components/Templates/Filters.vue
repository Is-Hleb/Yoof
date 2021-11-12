<template>

    <a-modal
        title="Применение фильтров"
        :visible="visibleModalFilter"
        width="1200px"
        @cancel="$emit('cancel')"
    >
        <a-spin :spinning="loading">
            <a-form
                class="login-form"
            >
                <div class="body0 pad0">
                    <img src="./img/logo2.png" class="slider-icon" style="display: block">
                    <div><h1 class="pppp">ФИЛЬТРЫ</h1></div>
                    <h1 class="pppp fon-size300">Введите модель техники, которую Вы ищете, или воспользуйтесь нашими
                        умными фильтрами ниже</h1>
                    <div class="flex asw">
                        <a-input-search placeholder="Введите модель техники..."
                                        enter-button="Искать"
                                        size="large"
                                        @search="handleSearchAction"
                                        @input="handleInputAction"
                                        v-model="searchString"
                                        style="margin-bottom: 10px; margin-top: 10px">
                        </a-input-search>
                    </div>
                    <div class="category-filters">
                        <div>
                            <div v-show="!searchActionActive">
                                <a-steps :current="current">
                                    <a-step v-for="item in steps" :key="item.title" :title="item.title"
                                            :description="item.description"/>
                                </a-steps>
                                <div class="steps-action">
                                    <a-button v-if="current < steps.length - 1" type="primary" @click="next"
                                              class="btn-next">
                                        Следующий шаг
                                        <a-icon type="arrow-right"/>
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
                                        <a-icon type="arrow-left"/>
                                        На предыдущий шаг
                                    </a-button>
                                </div>
                            </div>

                            <div v-if="current === 0" style="margin-top: 30px;" align="center">
                                <a-select :default-value="groupsNames[0]" class="categories"
                                          @change="handleGroupNameChange">
                                    <a-select-option v-for="groupName in groupsNames" :key="groupName">
                                        {{ groupName }}
                                    </a-select-option>
                                </a-select>
                                <br>
                                <a-select v-model="selectedCategory" class="product">
                                    <a-select-option v-for="category in cities" :key="category">
                                        {{ category }}
                                    </a-select-option>
                                </a-select>
                            </div>

                            <div v-if="current === 1">
                                <div v-for="flexGroup in filters" :key="flexGroup.key" class="flex-filter-block"
                                     style="margin-top: 30px">
                                    <div v-for="(args, name) in flexGroup" :key="name">
                                        <h1 class="pppp">{{ name }}</h1>
                                        <div v-for="arg in args" :key="arg.id" class="flex">

                                            <input @change="selectArgAction(arg)" class="checkbox" type="checkbox"
                                                   :value="arg.id"
                                                   :name="arg.name">
                                            <p class="p">{{ arg.name }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="current === 2" style="margin-top: 35px">
                                <a-table :columns="columns" :data-source="products"
                                         class="components-table-demo-nested">
                                    <a slot="operation">Publish</a>
                                    <template slot="expandedRowRender" slot-scope="row">
                                        <p v-html="row.description"></p>
                                    </template>
                                </a-table>
                            </div>
                        </div>
                    </div>


                    <div class="FLEX5 ai fmtp">
                        <!--                        <h1 class="ppppp10">Очистить фильтры</h1>
                                                <div class="flex-pop" style="margin-left: 10px; "><a-button type="primary"  style="width: 180px; height: 50px; background-color: yellowgreen; border: yellowgreen;"><span class="pppp" style="color: white">НАЧАТЬ ПОИСК</span></a-button></div>-->
                    </div>
                </div>
            </a-form>
        </a-spin>
    </a-modal>
</template>


<script>
const columns = [
    {title: 'Модель и характеристики', dataIndex: 'name', key: 'name'},
];


export default {
    props: ['visibleModalFilter', 'searchStringProp'],
    watch: {
        searchStringProp(newVal) {
            this.searchString = newVal;
            this.handleSearchAction()
        }
    },
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
            args: [],
            cities: [],
            selectedCategory: '',
            columns,
            searchString: this.searchStringProp ?? '',
            searchActionActive: false,
            letters: 0,
        };
    },
    computed: {
        groupsNames() {
            return this.$store.getters.groups ?? [];
        },
        categories() {
            return this.$store.getters.categories ?? [];
        },
        filters() {
            return this.$store.getters.filters ?? []
        },
        loading() {
            return this.$store.getters.loading
        },
        products() {
            return this.$store.getters.products ?? []
        }
    },
    mounted() {
        this.$store.dispatch('loadGroups').then(() => {
            this.cities = this.categories[this.groupsNames[0]]
            this.selectedCategory = this.categories[this.groupsNames[0]][0];
        });
    },
    methods: {
        selectArgAction(arg) {
            this.args.push(arg)
        },
        next() {
            if (this.current + 1 === 1) { // Первый этап -- выбор категорий
                this.$store.dispatch('loadFilters', this.selectedCategory).then(() => {
                    this.current++;
                });
            } else if (this.current + 1 === 2) { // Второй этап -- поиск
                this.$store.dispatch('searchByArguments', this.args).then(() => {
                    this.args = []
                    this.current++;
                })
            }
        },
        prev() {
            this.current--;
        },
        handleGroupNameChange(value) {
            this.cities = this.categories[value];
            this.selectedCategory = this.categories[value][0];
        },
        handleInputAction() {
            this.searchActionActive = this.searchString !== ''
            this.current = this.searchActionActive ? 2 : 0;
            if(!this.searchActionActive) {
                this.$store.commit('SET_PRODUCTS', [])
            }
        },
        handleSearchAction() {
            this.letters++;
            let active = this.searchActionActive = this.searchString !== '',
                searchString = this.searchString
            this.current = this.searchActionActive ? 2 : 0;

            if (!active) {
                this.letters = 0;
            } else {
                this.letters = 0;
                this.$store.dispatch('searchByModel', searchString)
            }
        }
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

.btn-next {
    width: 180px;
    height: 50px;
    background-color: #07bb14;
    border: #07bb14;
}

.categories {
    width: 300px;
    margin-bottom: 30px;
}

.product {
    width: 200px
}

@media screen and (max-width: 550px) {
    .btn-prev {
        float: none;
        margin-top: 20px;

    }

    .categories {
        width: 200px;
        float: left;
    }

    .product {
        float: left;
    }

}
</style>
