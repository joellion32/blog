@extends('layouts.admin')


@section('contenido')

    
<div class="content">
    @include('flash::message')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Crear Usuario</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="{{route('register')}}">
                           @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input name="name" type="text" class="form-control" placeholder="Nombre" required>
                                        
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Correo Electronico" required>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select name="rol" class="form-control" id="rol" required>
                                        <option value="administrador">administrador</option>
                                        <option value="creador">creador</option>
                                    </select>    
                                </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="password" name="password" class="form-control" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirmar Contraseña</label>
                                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>

                            

                            <button type="submit" class="btn btn-info btn-fill pull-right">Crear Usuario</button>
                            <div class="clearfix"></div>
                        </form>
                    </div><!--cierre del content-->
                </div><!--cierre del card-->
            </div><!--cierre de la columna-->
          
        </div><!--cierre del row-->
    </div><!--cierre del container-->
</div><!--cierre del content-->
@endsection