@extends('layouts.home')

@section('contenido')
	<!--/banner-->
	<div class="banner">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			</ol>
			<div id="slide" class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<div class="carousel-caption">
						<h3>Enterate de las noticias cristianas
						</h3>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!--/model-->

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Publicaciones</li>
</ol>
<!--//banner-->

<!--/main-->
<section style="padding:0px !important;" class="main-content-w3layouts-agileits mb-8">
    <div class="container">

		@if (count($posts))

        <div class="row inner-sec">
            <!--left-->
            <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
                <div class="row mb-4">
				  <!--Posts-->
				  @foreach ($posts as $post)
				  <div class="col-md-6 card">
					  <a href="/post/detalle/{{$post->slug}}">
						  @if ($post->imagen)
                    <img style="width:320px; height:200px;" src="/uploads/{{$post->imagen}}" alt="image" class="img-fluid" />
					  @else
						  <video width="300" height="240" controls>
							  <source src="/videos/{{$post->video}}" type="video/mp4">
							  Your browser does not support the video tag.
							</video>				  
					  @endif
					  </a>
					  <div class="card-body">
						  <h5 class="card-title mt-2">
							  <a href="/post/detalle/{{$post->slug}}">{{$post->titulo}}</a>
						  </h5>
						  <p class="card-text mb-3 texto">{{$post->cabeza}}</p>

						  <ul class="blog-icons my-1">
							<li>
								<a href="#">
									<i class="far fa-calendar-alt"></i>{{$post->created_at}}</a>
							</li>
							<li class="mx-2">
								<a href="#">
									<i class="far fa-comment"></i>{{$post->comments->count()}}</a>
							</li>
							<li>
								<a href="#">
									<i class="fas fa-eye"></i> {{$post->vistas}}</a>
							</li>
	
						</ul>
					  </div>
				  </div>
				  @endforeach
				  
                </div><!--cierre del row-->
                <nav aria-label="Page navigation example">
                    {{$posts->links()}}
                </nav>
			</div>
			

            <!--//left-->
            <!--right-->
				<aside class="col-lg-4 agileits-w3ls-right-blog-con text-left">
					<div class="right-blog-info text-left">
						<div class="tech-btm">
							<img src="{{asset('images/banner1.jpg')}}" class="card-img-top img-fluid" alt="">
						</div>
						<div class="tech-btm">
							<h4>Suscribete a nuestra pagina</h4>
							<p>Suscribete para que recibas todos los posts por correo </p>
							<form action="#" method="post">
								<input type="email" placeholder="Email" required="">
								<button onclick="Swal.fire('Mensaje enviado correctamente')" class="btn btn-success btn-block">Suscribete</button>
							</form>

						</div>
						<div class="tech-btm">
							<h4>Secciones</h4>
							<div class="list-group">
								@foreach ($secciones as $seccion)
								<a href="/categorias/{{$seccion->slug}}" class="list-group-item list-group-item d-flex justify-content-between align-items-center text-dark">
									{{$seccion->nombre_categoria}}
									<span class="badge badge-success badge-pill">{{$seccion->posts->count()}}</span>
								</a>
								@endforeach
							  </div>
						</div>
						
						<div class="single-gd tech-btm text-left">
                            <h4>Post Reciente</h4>
                            @foreach ($reciente as $item)
                            <div class="blog-grids">
								<div class="blog-grid-left">
									<a href="/post/detalle/{{$item->slug}}">
										@if ($item->imagen)
										<img  style="width:200px; height:100px;" src="/uploads/{{$item->imagen}}" class="card-img-top img-fluid" alt="image">
									    @else
										<img src="/images/noimage.png" style="width:30%;" class="card-img-top img-fluid" alt="image">
										@endif									
									</a>
								</div>
								<div class="blog-grid-right">

									<h5>
										<a href="single.html">{{$item->titulo}}</a>
									</h5>
								</div>
								<div class="clearfix"> </div>
							</div>
                            @endforeach
						</div>
				


						<div class="tech-btm widget_social text-left">
							<h4>Siguenos</h4>
							<ul>
	
								<li>
									<a class="twitter" href="https://twitter.com/labuenanuevard" target="_blank">
										<i class="fab fa-twitter"></i>
										<span class="count">Twitter</a>
								</li>
								<li>
									<a class="facebook" href="https://www.facebook.com/buenanuevard" target="_blank">
										<i class="fab fa-facebook-f"></i>
										<span class="count">Facebook</a>
								</li>
	
								<li>
									<a class="facebook" style="background-color:#3f729b !important;" href="https://www.instagram.com/labuenanuevard/" target="_blank">
										<i class="fab fa-instagram"></i>
										<span class="count">Instagram</a>
								</li>
							</ul>
						</div>
						
					<div class="tech-btm">
						<h4>Posts Recientes</h4>
                        @foreach ($recientes as $reciente)
                        <div class="blog-grids row mb-3 text-left">
							<div class="col-md-5 blog-grid-left">
								<a href="/post/detalle/{{$reciente->slug}}">
									@if ($reciente->imagen)
									<img style="width:200px; height:100px;" src="/uploads/{{$reciente->imagen}}" class="card-img-top img-fluid" alt="image">
									@else
									<img src="/images/noimage.png" style="width:95%; height:80%;" class="card-img-top img-fluid" alt="image">
									@endif
								</a>
							</div>
							<div class="col-md-7 blog-grid-right">

								<h5>
									<a href="/post/detalle/{{$reciente->slug}}">{{$reciente->titulo}} </a>
								</h5>
								<div class="sub-meta">
									<span>
										<i class="far fa-clock"></i> {{$reciente->created_at}}</span>
								</div>
							</div>

						</div> 
                        @endforeach
						
					</div>
				</div>
				</aside>
				<!--//right-->
				</div>
				@else
	 			<h2 class="text-center mt-4 p-4">No hay publicaciones que mostrar</h2>
				@endif
			</div>
	</section>
	<!--//main-->
@endsection