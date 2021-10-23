<template>
    <a-layout-header style="background: #fff; padding: 0">

        <a-row>
            <a-col :xs="{ span: 11, offset: 1 }" :lg="{ span: 9, offset: 2 }">
                <a href=""><img src="../IndexPage/img/logo1.png" class="logo"></a>
            </a-col>
            <a-col :xs="{ span: 5, offset: 1 }" :lg="{ span: 9, offset: 2 }">
                <a-button type="primary" ghost class="authBtn" @click="showModal"
                          style="font-family: Roboto; font-weight: 800; color: black; border: black 1px solid; border: none; box-shadow: none; font-size: 15px">Вход | Регистрация
                </a-button>
                <a-modal v-model="visible" title="Вход | Регистрация" width="600px">
                    <a-form-model
                        id="components-form-demo-normal-login"
ut                        :form="form"
                        :model="formData"
                        class="login-form"
                        @submit="handleSubmit"
                    >
                        <a-form-model-item>
                            <div class="image-logo-center">
                                <img src="../IndexPage/img/logo1.png" class="slider-icon3" style="display: block">
                            </div>
                            <div class="block-button-auth">`
                                <a-button type="primary" class="button-auth" @click="() => login.action = false"
                                        v-bind:class="{ 'button-active': !login.action }"><span class="text-auth-registration2"
                                   >Регистрация</span></a-button>
                                <a-button type="primary" class="button-auth" @click="() => login.action = true"
                                        v-bind:class="{ 'button-active': login.action }"><span class="text-auth-registration2">Вход</span>
                                </a-button>
                            </div>
                            <div>
                                <h1 v-if="login.action" class="text-auth-registration">АВТОРИЗОВАТЬСЯ КАК</h1>
                                <h1 v-if="!login.action" class="text-auth-registration">ЗАРЕГИСТРИРОВАТЬСЯ КАК</h1>
                                <div class="block-checkbox">
                                    <div class="flex"><input class="checkbox-button" type="radio" name="5" id="answer1"
                                                             v-model="login.isUser" v-bind:value="true"
                                                             checked="checked">
                                        <h3 class="p1">Покупатель</h3></div>
                                    <div class="flex"><input class="checkbox-button" type="radio" name="5" id="answer2"
                                                             v-model="login.isUser" v-bind:value="false">
                                        <h3 class="p1">Продавец (ЮЛ)</h3></div>
                                </div>
                            </div>
                        </a-form-model-item>

                        <a-form-model-item v-if="login.action">
                            <a-form-model-item label="E-mail">
                                <a-input
                                    v-model="formData.userData.email"
                                    v-decorator="[
                                  'userName',
                                  { rules: [
                                      { required: true, message: 'Данное поле обязательно для ввода'},
                                      { email: true, message: 'Некорректный формат электронной почты' },
                                    ],
                                     initialValue: formData.userData.email},
                    ]" type="mail"
                                    placeholder="E-mail"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-model-item>
                            <a-form-item label="Пароль">
                                <a-input-password
                                    v-model="formData.userData.password"
                                    v-decorator="[
                      'password',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },
                      { min: 8, max: 25, message: 'Пароль должен быть не меньше 8 и не больше 25 символов' }] }, ]"
                                    type="password"
                                    placeholder="Пароль"
                                >
                                    <a-icon slot="prefix" type="lock" style="color: rgba(0,0,0,.25)"/>
                                </a-input-password>
                                <a-checkbox
                                    v-model="formData.userData.rememberMe"
                                    v-decorator="[
                          'remember',
                          {
                            valuePropName: 'checked',
                            initialValue: false,
                          },
                        ]"
                                >
                                    Запомнить меня
                                </a-checkbox>
                            </a-form-item>
                            <a-form-item align="center">
                                <a-form-item>
                                    <a-button @click="loginIn" type="primary" size="large" html-type="submit"
                                              class="login-form-button"
                                              style="margin-right: 20px">
                                        ВОЙТИ В АККАУНТ
                                    </a-button>
                                </a-form-item>
                                <a-form-item>
                                    <a @click="() => this.passwordRecovry = true" class="login-form-forgot">
                                        Забыли пароль?
                                    </a>
                                </a-form-item>
                                <a-form-item v-if="login.action & login.isUser">
                                    <h1 class="text-socilite">Или авторизуйтесь через аккаунт в социальной сети</h1>
                                    <div>
                                        <a href="#"><img src="../IndexPage/img/goo.png" class="icon-socilite"></a>
                                        <a href="#"><img src="../IndexPage/img/vk.png" class="icon-socilite2"></a>
                                        <a href="#"><img src="../IndexPage/img/fec.png" class="icon-socilite"></a>
                                    </div>
                                </a-form-item>
                            </a-form-item>

                        </a-form-model-item>

                        <a-form-item v-if="(!login.action && login.isUser)">
                            <a-form-item label="Имя">
                                <a-input
                                    v-model="formData.roleData.user.name"
                                    v-decorator="[
                      'name',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода'},
                                ] },
                    ]"
                                    placeholder="Имя"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Фамилия">
                                <a-input
                                    v-model="formData.roleData.user.surname"
                                    v-decorator="[
                      'surname',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Фамилия"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Отчество">
                                <a-input
                                    v-model="formData.roleData.user.patronymic"
                                    v-decorator="[
                      'patronymic',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Отчество"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Телефон">
                                <a-input
                                    v-model="formData.roleData.user.phone"
                                    v-decorator="[
                      'telephone',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Телефон"
                                >
                                    <a-select
                                        slot="addonBefore"
                                        v-decorator="['prefix', { initialValue: '+7' }]"
                                        style="width: 70px"
                                    >
                                        <a-select-option value="7">
                                            +7
                                        </a-select-option>
                                    </a-select>
                                    <a-icon slot="prefix" type="phone" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Email">
                                <a-input
                                    v-model="formData.userData.email"
                                    v-decorator="[
                      'email',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },
                                 { email: true, message: 'Некорректный формат электронной почты' }
                                 ]}]"
                                    placeholder="Email"
                                >
                                    <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Пароль">
                                <a-input-password
                                    v-model="formData.userData.password"
                                    v-decorator="[
                      'password',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    type="password"
                                    placeholder="Пароль"
                                >
                                    <a-icon slot="prefix" type="lock" style="color: rgba(0,0,0,.25)"/>
                                </a-input-password>
                                <a-checkbox v-model="formData.userData.rememberMe"
                                            v-decorator="[
                          'remember',
                          {
                            valuePropName: 'checked',
                            initialValue: false,
                          },
                        ]"
                                >
                                    Запомнить меня
                                </a-checkbox>
                            </a-form-item>

                            <a-form-item align="center">
                                <a-form-item>
                                    <a-button @click="signUp" type="primary" size="large" html-type="submit"
                                              class="login-form-button"
                                              style="margin-right: 20px">
                                        ЗАРЕГИСТРИРОВАТЬСЯ
                                    </a-button>
                                </a-form-item>
                                <a-form-item v-bind:value="true">
                                    <a @click="() => this.passwordRecovry = true" class="login-form-forgot">
                                        Забыли пароль?
                                    </a>

                                </a-form-item>
                                <a-form-item v-if="!login.action && login.isUser">
                                    <h1 class="text-socilite">Или зарегистрируйтесь через аккаунт в социальной сети</h1>
                                    <div>
                                        <a href="#"><img src="../IndexPage/img/goo.png" class="icon-socilite"></a>
                                        <a href="#"><img src="../IndexPage/img/vk.png" class="icon-socilite2"></a>
                                        <a href="#"><img src="../IndexPage/img/fec.png" class="icon-socilite"></a>
                                    </div>
                                </a-form-item>
                            </a-form-item>
                        </a-form-item>


                        <a-form-item v-if="(!login.action && !login.isUser)">
                            <a-form-item label="Название организации или ИП">
                                <a-input
                                    v-model="formData.roleData.company.company_name"
                                    v-decorator="[
                      'organization',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода'},
                                ] },
                    ]"
                                    placeholder="Название организации или ИП"
                                >
                                    <a-icon slot="prefix" type="environment" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Юридический адрес">
                                <a-input
                                    v-model="formData.roleData.company.legal_address"
                                    v-decorator="[
                      'legal_address',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Юридический адрес"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Банк">
                                <a-input
                                    v-model="formData.roleData.company.bank"
                                    v-decorator="[
                      'Банк',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Банк"
                                >
                                    <a-icon slot="prefix" type="bank" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>

                            <a-form-item label="БИК банка">
                                <a-input
                                    v-model="formData.roleData.company.bank_bik"
                                    v-decorator="[
                      'bic_bank',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    type="number"
                                    placeholder="БИК банка"
                                >
                                    <a-icon slot="prefix" type="bank" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Расчетный счет">
                                <a-input
                                    v-model="formData.roleData.company.checking_account"
                                    v-decorator="[
                      'checking_account',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    type="number"
                                    placeholder="Расчетный счет"
                                >
                                    <a-icon slot="prefix" type="dollar" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>
                            <a-form-item label="ИНН">
                                <a-input
                                    v-model="formData.roleData.company.inn"
                                    v-decorator="[
                      'inn',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    type="number"
                                    placeholder="ИНН"
                                >
                                    <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>
                            <a-form-item label="КПП">
                                <a-input
                                    v-model="formData.roleData.company.kpp"
                                    v-decorator="[
                      'kpp',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },

                       ]}]"
                                    type="number"
                                    placeholder="КПП"
                                >
                                    <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Email">
                                <a-input
                                    v-model="formData.userData.email"
                                    v-decorator="[
                      'mail',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },
                                { email: true, message: 'Некорректный формат электронной почты' }

                       ]}]"
                                    placeholder="Email"
                                >
                                    <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)"/>
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Пароль">
                                <a-input-password
                                    v-model="formData.userData.password"
                                    v-decorator="[
                      'Пароль',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },
                                { min: 8, max: 25, message: 'Пароль должен быть не меньше 8 и не больше 25 символов' }

                       ]}]"
                                    type="password"
                                    placeholder="Пароль"
                                >
                                    <a-icon slot="prefix" type="lock" style="color: rgba(0,0,0,.25)"/>
                                </a-input-password>
                                <a-checkbox v-model="formData.userData.rememberMe"
                                            v-decorator="[
                          'remember',
                          {
                            valuePropName: 'checked',
                            initialValue: false,
                          },
                        ]"
                                >
                                    Запомнить меня
                                </a-checkbox>
                            </a-form-item>

                            <a-form-item align="center">
                                <a-form-item>
                                    <a-button @click="signUp" type="primary" size="large" html-type="submit"
                                              class="login-form-button"
                                              style="margin-right: 20px">
                                        ЗАРЕГИСТРИРОВАТЬСЯ
                                    </a-button>
                                </a-form-item>
                                <a-form-item v-bind:value="true">
                                    <a @click="() => this.passwordRecovry = true" class="login-form-forgot">
                                        Забыли пароль?
                                    </a>

                                </a-form-item>
                                <a-form-item v-if="!login.action && login.isUser">
                                    <h1 class="text-socilite">Или зарегистрируйтесь через аккаунт в социальной сети</h1>
                                    <div>
                                        <a href="#"><img src="../IndexPage/img/goo.png" class="icon-socilite"></a>
                                        <a href="#"><img src="../IndexPage/img/vk.png" class="icon-socilite2"></a>
                                        <a href="#"><img src="../IndexPage/img/fec.png" class="icon-socilite"></a>
                                    </div>
                                </a-form-item>
                            </a-form-item>
                        </a-form-item>
                    </a-form-model>
                </a-modal>
                <a-modal
                    title="Восстановление пароля"
                    :visible="passwordRecovry"
                    @cancel="handleExit"
                >
                    <a-form
                        class="login-form"
                        @submit="handleSubmit"
                    >
                        <a-form-item>
                            <h1 style="font-family: Roboto; font-size: 20px; color: black; text-align: center; font-weight: 600">
                                Введите адрес электронной почты</h1>
                            <a-input
                                v-decorator="[
                      'mail_recovery',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода'},
                                ] },
                    ]"
                                placeholder="E-mail"
                            >
                                <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)"/>
                            </a-input>
                        </a-form-item>
                        <a-button @click="handleExit" type="primary"
                                  style="display: block; font-family: Roboto; margin-top: 20px; margin-right: auto; margin-left: auto">
                            ВОССТАНОВИТЬ
                        </a-button>

                    </a-form>
                </a-modal>
            </a-col>
        </a-row>
    </a-layout-header>
</template>

<script>
import Vue from 'vue'
import Antd from 'ant-design-vue'
import 'ant-design-vue/dist/antd.css'


Vue.use(Antd);
export default {
    beforeCreate() {
        this.form = this.$form.createForm(this, {name: 'normal_login'});
    },
    name: 'Header',
    components: {},
    data() {
        return {
            collapsed: false,
            visible: false,
            visibleModalFilter: false,
            passwordRecovry: false,
            login: {
                action: true,
                isUser: false,
            },
            formData: {
                userData: {
                    email: '',
                    password: '',
                    rememberMe: '',
                },
                roleData: {
                    user: {
                        name: '',
                        surname: '',
                        patronymic: '',
                        phone: '',
                    },
                    company: {
                        company_name: '',
                        legal_address: '',
                        bank: '',
                        bank_bik: '',
                        checking_account: '',
                        inn: '',
                        kpp: '',
                    }
                },
            }
        }
    },
    computed: {
        errors() {
            let errors = this.$store.getters.errors;
            console.log(errors)
            return errors;
        }
    },
    methods: {
        showModal() {
            this.visible = true;
        },
        handleExit() {
            this.passwordRecovry = false;
            this.visibleModalFilter = false;
        },
        handleSubmit(e) {
            e.preventDefault();
            this.form.validateFields(() => {
            });
        },
        loginIn() {

        },
        signUp() {
            /*let data;
            if (this.login.isUser) {
                data = {
                    ...this.formData.userData,
                    ...this.formData.roleData.user,
                    role: 'user',
                }
            } else {
                data = {
                    ...this.formData.roleData.company,
                    ...this.formData.userData,
                    role: 'company'
                }
            }*/
            //console.log(data)
            //this.$store.dispatch('signUp', data)
        }
    }
}

</script>

<style>
#components-layout-demo-custom-trigger .trigger {
    font-size: 18px;
    line-height: 64px;
    padding: 0 24px;
    cursor: pointer;
    transition: color 0.3s;
}

#components-layout-demo-custom-trigger .trigger:hover {
    color: #1890ff;
}

#components-layout-demo-custom-trigger .logo {
    height: 32px;
    background: rgba(255, 255, 255, 0.2);
    margin: 16px;
}

.ant-form-item {
    margin-bottom: 1px;
}

.ant-carousel .slick-slide {
    text-align: center;
    height: 350px;
    line-height: 160px;
    background: white;
    overflow: hidden;
}

.ant-carousel .custom-slick-arrow {
    width: 25px;
    height: 25px;
    font-size: 25px;
    color: black;
    background-color: rgba(31, 45, 61, 0.11);
    opacity: 0.3;
}

.ant-carousel .custom-slick-arrow:before {
    display: none;
}

.ant-carousel .custom-slick-arrow:hover {
    opacity: 0.5;
}

.ant-input-search-button {
    background-color: yellowgreen;
    border: yellowgreen 2px solid;
}
.ant-btn-primary:hover {
    background-color: green;
    border: green 2px solid;
}

.ant-carousel .slick-slide h3 {
    color: #fff;
}

.ant-carousel >>> .slick-slide h3 {
    color: #fff;
}

.slider-icon3 {
    width: 150px;
    margin-right: auto;
    margin-left: auto;
}


#components-layout-demo-side .logo {
    height: 40px;
    width: 150px;
}

.icon-city {
    width: 15px;
    height: 20px;
    margin-right: 5px;
    margin-bottom: 5px;
    cursor: pointer;
}

.auth-button-text {
    font-family: Roboto;
    font-style: normal;
    font-weight: 900;
    font-size: 18px;
    line-height: 21px;

    align-items: center;
    letter-spacing: 0.1em;

    color: #000000;

}


.text-city {
    color: black;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
}


.button-auth {
    cursor: pointer;
    margin-left: 2.5%;
    margin-right: 2.5%;
    border-radius: 10px;
    margin-top: 5%;
    width: 200px;
    height: 60px;
    background-color: yellowgreen;
}

.text-auth-registration {
    text-align: center;
    height: 60px;
    margin-top: 20px;

    font-family: Roboto;
    font-style: normal;
    font-weight: 900;
    font-size: 22px;
    line-height: 26px;
    color: #000000;
}

.text-auth-registration2 {
    font-family: Roboto;
    font-size: 20px;
    font-weight: 600;
}
.button-active {
    background-color: green;
}

.ant-btn-primary:hover, .ant-btn-primary:focus {
    background-color: yellowgreen;
}
.ant-btn-primary {
    border: black 1px solid;
}
.login-form-button {
    font-family: Roboto;
    margin-top: 15px;
    background-color: yellowgreen;
    height: 43px;
    margin-left: 5px;
}

.block-button-auth {
    position: relative;
    display: flex;
    justify-content: center;
}

.block-checkbox {
    z-index: 1000;
    position: relative;
    display: flex;
    justify-content: center;
}

.checkbox-button {
    margin-left: 50px;
    transform: scale(1.5);
}

.text-socilite {
    font-family: Roboto;
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 23px;
    text-align: center;
    color: #000000;
}

.flex {
    position: relative;
    display: flex;
}

.icon-socilite {
    width: 50px;
    height: 50px;
}

.icon-socilite2 {
    width: 50px;
    height: 50px;
    margin: 10px;
}

@media screen and (max-width: 550px) {
    #components-layout-demo-side .logo {
        height: 30px;
        width: 100px;
        margin-left: -30px;
    }

    .authBtn {
        width: 120px;
        font-size: 10px;
        margin-left: -50px;
    }

    .text-city {
        display: none;
    }

}

</style>
