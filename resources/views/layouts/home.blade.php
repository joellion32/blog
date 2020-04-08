<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>LA BUENA NUEVA</title>
	<link rel="icon" type="image/png" href="{{asset('images/correo.png')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Weblog a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="{{ asset('css/single.css') }}">
	<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
	<link href="fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
		rel="stylesheet">
	<link href="{{ asset('css/contact.css') }}" rel='stylesheet' type='text/css' />
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<style>
		div.scrollmenu {
		  background-color: #f0f3f1;
		  overflow: auto;
		  white-space: nowrap;
		}

		div.scrollmenu .dropdown{
			background-color: black !important;		
		}
		
		div.scrollmenu a {
		  display: inline-block;
		  color: black;
		  text-align: center;
		  padding: 14px;
		  text-decoration: none;
		}
		
		div.scrollmenu a:hover {
		  background-color: #01cd74;
		  color: white;
		}

	/* On screens that are 992px wide or less, the background color is blue */
@media screen and (max-width: 1900px) {
  .contenido {
	margin-left: 10rem;
  }
}

@media screen and (max-width: 2000px) {
  .contenido {
	margin-left: 10rem;
  }
}

/* On screens that are 600px wide or less, the background color is olive */
@media screen and (max-width: 600px) {
  .contenido {
	margin-left: 0rem;
  }
}
</style>
</head>

<body>
	
	<header>	
		<nav style="background-color: #f0f3f1 !important;" class="navbar navbar-expand-lg p-2">
		<div class="col-md-4 log-icons text-right m-8">
		<span><b>Fecha: <?php 
		date_default_timezone_set('America/La_Paz');
			echo(date('d/m/Y'))?></b></span>
		</div>
	
		<div class="col-md-4 log-icons text-right m-8">
			<ul class="social_list1">
				<li>
					<a href="https://www.facebook.com/buenanuevard" target="_blank" class="facebook1 mx-2">
						<i class="fab fa-facebook-f"></i>
	
					</a>
				</li>
				<li>
					<a href="https://twitter.com/labuenanuevard" target="_blank" class="twitter2">
						<i class="fab fa-twitter"></i>
	
					</a>
				</li>
				<li>
					<a href="https://www.instagram.com/labuenanuevard/" target="_blank" class="dribble3 mx-2">
						<i class="fab fa-instagram"></i>
					</a>
				</li>
			</ul>
		</div>
	</nav>
	
			<div style="background-color:white !important;" class="top-bar_sub_w3layouts container-fluid">
				<div class="row">
					<div class="col-md-4 logo text-center">
					</div>
					<div class="col-md-4 top-forms text-center mt-lg-3 mt-md-1 mt-0 text-light">
						<img src="https://scontent.fhex4-1.fna.fbcdn.net/v/t1.15752-9/90560839_2555278891426963_6119785431329406976_n.jpg?_nc_cat=104&_nc_sid=b96e70&_nc_ohc=u8QidGaf3nYAX8W-a4_&_nc_ht=scontent.fhex4-1.fna&oh=e4415ae4ace0f4b96f2af8019634d912&oe=5EA6926A" style="width:100%;">					</div>
				</div>
			</div>
			<!--para el menu-->
			<div class="scrollmenu">
			<div class="contenido">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
					    Panorama Cristiano
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
						@foreach ($_SERVER['subcategorias'] as $subcategoria)
						<button class="dropdown-item" type="button"><a href="/subcategorias/{{$subcategoria->slug}}">{{$subcategoria->sub_categoria}}</a></button>
						@endforeach
					  </div>

				@foreach ($_SERVER['categorias'] as $categoria)
				<a href="/categorias/{{$categoria->slug}}">{{$categoria->nombre_categoria}}</a>
				@endforeach
				<a href="/editorial">Editorial</a>
				</div>
			  </div>
			
			  <nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" style="display:none;" href="#">Navbar</a>
				<button style="margin-left: -65px !important;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
			  
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				  <ul class="navbar-nav mr-auto">
					<li class="nav-item">
					  <a class="nav-link" href="/">INICIO <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="/sobre">SOBRE NOSOTROS</a>
					</li>
					<li class="nav-item">
					  <a class="nav-link" href="/contacto">CONTACTO</a>
					</li>
				  </ul>
				  <form action="/" method="get" class="form-inline my-2 my-lg-0 header-search">
					<input class="form-control mr-sm-2" type="search" placeholder="Buscar Aqui..." name="search" required="">
					<button class="btn btn1 my-2 my-sm-0" type="submit">
						<i class="fas fa-search"></i>
					</button>
				</form>
				</div>
			  </nav>
		</header>
		<!--//header-->

@yield('contenido')


    <!--footer-->
	<footer>
		
     <!-- footer -->
        <div class="footer-cpy text-center">
            <div class="logo">
				<a class="navbar-brand" href="/">La Buena Nueva</a>
            </div>

            <div class="footer-social">
                <div class="copyrighttop">
                    <ul>
                        <li class="mx-3">
                            <a class="facebook" href="https://www.facebook.com/buenanuevard">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a class="facebook" href="https://twitter.com/labuenanuevard">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                        </li>
                        <li>
                            <a class="facebook" href="https://www.instagram.com/labuenanuevard/">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="w3layouts-agile-copyrightbottom">
                <p>© <?php echo(date('Y'))?> LA BUENA NUEVA. Todos los derechos son | Sitio Desarrollado por PERSOFT
					
				</p>
				
				<a href="{{route('login')}}"><p>Iniciar sesion como administrador</p></a>

            </div>
        </div>

        <!-- //footer -->


    </div>
</footer>
<!---->

<!-- js -->
<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>

<!-- //Custom-JavaScript-File-Links -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{asset('js/ajax.js')}}"></script>
<!-- //js -->

<!--/ start-smoth-scrolling -->
<script src="{{ asset('js/move-top.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {
		// carrousel
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 900);
		});
		
		// carrousel
		$.ajax({
			type: "GET",
			url: "http://127.0.0.1:8000/carrousel",
			dataType: "JSON",
			success: function (response) {
				var data = response.data;
				if (data[0].imagen) {
                $("#slide").append(`<div class="carousel-item item2">
                <div class="carousel-caption">
                    <h3>${data[0].titulo}
                    </h3>
                </div>
            </div>
    
            <style>
            .carousel-item.item2 {
               background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/uploads/${data[0].imagen}) no-repeat;
               background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/uploads/${data[0].imagen}) no-repeat;
               background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/uploads/${data[0].imagen}) no-repeat;
               background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/uploads/${data[0].imagen}) no-repeat;
               background-size: cover;
           }
            </style>
            `);
            } else {
                $("#slide").append(`<div class="carousel-item item2">
                <div class="carousel-caption">
                    <h3>${data[0].titulo}
                    </h3>
                </div>
            </div>
    
            <style>
            .carousel-item.item2 {
               background: -webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/images/noimagen.png) no-repeat;
               background: -moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/images/noimagen.png) no-repeat;
               background: -ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/images/noimagen.png) no-repeat;
               background: linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url(/images/noimagen.png) no-repeat;
               background-size: cover;
           }
            </style>
            `);
            }
			}
		});
});
</script>
<!--// end-smoth-scrolling -->

<script>
    $(document).ready(function () {
        /*
                                var defaults = {
                                      containerID: 'toTop', // fading element id
                                    containerHoverID: 'toTopHover', // fading element hover id
                                    scrollSpeed: 1200,
                                    easingType: 'linear' 
                                 };
                                */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<a href="#home" class="scroll" id="toTop" style="display: block;">
    <span id="toTopHover" style="opacity: 1;"> </span>
</a>


    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>