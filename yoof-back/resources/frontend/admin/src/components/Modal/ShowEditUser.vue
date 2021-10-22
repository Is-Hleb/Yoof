<template>
    <div>
        <a-modal
            :title="'Отправить письмо на: ' + this.user.email"
            :visible="visible"
            :confirm-loading="confirmLoading"
            @ok="handleOk"
            @cancel="handleCancel"
        >
            <br>
            <b>Текст письма
                <a-textarea v-model="message" placeholder="Электронная почта" class="mb-15"/>
            </b>
        </a-modal>
    </div>
</template>
<script>
export default {
    name: 'show-edit-user',
    data() {
        return {
            ModalText: 'Content of the modal',
            confirmLoading: false,
            message: '',
        };
    },
    computed: {
        user() {
            return this.$store.getters.getUserByKey(this.index);
        },
        loading() {
            return this.$store.getters.loading
        }
    },
    props: {
        visible: false,
        index: null,
    },
    methods: {
        handleOk() {
            this.ModalText = 'The modal will be closed after two seconds';
            this.confirmLoading = true;
            this.$store.dispatch('sendEmailToUser', {index: this.user.id, message: this.message})
            const hide = this.$message.loading('Отправляю письмо...', 0);
            setTimeout(hide, 2500);
            this.$emit('modalClose');
        },
        handleCancel() {
            this.$emit('modalClose');
        },
    },

};
</script>
