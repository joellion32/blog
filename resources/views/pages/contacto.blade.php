@extends('layouts.home')

@section('contenido')
    <!--/banner-->
	<div class="banner-inner">
	</div>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">Inicio</a>
		</li>
		<li class="breadcrumb-item active">Contacto</li>
	</ol>
	<!--//banner-->
	<!--/main-->
	<section class="main-content-w3layouts-agileits">

		<h3 class="tittle">Contactanos</h3>
		<p class="sub text-center">Nos encanta discutir tu idea</p>
	
		<div class="ad-inf-sec bg-light">
			<div class="container">
				<div class="address row">

					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="far fa-map"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Direccion</h6>
								<p> Santo Domingo 
									Republica Dominicana 

								</p>
							</div>
						</div>

					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="far fa-envelope"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Email</h6>
								<p>
									<a href="mailto:labuenanuevard@gmail.com">labuenanuevard@gmail.com</a>

								</p>
							</div>

						</div>
					</div>
					<div class="col-lg-4 address-grid">
						<div class="row address-info">
							<div class="col-md-4 address-left text-center">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="col-md-8 address-right text-left">
								<h6>Telefono</h6>
								<p>+1 809-862-9569</p>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="contact_grid_right">
				@include('flash::message')

				<form action="/notificaciones/guardar" method="post">
					@csrf
					<div class="row contact_left_grid">
						<div class="col-md-6 con-left">
							<div class="form-group">
								<label for="validationCustom01 my-2">Nombre</label>
								<input class="form-control" type="text" name="nombre" placeholder="" required="">
							</div>
							<div class="form-group">
								<label for="exampleFormControlInput1">Email</label>
								<input class="form-control" type="email" name="email" placeholder="" required="">
							</div>
							<div class="form-group">
								<label for="validationCustom03 my-2">Titulo</label>
								<input class="form-control" type="text" name="titulo" placeholder="" required="">
							</div>
						</div>
						<div class="col-md-6 con-right">
							<div class="form-group">
								<label for="textarea">Mensaje</label>
								<textarea id="textarea" name="mensaje" placeholder=""></textarea>
							</div>
							<input class="form-control" type="submit" value="Enviar">

						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!--//main-->
@endsection