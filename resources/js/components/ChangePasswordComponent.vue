<template>
    <span>
        <div class="container">
            <div class="inner-title-list">
                <ul>
                    <li><router-link to="/dashboard">Dashboard </router-link> <i class="fas fa-angle-right" aria-hidden="true"></i> </li>
                    <li><a>Change Password</a></li>
                </ul>
            </div>
        </div>

        <div class="checkout-main">
            <section class="checkout-edit-page">
                <div class="container">
                    <div class="form-bg">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <h3 class="about-title edit-checkout">Cambia la contraseña</h3>
                                                <div class="mandotry-title text-center"><span class="mandetory">*</span> Campos requeridos</div>
                                            </div>
                                            <label class="control-label"><span class="mandetory">*</span> Contraseña anterior:</label>
                                            <input type="password" class="form-control" v-model="old_password">

                                            <label class="control-label"><span class="mandetory">*</span> Nueva contraseña:</label>
                                            <input type="password" class="form-control" v-model="new_password">

                                            <label class="control-label"><span class="mandetory">*</span> Confirmar contraseña:</label>
                                            <input type="password" class="form-control" v-model="conf_password">

                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-default sub-btn" v-on:click="handleSubmit">Cambio</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Change Password - %s'
        },
        data() {
            return {
                old_password: "",
                new_password: "",
                conf_password: "",
            }
        },
        methods: {
            handleSubmit(e) {
                e.preventDefault()
                let old_password = this.old_password
                let new_password = this.new_password
                let conf_password = this.conf_password
                axios.post(this.apiRootUrl+'/change_password', {
                    old_password, new_password, conf_password,
                }, {
                    headers: {
                        authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                    }
                }).then(response => {
                    let data = response.data
                    if(!data.status){
                        return this.$swal('Error', data.message, 'error')
                    }else{
                        this.new_password = ""
                        this.conf_password = ""
                        this.old_password = ""

                        return this.$swal('Success', data.message, 'success')
                    }
                })
            }
        }
    }
</script>

<style scoped>
    
</style>