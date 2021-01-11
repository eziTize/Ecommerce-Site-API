<template>
    <span>
        <div class="innder-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="new-users ">
                            <div class="content-tr">
                                <h2>Clientes Registrados</h2>
                                <p>Si tiene una cuenta con nosotros, inicie sesión.</p>
                                <div class="buttons-set">
                                    <router-link to="/login" class="button-55">Iniciar sesión en cuenta</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="new-users ">
                            <div class="content-tr">
                                <h2>Nuevos clientes</h2>
                                <p>Al crear una cuenta en nuestra tienda, podrá realizar el proceso de pago más rápido, almacenar múltiples direcciones de envío, ver y rastrear sus pedidos en su cuenta y más.</p>
                                <form autocomplete="off">
                                    <ul class="form-list-two">
                                        <li>
                                            <label for="name" class="required"><em>*</em>Nombre</label>
                                            <div class="input-box">
                                                <input type="text" v-model="name" id="name" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="email" class="required"><em>*</em>Dirección de correo electrónico</label>
                                            <div class="input-box">
                                                <input type="email" v-model="email" id="email" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="password" class="required"><em>*</em>Contraseña</label>
                                            <div class="input-box">
                                                <input type="password" v-model="password" id="password" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="conf_password" class="required"><em>*</em>Confirmar contraseña</label>
                                            <div class="input-box">
                                                <input type="password" v-model="conf_password" id="conf_password" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="mobile" class="required"><em>*</em>Número de teléfono</label>
                                            <div class="input-box">
                                                <input type="text" v-model="mobile" id="mobile" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="gender" class="required"><em>*</em>Género</label>
                                            <div class="radio radio2 input-box">
                                                <label for="gender_male">
                                                    <input type="radio" v-model="gender" id="gender_male" class="input-text" value="male">
                                                    <p class="nrml_rdo">Masculino</p>
                                                </label>
                                                <label for="gender_female">
                                                    <input type="radio" v-model="gender" id="gender_female" class="input-text" value="female">
                                                    <p class="nrml_rdo">Feminine</p>
                                                </label>
                                                <label for="gender_other">
                                                    <input type="radio" v-model="gender" id="gender_other" class="input-text" value="other">
                                                    <p class="nrml_rdo">Otro</p>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <label for="address"><em>*</em>Su dirección</label>
                                            <div class="input-box">
                                                <input type="text" v-model="address" id="address" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="dob"><em>*</em>Fecha de nacimiento</label>
                                            <div class="input-box">
                                                <input type="date" v-model="dob" id="dob" class="input-text">
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="buttons-set">
                                        <button type="submit" class="button-55" v-on:click="handleSubmit">Registrarse</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Register - %s',
            meta: [
                { name: 'title', content: 'Register - Imageno' },
                { name: 'description', content: 'Imageno' }
            ]
        },
        props : ['nextUrl'],
        data() {
            return {
                name: "",
                email: "",
                password: "",
                conf_password: "",
                mobile: "",
                gender: "male",
                address: "",
                dob: "",
            }
        },
        methods: {
            handleSubmit(e) {
                e.preventDefault()
                let name = this.name
                let email = this.email
                let password = this.password
                let conf_password = this.conf_password
                let mobile = this.mobile
                let gender = this.gender
                let address = this.address
                let dob = this.dob
                axios.post(this.apiRootUrl+'/register', {
                    name, email, password, conf_password, mobile, gender, address, dob,
                }).then(response => {
                    let data = response.data
                    if(!data.status){
                        return this.$swal('Error', data.message, 'error')
                    }else{
                        this.name = ""
                        this.email = ""
                        this.password = ""
                        this.conf_password = ""
                        this.mobile = ""
                        this.gender = "male"
                        this.address = ""
                        this.dob = ""

                        return this.$swal('Success', data.message, 'success')
                    }
                })
            }
        }
    }
</script>

<style scoped>
    
</style>