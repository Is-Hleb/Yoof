<template>
    <div>
        <!-- Counter Widgets -->
        <a-row :gutter="24">
            <a-col :span="24" :lg="12" :xl="6" class="mb-24" v-for="(stat, index) in stats" :key="index">
                <!-- Widget 1 Card -->
                <WidgetCounter
                    :title="stat.title"
                    :value="stat.value"
                    :prefix="stat.prefix"
                    :status="stat.status"
                ></WidgetCounter>
                <!-- / Widget 1 Card -->
            </a-col>
        </a-row>
        <!-- / Counter Widgets -->

        <a-button block>
            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted"
                      d="M13.5858 3.58579C14.3668 2.80474 15.6332 2.80474 16.4142 3.58579C17.1953 4.36683 17.1953 5.63316 16.4142 6.41421L15.6213 7.20711L12.7929 4.37868L13.5858 3.58579Z"
                      fill="#111827"/>
                <path class="fill-muted" d="M11.3787 5.79289L3 14.1716V17H5.82842L14.2071 8.62132L11.3787 5.79289Z"
                      fill="#111827"/>
            </svg>
            <span class="text-dark">СОЗДАТЬ НОВУЮ КАТЕГОРИЮ</span>
        </a-button>

        <a-button block class="mt-20">
            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted"
                      d="M13.5858 3.58579C14.3668 2.80474 15.6332 2.80474 16.4142 3.58579C17.1953 4.36683 17.1953 5.63316 16.4142 6.41421L15.6213 7.20711L12.7929 4.37868L13.5858 3.58579Z"
                      fill="#111827"/>
                <path class="fill-muted" d="M11.3787 5.79289L3 14.1716V17H5.82842L14.2071 8.62132L11.3787 5.79289Z"
                      fill="#111827"/>
            </svg>
            <span class="text-dark">УПРАВЛЕНИЕ ЗАЯВКАМИ / АУКЦИОНАМИ</span>
        </a-button>

        <a-button block class="mt-20">
            <svg width="14px" height="14px" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>duplicate</title>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Tables" transform="translate(-58.000000, -507.000000)" fill="#BFBFBF" fill-rule="nonzero">
                        <g id="sidebar" transform="translate(33.000000, 43.000000)">
                            <g id="sign-up" transform="translate(16.000000, 455.000000)">
                                <g id="duplicate" transform="translate(9.000000, 9.000000)">
                                    <path
                                        d="M4,6 C4,4.89543 4.89543,4 6,4 L12,4 C13.1046,4 14,4.89543 14,6 L14,12 C14,13.1046 13.1046,14 12,14 L6,14 C4.89543,14 4,13.1046 4,12 L4,6 Z"
                                        id="Path"></path>
                                    <path
                                        d="M2,0 C0.89543,0 0,0.89543 0,2 L0,8 C0,9.1046 0.89543,10 2,10 L2,4 C2,2.8954305 2.8954305,2 4,2 L10,2 L10,2 C10,0.89543 9.1046,0 8,0 L2,0 Z"
                                        id="Path"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            <span class="text-dark ml-5">ДОБАВЛЕНИЕ НОВОСТЕЙ</span>
        </a-button>

        <a-button class="mt-20" block @click="showModal">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M18 10C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10C2 5.58172 5.58172 2 10 2C14.4183 2 18 5.58172 18 10ZM12 7C12 8.10457 11.1046 9 10 9C8.89543 9 8 8.10457 8 7C8 5.89543 8.89543 5 10 5C11.1046 5 12 5.89543 12 7ZM9.99993 11C7.98239 11 6.24394 12.195 5.45374 13.9157C6.55403 15.192 8.18265 16 9.99998 16C11.8173 16 13.4459 15.1921 14.5462 13.9158C13.756 12.195 12.0175 11 9.99993 11Z"
                      fill="#111827"/>
            </svg>
            <span class="text-dark">УПРАВЛЕНИЕ АДМИНИСТРАТОРАМИ</span>
            <collection-create-form
                ref="collectionForm"
                :visible="visible"
                @cancel="handleCancel"
                @ok="handleOk"
            />

        </a-button>

    </div>
</template>

<script>


import CardLineChart from '../components/Cards/CardLineChart' ;
import WidgetCounter from '../components/Widgets/WidgetCounter' ;


// "Projects" table list of columns and their properties.
const tableColumns = [
    {
        title: 'COMPANIES',
        dataIndex: 'company',
        scopedSlots: {customRender: 'company'},
        width: 300,
    },
    {
        title: 'MEMBERS',
        dataIndex: 'members',
        scopedSlots: {customRender: 'members'},
    },
    {
        title: 'BUDGET',
        dataIndex: 'budget',
        class: 'font-bold text-muted text-sm',
    },
    {
        title: 'COMPLETION',
        scopedSlots: {customRender: 'completion'},
        dataIndex: 'completion',
    },
];

// "Projects" table list of rows and their properties.


const CollectionCreateForm = {
    props: ['visible'],
    beforeCreate() {
        this.form = this.$form.createForm(this, {name: 'form_in_modal'});
    },
    template: `
        <a-modal
            :visible="visible"
            title='Управление модераторами'
            okText='Сохранить'
            @cancel="() => { $emit('cancel') }"
            @ok="() => { $emit('ok') }"
        >
        <a-form layout='vertical' :form="form">
            <a-form-item>
                <b>Добавление администратора</b>
                <a-input
                    class="mt-5"
                    placeholder="Email"
                    v-decorator="[
                    'toAddAdminEmail',
                    {
                      rules: [{ type: 'email', message: 'Некорректная почта!' }],
                    }
                  ]"
                />
            </a-form-item>
        </a-form>
        </a-modal>
    `,
};

export default ({
    components: {
        CardLineChart,
        WidgetCounter,
        CollectionCreateForm
    },
    computed: {
        ComputedUsers() {
            return this.$store.getters.allDBUsers ?? []
        },
        stats() {
            return [
                {
                    title: "Действующих аукционов",
                    value: 100,
                },
                {
                    title: "Всего зарегистрировано ЮЛ",
                    value: this.ComputedUsers.filter(item => item.role === 'company').length,
                },
                {
                    title: "Всего зарегистрировано ФЛ",
                    value: this.ComputedUsers.filter(item => item.role === 'user').length,
                },
                {
                    title: "На проверке документов от ЮЛ: ",
                    value: this.ComputedUsers.filter(item => item.role === 'company' && !item.status).length
                }
            ]
        },
        errors() {
            return this.$store.getters.modalErrors
        },
        success() {
            return this.$store.getters.modalSuccess
        }
    },
    data() {
        return {
            tableColumns,
            toAddAdminEmail: '',
            visible: false
        }
    },
    methods: {
        showModal() {
            this.visible = true;
        },
        handleCancel() {
            this.visible = false;
        },
        handleCreate() {

        },
        handleOk() {
            let email = ""
            const form = this.$refs.collectionForm.form;
            form.validateFields((err, values) => {
                if (err) {
                    return;
                }
                email = values.toAddAdminEmail
                this.$store.dispatch('changeUserAdminStatus', email).then(() => {

                    form.resetFields();
                    this.visible = false;
                    let success = this.success
                    for (let key in success) {
                        this.$notification['success']({
                            message: 'Успешно!',
                            description: success[key]
                        });
                    }
                    this.$store.commit('SET_MODAL_SUCCESS', {})

                }).catch(() => {
                    let errs = this.errors;
                    for (let key in errs) {
                        this.$message.error(errs[key]);
                    }
                    this.$store.commit('SET_MODAL_ERRORS', {})
                })
            });

        }
    },

})

</script>

<style lang="scss">
</style>
