<template>
    <div class="background-image">.
        <div class="people">
            <h1 class="h1">ПОЛУЧИТЕ СВОЕ ЭКСКЛЮЗИВНОЕ ПРЕДЛОЖЕНИЕ</h1>
        </div>
        <div class="connect">
            <h2 class="connect2">Сотни магазинов электроники готовы участвовать в аукционе, за право предложить вам свой
                товар</h2>
        </div>
        <div class="flex mt60" style="background-color: transparent">
            <a-popover title="Подсказка">
                <template slot="content">
                    <p>Введите модель техники<br><u>Например:</u> Asus ZenBook 14</p>
                </template>
                <a-input-search
                    placeholder="Введите модель техники или воспользуйтесь фильтрами"
                    enter-button="Искать"
                    size="large"
                    class="width-input"
                    v-model="searchString"
                    @search="handleSearchAction"
                />
            </a-popover>
        </div>
        <div class="flex-space-between body" style="background-color: transparent">
            <h3 class="text-add-filter" @click="() => visibleModalFilter = true" style="margin-top: 23px"><span
                class="plusy">+</span> Применить фильтры</h3>
        </div>
        <Filters @cancel="handleExit" :search-string-prop="futurePropSearchString" :visible-modal-filter="visibleModalFilter"/>
    </div>
</template>

<script>


import Filters from "../Templates/Filters";

export default {
    name: "Search",
    components: {
        Filters
    },
    data() {
        return {
            visible: true,
            visibleModalFilter: false,
            searchString: '',
            futurePropSearchString: '',
        };
    },
    methods: {
        handleSearchAction(text) {
            this.futurePropSearchString = text;
            this.searchString = '';
            if(text !== '' && !this.visibleModalFilter) {
                this.visibleModalFilter = true;
            }
        },
        showModal() {
            this.visible = true;
        },
        handleExit() {
            this.visibleModalFilter = false;
        },
    }
}
</script>

<style scoped>

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

.background-image {
    background-image: url("./img/background.png");
    height: 510px;
}


.width-input {
    width: 79%;
    margin-left: auto;
    margin-right: auto;
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

.p {

}

.button-filter-search {
    border: 0;
    width: 200px;
    height: 60px;
    background: #EBF005;
    border-radius: 10px;
    cursor: pointer;
}


.flex {
    position: relative;
    display: flex;
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
    font-family: "Cormorant Garamond";
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

.ant-layout-header {
    padding: 0 0px;
}

@media screen and (max-width: 550px) {
    #components-layout-demo-side .logo {
        height: 30px;
        width: 100px;
        margin-left: -30px;
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

    .h1 {
        font-size: 36px;
    }


}

</style>
