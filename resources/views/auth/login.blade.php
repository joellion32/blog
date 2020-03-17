@extends('layouts.home')

@section('contenido')
<!--/main-->
<section class="main-content-w3layouts-agileits">
    <div class="container">
            <h3 class="tittle">Iniciar Sesion</h3>
            <div class="row inner-sec">
                <div class="login p-5 bg-light mx-auto mw-100">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1 mb-2">Correo Electronico</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1 mb-2">Contraseña</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="" required="">
                        
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <button type="submit" class="btn btn-primary submit mb-4">Iniciar</button>
                        <p>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Se te olvido la contraseña') }}
                            </a>
                        @endif
                        </p>
                      </form>
    </div>
    </div>
</div>
</section>
<!--//main-->
@endsection
