<template>


	<!-- Authors Table Card -->
	<a-card :bordered="false" class="header-solid h-full" :bodyStyle="{padding: 0,}">
        <template #title>

            <a-row type="flex" align="middle">
				<a-col :span="24" :md="12">
					<h5 class="font-semibold m-0">Пользователи</h5>
				</a-col>
				<a-col :span="24" :md="12" style="display: flex; align-items: center; justify-content: flex-end">            <!-- Header Search Input -->

					<a-radio-group v-model="authorsHeaderBtns" size="small">
						<a-radio-button v-on:click="sortTableByRole('all')">Все</a-radio-button>
                        <a-radio-button v-on:click="sortTableByRole('user')">Физ. лица</a-radio-button>
                        <a-radio-button v-on:click="sortTableByRole('company')">Юр. лица</a-radio-button>
					</a-radio-group>
				</a-col>
                <a-input-search v-model="searchText" v-on:input="onSearch" class="header-search mt-15" :class="searchLoading ?  'loading' : ''" placeholder="Введите Email / ФИО / Дату регистрации (yy-mm-dd)" @search="onSearch" >

                </a-input-search>
			</a-row>

		</template>
        <show-edit-user v-if="editModalWindow.visible" :index="editModalWindow.key" @modalClose="() => this.editModalWindow.visible = false" :visible="editModalWindow.visible"></show-edit-user>
        <a-table v-if="data.length" :columns="columns" :data-source="data" :pagination="true">

			<template slot="author" slot-scope="author">
                <div class="table-avatar-info">
					<div class="avatar-info">
						<h6>{{ author.name }}</h6>
						<p>{{ author.email }}</p>
					</div>
				</div>
			</template>

			<template slot="func" slot-scope="func">
				<div class="author-info">
					<h6 class="m -0">{{ func.job }}</h6>
					<p class="m-0 font-regular text-muted">{{ func.department }}</p>
				</div>
			</template>

			<template slot="status" slot-scope="status">
				<a-tag class="tag-status" :class="status ? 'ant-tag-primary' : 'ant-tag-muted'">
					{{ status ? "ПОДТВЕРЖДЕН" : "НЕ ПОДТВЕРЖДЕН" }}
				</a-tag>
			</template>

			<template slot="editBtn" slot-scope="row">
                <a-button type="link" size="small" class="btn" @click="showDeleteConfirm(row)">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-danger" fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="#111827"/>
                    </svg>
                    <span class="text-danger">УДАЛИТЬ</span>
                </a-button>
                <a-button type="link" size="small" @click="showEditConfirm(row)">
                    <a-icon type="mail" />
                    <span class="text-dark">ОТПРАВИТЬ ПИСЬМО</span>
                </a-button>
                <a-button type="link" size="small" @click="changeStatus(row)">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-muted" d="M13.5858 3.58579C14.3668 2.80474 15.6332 2.80474 16.4142 3.58579C17.1953 4.36683 17.1953 5.63316 16.4142 6.41421L15.6213 7.20711L12.7929 4.37868L13.5858 3.58579Z" fill="#111827"/>
                        <path class="fill-muted" d="M11.3787 5.79289L3 14.1716V17H5.82842L14.2071 8.62132L11.3787 5.79289Z" fill="#111827"/>
                    </svg>
                    <span class="text-dark">ИЗМЕНИТЬ СТАТУС</span>
                </a-button>
			</template>

            <p slot="expandedRowRender" v-html=row.description slot-scope="row" style="margin: 0">
            </p>
		</a-table>
	</a-card>
	<!-- / Authors Table Card -->

</template>

<script>
    import ShowEditUser from "@/components/Modal/ShowEditUser";

	export default ({
        name: 'App',
        components: {
            ShowEditUser,
        },
        data() {
            return {
                // Active button for the "Authors" table's card header radio button group.
                authorsHeaderBtns: 'all',
                isModalVisible: false,
                editModalWindow:{
                    visible: false,
                    key: 1,
                },
                searchText: '',
            }
        },
        methods: {
            sortTableByRole(role) {
              this.$emit('sortTableByRole', role)
            },
            changeStatus(row) {
                let key = row.key;
                this.$confirm({
                    title: 'Изменить статус',
                    content: 'ВЫ УВЕРЕНЫ?',
                    okText: "Да",
                    cancelText: "Нет",
                    onOk: () => {
                        this.$emit('onChangeUserStatus', key)
                    },
                })
            },
            showDeleteConfirm(row) {
                let key = row.key;
                this.$confirm({
                    title: 'ПРЕДУПРЕЖДЕНИЕ',
                    width: 500,
                    content: 'Вы действительно хотите удалить данного пользователя?',
                    okText: 'Да',
                    okType: 'danger',
                    cancelText: 'Нет',
                    onOk: () => {
                        this.$emit('onDelete', key)
                    },
                    onCancel() {
                        console.log('Cancel');
                    },
                });
            },
            showEditConfirm(row) {
                this.editModalWindow.visible = true;
                this.editModalWindow.key = row.key;
            },
            searchLoading(){

            },
            onSearch(){
                let string = this.searchText;
                if(!string) {
                    this.$emit('sortTableByRole', 'all')
                } else {
                    this.$emit('onSearch', string)
                }
            },
        },
		props: {
			data: {
				type: Array,
				default: () => [],
			},
			columns: {
				type: Array,
				default: () => [],
			},
		},

	})

</script>
