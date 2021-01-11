<template>
    <span>
        <section class="inner-title-main">
            <div class="container">
                <div class="inner-title-list">
                    <ul>
                        <li><router-link to="/">Home </router-link> <i class="fas fa-angle-right" aria-hidden="true"></i> </li>
                        <li><router-link to="/all-services">{{ site_lang['SERVICES'] }}</router-link> <i class="fas fa-angle-right" aria-hidden="true"></i> </li>
                        <li><a href="javascript:void(0);">{{ breadcrumb }}</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="product-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 no-padding">
                        <div class="service-pannel">
                            <div class="pxlr-club-faq">
                                <div class="content">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default" v-for="service_menu in services_menu">
                                            <div class="panel-heading" :id="'heading-'+service_menu.id" role="tab">
                                                <h4 class="panel-title">
                                                    <a :class="(service_menu.id == selected_menu) ? '' : 'collapsed'" role="button" data-toggle="collapse" data-parent="#accordion" :href="'#collapse-'+service_menu.id" :aria-expanded="(service_menu.id == selected_menu) ? true : false" aria-controls="collapseOne">{{ service_menu.lang_value }}<i class="pull-right fa fa-plus"></i></a>
                                                </h4>
                                            </div>
                                            <div :class="(service_menu.id == selected_menu) ? 'panel-collapse collapse in' : 'panel-collapse collapse'" :id="'collapse-'+service_menu.id" role="tabpanel" :aria-labelledby="'heading-'+service_menu.id">
                                                <div class="panel-body pxlr-faq-body">
                                                    <ul>
                                                        <span v-for="service_menu_child in service_menu.child">
                                                            <span v-if="service_menu_child.child">
                                                                <li><router-link :to="'/services/'+service_menu_child.slug" class="mega-sub-title">{{ service_menu_child.lang_value }}:</router-link></li>
                                                                <span v-for="service_menu_child1 in service_menu_child.child">
                                                                    <li><router-link title="" :to="'/service-details/'+service_menu_child1.slug">{{ service_menu_child1.lang_value }}</router-link></li>
                                                                </span>
                                                            </span>
                                                            <span v-else>
                                                                <li><router-link :to="'/service-details/'+service_menu_child.slug">{{ service_menu_child.lang_value }}</router-link></li>
                                                            </span>
                                                        </span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default" v-for="product_menu in products_menu">
                                            <div class="panel-heading" :id="'heading-'+product_menu.id" role="tab">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" :href="'#collapse-'+product_menu.id" aria-expanded="false" aria-controls="collapseOne">{{ product_menu.lang_value }}<i class="pull-right fa fa-plus"></i></a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" :id="'collapse-'+product_menu.id" role="tabpanel" :aria-labelledby="'heading-'+product_menu.id">
                                                <div class="panel-body pxlr-faq-body">
                                                    <ul>
                                                        <span v-for="product_menu_child in product_menu.child">
                                                            <span v-if="product_menu_child.child">
                                                                <li><router-link :to="'/products/'+product_menu_child.slug" class="mega-sub-title">{{ product_menu_child.lang_value }}:</router-link></li>
                                                                <span v-for="product_menu_child1 in product_menu_child.child">
                                                                    <li><router-link title="" :to="'/product-details/'+product_menu_child1.slug">{{ product_menu_child1.lang_value }}</router-link></li>
                                                                </span>
                                                            </span>
                                                            <span v-else>
                                                                <li><router-link :to="'/product-details/'+product_menu_child.slug">{{ product_menu_child.lang_value }}</router-link></li>
                                                            </span>
                                                        </span>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product-body">
                            <div class="col-md-12 no-padding">
                                <div class="product-body-title">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="p-title-l">
                                                <span><router-link to="/all-services"><i class="fas fa-home"></i></router-link></span>
                                                <div class="shape">{{ breadcrumb }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-title-r">
                                                <div class="product-search">
                                                    <form autocomplete="off">
                                                        <input type="search" placeholder="Buscar" v-model="search">
                                                        <button type="submit" class="search-btn" v-on:click="handleSearch"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="all-products">
                                <div class="row">
                                    <div class="col-md-4" v-for="service in services">
                                        <div class="product-single">
                                            <div class="product-single-overlay"></div>
                                            <div class="product-sin-img" style="height:150px;"><img :src="service.image" style="height:150px;width:100%;"></div>
                                            <div class="content-details fadeIn-bottom">
                                                <h3 class="content-title">{{ service.lang_value }}</h3>
                                                <div class="sin-p-btn">
                                                    <router-link :to="'/service-details/'+service.slug">Ver detalles</router-link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </span>
</template>

<script>
    export default {
        props: ['site_lang','services_menu','products_menu'],
        data() {
            return {
                language: (localStorage.getItem('imageno.language') != null) ? localStorage.getItem('imageno.language') : '1',

                search: (this.$route.query.search) ? this.$route.query.search : "",
                breadcrumb: "",
                selected_menu: 0,
                services: [],
            }
        },
        methods: {
            handleSearch(e) {
                e.preventDefault()
                let nextUrl = this.$route.params.nextUrl
                if(this.search){
                    this.$router.push((nextUrl != null ? nextUrl : '/services/'+this.$route.params.slug+'?search='+this.search))
                }else{
                    this.$router.push((nextUrl != null ? nextUrl : '/services/'+this.$route.params.slug))
                }
            },
            fetchData() {
                let language = this.language
                axios.post(this.apiRootUrl+'/services/'+this.$route.params.slug+'?search='+this.search, {
                    language,
                }).then(response => {
                    let data = response.data
                    this.breadcrumb = data.breadcrumb
                    this.selected_menu = data.selected_menu
                    this.services.push.apply(this.services,data.data)
                })
            }
        },
        watch: {
            '$route.params': {
                handler(newValue) {
                    console.log(newValue)
                    const { search } = newValue
                    this.search = (this.$route.query.search) ? this.$route.query.search : ""
                    this.breadcrumb = ""
                    this.selected_menu = 0
                    this.services = []
                    this.fetchData()
                },
                immediate: true,
            }
        }
    }
</script>

<style scoped>
    .p-title-l .shape{
        padding: 3px 30px;
        width: auto;
        font-size: 13px;
    }
</style>