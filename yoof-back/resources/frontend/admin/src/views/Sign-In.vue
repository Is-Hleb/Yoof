<!--
	This is the sign in page, it uses the dashboard layout in:
	"./layouts/Default.vue" .
 -->

<template>
    <div class="sign-in">

        <a-row type="flex" :gutter="[24,24]" justify="space-around" align="middle">

            <!-- Sign In Form Column -->
            <a-col :span="24" :md="12" :lg="{span: 12, offset: 0}" :xl="{span: 6, offset: 2}" class="col-form">
                <h1 class="mb-15">Вход</h1>

                <!-- Sign In Form -->
                <a-form
                    id="components-form-demo-normal-login"
                    :form="form"
                    class="login-form"
                    @submit="handleSubmit"
                    :hideRequiredMark="true"
                >
                    <a-form-item class="mb-10" label="Email" :colon="false">
                        <a-input
                            v-decorator="[
						'email',
						{ rules: [{ required: true, message: 'Это поле обязательно!' }] },
						]" placeholder="Email"/>
                    </a-form-item>
                    <a-form-item class="mb-5" label="Пароль" :colon="false">
                        <a-input
                            v-decorator="[
                                'password',
                                { rules: [{ required: true, message: 'Это поле обязательно!' }] },
                                ]"
                            type="password" placeholder="Пароль"/>
                    </a-form-item>
                    <a-form-item class="mb-10">
                        <a-switch v-model="rememberMe"/>
                        Запомнить меня
                    </a-form-item>
                    <a-form-item>
                        <a-button type="primary" block html-type="submit" class="login-form-button">
                            ВОЙТИ
                        </a-button>
                    </a-form-item>
                </a-form>
                <!-- / Sign In Form -->

            </a-col>
            <!-- / Sign In Form Column -->

            <!-- Sign In Image Column -->
            <a-col class="col-img">
                <img src="public/images/yoof2.png" alt="">
            </a-col>
            <!-- Sign In Image Column -->

        </a-row>

    </div>
</template>

<script>

export default ({
    data() {
        return {
            // Binded model property for "Sign In Form" switch button for "Remember Me" .
            rememberMe: true,

        }
    },
    beforeCreate() {
        // Creates the form and adds to it component's "form" property.
        this.form = this.$form.createForm(this, {name: 'normal_login'});
    },
    methods: {
        // Handles input validation after submission.
        handleSubmit(e) {
            e.preventDefault();
            this.form.validateFields((err, values) => {
                if (!err) {
                    this.$store.dispatch('loginUser', values);
                }
            });
        },


    },
})

</script>

<style lang="scss">
body {
    background-color: #ffffff;
}
</style>
