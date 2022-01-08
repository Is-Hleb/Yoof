<template>
    <a-modal v-model="visibleEditDocumentCompany"
             title="Редактирование документов"
             @ok="handleOk"
             :visible="visibleEditDocumentCompany"
             okText="Окей"
             cancelText="Закрыть"
             @close="handleOk"
    >
        <div class="form-group" style="display: flex; justify-content: center; flex-direction: column">
            <h2 style="color: black; font-family: Roboto">Загрузите новый документ:</h2>
            <a-upload
                action="/api/company/upload/document"
                :show-upload-list="false"
                name="upload"
                status="done"
                width="100"
            >
                <a-button>
                    <a-icon type="upload"/>
                    Прикрепить
                </a-button>

            </a-upload>
<!--            <div v-if="files['orgn']" @click="downloadFile('orgn')" class="files-list-item">-->
<!--                <span>{{ files['orgn'] }}</span>-->
<!--            </div>-->
        </div>
    </a-modal>
</template>

<script>
export default {
    props: ['visibleEditDocumentCompany'],
    emits: ['handleOk'],
    name: "EditDocumentCompany",
    data: () => ({
    }),
    methods: {
        handleOk() {
            this.visibleEditDocumentCompany = false
        }
     }
}
</script>

<style scoped>

</style>
