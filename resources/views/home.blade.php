<!DOCTYPE html>

<html lang="en" class="notranslate" translate="no">

	<head>

    <meta name="google" content="notranslate" />

     <base href="https://imageno.test/"> 

  <!-- <base href="https://imageno.rentapg.com/"> -->

		<title>Imageno</title>

    <meta name="csrf-token" content="{{csrf_token()}}">

		<meta name="robots" content="noindex,nofollow" />

		<meta charset="UTF-8" />

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,600&display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,700i,800,800i,900&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

		<link rel="stylesheet" id="wc-block-style-css"  href="{{ asset('assets/css/style.css') }}" type="text/css" media="all" />

		<link rel="stylesheet" id="essential-grid-plugin-settings-css"  href="{{ asset('assets/css/settings.css') }}" type="text/css" media="all" />

		<link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">

		<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/dashbord.css') }}" rel="stylesheet">

		<link rel="icon" type="image/png" href="{{ asset('assets/images/fav.png') }}" sizes="32x32">

		<link rel="stylesheet" href="{{ asset('assets/css/navigation.css') }}">

		<link rel="stylesheet" id="rs-plugin-settings-css"  href="{{ asset('assets/css/rs6.css') }}" type="text/css" media="all" />

		<link rel="stylesheet" id="melodyschool-animation-style-css"  href="{{ asset('assets/css/core.animation.css') }}" type="text/css" media="all" />

		<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">

		<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" type="text/css" media="all" />

		<link rel="stylesheet" id="melodyschool-responsive-style-css"  href="{{ asset('assets/css/responsive.css') }}" type="text/css" media="all" />

    <link href="{{ asset('assets/css/devcustom.css') }}" rel="stylesheet">

		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('assets/js/jquery-migrate.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('assets/js/revolution.tools.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('assets/js/rs6.min.js') }}"></script>

		<script type="text/javascript">

			function setREVStartSize(t){try{var h,e=document.getElementById(t.c).parentNode.offsetWidth;if(e=0===e||isNaN(e)?window.innerWidth:e,t.tabw=void 0===t.tabw?0:parseInt(t.tabw),t.thumbw=void 0===t.thumbw?0:parseInt(t.thumbw),t.tabh=void 0===t.tabh?0:parseInt(t.tabh),t.thumbh=void 0===t.thumbh?0:parseInt(t.thumbh),t.tabhide=void 0===t.tabhide?0:parseInt(t.tabhide),t.thumbhide=void 0===t.thumbhide?0:parseInt(t.thumbhide),t.mh=void 0===t.mh||""==t.mh||"auto"===t.mh?0:parseInt(t.mh,0),"fullscreen"===t.layout||"fullscreen"===t.l)h=Math.max(t.mh,window.innerHeight);else{for(var i in t.gw=Array.isArray(t.gw)?t.gw:[t.gw],t.rl)void 0!==t.gw[i]&&0!==t.gw[i]||(t.gw[i]=t.gw[i-1]);for(var i in t.gh=void 0===t.el||""===t.el||Array.isArray(t.el)&&0==t.el.length?t.gh:t.el,t.gh=Array.isArray(t.gh)?t.gh:[t.gh],t.rl)void 0!==t.gh[i]&&0!==t.gh[i]||(t.gh[i]=t.gh[i-1]);var r,a=new Array(t.rl.length),n=0;for(var i in t.tabw=t.tabhide>=e?0:t.tabw,t.thumbw=t.thumbhide>=e?0:t.thumbw,t.tabh=t.tabhide>=e?0:t.tabh,t.thumbh=t.thumbhide>=e?0:t.thumbh,t.rl)a[i]=t.rl[i]<window.innerWidth?0:t.rl[i];for(var i in r=a[0],a)r>a[i]&&0<a[i]&&(r=a[i],n=i);var d=e>t.gw[n]+t.tabw+t.thumbw?1:(e-(t.tabw+t.thumbw))/t.gw[n];h=t.gh[n]*d+(t.tabh+t.thumbh)}void 0===window.rs_init_css&&(window.rs_init_css=document.head.appendChild(document.createElement("style"))),document.getElementById(t.c).height=h,window.rs_init_css.innerHTML+="#"+t.c+"_wrapper { height: "+h+"px }"}catch(t){console.log("Failure at Presize of Slider:"+t)}};

		</script>

	</head>



	<body class="notranslate" translate="no">

		

		<div id="app">

	        <App></App>

	    </div>

	    <script src="{{ asset('js/app.js') }}"></script>



		<script type="text/javascript" src="{{ asset('assets/js/jquery.slidemenu.js') }}"></script>

		<script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

		<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>

		<script src="{{ asset('assets/js/navigation.js') }}"></script>

		<script type="text/javascript" src="{{ asset('assets/js/jquery.themepunch.essential.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('assets/js/jquery.esgbox.min.js') }}"></script>

		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

		<script src="{{ asset('assets/js/font_awasome.js') }}"></script>

		<script src="{{ asset('assets/js/aos.js') }}"></script>



		<script type="text/javascript">

            AOS.init();



            function myFunction(x) {

  				x.classList.toggle("change");

			}



  			$(document).ready(function() {

        		$(".fa-search").click(function() {

           			$(".search-box").toggle();

           			$("input[type='text']").focus();

         		});

        	});



  			$(document).ready(function(){

  				$('a[href="#search"]').on('click', function(event) {                    

    				$('#search').addClass('open');

    				$('#search > form > input[type="search"]').focus();

  				});            

  				$('#search, #search button.close').on('click keyup', function(event) {

    				if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {

      					$(this).removeClass('open');

    				}

  				});            

			});



  			$(function(){

  				var navbar = $('.main-desktopp-menu-bg');

  

  				$(window).scroll(function(){

    				if($(window).scrollTop() <= 40){

      					navbar.removeClass('navbar-scroll');

    				} else {

      					navbar.addClass('navbar-scroll');

    				}

  				});

			});



			$(window).on('load', function() { // makes sure the whole site is loaded 

  				$('#status').fadeOut(); // will first fade out the loading animation 

  				$('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 

  				$('body').delay(350).css({'overflow':'visible'});

			});



			$(function() {

    			var deg = 0;

    			var rotate = 1;

    			var club_rotate = setInterval(club_rotate, 75);

    			$('.circle-item > li').not(".circle-item > *:nth-of-type(8)").mouseenter(function() {

        			rotate = 0

				});

    			$('.circle-item > li').not(".circle-item > *:nth-of-type(8)").mouseleave(function() {

        			rotate = 1

    			});

    			function club_rotate() {

        			if (rotate == 0) {

            			return

        			}

        			deg = get_deg(deg + 1);

        			var deg0 = deg;

        			var $data = $('.circle-item').children().not(".circle-item > *:nth-of-type(8)");

        			var length = 30;

        			if ($(window).width() <= 540) {

            			length = 7

        			}

        			$data.each(function() {

            			$(this).css("-webkit-transform", "rotate(" + deg0 + "deg) translate(" + length + "em) rotate(-" + deg0 + "deg)").css("transform", "rotate(" + deg0 + "deg) translate(" + length + "em) rotate(-" + deg0 + "deg)");

            			deg0 = get_deg(deg0 + 51)

        			});

    			}



    			function get_deg(deg0) {

        			if (deg0 > 360)

            			return (deg0 - 360);

        			else return deg0

    			}

			});



      		var btn = $('#button');



			$(window).scroll(function() {

  				if ($(window).scrollTop() > 300) {

    				btn.addClass('show');

  				} else {

    				btn.removeClass('show');

  				}

			});



			btn.on('click', function(e) {

  				e.preventDefault();

  				$('html, body').animate({scrollTop:0}, '300');

			});



    		$('.dropdown-toggle').click(function(e) {

  				e.preventDefault();

  				e.stopPropagation();

  				$(this).closest('.search-dropdown').toggleClass('open');

			});



			$('.dropdown-menu > li > a').click(function(e) {

  				e.preventDefault();

  				var clicked = $(this);

  				clicked.closest('.dropdown-menu').find('.menu-active').removeClass('menu-active');

  				clicked.parent('li').addClass('menu-active');

  				clicked.closest('.search-dropdown').find('.toggle-active').html(clicked.html());

			});



			$(document).click(function() {

  				$('.search-dropdown.open').removeClass('open');

			});



			$(window).scroll(function() {

  				if ($(document).scrollTop() > 0) {

    				$('.all-nav').addClass('color-change');

  				} else {

    				$('.all-nav').removeClass('color-change');

				}

			});



    		if(document.getElementById('vid') !== null){

    			document.getElementById('vid').play();

    		}

    		if(document.getElementById('vid2') !== null){

    			document.getElementById('vid2').play();

    		}

		</script>

	</body>

</html>