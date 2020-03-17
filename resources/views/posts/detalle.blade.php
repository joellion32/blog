@extends('layouts.home')


@section('contenido')
<style>
/* On screens that are 992px wide or less, the background color is blue */
@media screen and (max-width: 1900px) {
  .imagen {
	width:120%;
	height: 500px;
  }
}

/* On screens that are 600px wide or less, the background color is olive */
@media screen and (max-width: 600px) {
  .imagen {
	width:120%;
	height: 250px;
  }
}
</style>


    <!--//banner-->
	<section class="banner-bottom">
		<!--/blog-->
		<div class="container">
			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
					<div class="blog-grid-top">
						<div class="b-grid-top">
							<div class="blog_info_left_grid">
								<a href="#">
									@if ($post->imagen)
                                    <img src="/uploads/{{$post->imagen}}" class="img-fluid imagen" alt="">									
                                    @else
									<video width="100%" height="100%" controls>
										<source src="/videos/{{$post->video}}" type="video/mp4">
										Your browser does not support the video tag.
									  </video>	
									@endif
								</a>
							</div>
							<div style="font-size:12px !important;" class="blog-info-middle text-light">
								{{$post->cabeza}}
							</div>
						</div>

						<h3>
							<a href="#">{{$post->titulo}} </a>
						</h3>
						<p style="color:black !important;">{!!$post->cuerpo!!}</p>

						

						<ul class="nav">
							<li class="nav-item">
							<i class="far fa-calendar-alt"></i> {{$post->created_at}}
							<li class="nav-item mx-2">
								<i class="far fa-thumbs-up"></i> {{$post->vistas}} Vistas
							</li>
							<li class="nav-item">
								<i class="far fa-comment"></i> {{$post->comments->count()}} Comentarios
							</li>
						  </ul>
					</div>

				
					<div class="comment-top">
                        <h4>Comentarios {{$post->comments->count()}}</h4>
						@if (count($comentarios))
						@foreach ($comentarios as $comentario)
                        <div class="media">
							<img src="{{asset('images/usuario.png')}}" width="50px" height="50px" alt="" class="img-fluid" />
							<div class="media-body">
								<h5 class="mt-0">{{$comentario->nombre_usuario}}</h5>
								<p>{{$comentario->comentario}}</p>
							</div>
						</div>
                        @endforeach
                        @else
						<h5 class="mt-0">No hay comentarios que mostrar</h5>
                        @endif
					</div>
					<div class="comment-top">
						<h4>Deja tu comentario</h4>
						<div class="comment-bottom">
							<form action="/comentarios/guardar" method="post">
								@csrf
								<input class="form-control" type="text" name="nombre" placeholder="Nombre" required="">
                                <input class="form-control" type="email" name="email" placeholder="Email" required="">
								<input style="display:none;" type="number" name="post_id" value="{{$post->id}}" required="">

								<textarea class="form-control" name="comentario" placeholder="Mensaje..." required=""></textarea>
								<button type="submit" class="btn btn-primary submit">Comentar</button>
							</form>
						</div>
					</div>
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
		</div>
	</section>
	<!--//main-->
@endsection