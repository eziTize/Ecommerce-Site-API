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
                        <div class="blog-md">
                            <div class="blog-section" v-for="blog in blogs">
                                <div class="blog-line">
                                    <div class="bg-images"><img :src="blog.image"></div>
                                    <div class="bl-contain">
                                        <h2>{{ blog.title }}</h2>
                                        <div class="meta-items">
                                            <a href="javascript:void(0);" target="_blank" class="meta-item meta-item-author"><i class="far fa-user"></i> <span>{{ blog.published_by }}</span></a>
                                            <a class="meta-item meta-item-comment-number" href="javascript:void(0);"><i class="far fa-comment"></i> <span>5</span></a>
                                            <a class="meta-item meta-item-date" href="javascript:void(0);"><i class="far fa-clock"></i> <span>{{ blog.published_at }}</span></a>
                                        </div>
                                        <p>{{ blog.short_description }}</p>
                                        <div class="item-readmore-wrapper"><router-link :to="{path: '/blog-details/'+blog.slug}" class="item-readmore">Read More</router-link></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="sidebar">
                            <div class="widget">
                                <h5 class="widget-title">Search </h5>
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
                    <span v-if="is_load_more">
                        <div class="col-md-8">
                            <div class="all-p-btn"><a href="javascript:void(0);" v-on:click="fetchData">Load More</a></div>
                        </div>
                        <div class="col-md-4"></div>
                    </span>
                </div>
            </div>
        </div>
    </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Blog - %s',
            meta: [
                { name: 'title', content: 'Blog - Imageno' },
                { name: 'description', content: 'Imageno' }
            ]
        },
        props : ['nextUrl'],
        data() {
            return {
                search: (this.$route.query.search) ? this.$route.query.search : "",
                start_pos: (this.start_pos) ? this.start_pos : 0,
                is_load_more: true,
                latest_blogs: [],
                blogs: [],
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
                axios.get(this.apiRootUrl+'/blog?search='+this.search+'&start_pos='+this.start_pos).then(response => {
                    let data = response.data
                    this.start_pos = data.start_pos
                    if(this.is_load_more == true){
                        this.blogs.push.apply(this.blogs,data.data)
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
                    this.blogs = []
                    this.fetchData()
                },
                immediate: true,
            }
        }
    }
</script>

<style scoped>
    .search-box-two input[type="search"]{
        text-transform: capitalize;
    }
</style>