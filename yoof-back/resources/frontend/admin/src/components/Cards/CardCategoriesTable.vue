<template>

    <!-- Projects Table Column -->
    <a-card :bordered="false" class="header-solid h-full" :bodyStyle="{padding: 0,}">
        <template #title>
            <a-row type="flex" align="middle">
                <a-col :span="24" :md="12">
                    <h5 class="font-semibold m-0">Категории</h5>
                </a-col>
                <!--				<a-col :span="24" :md="12" style="display: flex; align-items: center; justify-content: flex-end">-->
                <!--					<a-radio-group v-model="projectHeaderBtns" size="small">-->
                <!--						<a-radio-button value="all">ALL</a-radio-button>-->
                <!--						<a-radio-button value="online">ONLINE</a-radio-button>-->
                <!--						<a-radio-button value="stores">STORES</a-radio-button>-->
                <!--					</a-radio-group>-->
                <!--				</a-col>-->
            </a-row>
        </template>
        <EditRowModal v-if="isEditAction" :visible="isEditAction" :row="curRow" @onClose="() => isEditAction = false"> </EditRowModal>
        <CreateSearchArgument v-if="isCreateAction" :visible="isCreateAction" :row="curRow" @onClose="() => isCreateAction = false"></CreateSearchArgument>
        <a-table v-if="data.length" :columns="columns" :data-source="data" :pagination="true">
            <template slot="category.id" slot-scope="category">
                <span v-html="category.idTitle"></span>
            </template>

            <template slot="category.name" slot-scope="category">
                <h6 class="m-0">
                    {{ category.name + (category.gradation ? category.gradation : '') }}
                </h6>
            </template>

            <template slot="category.type" slot-scope="category">
                <h6 class="m-0">
                    {{ category.type }}
                </h6>
                <div v-html="category.description" v-if="category.is === 'searchArgument'">

                </div>
            </template>

            <template slot="category.count" slot-scope="category">
                <h6 v-if="category.is !== 'searchArgument'">
                    {{ category.productsCount }}
                </h6>
            </template>

            <template slot="category.edit" slot-scope="row">
                <a-button type="link" size="small" class="btn" @click="deleteRow(row)">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-danger" fill-rule="evenodd" clip-rule="evenodd"
                              d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z"
                              fill="#111827"/>
                    </svg>
                    <span class="text-danger">УДАЛИТЬ</span>
                </a-button>
                <a-button type="link" size="small" @click="editRow(row)">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-muted"
                              d="M13.5858 3.58579C14.3668 2.80474 15.6332 2.80474 16.4142 3.58579C17.1953 4.36683 17.1953 5.63316 16.4142 6.41421L15.6213 7.20711L12.7929 4.37868L13.5858 3.58579Z"
                              fill="#111827"/>
                        <path class="fill-muted"
                              d="M11.3787 5.79289L3 14.1716V17H5.82842L14.2071 8.62132L11.3787 5.79289Z"
                              fill="#111827"/>
                    </svg>
                    <span class="text-dark">РЕДАКТИРОВАТЬ</span>
                </a-button>
                <a-button v-if="row.is === 'property'" type="link" size="small" @click="addArgument(row)">
                    <a-icon type="plus" />
                    <span class="text-dark">ДОБАВИТЬ</span>
                </a-button>
            </template>
        </a-table>
        <UploadFile></UploadFile>
    </a-card>
    <!-- / Projects Table Column -->

</template>

<script>
import EditRowModal from "@/components/Modal/EditRowModal";
import CreateSearchArgument from "@/components/Modal/CreateSearchArgument";
import UploadFile from "@/components/Cards/UploadFile";

export default ({
    computed: {
        data() {
            return this.$store.getters.allCategories
        },
    },
    components: {
        EditRowModal,
        CreateSearchArgument,
        UploadFile
    },
    methods: {
        deleteRow(row) {
            this.$confirm({
                title: "Удалить " + row.type + '?',
                okText: 'Да',
                cancelText: 'Нет',
                onOk: () => {
                    const hide = this.$message.loading('Пытаюсь удалить...', 0);
                    setTimeout(hide, 2500);
                    this.$store.dispatch('deleteCategoryRow', row);
                }
            })
        },
        editRow(row) {
            this.isEditAction = true;
            this.curRow = row;
        },
        addArgument(row) {
            this.curRow = row;
            this.isCreateAction = true;
        },
    },
    data() {
        return {
            // Active button for the "Projects" table's card header radio button group.
            isEditAction: false,
            isCreateAction: false,
            curRow: {},
            projectHeaderBtns: 'all',
            editActive: false,
            columns: [
                {
                    title: 'ID',
                    scopedSlots: {customRender: 'category.id'},
                },
                {
                    title: 'НАЗВАНИЕ',
                    scopedSlots: {customRender: 'category.name'}
                },
                {
                    title: 'ТИП',
                    scopedSlots: {customRender: 'category.type'}
                },
                {
                    title: "КОЛИЧЕСТВО ТОВАРОВ",
                    scopedSlots: {customRender: 'category.count'}
                },
                {
                    title: 'ВЗАИМОДЕЙСТВИЕ',
                    scopedSlots: {customRender: 'category.edit'},
                    width: 60,
                },
            ],
        }
    },
})

</script>
