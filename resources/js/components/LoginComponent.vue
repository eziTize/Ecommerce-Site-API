<template>
    <span>
        <div class="innder-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="new-users ">
                            <div class="content-tr">
                                <h2>Nuevos clientes</h2>
                                <p>Al crear una cuenta en nuestra tienda, podrá realizar el proceso de pago más rápido, almacenar múltiples direcciones de envío, ver y rastrear sus pedidos en su cuenta y más.</p>
                                <div class="buttons-set">
                                    <router-link to="/register" class="button-55">Crea una cuenta</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="new-users ">
                            <div class="content-tr">
                                <h2>Clientes Registrados</h2>
                                <p>Si tiene una cuenta con nosotros, inicie sesión.</p>
                                <form autocomplete="off">
                                    <ul class="form-list-two">
                                        <li>
                                            <label for="email" class="required"><em>*</em>Nombre de usuario / Dirección de correo electrónico / Número de móvil</label>
                                            <div class="input-box">
                                                <input type="text" v-model="email" id="email" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="password" class="required"><em>*</em>Contraseña</label>
                                            <div class="input-box">
                                                <input type="password" v-model="password" id="password" class="input-text">
                                            </div>
                                        </li>
                                        <li>
                                            <router-link to="/forget-password" class="link-tip">¿Contraseña olvidada?</router-link>
                                        </li>
                                        <li class="control">
                                            <div class="input-box-loi">
                                                <input type="checkbox" name="persistent_remember_me" class="checkbox" id="remember_meMPttzNneZ0" checked="checked" title="Remember Me">
                                            </div>
                                            <label for="remember_meMPttzNneZ0">Recuérdame</label>
                                            <a class="link-tip" style="margin-left:15px;" href="javascript:void(0);">¿Qué es esto?</a>
                                        </li>
                                    </ul>
                                    <div class="buttons-set">
                                        <button type="submit" class="button-55" v-on:click="handleSubmit">Iniciar sesión</button>
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
            titleTemplate: 'Login - %s',
            meta: [
                { name: 'title', content: 'Login - Imageno' },
                { name: 'description', content: 'Imageno' }
            ]
        },
        props : ['nextUrl'],
        data() {
            return {
                email: "",
                password: "",
            }
        },
        methods: {
            handleSubmit(e) {
                e.preventDefault()
                let email = this.email
                let password = this.password
                axios.post(this.apiRootUrl+'/login', {
                    email, password,
                }).then(response => {
                    let headers = response.headers
                    let data = response.data
                    if(!data.status){
                        return this.$swal('Error', data.message, 'error')
                    }else{
                        localStorage.setItem('imageno.user', JSON.stringify(data.data))
                        localStorage.setItem('imageno.jwt', headers.token)
                        if(localStorage.getItem('imageno.jwt') != null){
                            this.$emit('loggedIn')
                            let nextUrl = this.$route.params.nextUrl
                            this.$router.push((nextUrl != null ? nextUrl : '/dashboard'))
                        }
                    }
                })
            }
        }
    }
</script>

<style scoped>
    
</style>