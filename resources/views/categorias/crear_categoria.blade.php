@extends('layouts.admin')


@section('contenido')

    
<div class="content">
    @include('flash::message')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Crear Categoria</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="/categoria/guardar">
                           @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre de la categoria</label>
                                        <input name="categoria" type="text" class="form-control" placeholder="Categoria" required>
                                    </div>
                                </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Crear Categoria</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</div>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Crear Subcategoria</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="/subcategoria/guardar">
                           @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre de la subcategoria</label>
                                        <input name="subcategoria" type="text" class="form-control" placeholder="Subcategoria" required>
                                    </div>
                                </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Crear Subcategoria</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</div>
@endsection