@extends('layouts.admin')

@section('contenido')
<div class="content">
    <div class="container-fluid">
        @include('flash::message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Todos los Posts</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Categoria</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $posts)
                                <tr>
                                    <td>{{$posts->titulo}}</td>
                                    <td>{{$posts->category->nombre_categoria}}</td>
                                    <td>{{$posts->created_at}}</td>
                                    <td>
                                      <a href="/post/detalle/{{$posts->slug}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>  
                                      <a href="/editar/post/{{$posts->id}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>  
                                      <a href="/eliminar/post/{{$posts->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>  
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--para los comnetarios-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Todos los Comentarios</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table id="example1" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Post Id</th>
                                    <th>Nombre Usuario</th>
                                    <th>Comentario</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comentarios as $comentario)
                                <tr>
                                    <td>{{$comentario->post_id}}</td>
                                    <td>{{$comentario->nombre_usuario}}</td>
                                    <td>{{$comentario->comentario}}</td>
                                    <td>{{$comentario->created_at}}</td>
                                    <td>
                                      <a href="/comentario/eliminar/{{$comentario->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>  
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div><!--Cierre del container-->
</div><!--Cierre del content-->
    
@endsection