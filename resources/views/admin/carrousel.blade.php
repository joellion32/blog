@extends('layouts.admin')

@section('contenido')
<div class="content">
    <div class="container-fluid">
        @include('flash::message')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Elegir publicacion para la portada 2</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $posts)
                                <tr>
                                    <td>{{$posts->titulo}}</td>
                                    <td>{{$posts->category->nombre_categoria}}</td>
                                    <td><img src="/uploads/{{$posts->imagen}}" width="50px" height="50px" alt=""></td>
                                    <td>{{$posts->created_at}}</td>
                                    <td>
                                      <button id="boton" onclick="carrousel({{$posts->id}})" class="btn btn-primary btn-sm">Actualizar portada</button>   
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Elegir publicacion para la portada 1</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table id="example1" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $posts)
                                <tr>
                                    <td>{{$posts->titulo}}</td>
                                    <td>{{$posts->category->nombre_categoria}}</td>
                                    <td><img src="/uploads/{{$posts->imagen}}" width="50px" height="50px" alt=""></td>
                                    <td>{{$posts->created_at}}</td>
                                    <td>
                                      <button id="boton" onclick="carrousel2({{$posts->id}})" class="btn btn-primary btn-sm">Actualizar portada</button>   
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