<template>
    <div class="footer" style="margin-top: 100px;">
        <div class="body3333">
            <img src="../IndexPage/img/logo2.png" class="yoof-yelo">
            <div>
                <h1 class="agh">О сервисе</h1>
                <a class="aa" href="#">Как работает сервис?</a>
                <a class="aa" href="#">Правила использования</a>
                <a class="aa" href="#">Публичная оферта</a>
            </div>
            <div>
                <h1 class="agh">Контакты</h1>
                <div class="flex"><img src="../IndexPage/img/ins.png" class="ift"><a class="aa" href="#">Instagram</a></div>
                <div class="flex"><img src="../IndexPage/img/fac.png" class="ift"><a class="aa" href="#">Facebook</a></div>
                <div class="flex"><img src="../IndexPage/img/tel.png" class="ift"><a class="aa" href="#">Telegram</a></div>
            </div>
        </div>
    </div>

</template>

<script>

export default ({
    name: 'Footer',
    data() {
        return {
        }
    },
})

</script>

<style lang="css" scoped>

.nav-link svg {
    margin-right: 5px;
    vertical-align: middle;
}
.nav-link span {
    vertical-align: middle;
}
.ant-menu-submenu-popup {
    width: 100%;
}

</style>
