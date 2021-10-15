<template>


	<!-- Authors Table Card -->
	<a-card :bordered="false" class="header-solid h-full" :bodyStyle="{padding: 0,}">
        <template #title>

            <a-row type="flex" align="middle">
				<a-col :span="24" :md="12">
					<h5 class="font-semibold m-0">Поиск и управление пользователями</h5>
				</a-col>
				<a-col :span="24" :md="12" style="display: flex; align-items: center; justify-content: flex-end">            <!-- Header Search Input -->

					<a-radio-group v-model="authorsHeaderBtns" size="medium">
						<a-radio-button value="all">Все</a-radio-button>
                        <a-radio-button value="fz">Физ. лица</a-radio-button>
                        <a-radio-button value="ur">Юр. лица</a-radio-button>
					</a-radio-group>
				</a-col>
                <a-input-search class="header-search mt-15" :class="searchLoading ?  'loading' : ''" placeholder="Введите Email / ФИО / Дату регистрации" @search="onSearch" :loading='searchLoading'>

                </a-input-search>
			</a-row>

		</template>
		<a-table :columns="columns" :data-source="data" :pagination="false">


			<template slot="author" slot-scope="author">

				<div class="table-avatar-info">
					<a-avatar shape="square" :src="author.avatar" />
					<div class="avatar-info">
						<h6>{{ author.name }}</h6>
						<p>{{ author.email }}</p>
					</div>
				</div>
			</template>

			<template slot="func" slot-scope="func">
				<div class="author-info">
					<h6 class="m-0">{{ func.job }}</h6>
					<p class="m-0 font-regular text-muted">{{ func.department }}</p>
				</div>
			</template>

			<template slot="status" slot-scope="status">
				<a-tag class="tag-status" :class="status ? 'ant-tag-primary' : 'ant-tag-muted'">
					{{ status ? "ПОДТВЕРЖДЕН" : "НЕ ПОДТВЕРЖДЕН" }}
				</a-tag>
			</template>

			<template slot="editBtn" slot-scope="row">
                <a-button type="link" size="small" class="btn" @click="showDeleteConfirm">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-danger" fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="#111827"/>
                    </svg>
                    <span class="text-danger">УДАЛИТЬ</span>
                </a-button>
                <a-button type="link" size="small" @click="showEditConfirm">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-muted" d="M13.5858 3.58579C14.3668 2.80474 15.6332 2.80474 16.4142 3.58579C17.1953 4.36683 17.1953 5.63316 16.4142 6.41421L15.6213 7.20711L12.7929 4.37868L13.5858 3.58579Z" fill="#111827"/>
                        <path class="fill-muted" d="M11.3787 5.79289L3 14.1716V17H5.82842L14.2071 8.62132L11.3787 5.79289Z" fill="#111827"/>
                    </svg>
                    <span class="text-dark">РЕДАКТИРОВАТЬ</span>
                </a-button>

			</template>


		</a-table>
        <a-button block class="mt-30">
            СОЗДАТЬ НОВОГО ПОЛЬЗОВАТЕЛЯ
        </a-button>
	</a-card>
	<!-- / Authors Table Card -->

</template>

<script>


	export default ({
        name: 'App',
        methods: {
            showDeleteConfirm() {
                this.$confirm({
                    title: 'ПРЕДУПРЕЖДЕНИЕ',
                    width: 500,
                    content: 'Вы действительно хотите удалить данного пользователя?',
                    okText: 'Да',
                    okType: 'danger',
                    cancelText: 'Нет',
                    onOk() {
                        console.log('OK');
                    },
                    onCancel() {
                        console.log('Cancel');
                    },
                });
            },
            showEditConfirm() {
                this.$confirm({
                    title: 'Введите данные, которые желаете редактировать у данного пользователя',
                    width: 1000,
                    content: h => <div className="mt-5">
                        <br></br>
                        <b>Редактировать имя
                            <a-input placeholder="Имя" class="mb-15"/>
                        </b>
                        <b>Редактировать фамилию
                            <a-input placeholder="Фамилия" class="mb-15"/>
                        </b>
                        <b>Редактировать отчество
                            <a-input placeholder="Отчество" class="mb-15"/>
                        </b>
                        <b>Редактировать телефон
                            <a-input placeholder="Телефон" class="mb-15"/>
                        </b>
                        <b>Редактировать электронную почту
                            <a-input placeholder="Электронная почта" class="mb-15"/>
                        </b>
                        <b>Редактировать аватарку
                            <a-upload
                                name="avatar"
                                list-type="picture-card"
                                class="projects-uploader"
                        >
                                <div class="ant-upload-text font-semibold text-dark">
                                    Загрузить новую аватарку
                                </div>
                        </a-upload>
                        </b>
                    </div>,
                    okText: 'Сохранить',
                    cancelText: 'Отмена',
                    onOk() {
                        console.log('OK');
                    },
                    onCancel() {
                        console.log('Cancel');
                    },
                });
            }
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
		data() {
			return {
				// Active button for the "Authors" table's card header radio button group.
				authorsHeaderBtns: 'all',
                isModalVisible: false
            }
		},
	})

</script>
