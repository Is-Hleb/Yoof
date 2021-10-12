<template>

	<!-- Billing Information Card -->
	<a-card  class="header-solid h-full block" :bodyStyle="{paddingTop: 0, paddingBottom: '16px' }">
		<template #title>
			<h6 class="font-semibold m-0">Проверка документов от юридических лиц</h6>
		</template>
		<a-row :gutter="[24, 24]">
			<a-col :span="24">
			<a-card :bordered="false" class="card-billing-info">
				<div class="col-info">
					<a-descriptions title="Заявка №1" :column="1">
						<a-descriptions-item label="Название организации или ИП">
                            ООО "М.Видео"
						</a-descriptions-item>
						<a-descriptions-item label="Юридический адрес">
							123456, г.Москва, ул. Красносельская, д.40, оф.4
						</a-descriptions-item>
						<a-descriptions-item label="ИНН">
							7707548740
						</a-descriptions-item>
                        <a-descriptions-item label="Банк">
                            Сбербанк
                        </a-descriptions-item>
                        <a-descriptions-item label="Расчетный счёт">
                            4070281050000000001
                        </a-descriptions-item>
                        <a-descriptions-item label="КПП">
                            12456789
                        </a-descriptions-item>
                        <a-descriptions-item label="БИК банка">
                            045678057
                        </a-descriptions-item>
                        <a-descriptions-item label="Адрес электронной почты">
                            info@mvideo.ru
                        </a-descriptions-item>
					</a-descriptions>
                    <a-button slot="actions" type="link">
                        <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 9.29289C6.68342 8.90237 7.31658 8.90237 7.70711 9.29289L9 10.5858L9 3C9 2.44772 9.44771 2 10 2C10.5523 2 11 2.44771 11 3L11 10.5858L12.2929 9.29289C12.6834 8.90237 13.3166 8.90237 13.7071 9.29289C14.0976 9.68342 14.0976 10.3166 13.7071 10.7071L10.7071 13.7071C10.5196 13.8946 10.2652 14 10 14C9.73478 14 9.48043 13.8946 9.29289 13.7071L6.29289 10.7071C5.90237 10.3166 5.90237 9.68342 6.29289 9.29289Z" fill="#111827"/>
                        </svg>
                        Свидетельство ОГРН (или лист записи ЕГРЮЛ)
                    </a-button>
                    <a-button slot="actions" type="link">
                        <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 9.29289C6.68342 8.90237 7.31658 8.90237 7.70711 9.29289L9 10.5858L9 3C9 2.44772 9.44771 2 10 2C10.5523 2 11 2.44771 11 3L11 10.5858L12.2929 9.29289C12.6834 8.90237 13.3166 8.90237 13.7071 9.29289C14.0976 9.68342 14.0976 10.3166 13.7071 10.7071L10.7071 13.7071C10.5196 13.8946 10.2652 14 10 14C9.73478 14 9.48043 13.8946 9.29289 13.7071L6.29289 10.7071C5.90237 10.3166 5.90237 9.68342 6.29289 9.29289Z" fill="#111827"/>
                        </svg>
                        Свидетельство ИНН
                    </a-button>

				</div>
				<div class="col-action">
					<a-button type="link" size="small" @click="showDelConfirm">
						<svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path class="fill-danger" fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="#111827"/>
						</svg>
						<span class="text-danger">ОТКАЗ</span>
					</a-button>
					<a-button type="link" size="small" @click="showAddConfirm">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-success" fill-rule="evenodd" clip-rule="evenodd" d="M10 3C10.5523 3 11 3.44772 11 4V9H16C16.5523 9 17 9.44772 17 10C17 10.5523 16.5523 11 16 11H11V16C11 16.5523 10.5523 17 10 17C9.44772 17 9 16.5523 9 16V11H4C3.44772 11 3 10.5523 3 10C3 9.44771 3.44772 9 4 9L9 9V4C9 3.44772 9.44772 3 10 3Z"/>
                            </svg>
						<span class="text-add">ОДОБРИТЬ</span>
					</a-button>
				</div>
			</a-card>
			</a-col>
			<a-col :span="24">
			<a-card :bordered="false" class="card-billing-info">
                <div class="col-info">
                    <a-descriptions title="Заявка №2" :column="1">
                        <a-descriptions-item label="Название организации или ИП">
                            ООО "М.Видео"
                        </a-descriptions-item>
                        <a-descriptions-item label="Юридический адрес">
                            123456, г.Москва, ул. Красносельская, д.40, оф.4
                        </a-descriptions-item>
                        <a-descriptions-item label="ИНН">
                            7707548740
                        </a-descriptions-item>
                        <a-descriptions-item label="Банк">
                            Сбербанк
                        </a-descriptions-item>
                        <a-descriptions-item label="Расчетный счёт">
                            4070281050000000001
                        </a-descriptions-item>
                        <a-descriptions-item label="КПП">
                            12456789
                        </a-descriptions-item>
                        <a-descriptions-item label="БИК банка">
                            045678057
                        </a-descriptions-item>
                        <a-descriptions-item label="Адрес электронной почты">
                            info@mvideo.ru
                        </a-descriptions-item>
                    </a-descriptions>
                    <a-button slot="actions" type="link">
                        <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 9.29289C6.68342 8.90237 7.31658 8.90237 7.70711 9.29289L9 10.5858L9 3C9 2.44772 9.44771 2 10 2C10.5523 2 11 2.44771 11 3L11 10.5858L12.2929 9.29289C12.6834 8.90237 13.3166 8.90237 13.7071 9.29289C14.0976 9.68342 14.0976 10.3166 13.7071 10.7071L10.7071 13.7071C10.5196 13.8946 10.2652 14 10 14C9.73478 14 9.48043 13.8946 9.29289 13.7071L6.29289 10.7071C5.90237 10.3166 5.90237 9.68342 6.29289 9.29289Z" fill="#111827"/>
                        </svg>
                        Свидетельство ОГРН (или лист записи ЕГРЮЛ)
                    </a-button>
                    <a-button slot="actions" type="link">
                        <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 9.29289C6.68342 8.90237 7.31658 8.90237 7.70711 9.29289L9 10.5858L9 3C9 2.44772 9.44771 2 10 2C10.5523 2 11 2.44771 11 3L11 10.5858L12.2929 9.29289C12.6834 8.90237 13.3166 8.90237 13.7071 9.29289C14.0976 9.68342 14.0976 10.3166 13.7071 10.7071L10.7071 13.7071C10.5196 13.8946 10.2652 14 10 14C9.73478 14 9.48043 13.8946 9.29289 13.7071L6.29289 10.7071C5.90237 10.3166 5.90237 9.68342 6.29289 9.29289Z" fill="#111827"/>
                        </svg>
                        Свидетельство ИНН
                    </a-button>

                </div>
                <div class="col-action">
                    <a-button type="link" size="small" @click="showDelConfirm">
                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-danger" fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="#111827"/>
                        </svg>
                        <span class="text-danger">ОТКАЗ</span>
                    </a-button>
                    <a-button type="link" size="small" @click="showAddConfirm">
                        <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-success" fill-rule="evenodd" clip-rule="evenodd" d="M10 3C10.5523 3 11 3.44772 11 4V9H16C16.5523 9 17 9.44772 17 10C17 10.5523 16.5523 11 16 11H11V16C11 16.5523 10.5523 17 10 17C9.44772 17 9 16.5523 9 16V11H4C3.44772 11 3 10.5523 3 10C3 9.44771 3.44772 9 4 9L9 9V4C9 3.44772 9.44772 3 10 3Z"/>
                        </svg>
                        <span class="text-add">ОДОБРИТЬ</span>
                    </a-button>
                </div>


			</a-card>
			</a-col>
            <a-col :span="24">
                <a-card :bordered="false" class="card-billing-info">
                    <div class="col-info">
                        <a-descriptions title="Заявка №3" :column="1">
                            <a-descriptions-item label="Название организации или ИП">
                                ООО "М.Видео"
                            </a-descriptions-item>
                            <a-descriptions-item label="Юридический адрес">
                                123456, г.Москва, ул. Красносельская, д.40, оф.4
                            </a-descriptions-item>
                            <a-descriptions-item label="ИНН">
                                7707548740
                            </a-descriptions-item>
                            <a-descriptions-item label="Банк">
                                Сбербанк
                            </a-descriptions-item>
                            <a-descriptions-item label="Расчетный счёт">
                                4070281050000000001
                            </a-descriptions-item>
                            <a-descriptions-item label="КПП">
                                12456789
                            </a-descriptions-item>
                            <a-descriptions-item label="БИК банка">
                                045678057
                            </a-descriptions-item>
                            <a-descriptions-item label="Адрес электронной почты">
                                info@mvideo.ru
                            </a-descriptions-item>
                        </a-descriptions>
                        <a-button slot="actions" type="link">
                            <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 9.29289C6.68342 8.90237 7.31658 8.90237 7.70711 9.29289L9 10.5858L9 3C9 2.44772 9.44771 2 10 2C10.5523 2 11 2.44771 11 3L11 10.5858L12.2929 9.29289C12.6834 8.90237 13.3166 8.90237 13.7071 9.29289C14.0976 9.68342 14.0976 10.3166 13.7071 10.7071L10.7071 13.7071C10.5196 13.8946 10.2652 14 10 14C9.73478 14 9.48043 13.8946 9.29289 13.7071L6.29289 10.7071C5.90237 10.3166 5.90237 9.68342 6.29289 9.29289Z" fill="#111827"/>
                            </svg>
                            Свидетельство ОГРН (или лист записи ЕГРЮЛ)
                        </a-button>
                        <a-button slot="actions" type="link">
                            <svg width="15" height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 17C3 16.4477 3.44772 16 4 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H4C3.44772 18 3 17.5523 3 17ZM6.29289 9.29289C6.68342 8.90237 7.31658 8.90237 7.70711 9.29289L9 10.5858L9 3C9 2.44772 9.44771 2 10 2C10.5523 2 11 2.44771 11 3L11 10.5858L12.2929 9.29289C12.6834 8.90237 13.3166 8.90237 13.7071 9.29289C14.0976 9.68342 14.0976 10.3166 13.7071 10.7071L10.7071 13.7071C10.5196 13.8946 10.2652 14 10 14C9.73478 14 9.48043 13.8946 9.29289 13.7071L6.29289 10.7071C5.90237 10.3166 5.90237 9.68342 6.29289 9.29289Z" fill="#111827"/>
                            </svg>
                            Свидетельство ИНН
                        </a-button>

                    </div>
                    <div class="col-action">
                        <a-button type="link" size="small" @click="showDelConfirm">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-danger" fill-rule="evenodd" clip-rule="evenodd" d="M9 2C8.62123 2 8.27497 2.214 8.10557 2.55279L7.38197 4H4C3.44772 4 3 4.44772 3 5C3 5.55228 3.44772 6 4 6L4 16C4 17.1046 4.89543 18 6 18H14C15.1046 18 16 17.1046 16 16V6C16.5523 6 17 5.55228 17 5C17 4.44772 16.5523 4 16 4H12.618L11.8944 2.55279C11.725 2.214 11.3788 2 11 2H9ZM7 8C7 7.44772 7.44772 7 8 7C8.55228 7 9 7.44772 9 8V14C9 14.5523 8.55228 15 8 15C7.44772 15 7 14.5523 7 14V8ZM12 7C11.4477 7 11 7.44772 11 8V14C11 14.5523 11.4477 15 12 15C12.5523 15 13 14.5523 13 14V8C13 7.44772 12.5523 7 12 7Z" fill="#111827"/>
                            </svg>
                            <span class="text-danger">ОТКАЗ</span>
                        </a-button>
                        <a-button type="link" size="small" @click="showAddConfirm">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-success" fill-rule="evenodd" clip-rule="evenodd" d="M10 3C10.5523 3 11 3.44772 11 4V9H16C16.5523 9 17 9.44772 17 10C17 10.5523 16.5523 11 16 11H11V16C11 16.5523 10.5523 17 10 17C9.44772 17 9 16.5523 9 16V11H4C3.44772 11 3 10.5523 3 10C3 9.44771 3.44772 9 4 9L9 9V4C9 3.44772 9.44772 3 10 3Z"/>
                            </svg>
                            <span class="text-add">ОДОБРИТЬ</span>
                        </a-button>
                    </div>


                </a-card>
            </a-col>
		</a-row>
	</a-card>
	<!-- / Billing Information Card -->

</template>

<script>

	export default ({
		data() {
			return {
			}
		},
        methods: {
            showDelConfirm() {
                this.$confirm({
                    title: 'ПРЕДУПРЕЖДЕНИЕ',
                    width: 500,
                    content: h => <div class="mt-15">Вы действительно хотите <b class="text-red"> отказать </b> данную заявку?</div>,
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
            showAddConfirm() {
                this.$confirm({
                    title: 'ПРЕДУПРЕЖДЕНИЕ',
                    width: 500,
                    content: h => <div class="mt-15">Вы действительно хотите <b class="text-add"> одобрить </b> данную заявку?</div>,
                    okText: 'Да',
                    cancelText: 'Нет',
                    onOk() {
                        console.log('OK');
                    },
                    onCancel() {
                        console.log('Cancel');
                    },
                });
            }
        }
	})

</script>
