@extends('layouts.admin')


@section('contenido')

    
<div class="content">
    @include('flash::message')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Editar Post</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="/actualizar/posts/{{$post->id}}" enctype="multipart/form-data">
                           @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input name="titulo" type="text" class="form-control" placeholder="Titulo del post" value="{{$post->titulo}}" required>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select name="categoria" class="form-control" id="categoria" required>
                                         <option  value="{{$post->categoria_id}}" selected>{{$post->category->nombre_categoria}}</option>
                                            @foreach ($categorias as $categoria)
                                            <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            
                         <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>SubCategoria</label>
                                        <select name="sub_categoria_id" class="form-control" id="categoria" required>
                                            <option  value="{{$post->sub_categoria_id}}" selected>{{$post->subcategory->sub_categoria}}</option>
                                            @foreach ($sub_categorias as $sub_categoria)
                                            <option value="{{$sub_categoria->id}}">{{$sub_categoria->sub_categoria}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Imagen</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Video</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <label>Imagen</label>
                                            <input name="imagen" type="file" class="form-control" accept="image/png, .jpeg, .jpg, image/gif">
                                            <br>
                                            <label>Imagen seleccionada</label>
                                            <img src="/uploads/{{$post->imagen}}" alt="No hay imagen" style="width:50%;" class="img-fluid" />

                                        @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                          <div class="form-group">
                                    <label>Video</label>
                                    <input name="video" type="file" class="form-control" accept="video/mp4, .mpeg, .avi, .3gpp, .3gp">
                                
                                @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                    </div>
                                  </div>
                            </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Cabecera del texto (solo 30 palabras)</label>
                                        <textarea rows="5" name="cabecera" class="form-control" required>{{$post->cabeza}}</textarea>                                   
                                     </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Cuerpo del texto</label>
                                        <textarea id="editor" rows="10" name="cuerpo" class="form-control">{{$post->cuerpo}}</textarea>                                   
                                     </div>
                                </div>
                            </div>

                            

                            <button type="submit" onclick="Swal.fire('Esta subida puede que dure unos minutos desea continuar')" class="btn btn-info btn-fill pull-right">Guardar</button>
                            <div class="clearfix"></div>
                        </form>
                    </div><!--cierre del content-->
                </div><!--cierre del card-->
            </div><!--cierre de la columna-->
          
        </div><!--cierre del row-->
    </div><!--cierre del container-->
</div><!--cierre del content-->

@endsection