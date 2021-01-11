<template>
    <span>
        <section class="inner-title-main">
            <div class="container">
                <div class="inner-title-list">
                    <ul>
                        <!-- <li><a href="index.html">Home </a> <i class="fas fa-angle-right" aria-hidden="true"></i> </li> -->
                        <li><a href="blogs.html">Casa</a> | </li>
                        <li><a href="blogs.html">Otros Serviciss</a> | </li>
                        <li><a href="blogs.html">Carrito de compras</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="cart-page">
            <div class="container">
                <span v-if="service_cart.length">
                    <div class="single-cart" v-for="(cart,ckey) in service_cart">
                        <div class="col-md-12 no-padding">
                            <div class="cart-heading-img"><!-- <img src="assets/images/cart-heading-im.png"> --></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="cart-sin-img"><img src="assets/images/cart-img1.jpg"></div>
                            </div>
                            <div class="col-md-8">
                                <div class="cart-discription">
                                    <h2>{{ cart.title }}</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="num-block skin-1">
                                                <label>Cantidad</label>
                                                <div class="num-in">
                                                    <span class="minus dis" @click="reduceQty($event,ckey)"></span>
                                                    <input type="text" class="in-num" :value="cart.qty" readonly>
                                                    <span class="plus" @click="increaseQty($event,ckey)"></span>
                                                    <span @click="removeFromCart($event,ckey)">X</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="cart-price">
                                                <p>Precio base : <span>${{ cart.price | numFormat('0.00') }}</span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card-con">
                                                <h3>Detalles de producto</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepcional sint occasionecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="codgo">
                                    <h3>Codigo promocional</h3>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-total">
                                    <a href="javascript:void(0);">Tienes un código de promoción?</a>
                                    <h3>Producto total</h3>
                                </div>
                                <h4 class="cart-h">${{ (cart.price*cart.qty) | numFormat('0.00') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="total-cart-section">
                        <div class="col-md-12 text-right">
                            <div class="toda-cad">
                                <label>Toda la cantidad total:</label>
                                <span>${{ total_price | numFormat('0.00') }}</span>
                            </div>
                        </div>
                        <div class="c-l-btn">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="cart-last-btn-l">
                                        <a href="javascript:void(0);">Seguir Comprando</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-last-btn-r"> <router-link to="/checkout">Revisa</router-link> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
                <span v-else>
                    <div class="single-cart"><div class="single-box-btn">No se agregó ningún artículo al carrito</div></div>
                </span>
                <div class="partidos-section">
                    <div class="col-md-12 no-padding">
                        <h2 class="padicol-title">Partidos hechos al instante, solo para ti.</h2>
                    </div>
                    <div class="padicol-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-pedicol">
                                    <div class="padicolo-img"><img src="assets/images/padicol1.jpg"></div>
                                    <div class="padiclo-con">
                                        <h4>Carteles</h4>
                                        <p>100 comienza en $ 16.00</p>
                                        <div class="padicol-sel">
                                            <label>cant</label>
                                            <select>
                                                <option>100</option>
                                                <option>200</option>
                                            </select>
                                        </div>
                                        <a href="javascript:void(0);">Editar y ordenar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-pedicol">
                                    <div class="padicolo-img"><img src="assets/images/padicol1.jpg"></div>
                                    <div class="padiclo-con">
                                        <h4>Carteles</h4>
                                        <p>100 comienza en $ 16.00</p>
                                        <div class="padicol-sel">
                                            <label>cant</label>
                                            <select>
                                                <option>100</option>
                                                <option>200</option>
                                            </select>
                                        </div>
                                        <a href="javascript:void(0);">Editar y ordenar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-pedicol">
                                    <div class="padicolo-img"><img src="assets/images/padicol1.jpg"></div>
                                    <div class="padiclo-con">
                                        <h4>Carteles</h4>
                                        <p>100 comienza en $ 16.00</p>
                                        <div class="padicol-sel">
                                            <label>cant</label>
                                            <select>
                                                <option>100</option>
                                                <option>200</option>
                                            </select>
                                        </div>
                                        <a href="javascript:void(0);">Editar y ordenar</a>
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
        metaInfo: {
            titleTemplate: 'Cart - %s'
        },
        props : ['nextUrl'],
        data() {
            return {
                service_cart: [],
                total_price: 0
            }
        },
        mounted() {
            this.getCart()
            // localStorage.removeItem('imageno.service_cart')
            // console.log(localStorage.getItem('imageno.service_cart'))
        },
        methods : {
            getTotalPrice() {
                let total_price = 0
                this.service_cart.map(function(cart) {
                    total_price += (cart.price*cart.qty)
                })
                this.total_price = total_price
            },
            getCart() {
                if(localStorage.getItem('imageno.service_cart') != null){
                    this.service_cart = JSON.parse(localStorage.getItem('imageno.service_cart'))
                    this.getTotalPrice()
                }
            },
            reduceQty(e,ckey) {
                e.preventDefault()
                let qty = this.service_cart[ckey].qty
                if(qty > 1){
                    this.service_cart[ckey].qty = (qty-1)
                    localStorage.setItem('imageno.service_cart', JSON.stringify(this.service_cart))
                    this.getTotalPrice()
                }
            },
            increaseQty(e,ckey) {
                e.preventDefault()
                let qty = this.service_cart[ckey].qty
                this.service_cart[ckey].qty = (qty+1)
                localStorage.setItem('imageno.service_cart', JSON.stringify(this.service_cart))
                this.getTotalPrice()
            },
            removeFromCart(e,ckey) {
                e.preventDefault()
                this.service_cart.splice(ckey, 1)
                localStorage.setItem('imageno.service_cart', JSON.stringify(this.service_cart))
                this.getTotalPrice()
            }
        }
    }
</script>

<style scoped>
    
</style>