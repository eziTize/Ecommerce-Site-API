<template>
	<div>
		<div class="all-nav">
	  		<div class="top-nav">
	    		<div class="container-fluid">
	      			<div class="top-nav-main">
	        			<div class="row">
	          				<div class="col-md-7">
	            				<div class="top-body">
	              					<div class="logo"><router-link to="/"><img src="assets/images/logo.png"></router-link></div>
	              					<div class="serarchbar-section">
	                					<form class="expanding-search-form">
	                  						<div class="search-dropdown">
	                    						<button class="button dropdown-toggle" type="button">
	                    							<span class="toggle-active">{{ site_lang['EVERYTHING'] }}</span>
	                    							<span class="ion-arrow-down-b"></span>
	                    						</button>
	                    						<ul class="dropdown-menu">
													<li class="menu-active"><a href="javascript:void(0);">{{ site_lang['EVERYTHING'] }}</a></li>
													<li><a href="javascript:void(0);">{{ site_lang['PEOPLE'] }}</a></li>
													<li><a href="javascript:void(0);">{{ site_lang['PRODUCTS'] }}</a></li>
													<li><a href="javascript:void(0);">{{ site_lang['BLOG'] }}</a></li>
	                    						</ul>
	                  						</div>
	                  						<input class="search-input" id="global-search" type="text" :placeholder="site_lang['WHAT_ARE_YOU_LOOKING_FOR_HERE']+'...'">
	                  						<label class="search-label"> <span class="sr-only">{{ site_lang['GLOBAL_SEARCH'] }}</span> </label>
	              							<router-link to="/" class="button search-button" tag="button">
	              								<span class="icon ion-search"><i class="fas fa-search"></i> {{ site_lang['SEARCH'] }}</span>
	              							</router-link>
	                					</form>
	              					</div>
	            				</div>
	          				</div>
	          				<div class="col-md-5">
	        					<div class="top-menu">
	          						<ul>
						                <li v-if="!isLoggedIn"><router-link to="/login"><span><i class="fas fa-user"></i></span>&nbsp;{{ site_lang['SIGN_UP_JOIN_FREE'] }}</router-link></li>
					                	<li v-if="isLoggedIn" class="border-menu">
                							<div class="dropdown-container">
                								<label class="dropdown" v-on:click="showProfileMenu"><span> <i class="fas fa-user"></i> </span> Hi! {{ name }} <i class="fas fa-angle-down"></i></label>
                								<div class="dropdown-menu profile-menu">
                									<ul>
														<li><router-link to="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</router-link></li>
														<li><router-link to="/order"><i class="fas fa-dolly-flatbed"></i></span> Order List</router-link></li>
														<li><router-link to="/address"><i class="fas fa-map-marker-alt"></i></span> Saved Address</router-link></li>
														<li><router-link to="/card-details"><i class="fas fa-credit-card"></i></span> Saved Card Details</router-link></li>
														<li><router-link to="/profile"><i class="fas fa-user"></i></span> My Profile</router-link></li>
														<li><router-link to="/change-password"><i class="fas fa-unlock"></i></span> Change Password</router-link></li>
														<li><a href="javascript:void(0);" v-on:click="logout"><i class="fas fa-sign-out-alt"></i></span> {{ site_lang['LOGOUT'] }}</a></li>
													</ul>
												</div>
											</div>
										</li>
						                <li><a href="javascript:void(0);"><span><i class="far fa-envelope"></i></span>&nbsp;{{ site_lang['MESSAGES'] }}</a></li>
						                <li><a href="javascript:void(0);"><span><i class="fas fa-shopping-bag"></i></span>&nbsp;{{ site_lang['ORDER'] }}</a></li>
						                <li><router-link to="/cart"><span><i class="fas fa-shopping-cart"></i></span>&nbsp;{{ site_lang['CART'] }}</router-link></li>
	          						</ul>
	        					</div>
	      					</div>
	    				</div>
	    				<div class="top-nav-sub">
	      					<ul>
	        					<li :class="(language == 1) ? 'active' : ''"><a href="javascript:void(0);" v-on:click="changeLanguage('1')">ES</a></li>
	        					<li :class="(language == 2) ? 'active' : ''"><a href="javascript:void(0);" v-on:click="changeLanguage('2')">EN</a></li>
	      					</ul>
	    				</div>
	  				</div>
				</div>
	  		</div>
			<div class="main-nav" id="navbar">
				<div class="container-fluid">
	  				<nav id="navigation1" class="navigation">
	        			<div class="nav-header">
	        				<router-link to="/" class="nav-logo"><img src="assets/images/logo.png" class="white-logo" alt=""></router-link>
	          				<div class="mob-icon">
	            				<ul>
	              					<li><a href="javascript:void(0);" class="log-reg-mob"><span><i class="fas fa-user" aria-hidden="true"></i></span></a></li>
	              					<li><a href="javascript:void(0);" class="log-reg-mob"><span><i class="far fa-envelope" aria-hidden="true"></i></span></a></li>
	              					<li><a href="javascript:void(0);" class="log-reg-mob"><span><i class="fas fa-shopping-bag" aria-hidden="true"></i></span></a></li>
	              					<li><router-link to="/cart" class="log-reg-mob mob-no-border"><span><i class="fas fa-shopping-cart" aria-hidden="true"></i></span></router-link></li>
	            				</ul>
	          				</div>
	          				<div class="nav-toggle"></div>
	        			</div>
	        			<div class="nav-menus-wrapper">
	        				<ul class="nav-menu align-to-right">
					            <li><router-link to="/">{{ site_lang['START'] }}</router-link></li>
					            <li><a href="javascript:void(0);">{{ site_lang['PORTFOLIO'] }}</a></li>
					            <li>
					            	<a href="javascript:void(0);">{{ site_lang['SERVICES_AND_PRODUCTS'] }}</a>
        							<ul class="nav-dropdown">
        								<li v-for="service_menu in services_menu">
	        								<router-link :to="'/services/'+service_menu.slug" class="mob-menu-main-title">{{ service_menu.lang_value }}</router-link>
	        								<ul>
	        									<span v-for="service_menu_child in service_menu.child">
	        										<span v-if="service_menu_child.child">
				              							<router-link :to="'/services/'+service_menu_child.slug" class="mega-sub-title">{{ service_menu_child.lang_value }}:</router-link>
				              							<ul>
															<span v-for="service_menu_child1 in service_menu_child.child">
																<li><router-link title="" :to="'/service-details/'+service_menu_child1.slug">{{ service_menu_child1.lang_value }}</router-link></li>
															</span>
														</ul>
	        										</span>
	        										<span v-else>
	        											<li><router-link :to="'/service-details/'+service_menu_child.slug">{{ service_menu_child.lang_value }}</router-link></li>
	        										</span>
	        									</span>
	        								</ul>
	        							</li>
	        							<li v-for="product_menu in products_menu">
	        								<router-link :to="'/products/'+product_menu.slug" class="mob-menu-main-title">{{ product_menu.lang_value }}</router-link>
	        								<ul>
	        									<span v-for="product_menu_child in product_menu.child">
	        										<span v-if="product_menu_child.child">
				              							<router-link :to="'/products/'+product_menu_child.slug" class="mega-sub-title">{{ product_menu_child.lang_value }}:</router-link>
				              							<ul>
															<span v-for="product_menu_child1 in product_menu_child.child">
																<li><router-link title="" :to="'/product-details/'+product_menu_child1.slug">{{ product_menu_child1.lang_value }}</router-link></li>
															</span>
														</ul>
	        										</span>
	        										<span v-else>
	        											<li><router-link :to="'/product-details/'+product_menu_child.slug">{{ product_menu_child.lang_value }}</router-link></li>
	        										</span>
	        									</span>
	        								</ul>
	        							</li>
                                	</ul>
                                </li>
            					<li><a href="javascript:void(0);">{{ site_lang['AGENCY'] }}</a></li>
					            <li><router-link to="/testimonial">{{ site_lang['CUSTOMERS'] }}</router-link></li>
					            <li><a href="javascript:void(0);">{{ site_lang['PROMOTIONS'] }}</a></li>
					            <li><router-link to="/blog">{{ site_lang['BLOG'] }}</router-link></li>
					            <li><router-link to="contact-us">{{ site_lang['CONTACT'] }}</router-link></li>
          					</ul>
        				</div>
	      			</nav>
				</div>
			</div>
			<div class="desktop-main-nav">
				<div class="row no-magin">
					<div class="sf-contener clearfix col-lg-12" id="block_top_menu">
						<div class="cat-title"></div>
						<ul class="sf-menu clearfix menu-content">
							<li><router-link :title="site_lang['START']" to="/">{{ site_lang['START'] }}</router-link></li>
							<li><a :title="site_lang['PORTFOLIO']" href="javascript:void(0);">{{ site_lang['PORTFOLIO'] }}</a></li>
							<li>
								<span class="menu-mobile-grover"></span>
								<a href="javascript:void(0);" title="" class="">{{ site_lang['SERVICES_AND_PRODUCTS'] }} <i class="fas fa-angle-down"></i></a>
								<ul class="submenu-container clearfix first-in-line-xs menu-mobile">
        							<li v-for="service_menu in services_menu">
        								<router-link :to="'/services/'+service_menu.slug" class="">{{ service_menu.lang_value }}</router-link>
        								<ul>
        									<span v-for="service_menu_child in service_menu.child">
        										<span v-if="service_menu_child.child">
			              							<router-link :to="'/services/'+service_menu_child.slug" class="mega-sub-title">{{ service_menu_child.lang_value }}:</router-link>
			              							<ul>
														<span v-for="service_menu_child1 in service_menu_child.child">
															<li><router-link title="" :to="'/service-details/'+service_menu_child1.slug">{{ service_menu_child1.lang_value }}</router-link></li>
														</span>
													</ul>
        										</span>
        										<span v-else>
        											<li><router-link :to="'/service-details/'+service_menu_child.slug">{{ service_menu_child.lang_value }}</router-link></li>
        										</span>
        									</span>
        								</ul>
        							</li>
        							<li v-for="product_menu in products_menu">
        								<router-link :to="'/products/'+product_menu.slug" class="">{{ product_menu.lang_value }}</router-link>
        								<ul>
        									<span v-for="product_menu_child in product_menu.child">
        										<span v-if="product_menu_child.child">
			              							<router-link :to="'/products/'+product_menu_child.slug" class="mega-sub-title">{{ product_menu_child.lang_value }}:</router-link>
			              							<ul>
														<span v-for="product_menu_child1 in product_menu_child.child">
															<li><router-link title="" :to="'/product-details/'+product_menu_child1.slug">{{ product_menu_child1.lang_value }}</router-link></li>
														</span>
													</ul>
        										</span>
        										<span v-else>
        											<li><router-link :to="'/product-details/'+product_menu_child.slug">{{ product_menu_child.lang_value }}</router-link></li>
        										</span>
        									</span>
        								</ul>
        							</li>
  								</ul>
        					</li>
          					<li><a :title="site_lang['AGENCY']" href="javascript:void(0);">{{ site_lang['AGENCY'] }}</a></li>
							<li><router-link :title="site_lang['CUSTOMERS']" to="/testimonial">{{ site_lang['CUSTOMERS'] }}</router-link></li>
				            <li><a :title="site_lang['PROMOTIONS']" href="javascript:void(0);">{{ site_lang['PROMOTIONS'] }}</a></li>
				            <li><router-link :title="site_lang['BLOG']" to="/blog">{{ site_lang['BLOG'] }}</router-link></li>
				            <li><router-link :title="site_lang['CONTACT']" to="contact-us">{{ site_lang['CONTACT'] }}</router-link></li>
      					</ul>
    				</div>
  				</div>
  			</div>
			<div class="mob-search">
				<input type="text" class="searchTerm" :placeholder="site_lang['WHAT_ARE_YOU_LOOKING_FOR_HERE']+'...'">
				<button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
			</div>
		</div>

	    <router-view @loggedIn="change" v-bind:site_lang="site_lang" v-bind:services_menu="services_menu" v-bind:products_menu="products_menu"></router-view>

	    <footer class="footer-section">
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-sm-4 col-md-4 col-lg-4">
	    				<div class="title-con">
	    					<h2>{{ site_lang['CONTACT_US'] }}</h2>
	    					<ul>
	    						<li class="add-1st"><div class="icon-p"><i class="fas fa-map-marker-alt"></i></div>Dir.Av.Pedro Vicente Maldonado y Guayas. EI Potosi Sector. Next to the EI Potosi Gas Station. Esmeraldas-Ecuador </li>
	    						<li><div class="icon-p"><i class="fas fa-phone-alt"></i></div>+593 98 177 1845 / +593 98 1391 739</li>
	    						<li><div class="icon-p"><i class="far fa-envelope"></i></div>info@imagen.online</li>
	    					</ul>
	    				</div>
	    				<div class="socail-icon">
	    					<ul>
								<li class="facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="facebook"><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li class="facebook"><a href="#"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
						<div class="frome">
							<h2>{{ site_lang['PAYMENT_METHODS'] }}</h2>
							<ul>
								<li><img src="assets/images/bankj.png"></li>
								<li><img src="assets/images/card1.png"></li>
								<li><img src="assets/images/card2.png"></li>
								<li><img src="assets/images/card3.png"></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-12 col-md-8 col-lg-8">
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="footer-blog">
									<h2>{{ site_lang['OUR_BLOG'] }}</h2>
									<ul>
										<li>
											<div class="post-date">
												<span class="number">25</span><span>May 2020</span>
											</div>
											<div class="post-contain">
												<h2>Incremente sus vent</h2>
												<p>Dejabú Agencia Multimedia con más de 12 años de experiencia en el mercado evoluciona…</p>
											</div>
										</li>
										<li>
											<div class="post-date">
												<span class="number">25</span><span>May 2020</span>
											</div>
											<div class="post-contain">
												<h2>Incremente sus vent</h2>
												<p>Dejabú Agencia Multimedia con más de 12 años de experiencia en el mercado evoluciona…</p>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="sobre-box">
									<h2>{{ site_lang['ABOUT_US'] }}</h2>
									<p>Imagen es una empresa líder en Publicidad, convierte sus compras físicas en una tienda onlinepara la asistencia de servicios yventa de productos publicitarios, desempeñando una alta calidad en todo tipo de trabajo, diseño gráfico, diseño multimediaen el entorno de la necesidad del cliente.</p>
									<p>Nuestro equipo de trabajo está dedicado siempre hacer que su experiencia sea más agradable; desde nuestro servicio de atención al cliente interno 24/7 hasta el tiempo de entrega de su servicio o producto publicitario.</p>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12">
								<div class="f-bottom-link">
									<ul>
										<li><router-link to="/about-us">About Us</router-link></li>
										<li><router-link to="/privacy">Privacy Policy</router-link></li>
										<li><router-link to="/faq">Faq</router-link></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div class="mobile_button">
			<ul>
				<li>
					<a href="javascript:void(0);" class="love_by"></a>
					<a href="tel:1234567890"><i class="fas fa-phone-alt" aria-hidden="true"></i></a>
				</li>
				<li class="mob_book_now mob-whatsapp">
					<a href="https://api.whatsapp.com/send?phone=+911234567890" method="get" target="_blank"><i class="fab fa-whatsapp res-wp-icon" aria-hidden="true"></i></a>
				</li>
			</ul>
		</div>
		<a id="button"><i class="fas fa-long-arrow-alt-up"></i></a>
		<div class="footer-copywrite">
			<p>Términos y condiciones Política de privacidad Derechos del consumidor © Copyright 2020 por imagen. Todos los derechos reservados.</p>
		</div>
		<div class="all-contact-btn">
			<button>Contacta con nosotras</button>
		</div>
		<div id="preloader">
			<div id="status">&nbsp;</div>
			<a href="javascript:void(0);" class="scroll_to_top icon-up" title="Scroll to top"><i class="fas fa-arrow-up"></i></a>
			<div class="custom_html_section"></div>
		</div>
	</div>
</template>

<script>
    export default {
        name: "App",
		metaInfo: {
			title: 'Imageno',
			titleTemplate: '%s'
		},
        data() {
            return {
                language: (localStorage.getItem('imageno.language') != null) ? localStorage.getItem('imageno.language') : '1',
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('imageno.jwt') != null,

                site_lang: [],
                services_menu: [],
                products_menu: [],
            }
        },
        mounted() {
            this.setDefaults()
            this.setLanguage()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('imageno.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            setLanguage(){
            	if (localStorage.getItem('imageno.language') == null) {
                	localStorage.setItem('imageno.language', this.language)
                }

            	let language = this.language
	            axios.post(this.apiRootUrl+'/site_language_list', {
	                language,
	            }).then(response => {
	                let data = response.data
	                this.site_lang = data.data

		            axios.post(this.apiRootUrl+'/services_menu', {
		                language,
		            }).then(response => {
		                let data = response.data
		                this.services_menu = data.data
		            })
		            axios.post(this.apiRootUrl+'/products_menu', {
		                language,
		            }).then(response => {
		                let data = response.data
		                this.products_menu = data.data
		            })
	            })
            },
            change() {
                this.isLoggedIn = localStorage.getItem('imageno.jwt') != null
                this.setDefaults()
            },
            changeLanguage(language_id) {
            	localStorage.setItem('imageno.language', language_id)
            	this.language = language_id
            	this.setLanguage()
            	window.location.reload()
            },
            logout(){
                localStorage.removeItem('imageno.jwt')
                localStorage.removeItem('imageno.user')
                this.change()
                this.$router.push('/login')
            },
            showProfileMenu() {
            	$('.profile-menu').toggle()
            }
        }
    }
</script>

<style scoped>
	.top-nav-sub li.active a{
	    background: #ff5500;
	}
	.sf-menu li.active a{
		background: #ff5500;
	}
	.dropdown-menu {
	    top: 75%;
	    left: 35%;
	}
	.dropdown-container .dropdown-menu ul li {
	    padding: 6px 6px;
	}
</style>