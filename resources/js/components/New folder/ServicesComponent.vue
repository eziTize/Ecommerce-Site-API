<template>
    <span>
        <section class="inner-title-main">
            <div class="container">
                <div class="inner-title-list">
                    <ul>
                        <li><a href="javascript:void(0);">Inicio</a></li>
                        <span v-for="menu in service.menu">
                            <li><a href="javascript:void(0);">| {{ menu }}</a></li>
                        </span>
                    </ul>
                </div>
            </div>
        </section>
        <section class="service-page">
            <div class="container">
                <div class="service-top-section">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ser-left">
                                <div class="service-l-img">
                                    <img src="assets/images/service-img.jpg">
                                </div>
                                <div class="service-sec-left-content">
                                    <div class="col-md-12 no-padding">
                                        <h2>Cómo funciona</h2>
                                    </div>
                                    <ul>
                                        <li>
                                            <span class="icon"><i class="far fa-check-square"></i></span>
                                            <span class="content">
                                                Elige el tipo de productos
                                                <span class="sub-content">Le ofrecemos los mejores productos.</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="far fa-file"></i></span>
                                            <span class="content">
                                                Elige los servicios que necesitas
                                                <span class="sub-content">Trabajaremos de acuerdo a su descripción..</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="far fa-clock"></i></span>
                                            <span class="content">
                                                Elige el tiempo
                                                <span class="sub-content">El trabajo se realiza en el menor tiempo.</span>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="icon"><i class="fab fa-opencart"></i></span>
                                            <span class="content">
                                                Servicios sin problemas
                                                <span class="sub-content">Informamos cuando el trabajo está hecho.</span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="service-title">{{ service.title }}</h2>
                            <div class="service-right">
                                <div class="corte-form">
                                    <form>
                                        <span v-for="form_field in service_form_fields">
                                            <div class="single-corte-list">
                                                <label>{{ form_field.title }}</label>
                                                <select class="in-sel" v-model="service_input[form_field.name]" v-on:change="getPrice">
                                                    <option value="">Seleccionar Opción</option>
                                                    <option v-for="field in form_field.options" :value="field.value">{{ field.name }}</option>
                                                </select>
                                            </div>
                                        </span>
                                        <!-- <div class="single-corte-list">
                                            <label>PRODUCTO</label>
                                            <select class="in-sel">
                                                <option>Gigantografia</option>
                                                <option>Gigantografia</option>
                                            </select>
                                        </div>
                                        <div class="single-corte-list">
                                            <label>DISEÑO GRÁFICO</label>
                                            <select class="in-sel">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="single-corte-list">
                                            <label>LAMINADO</label>
                                            <select class="in-sel">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="single-corte-list">
                                            <label>MATERIAL</label>
                                            <select class="in-sel">
                                                <option>Lona</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="single-corte-list">
                                            <label>UNIDAD DE MEDIDA</label>
                                            <select class="in-sel">
                                                <option>Metro</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="single-corte-list">
                                            <label>INSTALACION</label>
                                            <select class="in-sel">
                                                <option>SI</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="single-corte-list">
                                            <label>INGRESE ALTO</label>
                                            <input type="text" name="" class="in-sel">
                                        </div>
                                        <div class="single-corte-list">
                                            <label>INGRESE ANCHO</label>
                                            <input type="text" name="" class="in-sel">
                                        </div>
                                        <div class="single-corte-list">
                                            <label>CANTIDAD</label>
                                            <input type="text" name="" class="in-sel">
                                        </div> -->
                                    </form>
                                </div>
                                <div class="corte-btn">
                                    <div class="row">
                                        <h2 class="service-title" v-if="price>0">Precio: ${{ price | numFormat('0.00') }}</h2>
                                        <div class="col-md-6">
                                            <div class="single-box-btn">
                                                <a href="javascript:void(0);" class="sing-f1" v-on:click="addToCart"><i class="fas fa-cart-arrow-down"></i> AÑADIR AL CARRITO</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-box-btn">
                                                <a href="javascript:void(0);"><i class="fas fa-shopping-bag"></i> COMPRA AHORA</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="servies-similor">
                    <div class="col-md-12">
                        <h2 class="padicol-title">Servicios similares</h2>
                    </div>
                    <div class="padicol-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-pedicol">
                                    <div class="padicolo-img">
                                        <img src="assets/images/service-round1.jpg">
                                    </div>
                                    <div class="padiclo-con">
                                        <h4>IMPRESIÓN 3D</h4>
                                        <a href="javascript:void(0);">Ver detalles</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-pedicol">
                                    <div class="padicolo-img">
                                        <img src="assets/images/service-round2.jpg">
                                    </div>
                                    <div class="padiclo-con">
                                        <h4>SITIOS WEB</h4>
                                        <a href="javascript:void(0);">Ver detalles</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="single-pedicol">
                                    <div class="padicolo-img">
                                        <img src="assets/images/service-round3.jpg">
                                    </div>
                                    <div class="padiclo-con">
                                        <h4>IMPRESIÓN EXPRESS / PAPELERÍA</h4>
                                        <a href="javascript:void(0);">Ver detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2 class="padicol-title">Valoración de los clientes</h2>
                    </div>
                </div>
                <div class="after-coment">
                    <p>Comparta una reseña y vea lo que dicen otros clientes.</p>
                    <h2>Comentarios</h2>
                    <div class="after-c-rivew">
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <div class="stars">
                                    <i class="fa fa-star gold" aria-hidden="true"></i>
                                    <i class="fa fa-star gold" aria-hidden="true"></i>
                                    <i class="fa fa-star gold" aria-hidden="true"></i>
                                    <i class="fa fa-star gold" aria-hidden="true"></i>
                                    <i class="fa fa-star gold" aria-hidden="true"></i>
                                </div>
                                <div class="star-details">
                                    <span>4.0</span>
                                    <p>7590 Comentarios</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="after-c-review-btn">
                                    <a href="javascript:void(0);">Escribe una reseña</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-12">
                                <div class="after-c-dis">
                                    <span>85%</span>
                                    <p>de los encuestados recomendarían esto a un amigo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ratting-bar">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="ratting-bar-left">
                                <div class="pull-left">
                                    <div class="bar-leftcon">5 estrellas</div>
                                    <div class="pull-left progress-main">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 100%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right bar-rightcon" style="margin-left:10px;">3087</div>
                                </div>
                                <div class="pull-left">
                                    <div class="bar-leftcon">5 estrellas</div>
                                    <div class="pull-left progress-main">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right bar-rightcon" style="margin-left:10px;">1879</div>
                                </div>
                                <div class="pull-left">
                                    <div class="bar-leftcon">5 estrellas</div>
                                    <div class="pull-left progress-main">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right bar-rightcon" style="margin-left:10px;">1138</div>
                                </div>
                                <div class="pull-left">
                                    <div class="bar-leftcon">5 estrellas</div>
                                    <div class="pull-left progress-main">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right bar-rightcon" style="margin-left:10px;">700</div>
                                </div>
                                <div class="pull-left">
                                    <div class="bar-leftcon">5 estrellas</div>
                                    <div class="pull-left progress-main">
                                        <div class="progress" style="height:9px; margin:8px 0;">
                                            <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right bar-rightcon" style="margin-left:10px;">157</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="star-rating-box">
                                <p>Facilidad de diseño</p>
                                <div class="stars">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="star-details">
                                    <span>4.0</span>
                                </div>
                            </div>
                            <div class="star-rating-box">
                                <p>Facilidad de diseño</p>
                                <div class="stars">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="star-details">
                                    <span>4.0</span>
                                </div>
                            </div>
                            <div class="star-rating-box">
                                <p>Facilidad de diseño</p>
                                <div class="stars">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="star-details">
                                    <span>4.0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-section" style="width: 100%;float: left;">
                    <div class="comment-title">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <p>Revisado por 7590 clientes</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="javascript:void(0);">El mejor valorado <i class="fas fa-angle-down" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="single-comment-box">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="comment-box-left">
                                    <div class="stars">
                                        <i class="fa fa-star gold" aria-hidden="true"></i>
                                        <i class="fa fa-star gold" aria-hidden="true"></i>
                                        <i class="fa fa-star gold" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="star-details">
                                        <span>4.0</span>
                                    </div>
                                    <div class="comment-content-section">
                                        <h2>El producto fue genial!</h2>
                                        <h6>Enviado hace 5 días Por AnthonyDe Larchmont, NY</h6>
                                        <p>Una sugerencia para el envío de pancartas de tal altura, envolviendo la pancarta alrededor de un tubo de cartón que no se dobla, aseguraría que la pancarta no llegue agrietada.</p>
                                        <a href="javascript:void(0);">Más detalles <i class="fas fa-angle-down" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="comment-box-right">
                                    <h3><strong>Conclusión Sí,</strong> se lo recomendaría a un amigo</h3>
                                    <div class="like-box">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="like-body">
                                                    <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="like-content-left">
                                                    <p>Fue esta revisión útil para usted?</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="like-content-right">
                                                    <p>Marcar esto revisión</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <div class="like-body">
                                                    <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button> 
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-comment-box">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="comment-box-left">
                                    <div class="stars">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="star-details">
                                        <span>4.0</span>
                                    </div>
                                    <div class="comment-content-section">
                                        <h2>El producto fue genial!</h2>
                                        <h6>Enviado hace 5 días Por AnthonyDe Larchmont, NY</h6>
                                        <p>Una sugerencia para el envío de pancartas de tal altura, envolviendo la pancarta alrededor de un tubo de cartón que no se dobla, aseguraría que la pancarta no llegue agrietada.</p>
                                        <a href="javascript:void(0);">Más detalles <i class="fas fa-angle-down" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="comment-box-right">
                                    <h3><strong>Conclusión Sí,</strong> se lo recomendaría a un amigo</h3>
                                    <div class="like-box">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="like-body">
                                                    <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="like-content-left">
                                                    <p>Fue esta revisión útil para usted?</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="like-content-right">
                                                    <p>Marcar esto revisión</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <div class="like-body">
                                                    <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button> 
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-comment-box">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="comment-box-left">
                                    <div class="stars">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="star-details">
                                        <span>4.0</span>
                                    </div>
                                    <div class="comment-content-section">
                                        <h2>El producto fue genial!</h2>
                                        <h6>Enviado hace 5 días Por AnthonyDe Larchmont, NY</h6>
                                        <p>Una sugerencia para el envío de pancartas de tal altura, envolviendo la pancarta alrededor de un tubo de cartón que no se dobla, aseguraría que la pancarta no llegue agrietada.</p>
                                        <a href="javascript:void(0);">Más detalles <i class="fas fa-angle-down" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="comment-box-right">
                                    <h3><strong>Conclusión Sí,</strong> se lo recomendaría a un amigo</h3>
                                    <div class="like-box">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="like-body">
                                                    <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="like-content-left">
                                                    <p>Fue esta revisión útil para usted?</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="like-content-right">
                                                    <p>Marcar esto revisión</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <div class="like-body">
                                                    <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button> 
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-comment-box">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="comment-box-left">
                                    <div class="stars">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="star-details">
                                        <span>4.0</span>
                                    </div>
                                    <div class="comment-content-section">
                                        <h2>El producto fue genial!</h2>
                                        <h6>Enviado hace 5 días Por AnthonyDe Larchmont, NY</h6>
                                        <p>Una sugerencia para el envío de pancartas de tal altura, envolviendo la pancarta alrededor de un tubo de cartón que no se dobla, aseguraría que la pancarta no llegue agrietada.</p>
                                        <a href="javascript:void(0);">Más detalles <i class="fas fa-angle-down" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="comment-box-right">
                                    <h3><strong>Conclusión Sí,</strong> se lo recomendaría a un amigo</h3>
                                    <div class="like-box">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <div class="like-body">
                                                    <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
                                                    <span>0</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="like-content-left">
                                                    <p>Fue esta revisión útil para usted?</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="like-content-right">
                                                    <p>Marcar esto revisión</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <div class="like-body">
                                                    <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button> 
                                                    <span>0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="prduct-last-sec">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Visualización de comentarios 1-4</p>
                            </div>
                            <div class="col-md-6">
                                <a href="javascript:void(0);">Próximo <i class="fas fa-angle-double-right" aria-hidden="true"></i></a>
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
        props : ['nextUrl'],
        data() {
            return {
                service: {},
                service_form_fields: {},
                service_input: {},
                price: 0
            }
        },
        methods: {
            fetchData() {
                axios.get(this.apiRootUrl+'/service_details/'+this.$route.params.slug).then(response => {
                    let data = response.data
                    if(!data.status){
                        let nextUrl = this.$route.params.nextUrl
                        this.$router.push((nextUrl != null ? nextUrl : '/'))
                    }
                    this.service = data.data
                    axios.get(this.apiRootUrl+'/service_form_field/'+this.$route.params.slug).then(response => {
                        let data = response.data
                        this.service_form_fields = data.data

                        let service_input = this.service_input
                        data.data.map(function(val) {
                            service_input[val.name] = ""
                        })
                    })
                })
            },
            getPrice(e) {
                e.preventDefault()
                let service_input = this.service_input
                axios.post(this.apiRootUrl+'/service_formula/'+this.$route.params.slug, {
                    service_input
                }).then(response => {
                    let data = response.data
                    if(!data.status){
                        this.price = 0
                    }else{
                        this.price = data.data
                    }
                })
            },
            addToCart(e) {
                e.preventDefault()
                if(this.price>0){
                    let service_cart = []
                    let service_cart_item = {
                        title: this.service.title,
                        description: '',
                        price: this.price,
                        qty: 1,
                        val: {
                            service_form_fields: this.service_form_fields
                        }
                    }

                    if(localStorage.getItem('imageno.service_cart') != null){
                        service_cart = JSON.parse(localStorage.getItem('imageno.service_cart'))
                    }
                    service_cart.push(service_cart_item)
                    
                    localStorage.setItem('imageno.service_cart', JSON.stringify(service_cart))
                    let nextUrl = this.$route.params.nextUrl
                    this.$router.push((nextUrl != null ? nextUrl : '/cart'))
                }
            }
        },
        watch: {
            '$route.params': {
                handler(newValue) {
                    const { slug } = newValue
                    this.service = {}
                    this.service_form_fields = {}
                    this.service_input = {}
                    this.price = 0
                    this.fetchData(slug)
                },
                immediate: true,
            }
        }
    }
</script>

<style scoped>
    
</style>