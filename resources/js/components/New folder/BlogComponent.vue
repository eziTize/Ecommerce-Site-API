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
                </div>

                <div class="row">
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <span ref="infinitescrolltrigger">
                            <div class="spinner" v-if="showloader">
                                <div class="rect1"></div>
                                <div class="rect2"></div>
                                <div class="rect3"></div>
                                <div class="rect4"></div>
                                <div class="rect5"></div>
                            </div>
                        </span>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4"></div>
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
                search: (this.$route.query.search) ? this.$route.query.search : "",
                start_pos: (this.start_pos) ? this.start_pos : 0,
                is_load_more: true,
                showloader: false,
                latest_blogs: [],
                blogs: [],
            }
        },
        mounted() {
            this.scrollTrigger()
        },
        created() {
            axios.get(this.apiRootUrl+'/latest_blog').then(response => {
                let data = response.data
                this.latest_blogs = data.data
            })
        },
        methods: {
            scrollTrigger() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if(entry && entry.isIntersecting){
                            if(this.is_load_more == true){
                                this.showloader = true
                                this.fetchData()
                            }
                        }
                    })
                })

                observer.observe(this.$refs.infinitescrolltrigger)
            },
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
                    this.showloader = false
                    this.start_pos = data.start_pos
                    /*if(this.is_load_more == true){
                        this.blogs.push.apply(this.blogs,data.data)
                        this.is_load_more = data.is_load_more
                    }*/

                    if(this.is_load_more == true){
                        for(i=0;i<data.data.length;i++){
                            this.blogs.push.apply(this.blogs,data.data[i])
                        }
                        this.is_load_more = data.is_load_more
                    }
                })
            }
        },
        watch: {
            '$route.params': {
                handler(newValue) {
                    const { search } = newValue
                    this.search = (this.$route.query.search) ? this.$route.query.search : "",
                    this.start_pos = 0
                    this.is_load_more = true
                    this.showloader = false
                    this.blogs = []
                    this.fetchData()
                },
                immediate: true,
            }
        }
    }
</script>

<style scoped>
    .spinner {
        margin: 40px auto;
        width: 50px;
        height: 40px;
        text-align: center;
        font-size: 10px;
    }

    .spinner > div {
        background-color: #FF5500;
        height: 100%;
        width: 6px;
        display: inline-block;
  
        -webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
        animation: sk-stretchdelay 1.2s infinite ease-in-out;
    }

    .spinner .rect2 {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s;
    }

    .spinner .rect3 {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }

    .spinner .rect4 {
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
    }

    .spinner .rect5 {
        -webkit-animation-delay: -0.8s;
        animation-delay: -0.8s;
    }

    @-webkit-keyframes sk-stretchdelay {
        0%, 40%, 100% {
            -webkit-transform: scaleY(0.4);
        }  
        20% {
            -webkit-transform: scaleY(1.0);
        }
    }

    @keyframes sk-stretchdelay {
        0%, 40%, 100% { 
            transform: scaleY(0.4);
            -webkit-transform: scaleY(0.4);
        }
        20% { 
            transform: scaleY(1.0);
            -webkit-transform: scaleY(1.0);
        }
    }
</style>