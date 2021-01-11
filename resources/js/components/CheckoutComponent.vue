<template>
    <span>
        <section class="inner-title-main edit-checkout-inner">
            <div class="container">
                <div class="inner-title-list">
                    <ul>
                        <!-- <li><a href="index.html">Home </a> <i class="fas fa-angle-right" aria-hidden="true"></i> </li> -->
                        <li><a href="javascript:void(0);">Cosa</a> | </li>
                        <li><a href="javascript:void(0);">Otros Serviciss</a> | </li>
                        <li><a href="javascript:void(0);">Carrito de compras</a> | </li>
                        <li><a href="javascript:void(0);">Envio</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="checkout-main">
            <section class="checkout-edit-page">
                <div class="container">
                    <div class="form-bg">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="paypal">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <h3 class="about-title edit-checkout">Dirección de Envío</h3>
                                                <div class="mandotry-title text-center"><span class="mandetory">*</span> Campos requeridos</div>
                                            </div>
                                            <label class=" control-label"><span class="mandetory">*</span> Nombre:</label>
                                            <input type="text" class="form-control" placeholder="">

                                            <label class=" control-label"><span class="mandetory">*</span> Apellido:</label>
                                            <input type="text" class="form-control" placeholder="">

                                            <label class=" control-label"> Empresa: </label>
                                            <input type="text" class="form-control" placeholder="">

                                            <label class=" control-label"><span class="mandetory">*</span> Dirección: </label>
                                            <input type="text" class="form-control" placeholder="">

                                            <label class=" control-label">  Edificio / Apt: </label>
                                            <input type="text" class="form-control" placeholder="">

                                            <label class=" control-label"><span class="mandetory">*</span> Ciudad: </label>
                                            <input type="text" class="form-control" placeholder="">

                                            <label class=" control-label"><span class="mandetory">*</span> State/Region </label>
                                            <select class="control-select" >
                                                <option>State1</option>
                                                <option>State2</option>
                                                <option>State3</option>
                                                <option>State4</option>
                                                <i class="fas fa-angle-down"></i>
                                            </select>

                                            <label class=" control-label"><span class="mandetory">*</span> Código postal / Código postal: </label>
                                            <input type="text" class="form-control" placeholder="">

                                            <label class=" control-label"><span class="mandetory">*</span> País: </label>
                                            <select class="control-select">
                                                <option>United States of America</option>
                                                <option>Pais2</option>
                                                <option>Pais3</option>
                                                <option>Pais4</option>
                                            </select>

                                            <label class=" control-label"><span class="mandetory">*</span> Teléfono: </label>
                                            <input type="text" class="form-control" placeholder="">
                                            <div class="direction-body">
                                                <h4>Dirección de Envio</h4>
                                                <label>
                                                    <input type="checkbox"> Usar mi dirección de envío como mi dirección de facturación
                                                </label>
                                            </div>
                                            <div class="direction2">
                                                <h4>Dirección de Envio</h4>
                                                <p>Detalles de envío y entrega</p>
                                            </div>
                                            <div class="radio radio-body">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked=""><p>Expreso: $ 29.99</p>
                                                    <span>Fecha estimada de entrega 16 de junio.</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked=""><p> Prioridad: $ 11.99 </p>
                                                    <span>Fecha estimada de entrega 18 de junio.</span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" checked=""><p> Estándar: $ 8.99 </p>
                                                    <span> Fecha estimada de entrega 22 de junio. </span>
                                                </label>
                                            </div>

                                            <div class="cra-anu">
                                                <h4>Crea una cuenta o inicia sesión</h4>
                                            </div>
                                            <label class=" control-label"> <span class="mandetory">*</span> Correo electrónico: </label>
                                            <input type="text" class="form-control" placeholder="">

                                            <label class=" control-label"><span class="mandetory">*</span> Contraseña: </label>
                                            <input type="text" class="form-control" placeholder="">
                                            <div class="regretis">
                                                <p>Regístrese para recibir correos electrónicos exclusivos y reciba un 15% de descuento en su primer pedido. Solo se puede usar un código promocional por pedido</p>
                                            </div>
                                            <div class="radio2">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">Sí, me gustaría recibir ofertas especiales de Vistaprint, así como noticias sobre productos, servicios y mis diseños en progreso.<a href="javascript:void(0);">Lee nuestra política de privacidad.</a>
                                                </label>
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked="">No gracias.
                                                </label>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-default sub-btn">Próximo</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </span>
</template>

<script>
    export default {
        metaInfo: {
            titleTemplate: 'Checkout - %s'
        }
    }
</script>

<style scoped>
    
</style>