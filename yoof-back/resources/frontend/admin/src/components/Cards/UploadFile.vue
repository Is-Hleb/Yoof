<template>
    <a-upload-dragger
        name="category"
        :multiple="true"
        :headers="{
            'Authorization': 'Bearer ' + this.$store.state.user.api_token,
            'Accept': 'application/json'
        }"
        action="/api/admin/category"
        @change="handleChange"
    >
        <p class="ant-upload-drag-icon">
            <a-icon type="inbox"/>
        </p>
        <p class="ant-upload-text">
            Нажмите или перетащите сюда загружаемый файл
        </p>
    </a-upload-dragger>
</template>
<script>
export default {
    data() {
        return {};
    },
    methods: {
        handleChange(info) {
            const status = info.file.status;
            if (status !== 'uploading') {
                console.log(info.file, info.fileList);
            }
            if (status === 'done') {
                this.$message.success(`${info.file.name} file uploaded successfully.`)
                this.$store.dispatch('getAllCategories')
            } else if (status === 'error') {
                this.$message.error(`${info.file.name} file upload failed.`);
            }
        },
    },
};
</script>
