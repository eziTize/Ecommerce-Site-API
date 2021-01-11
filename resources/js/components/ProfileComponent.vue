<template>
    <span>
        <div class="container">
            <div class="inner-title-list">
                <ul>
                    <li><router-link to="/dashboard">Dashboard </router-link> <i class="fas fa-angle-right" aria-hidden="true"></i> </li>
                    <li><a>My Profile</a></li>
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
                                    <form autocomplete="off">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <h3 class="about-title edit-checkout">My Profile</h3>
                                                <div class="mandotry-title text-center"><span class="mandetory">*</span> Campos requeridos</div>
                                            </div>
                                            <label class="control-label"><span class="mandetory">*</span> Nombre:</label>
                                            <input type="text" class="form-control" v-model="name">

                                            <label class="control-label"><span class="mandetory">*</span> Dirección de correo electrónico:</label>
                                            <input type="text" class="form-control" v-model="email">

                                            <label class="control-label"><span class="mandetory">*</span> Número de teléfono:</label>
                                            <input type="text" class="form-control" v-model="mobile">

                                            <label class="control-label"><span class="mandetory">*</span> Nombre de usuario:</label>
                                            <input type="text" class="form-control" v-model="username">

                                            <label class="control-label"><span class="mandetory">*</span> Género:</label>
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

                                            <label class="control-label"><span class="mandetory">*</span> Su dirección:</label>
                                            <input type="text" class="form-control" v-model="address">

                                            <label class="control-label"><span class="mandetory">*</span> Fecha de nacimiento: </label>
                                            <input type="date" class="form-control" v-model="dob">

                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-default sub-btn" v-on:click="handleSubmit">Actualización del perfil</button>
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
            titleTemplate: 'My Profile - %s'
        },
        data() {
            let user = JSON.parse(localStorage.getItem('imageno.user'))

            return {
                name: user.name,
                email: user.email,
                mobile: user.mobile,
                username: user.username,
                gender: user.gender,
                address: user.address,
                dob: user.dob,
            }
        },
        methods: {
            handleSubmit(e) {
                e.preventDefault()
                let name = this.name
                let email = this.email
                let mobile = this.mobile
                let username = this.username
                let gender = this.gender
                let address = this.address
                let dob = this.dob
                axios.post(this.apiRootUrl+'/update_profile', {
                    name, email, mobile, username, gender, address, dob,
                }, {
                    headers: {
                        authorization: 'Bearer '+localStorage.getItem('imageno.jwt')
                    }
                }).then(response => {
                    let data = response.data
                    if(!data.status){
                        return this.$swal('Error', data.message, 'error')
                    }else{
                        let data = response.data
                        localStorage.setItem('imageno.user', JSON.stringify(data.data))

                        return this.$swal('Success', data.message, 'success')
                    }
                })
            }
        }
    }
</script>

<style scoped>
    
</style>