<template>
    <span>
        <section class="inner-title-main">
            <div class="container">
                <div class="inner-title-list">
                    <ul>
                        <li><router-link to="/">Home </router-link> <i class="fas fa-angle-right" aria-hidden="true"></i> </li>
                        <li><a>{{ site_lang['PRODUCTS'] }}</a></li>
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
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" :href="'#collapse-'+service_menu.id" aria-expanded="false" aria-controls="collapseOne">{{ service_menu.lang_value }}<i class="pull-right fa fa-plus"></i></a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" :id="'collapse-'+service_menu.id" role="tabpanel" :aria-labelledby="'heading-'+service_menu.id">
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
                                                <span><router-link to="/all-products"><i class="fas fa-home"></i></router-link></span>
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
                                    <div class="col-md-4" v-for="product in products">
                                        <div class="product-single">
                                            <div class="product-single-overlay"></div>
                                            <div class="product-sin-img" style="height:150px;"><img :src="product.image" style="height:150px;width:100%;"></div>
                                            <div class="content-details fadeIn-bottom">
                                                <h3 class="content-title">{{ product.lang_value }}</h3>
                                                <div class="sin-p-btn">
                                                    <router-link :to="'/product-details/'+product.slug">Ver detalles</router-link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span v-if="is_load_more">
                                        <div class="col-md-12">
                                            <div class="all-p-btn"><a href="javascript:void(0);" v-on:click="fetchData">Load More</a></div>
                                        </div>
                                    </span>
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
                start_pos: (this.start_pos) ? this.start_pos : 0,
                is_load_more: true,
                products: [],
            }
        },
        methods: {
            handleSearch(e) {
                e.preventDefault()
                let nextUrl = this.$route.params.nextUrl
                if(this.search){
                    this.$router.push((nextUrl != null ? nextUrl : '/all-products?search='+this.search))
                }else{
                    this.$router.push((nextUrl != null ? nextUrl : '/all-products'))
                }
            },
            fetchData() {
                let language = this.language
                axios.post(this.apiRootUrl+'/all_products?search='+this.search+'&start_pos='+this.start_pos, {
                    language,
                }).then(response => {
                    let data = response.data
                    this.start_pos = data.start_pos
                    if(this.is_load_more == true){
                        this.products.push.apply(this.products,data.data)
                        this.is_load_more = data.is_load_more
                    }
                })
            }
        },
        watch: {
            '$route.params': {
                handler(newValue) {
                    const { search } = newValue
                    this.search = (this.$route.query.search) ? this.$route.query.search : ""
                    this.start_pos = 0
                    this.is_load_more = true
                    this.products = []
                    this.fetchData()
                },
                immediate: true,
            }
        }
    }
</script>

<style scoped>
    
</style>