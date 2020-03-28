@extends('layouts.home')


@section('contenido')
    
<section class="main-content-w3layouts-agileits">
    <div class="container">
        <div class="row">
            <!--left-->
            <div class="col-lg-8 left-blog-info-w3layouts-agileits text-left">
                <div class="blog-grid-top">
                    <div class="b-grid-top">
                        <h1>Cantantes de Tercer Cielo dan positivo a coronavirus</h1>
                        <div class="blog_info_left_grid">
                         <img style="width:100% !important;" src="https://www.diariolibre.com/binrepository/546x363/0c7/546d350/none/10904/UFIC/rtr_13545699_20200327120712.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <p>El mundo de la música sigue afectada por la pandemia del coronavirus. Los integrantes de la popular agrupación cristiana Tercer Cielo han sido los más recientes en informar que han dado positivo al COVID-19.</p>
                    <p>A través de sus cuentas de Instagram, la pareja de esposos, integrada por la cantante mexicoamericana Evelyn Herrera y Juan Carlos Rodríguez, confesaron que ambos son positivos al COVID-19.</p>
                    <p>En su publicación, la intérprete de música cristiana detalló todos los síntomas que el nuevo coronavirus ha causado en su cuerpo.</p>
                    <p>“De estos últimos 9 días, hoy es el que mejor me siento. Tenía fiebre por 8 días consecutivos, dolores musculares y a veces no podía respirar a profundidad, así como otros síntomas terribles”, contó la artista. “Se me fue el olfato y también la sensación de gusto en mi paladar”, agregó Herrera.</p>
                    
                </div>
                <!--//silder-->
                

            </div>
            <!--//left-->
            <!--right-->
            <aside class="col-lg-4 agileits-w3ls-right-blog-con text-left">
                <div class="tech-btm">
                    <h4>Publicaciones Recientes</h4>
                    
                    <div class="blog-grids row mb-3">
                        @foreach ($recientes as $reciente)
                        <div class="col-md-5 blog-grid-left">
                            <a href="/post/detalle/{{$reciente->slug}}">
                                @if ($reciente->imagen)
                                <img style="width:200px; height:100px;" src="/uploads/{{$reciente->imagen}}" class="card-img-top img-fluid m-1" alt="image">
                                @else
                                <img src="/images/noimage.png" style="width:95%; height:80%;" class="card-img-top img-fluid m-1" alt="image">
                                @endif
                            </a>
                        </div>
                        <div class="col-md-6 blog-grid-right">

                            <h5>
                                <a href="/post/detalle/{{$reciente->slug}}">{{$reciente->titulo}}</a>
                            </h5>
                            <div class="sub-meta">
                                <span>
                                    <i class="far fa-clock"></i> {{$reciente->created_at}}</span>
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

@endsection