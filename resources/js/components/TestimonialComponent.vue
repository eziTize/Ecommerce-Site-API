<template>
    <span>
        <div class="pageTitle">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h1 class="page-heading">Testimonial</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="innder-page-section">
            <div class="container">
                <div class="testimonial-section">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6 padd-r" v-for="testimonial in testimonials">
                            <div class="news-papers aos-init aos-animate" data-aos="fade-down" data-aos-duration="2000">
                                <figure class="wpf-demo-3">
                                    <a href="javascript:void(0);" alt="" title=""><img :src="testimonial.image" class="img-responsive"></a>
                                    <figcaption class="view-caption">
                                        <h4>{{ testimonial.name }}</h4>
                                    </figcaption>
                                </figure>
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
            titleTemplate: 'Testimonial - %s',
            meta: [
                { name: 'title', content: 'Testimonial - Imageno' },
                { name: 'description', content: 'Imageno' }
            ]
        },
        data() {
            return {
                testimonials: [],
            }
        },
        created() {
            axios.get(this.apiRootUrl+'/testimonial').then(response => {
                let data = response.data
                this.testimonials = data.data
            })
        }
    }
</script>

<style scoped>
    
</style>