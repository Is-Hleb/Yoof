<template>
    <a-layout id="components-layout-demo-custom-trigger" >
        <a-icon class="trigger trigg" :type="collapsed ? 'menu' : 'menu'" @click="() => (collapsed = !collapsed)" style="position: absolute; top: -24%; left: 0%" />
        <a-layout-sider v-model="collapsed" :trigger="null" collapsible theme="light" width="230" hei collapsed-width="0" >
            <a-menu theme="light" mode="inline" :default-selected-keys="['1']" >
                <a-menu-item key="1">
                    <a href="#service">
                        <a-icon type="user" />
                        <span>Как это работает?</span>
                    </a>
                </a-menu-item>
                <a-menu-item key="2">
                    <a-icon type="info-circle" />
                    <span>Правила использования</span>
                </a-menu-item>
                <a-menu-item key="3">
                    <a-icon type="idcard" />
                    <span>Личный кабинет</span>
                </a-menu-item>
                <a-menu-item key="4">
                    <a-icon type="container" />
                    <span>Публичная оферта</span>
                </a-menu-item>
                <a-menu-item key="5">
                    <a href="#news">
                        <a-icon type="book" />
                        <span>Новости</span>
                    </a>
                </a-menu-item>
            </a-menu>
        </a-layout-sider>
    </a-layout>
</template>

<script>
import Vue from 'vue'
import Antd from 'ant-design-vue'
import 'ant-design-vue/dist/antd.css'
Vue.use(Antd);
export default ({
    name: 'Sidebar',
    components: {
    },
    data() {
        return {
            collapsed: true
        }
    },
})
</script>

<style lang="css" scoped>
#components-layout-demo-custom-trigger .trigger {
    font-size: 18px;
    line-height: 64px;
    cursor: pointer;
    transition: color 0.3s;
}
#components-layout-demo-custom-trigger .trigger:hover {
    color: #1890ff;
}
#components-layout-demo-custom-trigger .logo {
    height: 32px;
    background: rgba(255, 255, 255, 0.2);
    margin: 16px;
}
.logo {
    width: 200px;
}
.ant-layout {
    flex: none;
    position: absolute;
    left: 0%;
    top: 9%;
}
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
.active-city {
    display: none;
}
.active-block {
    display: none;
}
@media screen and (max-width: 550px) {
    .active-city {
        display: block;
    }
    .text-city {
        font-size: 13px;
    }
    .active-block {
        display: block;
    }
    .trigg {
        position: absolute;
        top: -50%;
    }
    .ant-layout {
        top: 9%;
    }
}
</style>
