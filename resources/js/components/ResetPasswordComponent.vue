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
                                <h2>Restablecer su contraseña aquí</h2>
                                <p>Por favor, cambie su contraseña.</p>
                                <form autocomplete="off">
                                    <ul class="form-list-two">
                                        <li>
                                            <label for="new_password" class="required"><em>*</em>Nueva contraseña</label>
                                            <div class="input-box">
                                                <input type="password" v-model="new_password" id="new_password" class="input-text">
                                            </div><br>
                                        </li>
                                        <li>
                                            <label for="conf_password" class="required"><em>*</em>Confirmar contraseña</label>
                                            <div class="input-box">
                                                <input type="password" v-model="conf_password" id="conf_password" class="input-text">
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
            titleTemplate: 'Reset Password - %s'
        },
        props : ['nextUrl'],
        data() {
            return {
                new_password: "",
                conf_password: "",
            }
        },
        created() {
            axios.get(this.apiRootUrl+'/reset_pwd/'+this.$route.params.token).then(response => {
                let data = response.data
                if(!data.status){
                    let nextUrl = this.$route.params.nextUrl
                    this.$router.push((nextUrl != null ? nextUrl : '/login'))
                }
            })
        },
        methods: {
            handleSubmit(e) {
                e.preventDefault()
                let new_password = this.new_password
                let conf_password = this.conf_password
                axios.post(this.apiRootUrl+'/reset_pwd/'+this.$route.params.token, {
                    new_password, conf_password,
                }).then(response => {
                    let data = response.data
                    if(!data.status){
                        return this.$swal('Error', data.message, 'error')
                    }else{
                        this.new_password = ""
                        this.conf_password = ""

                        let nextUrl = this.$route.params.nextUrl
                        let nextUrlPost = this.$router.push((nextUrl != null ? nextUrl : '/login'))

                        return this.$swal('Success', data.message, 'success').then(function(curr_this){
                            nextUrlPost
                        })
                    }
                })
            }
        }
    }
</script>

<style scoped>
    
</style>