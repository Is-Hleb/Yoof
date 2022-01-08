<template>
    <div>
        <img src="../img/heade.png" class="g42gsdf">
        <div class="body">
            <div class="flexbetwen3">
                <h1 class="a">ЛИЧНЫЙ КАБИНЕТ</h1>

                <div class="flexalin">
                    <h1 class="a26">Аккаунт<a class="yelow" style="margin-left: 5px">{{ accountIsActive ? "АКТИВЕН" : "НЕ АКТИВЕН" }}</a></h1>
                    <img class="img" src="../img/Mvideo.png">
                    <h1 class="a25" style="margin-right: 10px">ООО “М.Видео”</h1>
                    <img class="exit" src="../img/exit.png" @click="signOut" >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'vue-router'
    export default {
    props: ['accountIsActive'],
    name: "HeaderPanelButton",
        data: () => ({
            isActive: false,
            dontActive: false,
        }),
    methods: {
        onNewApplication() {
            this.isActive = true;
            this.dontActive = true;
        },
        onDataCompany() {
            this.isActive = false;
            this.dontActive = false;
        },
        signOut() {

            this.$router.push("/")
            this.$store.dispatch('signOut')
        }
    }
}
</script>

<style scoped>

</style>
