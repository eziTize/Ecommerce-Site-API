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
                                <h2>Recupera tu contraseña aquí</h2>
                                <p>Ingrese su dirección de correo electrónico a continuación. Recibirás un enlace para restablecer tu contraseña.</p>
                                <form autocomplete="off">
                                    <ul class="form-list-two">
                                        <li>
                                            <label for="email" class="required"><em>*</em>Dirección de correo electrónico</label>
                                            <div class="input-box">
                                                <input type="text" v-model="email" id="email" class="input-text">
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="buttons-set">
                                        <button type="submit" title="Submit" class="button-55" v-on:click="handleSubmit"><span>Enviar</span></button>
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
            titleTemplate: 'Forget Password - %s'
        },
        data() {
            return {
                email: "",
            }
        },
        methods: {
            handleSubmit(e) {
                e.preventDefault()
                let email = this.email
                axios.post(this.apiRootUrl+'/forget_pwd', {
                    email,
                }).then(response => {
                    let data = response.data
                    if(!data.status){
                        return this.$swal('Error', data.message, 'error')
                    }else{
                        this.email = ""

                        return this.$swal('Success', data.message, 'success')
                    }
                })
            }
        }
    }
</script>

<style scoped>
    
</style>