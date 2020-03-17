@extends('layouts.admin')

@section('contenido')
<div class="content">
@include('flash::message')

    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">Notificaciones</h4>
                <p class="category">Esta seccion es para ver los mensajes que envian por el formulario de contacto</p>

            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Todas las notificaciones</h5>
                        @if ($notificaciones)
                        @foreach ($notificaciones as $notificacion)
                        <div class="alert alert-info alert-with-icon" data-notify="container">
                            <a href="/notificaciones/eliminar/{{$notificacion->id}}"><button type="button" aria-hidden="true" class="close">×</button></a>
                            <span data-notify="icon" class="pe-7s-user"></span>
                            <span data-notify="message">{{$notificacion->nombre}}</span>
                            <span data-notify="message">{{$notificacion->email}}</span>
                            <span data-notify="message">{{$notificacion->mensaje}}</span>
                        </div>
                    @endforeach
                        @else
                        <h5>No hay notificaciones que mostrar</h5>
                        @endif
                </div>

            
            </div>
        </div>
    </div>
</div>
@endsection