<template>

    <a-modal
        title="Title"
        :visible="showModal"
        :confirm-loading="confirmLoading"
        @ok="handleOk"
        @cancel="handleCancel"
    >
        <p>{{ ModalText }}</p>
    </a-modal>
</template>

<script>
import Vue from 'vue'
import Antd from 'ant-design-vue'
import 'ant-design-vue/dist/antd.css'

Vue.use(Antd)

export default {
    name: 'AddNews',
    props: {
        isClicked: String
    },
    data() {
        return {
            ModalText: 'Content of the modal',
            visible: false,
            confirmLoading: false
        };
    },
    methods: {
        showModal() {
            if (this.isClicked === '11') {
                this.visible = true
            } else {
                this.visible = true
            }
        },
        handleOk(e) {
            this.ModalText = 'The modal will be closed after two seconds';
            this.confirmLoading = true;
            setTimeout(() => {
                this.visible = false;
                this.confirmLoading = false;
            }, 2000);
        },
        handleCancel(e) {
            console.log('Clicked cancel button');
            this.visible = false;
        },

    },
}
</script>

<style scoped>

</style>
