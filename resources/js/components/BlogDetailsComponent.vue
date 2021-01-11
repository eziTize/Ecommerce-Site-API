<template>
    <span>
        <div class="pageTitle">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <h1 class="page-heading">Blog</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="innder-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <div class="blog-ssr">
                            <h2>{{ blog.title }}</h2>
                            <p><span v-html="blog.description"></span></p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="sidebar">
                            <div class="widget">
                                <h5 class="widget-title">Search</h5>
                                <div class="search-box-two">
                                    <form autocomplete="off">
                                        <input type="search" id="gsearch" v-model="search">
                                        <input type="submit" value="Submit" v-on:click="handleSearch">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Recent Posts -->
                        <div class="sidebar">
                            <div class="widget">
                                <h5 class="widget-title">últimas noticias</h5>
                                <ul class="papu-post">
                                    <li v-for="latest_blog in latest_blogs">
                                        <div class="media-left">
                                            <router-link :to="{path: '/blog-details/'+latest_blog.slug}"><img :src="latest_blog.image"></router-link>
                                        </div>
                                        <div class="media-body">
                                            <router-link :to="{path: '/blog-details/'+latest_blog.slug}" class="media-heading">{{ latest_blog.title }}</router-link>
                                        </div>
                                    </li>
                                </ul>
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
        props : ['nextUrl'],
        data() {
            return {
                latest_blogs: [],
                blog: {},
                search: "",
            }
        },
        created() {
            axios.get(this.apiRootUrl+'/latest_blog').then(response => {
                let data = response.data
                this.latest_blogs = data.data
            })
        },
        methods: {
            handleSearch(e) {
                e.preventDefault()
                let nextUrl = this.$route.params.nextUrl
                if(this.search){
                    this.$router.push((nextUrl != null ? nextUrl : '/blog?search='+this.search))
                }else{
                    this.$router.push((nextUrl != null ? nextUrl : '/blog'))
                }
            },
            fetchData() {
                axios.get(this.apiRootUrl+'/blog_details/'+this.$route.params.slug).then(response => {
                    let data = response.data
                    if(!data.status){
                        let nextUrl = this.$route.params.nextUrl
                        this.$router.push((nextUrl != null ? nextUrl : '/blog'))
                    }
                    this.blog = data.data
                })
            }
        },
        watch: {
            '$route.params': {
                handler(newValue) {
                    const { slug } = newValue
                    this.fetchData(slug)
                },
                immediate: true,
            }
        }
    }
</script>

<style scoped>
    
</style>