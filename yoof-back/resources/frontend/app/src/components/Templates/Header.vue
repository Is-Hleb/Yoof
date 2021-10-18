<template>
    <div class="head">
        <div class="body">
            <div class="FLEX ai">
                <div class="menu">
                    <hr class="ml">
                    <hr class="ml1">
                    <hr class="ml">
                </div>
                <img src="./img/logo1.png" class="iuiuiu">
                <div class="flex200000">
                    <img src="./img/tocha.png" class="tocha">
                    <h1 class="m mm2">Москва</h1>
                </div>
                <div v-bind:class="{d_none: isAuth}" class="m2">
                    <h1 class="m">Вход</h1>
                    <hr class="hr2">
                    <h1 class="m">Регистрация</h1>
                </div>
                <div v-bind:class="{d_none: !isAuth}">
                    <h1 v-on:click="loginOut" class="m">Выйти</h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'head-component',
    computed: {
        isAuth() {
            return this.$store.state.user.isAuth
        }
    },
    methods: {
        loginOut() {
            this.$store.dispatch('loginOut')
            if (this.$router.currentRoute.name !== 'index') {
                this.$router.push({name: 'index'})
            }
        }
    }
}
</script>

<style>
.head {
    width: 100%;
    height: 60px;
    background-color: #fff;
}

.body {
    padding: 0 15px;
    max-width: 1200px;
    position: relative;
    height: 100%;
    margin: 0 auto;
}

.ai {
    align-items: center;
}

.FLEX {
    justify-content: space-between;
    position: relative;
    display: flex;
}

.menu {
    justify-content: flex-start;
    width: 45px;
    background-color: #fff;
}

.ml1 {
    border: 0;
    height: 3px;
    background: #000;
    margin: 8px 0;
}

.iuiuiu {
    width: 150px;
    margin-left: 30px;
}

.ml {
    height: 3px;
    border: 0;
    background: #000;
    margin: 0;
}

.tocha {
    margin-right: 3px;
    width: 13px;
    height: 18px;
}

.m {

    font-family: Roboto;
    font-style: normal;
    font-weight: 100;
    font-size: 18px;
    line-height: 21px;
    color: #000000;
}

.m2 {
    cursor: pointer;
    justify-content: flex-end;
    display: flex;
}

.hr2 {

    right: 0;
    margin-right: 10px;
    margin-left: 10px;
    border: 0;
    background: #1D8C0080;
    width: 2px;
    height: 30px;
}

.mm2 {
    margin: 0;
}

.flex200000 {
    cursor: pointer;
    align-items: center;
    right: 30%;
    position: absolute;
    display: flex;
}

.d_none {
    display: none;
}
</style>
