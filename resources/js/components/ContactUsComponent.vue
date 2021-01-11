<template>
    <span>
        <section class="inner-title-main">
            <div class="container">
                <div class="inner-title-list">
                    <ul>
                        <!-- <li><a href="index.html">Home </a> <i class="fas fa-angle-right" aria-hidden="true"></i> </li> -->
                        <li><a href="javascript:void(0);">Contacta Con Nosotras</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <div class="inner-content-main">
            <section class="contact-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 mb-md-0 mb-5">
                            <h3 class="contact-title">CONTACTANOS</h3>
                            <form id="contact-form" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-0"> 
                                            <label for="name" class="man-field">*</label>
                                            <input type="text" id="name" v-model="name" class="form-control contact-input" placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-0"> 
                                            <label for="email" class="man-field">*</label>
                                            <input type="text" id="email" v-model="email" class="form-control contact-input" placeholder="Correo electrónico">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <label for="subject" class="man-field">*</label>
                                            <input type="text" id="subject" v-model="subject" class="form-control contact-input" placeholder="Sujeto">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form">
                                            <label for="message" class="man-field">*</label>
                                            <textarea type="text" id="message" v-model="message" rows="2" class="form-control contact-input md-textarea" placeholder="Mensaje"></textarea>
                                        </div>
                                        <div class="man-text">
                                            <p><span>*</span>Este campo es obligatorio</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="btn contact-send" v-on:click="handleSubmit">Enviar</a>
                                </div>
                            </form>
                            <div class="status"></div>
                        </div>
                        <div class="col-md-3 text-center">
                            <ul class="list-unstyled mb-0 contact-details">
                                <li>
                                    <i class="fab fa-whatsapp fa-2x"></i>
                                    <p>+593 98 177 1845</p>
                                </li>
                                <li>
                                    <i class="fas fa-envelope mt-4 fa-2x"></i>
                                    <p>info@imagen.online</p>
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt fa-2x"></i>
                                    <p>Pedro Vicente Maldonado, Esmeraldas 080150, Ecuador</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- <div class="google-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d16133412.653621202!2d-82.19130329246322!3d-9.170573860488474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sDir.Av.Pedro%20Vicente%20Maldonado%20y%20Guayas.%20EI%20Potosi%20Sector.%20Next%20to%20the%20EI%20Potosi%20Gas%20Station.%20Esmeraldas-Ecuador!5e0!3m2!1sen!2sin!4v1592918207566!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div> -->
        <div class="google-map">
            <iframe src="https://www.google.com/maps?q=Pedro+Vicente+Maldonado,+Esmeraldas+080150,+Ecuador&output=embed" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Contact Us - %s',
            meta: [
                { name: 'title', content: 'Contact Us - Imageno' },
                { name: 'description', content: 'Imageno' }
            ]
        },
        data() {
            return {
                name: "",
                email: "",
                subject: "",
                message: "",
            }
        },
        methods: {
            handleSubmit(e) {
                e.preventDefault()
                let name = this.name
                let email = this.email
                let subject = this.subject
                let message = this.message
                axios.post(this.apiRootUrl+'/contact_us', {
                    name, email, subject, message,
                }).then(response => {
                    let data = response.data
                    if(!data.status){
                        return this.$swal('Error', data.message, 'error')
                    }else{
                        this.name = ""
                        this.email = ""
                        this.subject = ""
                        this.message = ""

                        return this.$swal('Success', data.message, 'success')
                    }
                })
            }
        }
    }
</script>

<style scoped>
    
</style>