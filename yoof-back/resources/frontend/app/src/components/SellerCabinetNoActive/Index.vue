<template>
    <div>
        <div class="main_bloc">
            <notifications group="foo" class="text-notification" max="2 "/>
            <HeaderPanelButton
                :accountIsActive="accountIsActive"
            />
            <div class="body">

                <div class="flexcenter">
                    <button class="button-1" :class="{ btnActive: navigator === 'dataCompany' }" @click="onDataCompany">
                        <span class="bh1 h1a">Данные компании</span></button>

                    <button class="button-2" :class="{ btnActive: navigator === 'newApplication' }" @click="onNewApplication">
                        <span class="bh2 h1a">Новые заявки</span>
                        <div class="boxcifra8" style="margin-left: 7px" v-if="counterNewOrders >= 1">{{
                                counterNewOrders
                            }}
                        </div>
                    </button>

                    <button class="button-3" @click="checkActivatedAccount"
                            :class="{ btnActive: navigator === 'activeAuctions' }"><span class="bh3 h1a">Активные аукционы</span></button>
                    <button class="button-4" @click="checkedActivatedBtnHistory"
                            :class="{ btnActive: navigator === 'history' }"><span class="bh4 h1a">История аукционов</span></button>
                </div>

                <div class="CompanyData" v-if="navigator === 'dataCompany'">
                    <div class="flex3001">
                        <div style="margin-top: 40px">
                            <div class="flex1"><h1 class="h1_1">Название организации или ИП</h1><input type="text"
                                                                                                       class="text1">
                            </div>
                            <div class="flex1"><h1 class="h1_1">Юридический адрес</h1>
                                <a-input type="text" class="text1"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">ИНН</h1>
                                <a-input type="number" class="text1"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">Банк</h1>
                                <a-input type="text" class="text1"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">Расчетный счет</h1>
                                <a-input type="number" class="text1"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">КПП</h1>
                                <a-input type="number" class="text1"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">БИК банка</h1>
                                <a-input type="number" class="text1"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">Адрес электронной почты</h1>
                                <a-input type="text" class="text1"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">Сменить пароль</h1>
                                <a-input-password class="input-pass"/>
                            </div>
                            <div class="flex1"><h1 class="h1_1">Повторить пароль</h1>
                                <a-input-password class="input-pass"/>
                            </div>
                            <div class="lrok">
                                <a-button class="button-6 btnActive" style="height: 40px"><span class="bh1 h1a"
                                                                                                style="font-size: 15px">Сохранить изменения</span>
                                </a-button>
                            </div>
                        </div>
                        <ModalCity :visible="visible"/>
                        <div class="adres">
                            <div>
                                <h1 class="h1a-0 mtt">Продаваемые вами категории</h1>
                                <div>
                                    <div class="flex"><input type="checkbox" class="checkboxi">
                                        <h1 class="h1_1 m5t">Смартфоны</h1></div>
                                    <div class="flex"><input type="checkbox" class="checkboxi">
                                        <h1 class="h1_1 m5t">Холодильники</h1></div>
                                    <div class="flex"><input type="checkbox" class="checkboxi">
                                        <h1 class="h1_1 m5t">Телевизоры</h1></div>
                                    <div class="flex"><input type="checkbox" class="checkboxi">
                                        <h1 class="h1_1 m5t">Ноутбуки</h1></div>
                                    <h1 class="zeleni">Показать все ></h1>
                                </div>
                            </div>
                            <div>
                                <h1 class="h1a mtaw">Физическое расположение<br>магазина/склада (для самовывоза)</h1>
                                <div>
                                    <a-input type="text" class="text1 txt" placeholder="Физическое расположение"/>
                                    <h1 class="h1_1 mdm">Возможные города доставки</h1>
                                    <a-input type="text" class="text1 txt" placeholder="Возможные города доставки"/>
                                </div>
                            </div>
                            <h1 class="h1a" id="documents" style="margin-top: 22px">Документы компании</h1>
                            <div v-if="!accountIsActive">
                                <div class="flexalingce">
                                    <h1 class="ogr">Свидетельство ОГРН (или<br>лист записи ЕГРЮЛ)</h1>
                                    <div class="example-2">
                                        <div class="form-group">
                                            <a-upload
                                                action="/api/company/upload/document"
                                                :show-upload-list="false"
                                                @change="handleUploadChange"
                                                name="upload"
                                                :headers="requestHeaders"
                                                :data="{
                                                type: 'orgn'
                                            }"
                                                status="done"
                                                width="100"
                                            >
                                                <a-button>
                                                    <a-icon type="upload"/>
                                                    Прикрепить
                                                </a-button>

                                            </a-upload>
                                            <div v-if="files['orgn']" @click="downloadFile('orgn')" class="files-list-item">
                                                <span>{{ files['orgn'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flexalingce">
                                    <h1 class="ogr2">Свидетельство ИНН</h1>
                                    <div class="example-2">
                                        <div class="form-group">
                                            <a-upload
                                                action="/api/company/upload/document"
                                                :show-upload-list="false"
                                                @change="handleUploadChange"
                                                name="upload"
                                                :headers="requestHeaders"
                                                :data="{
                                                type: 'inn'
                                            }"
                                                status="done"
                                                width="100"
                                            >
                                                <a-button>
                                                    <a-icon type="upload"/>
                                                    Прикрепить
                                                </a-button>
                                            </a-upload>
                                            <div v-if="files['inn']" @click="downloadFile('inn')" class="files-list-item"
                                                 data-title="Скачать inn файл">
                                                <span>{{ files['inn'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a-button class="button-6 btnActive" style="height: 39px; margin-top: 25px;"><span
                                    class="cox">АКТИВИРОВАТЬ АККАУНТ</span></a-button>
                                <h1 class="rdftgh">*Активация аккаунта занимает от 1 до 24 часов</h1>
                            </div>
                            <div v-if="accountIsActive">
                                <div class="box100">
                                    <div class="flexaround5">
                                        <h1 class="sdf23">Свидетельство ОГРН (или<br>лист записи ЕГРЮЛ)</h1>
                                        <div class="flex">
                                            <img src="./img/gal.png" class="size25 marr5">
                                            <h1 class="h1aaldos mart-2">Готово</h1>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex10">
                                            <div class="flex" @click="visibleEditDocumentCompany = !visibleEditDocumentCompany">
                                                <img src="./img/izmene.png" class="size1 marr5">
                                                <h1 class="red">Редактировать</h1>
                                            </div>
                                            <div class="flexfasf" @click="showDeleteConfirm">
                                                <img src="./img/ydal.png" class="size12 marr5">
                                                <h1 class="red">Удалить</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box1001">
                                    <div class="flexaround5">
                                        <h1 class="sdf23 wid221">Свидетельство ИНН</h1>
                                        <div class="flex">
                                            <img src="./img/gal.png" class="size25 marr5">
                                            <h1 class="h1aaldos mart-2">Готово</h1>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex10">
                                            <div class="flex" @click="visibleEditDocumentCompany = !visibleEditDocumentCompany">
                                                <img src="./img/izmene.png" class="size1 marr5">
                                                <h1 class="red">Редактировать</h1>
                                            </div>
                                            <div class="flexfasf" @click="showDeleteConfirm">
                                                <img src="./img/ydal.png" class="size12 marr5">
                                                <h1 class="red">Удалить</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="applications" :class="{ displayTrue: navigator === 'newApplication' }">
                    <div class="hr_big" style="margin-right: auto; margin-left: auto">
                        <new-applications
                            :accountIsActive="accountIsActive"
                        >
                        </new-applications>
                    </div>
                </div>

                <div class="applications" :class="{ active: navigator === 'activeAuctions' }">
                    <div class="hr_big" style="margin-right: auto; margin-left: auto">
                        <active-auctions
                            :accountIsActive="accountIsActive"
                        >
                        </active-auctions>
                    </div>
                </div>

                <div class="applications" :class="{ active: navigator === 'history' }">
                    <div class="hr_big" style="margin-right: auto; margin-left: auto">
                        <history-auctions
                            :accountIsActive="accountIsActive"
                        >

                        </history-auctions>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="bodybetwenn">
                    <img src="./img/logo2.png" class="fsds3f">
                    <div class="asd24gd">
                        <h1 class="hh1">О сервисе</h1>
                        <div class="mr20"><a class="hh2">Как работает сервис?</a></div>
                        <div class="mr20"><a class="hh2">Правила использования</a></div>
                        <div class="mr20"><a class="hh2">Отзывы о нас</a></div>
                    </div>
                    <div class="asf04n">
                        <h1 class="hh1">Контакты</h1>
                        <div class="flexasf2"><img src="./img/ins.png" class="asd2b mr5"><a class="hh2" href="#">Instagram</a>
                        </div>
                        <div class="flexasf2"><img src="./img/fac.png" class="asd2b mr5"><a class="hh2" href="#">Facebook</a>
                        </div>
                        <div class="flexasf2"><img src="./img/tel.png" class="asd2b mr5"><a class="hh2" href="#">Telegram</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <edit-document-company
            :visibleEditDocumentCompany="visibleEditDocumentCompany"
            @handleOk="handleOk"
        >
        </edit-document-company>
    </div>
</template>

<script>

import Vue from 'vue'
import Antd from 'ant-design-vue'
import 'ant-design-vue/dist/antd.css'
import Notifications from 'vue-notification'
import NewApplications from "./Tables/NewApplications";
import ActiveAuctions from "./Tables/ActiveAuctions";
import HistoryAuctions from "./Tables/HistoryAuctions";

import ModalCity from "./Modal/ModalCity";
import HeaderPanelButton from "./Templates/HeaderPanelButton";
import EditDocumentCompany from "./Modal/EditDocumentCompany";


Vue.use(Antd);
Vue.use(Notifications);

export default {
    emits: ['showModalParticipate'],
    name: "Index",
    components: {
        EditDocumentCompany,
        HeaderPanelButton,
        HistoryAuctions,
        ActiveAuctions,
        NewApplications,
        ModalCity
    },
    computed: {
        requestHeaders() {
            return this.$store.getters.axiosHeaders
        },
        files() {
            return this.$store.getters.files
        }
    },
    data: () => ({
        visible: false,
        isActive: false,
        navigator: 'dataCompany',
        dontActive: false,
        counterNewOrders: 1,
        accountIsActive: true,
        visibleEditDocumentCompany: false,
        visibleParticipationModal: null
    }),
    methods: {
        error() {
            Vue.notify({
                group: 'foo',
                type: 'warn',
                speed: 500,
                width: 300,
                duration: 5000,
                title: 'Ошибка',
                text: '<span style="font-size: 13px">Ваш аккаунт <u>не активен</u>, поэтому доступ к данному разделу недоступен.<br><br>В разделе «Данные компании» активируйте аккаунт</span>'
            })
        },
        checkActivatedAccount() {
          if (this.accountIsActive) {
            this.navigator = 'activeAuctions'
          } else {
              this.error()
          }
        },
        checkedActivatedBtnHistory() {
          if (this.accountIsActive) {
              this.navigator = 'history'
          } else {
              this.error()
          }
        },
        onNewApplication() {
            this.navigator = 'newApplication'
            this.visibleEditDocumentCompany = false
        },
        onDataCompany() {
            this.navigator = 'dataCompany'
            this.visibleEditDocumentCompany = false
        },
        onModalCity() {
            this.visible = false;
            this.visible = true;

        },
        handleUploadChange(info) {
            let r = info.file.response
            if (info.file.status === 'uploading') {
                this.loading = true;
                return;
            }
            if (info.file.status === 'done') {
                // Get this url from response in real world.
                if (r.code === 'err') {
                    this.$notification.error({message: "Ошибка", description: r.data})
                } else {
                    this.$store.dispatch('loadFiles')
                    this.$notification.success({
                        message: "Успешно",
                        description: "Файл успешно загружен"
                    });
                }
            }
        },
        downloadFile(type) {
            this.axios.get( '/api/company/document/download/' + type, {
                headers: this.requestHeaders,
                responseType: 'arraybuffer'
            })
                .then(response => {
                    let blob = new Blob([response.data])
                    let link = document.createElement('a')
                    link.href = window.URL.createObjectURL(blob)
                    link.download = this.files[type]
                    link.click()
                })
        },
        showDeleteConfirm() {
            this.$confirm({
                title: 'Подтверждение',
                content: 'Вы действительно хотите удалить документ компании?',
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
        handleOk() {
            this.visibleEditDocumentCompany = false
        },


    },
    beforeMount() {
        this.$store.dispatch('loadFiles');
    }
}
</script>

<style lang="css" src="./assets/Styles.css">

</style>

<style lang="css">
.files-list-item {
    background: antiquewhite;
    width: 200px;
    margin-bottom: 13px;
    padding: 5px 0;
    display: inline-flex;
    justify-content: center;
    margin-left: 11px;
    cursor: pointer;
}

</style>
