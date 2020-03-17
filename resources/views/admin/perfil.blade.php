@extends('layouts.admin')


@section('contenido')

    
<div class="content">
    @include('flash::message')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar Perfil</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="/actualizar/{{Auth::user()->id}}">
                           @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input name="nombre" type="text" class="form-control" placeholder="Nombre" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" placeholder="Last Name" value="Ninguno" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Correo Electronico" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sobre Mi</label>
                                        <textarea rows="5" class="form-control" placeholder="Agrega una descripcion" value="Mike" readonly></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar Perfil</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                             <a href="#">
                            <img class="avatar border-gray" src="{{asset('images/face-0.jpg')}}" alt="..."/>

                              <h4 class="title">{{Auth::user()->name}}<br />
                              </h4>
                            </a>
                        </div>
                        <p class="description text-center"> 
                            Administrador
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection