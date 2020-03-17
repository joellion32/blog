@extends('layouts.admin')

@section('contenido')
<div class="content">
    <div class="container-fluid">
        @include('flash::message')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Total de vistas y comentarios</h4>
                            </div>
                            <div class="content">
                                <div id="piechart" style="width: 110% !important; height: 100% !important;"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Vistas
                                        <i class="fa fa-circle text-danger"></i> Comentarios
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Subcategorias</h4>
                            </div>
                            <div class="content">
                                @if (count($sub_categorias))
                    <div class="table-full-width">
                        <table id="example1" class="table">
                            <tbody>
                                @foreach ($sub_categorias as $sub_categoria)
                                <tr>
                                    <td>{{$sub_categoria->sub_categoria}}</td>
                                    <td class="td-actions text-right">
                                        <a href="/subcategoria/eliminar/{{$sub_categoria->id}}" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>   
                     @else
                     <h4 class="title">No hay subcategorias que mostrar</h4>   
                    @endif

                                    <div class="stats">
                                        <i class="fa fa-history"></i> Actualizado hace 1 minuto
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<!--Categorias-->
        <div class="col-md-6">
            <div class="card ">
                <div class="header">
                    <h4 class="title">Categorias</h4>
                </div>
                <div class="content">
                    @if (count($categorias))
                    <div class="table-full-width">
                        <table id="example1" class="table">
                            <tbody>
                                @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{$categoria->nombre_categoria}}</td>
                                    <td class="td-actions text-right">
                                        <a href="/categoria/eliminar/{{$categoria->id}}" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>   
                     @else
                     <h4 class="title">No hay categorias que mostrar</h4>   
                    @endif
                
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i>Actualizado hace 1 minuto {{$categorias->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--Comentarios Recientes-->
            <div class="col-md-6">
                @if (count($comentarios))
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Comentarios Recientes</h4>
                    </div>
                    <div class="content">
                        <div class="table-full-width">
                            <table class="table">
                                <tbody>
                                    @foreach ($comentarios as $comentario)
                                    <tr>
                                        <td><b>De: </b>{{$comentario->nombre_usuario}}</td>
                                        <td><b>Comentario: </b> {{$comentario->comentario}}</td>
                                        <td class="td-actions text-right">
                                            <a href="/comentario/eliminar/{{$comentario->id}}" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history"></i>Actualizado hace 1 minuto {{$comentarios->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <h4 class="title">No hay comentarios que mostrar</h4>  
                @endif
                
            </div>
        </div>
    </div><!--cierre del content-->

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
  
          var data = google.visualization.arrayToDataTable([
            ['Vistas', 'Comentarios'],
            ['vistas',     {{$vistas}}],
            ['comentarios',    {{$comentario->count()}}],
          ]);
  
          var options = {
            title: ''
          };
  
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  
          chart.draw(data, options);
        }
      </script>
@endsection