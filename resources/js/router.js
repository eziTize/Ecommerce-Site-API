import Vue from 'vue'

import config from './config'

import VueRouter from 'vue-router'

import VueMeta from 'vue-meta'



import HomeComponent from './components/HomeComponent.vue'

import AllServicesComponent from './components/AllServicesComponent.vue'

import ServicesComponent from './components/ServicesComponent.vue'

import ServiceDetailsComponent from './components/ServiceDetailsComponent.vue'

import AllProductsComponent from './components/AllProductsComponent.vue'

import ProductsComponent from './components/ProductsComponent.vue'

import ProductDetailsComponent from './components/ProductDetailsComponent.vue'

import TestimonialComponent from './components/TestimonialComponent.vue'

import BlogComponent from './components/BlogComponent.vue'

import BlogDetailsComponent from './components/BlogDetailsComponent.vue'

import ContactUsComponent from './components/ContactUsComponent.vue'

import AboutUsComponent from './components/AboutUsComponent.vue'

import PrivacyComponent from './components/PrivacyComponent.vue'

import FaqComponent from './components/FaqComponent.vue'

import RegisterComponent from './components/RegisterComponent.vue'

import LoginComponent from './components/LoginComponent.vue'

import ForgetPasswordComponent from './components/ForgetPasswordComponent.vue'

import ResetPasswordComponent from './components/ResetPasswordComponent.vue'

import DashboardComponent from './components/DashboardComponent.vue'

import OrderComponent from './components/mb/OrderComponent.vue'

/*import OrderDetailsComponent from './components/mb/OrderDetailsComponent.vue'*/

import AddressComponent from './components/mb/AddressComponent.vue'

/*import AddressCreateComponent from './components/mb/AddressCreateComponent.vue'

import AddressEditComponent from './components/mb/AddressEditComponent.vue'*/

import CardDetailsComponent from './components/mb/CardDetailsComponent.vue'

/*import CardDetailsCreateComponent from './components/mb/CardDetailsCreateComponent.vue'

import CardDetailsEditComponent from './components/mb/CardDetailsEditComponent.vue'*/

import ProfileComponent from './components/ProfileComponent.vue'

import ChangePasswordComponent from './components/ChangePasswordComponent.vue'

import CartComponent from './components/CartComponent.vue'

import CheckoutComponent from './components/CheckoutComponent.vue'



import NotFoundComponent from './components/NotFoundComponent.vue'



Vue.component('loading',{ template: '<div id="preloader"><div id="status">&nbsp;</div><a href="#" class="scroll_to_top icon-up" title="Scroll to top"><i class="fas fa-arrow-up"></i></a><div class="custom_html_section"></div></div>'})



Vue.use(VueRouter)

Vue.use(VueMeta)



Vue.config.ignoredElements = [/^rs-/]



Vue.mixin({

  data: function() {

    return {

      get apiRootUrl() {

        return config.api_root_url

      },

    }

  }

})



const router = new VueRouter({

    mode: 'history',

    routes: [

        {

        	path: '/',

        	name: 'home',

        	component: HomeComponent

        },

		{

			path: '/all-services',

			name: 'all_services',

			component: AllServicesComponent

		},

		{

			path: '/services/:slug',

			name: 'services',

			component: ServicesComponent

		},

		{

			path: '/service-details/:slug',

			name: 'service_details',

			component: ServiceDetailsComponent

		},

		{

			path: '/all-products',

			name: 'all_products',

			component: AllProductsComponent

		},

		{

			path: '/products/:slug',

			name: 'products',

			component: ProductsComponent

		},

		{

			path: '/product-details/:slug',

			name: 'product_details',

			component: ProductDetailsComponent

		},

		{

			path: '/testimonial',

			name: 'testimonial',

			component: TestimonialComponent

		},

		{

			path: '/blog',

			name: 'blog',

			component: BlogComponent

		},

		{

			path: '/blog-details/:slug',

			name: 'blog_details',

			component: BlogDetailsComponent

		},

		{

			path: '/contact-us',

			name: 'contact_us',

			component: ContactUsComponent

		},

		{

			path: '/about-us',

			name: 'about_us',

			component: AboutUsComponent

		},

		{

			path: '/privacy',

			name: 'privacy',

			component: PrivacyComponent

		},

		{

			path: '/faq',

			name: 'faq',

			component: FaqComponent

		},

		{

			path: '/register',

			name: 'register',

			component: RegisterComponent,

			meta: {

				withoutAuth: true

			}

		},

		{

			path: '/login',

			name: 'login',

			component: LoginComponent,

			meta: {

				withoutAuth: true

			}

		},

		{

			path: '/forget-password',

			name: 'forget_password',

			component: ForgetPasswordComponent,

			meta: {

				withoutAuth: true

			}

		},

		{

			path: '/reset-password/:token',

			name: 'reset_password',

			component: ResetPasswordComponent,

			meta: {

				withoutAuth: true

			}

		},

		{

			path: '/dashboard',

			name: 'dashboard',

			component: DashboardComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},

		{

			path: '/order',

			name: 'order',

			component: OrderComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},

		/*{

			path: '/order-details/:order_id',

			name: 'order_details',

			component: OrderDetailsComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},*/

		{

			path: '/address',

			name: 'address',

			component: AddressComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},

		/*{

			path: '/address-create',

			name: 'address_create',

			component: AddressCreateComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},

		{

			path: '/address-edit/:address_id',

			name: 'address_edit',

			component: AddressEditComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},*/

		{

			path: '/card-details',

			name: 'card_details',

			component: CardDetailsComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},

		/*{

			path: '/card-details-create',

			name: 'card_details_create',

			component: CardDetailsCreateComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},

		{

			path: '/card-details-edit/:card_id',

			name: 'card_details_edit',

			component: CardDetailsEditComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},*/

		{

			path: '/profile',

			name: 'profile',

			component: ProfileComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},

		{

			path: '/change-password',

			name: 'change-password',

			component: ChangePasswordComponent,

			meta: {

				requiresAuth: true,

				is_user: true

			}

		},

		{

			path: '/cart',

			name: 'cart',

			component: CartComponent

		},

		{

			path: '/checkout',

			name: 'checkout',

			component: CheckoutComponent

		},

		{

			path: '*',

			component: NotFoundComponent

		}

    ],

    scrollBehavior() {

        document.getElementById('app').scrollIntoView();

    }

})



router.beforeEach((to, from, next) => {

	$('.profile-menu').hide()

    $('#preloader').show()

    $('#preloader').find('#status').show()



    if(to.matched.some(record => record.meta.requiresAuth)){

        if(localStorage.getItem('imageno.jwt') == null){

            next({

                path: '/login',

                params: {

                	nextUrl: to.fullPath

                }

            })

        }else{

            next()

        }

    }else if(to.matched.some(record => record.meta.withoutAuth)){

        if(localStorage.getItem('imageno.jwt') == null){

            next()

        }else{

            next({

                path: '/profile',

                params: {

                	nextUrl: to.fullPath

                }

            })

        }

    }else{

    	next()

    }

})



router.afterEach(() => {

  	setTimeout(function(){

  		$('#preloader').hide()

    	$('#preloader').find('#status').hide()

  	}, 1000)

})



export default router