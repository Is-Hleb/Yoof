<template>
    <a-layout-header style="background: #fff; padding: 0" >

        <a-row>
            <a-col :xs="{ span: 5, offset: 1 }" :lg="{ span: 6, offset: 2 }">
                <span class="text-city"><img src="./img/tocha.png" class="icon-city">Москва</span>
            </a-col>
            <a-col :xs="{ span: 11, offset: 1 }" :lg="{ span: 4, offset: 2 }">
                <a href=""><img src="./img/logo1.png" class="logo"></a>
            </a-col>
            <a-col :xs="{ span: 5, offset: 1 }" :lg="{ span: 6, offset: 2 }">
                <a-button type="primary" ghost class="authBtn" @click="showModal" style="font-family: Roboto; font-weight: 800; color: black; border: black 1px solid;">Вход | Регистрация</a-button>
                <a-modal v-model="visible" title="Вход | Регистрация" width="700px">
                    <a-form
                        id="components-form-demo-normal-login"
                        :form="form"
                        class="login-form"
                        @submit="handleSubmit"
                    >

                        <a-form-item>
                            <div class="image-logo-center">
                                <img src="./img/logo1.png" class="slider-icon3" style="display: block">
                            </div>
                            <div class="block-button-auth">`
                                <button class="button-auth" @click="() => login.action = false" v-bind:class="{ 'button-active': !login.action }"><span class="auth-button-text">Регистрация</span></button>
                                <button class="button-auth" @click="() => login.action = true" v-bind:class="{ 'button-active': login.action }"><span class="auth-button-text">Вход</span></button>
                            </div>
                            <div>
                                <h1 v-if="login.action" class="text-auth-registration">АВТОРИЗОВАТЬСЯ КАК</h1>
                                <h1 v-if="!login.action" class="text-auth-registration">ЗАРЕГИСТРИРОВАТЬСЯ КАК</h1>
                                <div class="block-checkbox">
                                    <div class="flex"><input class="checkbox-button" type="radio" name="5" id="answer1" v-model="login.isUser" v-bind:value="true" checked="checked"><h3 class="p1">Покупатель</h3></div>
                                    <div class="flex"><input class="checkbox-button" type="radio" name="5" id="answer2" v-model="login.isUser" v-bind:value="false"><h3 class="p1">Продавец (ЮЛ)</h3></div>
                                </div>
                            </div>
                        </a-form-item>

                        <a-form-item v-if="(login.action && login.isUser) || (login.action && !login.isUser)">
                            <a-form-item label="E-mail">
                                <a-input
                                    v-decorator="[
                      'userName',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода'},
                                { email: true, message: 'Некорректный формат электронной почты' },
                                {  }
                                ] },
                    ]"                             type="mail"
                                    placeholder="E-mail"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Пароль">
                                <a-input-password
                                    v-decorator="[
                      'password',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },
                      { min: 8, max: 25, message: 'Пароль должен быть не меньше 8 и не больше 25 символов' }] }, ]"
                                    type="password"
                                    placeholder="Пароль"
                                >
                                    <a-icon slot="prefix" type="lock" style="color: rgba(0,0,0,.25)" />
                                </a-input-password>
                                <a-checkbox
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
                            <a-form-item align="center" >
                                <a-form-item>
                                    <a-button type="primary" size="large" html-type="submit" class="login-form-button" style="margin-right: 20px">
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
                                        <a href="#"><img src="./img/goo.png" class="icon-socilite"></a>
                                        <a href="#"><img src="./img/vk.png" class="icon-socilite2"></a>
                                        <a href="#"><img src="./img/fec.png" class="icon-socilite"></a>
                                    </div>
                                </a-form-item>
                            </a-form-item>

                        </a-form-item>

                        <a-form-item v-if="(!login.action && login.isUser)">
                            <a-form-item label="Имя">
                                <a-input
                                    v-decorator="[
                      'name',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода'},
                                ] },
                    ]"
                                    placeholder="Имя"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Фамилия">
                                <a-input
                                    v-decorator="[
                      'surname',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Фамилия"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Отчество">
                                <a-input
                                    v-decorator="[
                      'patronymic',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Отчество"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Телефон">
                                <a-input
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
                                    <a-icon slot="prefix" type="phone" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Email">
                                <a-input
                                    v-decorator="[
                      'email',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },
                                 { email: true, message: 'Некорректный формат электронной почты' }
                                 ]}]"
                                    placeholder="Email"
                                >
                                    <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Пароль">
                                <a-input-password
                                    v-decorator="[
                      'password',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    type="password"
                                    placeholder="Пароль"
                                >
                                    <a-icon slot="prefix" type="lock" style="color: rgba(0,0,0,.25)" />
                                </a-input-password>
                                <a-checkbox w
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

                            <a-form-item align="center" >
                                <a-form-item>
                                    <a-button type="primary" size="large" html-type="submit" class="login-form-button" style="margin-right: 20px">
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
                                        <a href="#"><img src="./img/goo.png" class="icon-socilite"></a>
                                        <a href="#"><img src="./img/vk.png" class="icon-socilite2"></a>
                                        <a href="#"><img src="./img/fec.png" class="icon-socilite"></a>
                                    </div>
                                </a-form-item>
                            </a-form-item>
                        </a-form-item>


                        <a-form-item v-if="(!login.action && !login.isUser)">
                            <a-form-item label="Название организации или ИП">
                                <a-input
                                    v-decorator="[
                      'organization',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода'},
                                ] },
                    ]"
                                    placeholder="Название организации или ИП"
                                >
                                    <a-icon slot="prefix" type="environment" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Юридический адрес">
                                <a-input
                                    v-decorator="[
                      'legal_address',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Юридический адрес"
                                >
                                    <a-icon slot="prefix" type="user" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Банк">
                                <a-input
                                    v-decorator="[
                      'Банк',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    placeholder="Банк"
                                >
                                    <a-icon slot="prefix" type="bank" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>

                            <a-form-item label="БИК банка">
                                <a-input
                                    v-decorator="[
                      'bic_bank',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    type="number"
                                    placeholder="БИК банка"
                                >
                                    <a-icon slot="prefix" type="bank" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Расчетный счет">
                                <a-input
                                    v-decorator="[
                      'checking_account',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    type="number"
                                    placeholder="Расчетный счет"
                                >
                                    <a-icon slot="prefix" type="dollar" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>
                            <a-form-item label="ИНН">
                                <a-input
                                    v-decorator="[
                      'inn',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' }, ]}]"
                                    type="number"
                                    placeholder="ИНН"
                                >
                                    <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>
                            <a-form-item label="КПП">
                                <a-input
                                    v-decorator="[
                      'kpp',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },

                       ]}]"
                                    type="number"
                                    placeholder="КПП"
                                >
                                    <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>

                            <a-form-item label="Email">
                                <a-input
                                    v-decorator="[
                      'mail',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },
                                { email: true, message: 'Некорректный формат электронной почты' }

                       ]}]"
                                    placeholder="Email"
                                >
                                    <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)" />
                                </a-input>
                            </a-form-item>
                            <a-form-item label="Пароль">
                                <a-input-password
                                    v-decorator="[
                      'Пароль',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода' },
                                { min: 8, max: 25, message: 'Пароль должен быть не меньше 8 и не больше 25 символов' }

                       ]}]"
                                    type="password"
                                    placeholder="Пароль"
                                >
                                    <a-icon slot="prefix" type="lock" style="color: rgba(0,0,0,.25)" />
                                </a-input-password>
                                <a-checkbox w
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

                            <a-form-item align="center" >
                                <a-form-item>
                                    <a-button type="primary" size="large" html-type="submit" class="login-form-button" style="margin-right: 20px">
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
                                        <a href="#"><img src="./img/goo.png" class="icon-socilite"></a>
                                        <a href="#"><img src="./img/vk.png" class="icon-socilite2"></a>
                                        <a href="#"><img src="./img/fec.png" class="icon-socilite"></a>
                                    </div>
                                </a-form-item>
                            </a-form-item>
                        </a-form-item>
                    </a-form>
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
                            <h1 style="font-family: Roboto; font-size: 20px; color: black; text-align: center; font-weight: 600">Введите адрес электронной почты</h1>
                            <a-input
                                v-decorator="[
                      'mail_recovery',
                      { rules: [{ required: true, message: 'Данное поле обязательно для ввода'},
                                ] },
                    ]"
                                placeholder="E-mail"
                            >
                                <a-icon slot="prefix" type="mail" style="color: rgba(0,0,0,.25)" />
                            </a-input>
                        </a-form-item>
                        <a-button @click="handleExit" type="primary" style="display: block; font-family: Roboto; margin-top: 20px; margin-right: auto; margin-left: auto" >ВОССТАНОВИТЬ</a-button>

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
        this.form = this.$form.createForm(this, { name: 'normal_login' });
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
        };
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

.auth-button-text{
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
    border: 3px solid #EBF005;
    border-radius: 10px;
    margin-top: 5%;
    width: 200px;
    height: 60px;
    z-index: 1;
    background-color: white;
    padding-left: 8px;
    margin-bottom: 60px;
}

.text-auth-registration {
    text-align: center;
    height: 60px;
    margin: 0;
    font-family: Roboto;
    font-style: normal;
    font-weight: 900;
    font-size: 22px;
    line-height: 26px;
    color: #000000;
}
.button-active {
    background: yellow;
}

.login-form-button {
    font-family: Roboto;
    margin-top: 15px;
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
    transform:scale(1.5);
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
