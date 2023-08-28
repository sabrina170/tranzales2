
@extends('layouts.head')
<!-- MENU -->
@section('content')


<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Enviar</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Solicitud</a>
                        </li>
                    </ol>
                </div>
            </div>
           
            {{-- <button class="btn btn-primary">Volver</button> --}}
        </div>
        <a href="{{route('admin.solicitudes.index')}}" type="button" class="btn btn-icon btn-outline-primary waves-effect mt-2">
            <i data-feather='arrow-left'></i>Volver
        </a>
    </div>
    
        <div class=" card mt-2">
                <div class="specific card-body">
                        <div class="" style="background-color: white">
                            <div class="text-center">
                                <h1 class="mb-1 text-danger"><strong>GONZALES <br> TRANSPORT S.A.C</strong></h1>
                            </div>
                            @foreach ($solicitudes as $doc)
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm"
                                             style="color: black; font-size: 19px">
                                                <tbody>
                                                    @php
                                                    $datos_destinos2 = json_decode($doc->datos_destinos, true);   
                                                    $datos_cantidad2 = json_decode($doc->datos_cantidad, true);   
                                                   $cont = count($datos_destinos2);
                                                    @endphp
                                                    <tr>
                                                        <td class="table-light">
                                                            <strong>FECHA</strong>
                                                        </td>
                                                        <td colspan="{{$cont}}"><strong>{{$doc->fecha}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-warning">
                                                            <strong>HORA EN COCHERA</strong>
                                                        </td>
                                                        <td class="table-warning" colspan="{{$cont}}"><strong>{{$doc->hora}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-light">
                                                            <strong>HORA EN ORIGEN</strong>
                                                        </td>
                                                        <td colspan="{{$cont}}"><strong>{{$doc->hora}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-light">
                                                            <strong>GRANJA</strong>
                                                        </td>
                                                        <td colspan="{{$cont}}"><strong>{{$doc->nombre_cli}}</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="table-light">
                                                            <strong>ORIGEN</strong>
                                                        </td>
                                                        <td class="table-warning" colspan="{{$cont}}">
                                                            <strong>{{$doc->referencia_cli}}</strong></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="table-light">
                                                            <strong>LUGAR DESTINOS</strong>
                                                        </td>
                                                                        @foreach ($datos_destinos2 as $item)
                                                                            @foreach ($destinos as $des)
                                                                                @if ($des->id==$item)
                                                                                  <td class="table-danger">
                                                                                   <strong>{{$des->referencia}}</strong></td>
                                                                                @else
                                                                                    
                                                                                @endif
                                                                            @endforeach
                                                                            
                                                                            @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td class="table-light">
                                                            <strong>CANTIDADES</strong>
                                                        </td>
                                                        @for($i=0; $i<count($datos_destinos2); $i++)
                                                        {{-- {{$i}}  --}}
                                                        <td class="table-warning" >
                                                            <strong>
                                                                @foreach ($datos_cantidad2 as $key => $valor)
                                                                    @if ($valor[$i]==0)
                                                                    @else
                                                                        @if ($key!== 'sub')
                                                                            @if ($key=='cant1')
                                                                            {{$valor[$i]}}
                                                                            @else
                                                                            + {{$valor[$i]}}
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </strong>
                                                        </td> 
                                                      @endfor   
                                                        </tr>  
                                                    <tr>
                                                        <td class="table-light">
                                                            <strong>SUBTOTATES</strong>
                                                        </td>
                                                        @for($i=0; $i<count($datos_destinos2); $i++)
                                                        {{-- {{$i}}  --}}
                                                        <td class="table-secondary">
                                                            <strong>
                                                                @foreach ($datos_cantidad2 as $key => $valor)
                                                                    @if ($valor[$i]==0)
                                                                    @else
                                                                        @if ($key=='sub')
                                                                         {{$valor[$i]}}
                                                                        @else
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </strong>
                                                        </td> 
                                                      @endfor  
                                                    </tr>
                                                    <tr>
                                                        <td class="table-light">
                                                            <strong>TOTAL</strong>
                                                        </td>
                                                        <td class="table-success" colspan="{{$cont}}">
                                                          <strong>  {{$doc->cantidad}}</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm"
                                            style="color: black; font-size: 19px">
                                                <tbody>
                                                @foreach ($planificaciones as $pla)
                                                     @if ($pla->id ==$doc->id_plani)
                                                        @foreach ($vehiculos as $uni)
                                                            @if ($uni->id==$pla->id_unidad)
                                                                <tr>
                                                                    <td class="table-light">
                                                                        <strong>UNIDAD</strong>
                                                                    </td>
                                                                    <td>
                                                                        <strong> {{$uni->unidad}}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-light">
                                                                        <strong>MARCA</strong>
                                                                    </td>
                                                                    <td>
                                                                        <strong> {{$uni->marca}}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-light">
                                                                        <strong>PLACA</strong>
                                                                    </td>
                                                                    <td>
                                                                        <strong> {{$uni->placa}}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="table-light">
                                                                        <strong>N° DE INSCRIPCIÓN</strong>
                                                                    </td>
                                                                    <td>
                                                                        <strong> {{$uni->seria_chasis}}</strong>
                                                                    </td>
                                                                </tr>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                        @foreach ($choferes as $ch)
                                                            @if ($ch->id==$pla->id_chofer)
                                                            <tr>
                                                                <td class="table-light">
                                                                    <strong>CONDUCTOR</strong>
                                                                </td>
                                                                <td>
                                                                    <strong>{{$ch->nombres_cho}} {{$ch->apellidos_cho}}</strong> 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="table-light">
                                                                    <strong>BREVETE</strong>
                                                                </td>
                                                                <td>
                                                                    <strong>{{$ch->brevete_cho}}</strong> 
                                                                </td>
                                                            </tr>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                        @foreach ($ayudantes as $ayu)
                                                            @if ($ayu->id==$pla->choferes)
                                                            <tr>
                                                                <td class="table-light">
                                                                    <strong>AYUDANTE</strong>
                                                                </td>
                                                                <td>
                                                                    <strong> {{$ayu->nombres_cho}} {{$ayu->apellidos_cho}}</strong> 
                                                                </td>
                                                            </tr>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                        <tr>
                                                            <td class="table-light">
                                                                <strong class="text-danger">Indicaciones Especiales</strong>
                                                            </td>
                                                            <td>
                                                                <strong> {{$pla->observaciones}}</strong> 
                                                            </td>
                                                        </tr>
                                                    @else
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            @endforeach
                        </div>
                </div>
                <div class="card-footer">
                        <button id="btnImg" class="btn btn-danger me-1 waves-effect
                         waves-float waves-light" onclick="f()">Descargar imagen</button>
                </div>
        </div>
</div>
@endsection

@section('js')

  <script>
    function f() {
    html2canvas(document.querySelector('.specific'), {
    onrendered: function(canvas) {
      // document.body.appendChild(canvas);
      return Canvas2Image.saveAsPNG(canvas);
    }
  });
}

    var idioma=

        {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Ãšltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copyTitle": 'Informacion copiada',
                "copyKeys": 'Use your keyboard or menu to select the copy command',
                "copySuccess": {
                    "_": '%d filas copiadas al portapapeles',
                    "1": '1 fila copiada al portapapeles'
                },

                "pageLength": {
                "_": "Mostrar %d filas",
                "-1": "Mostrar Todo"
                }
            }
        };

        $(document).ready( function () {
        var table = $('#clientes').DataTable({
                    dom: '<"border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    language: idioma,
                    buttons: [
                    // 'excel'
                        {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [1,2,3, 4, 5, 6,7,8,9,10] }
                        },
                        {
                            extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [1,2,3, 4, 5, 6,7,8,9,10] }
                        },
                        {
                            extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [1,2,3, 4, 5, 6,7,8,9,10] }
                        },
                    ],
                    exportOptions: {
                    modifier: {
                    // DataTables core
                    order: 'index', // 'current', 'applied',
                    //'index', 'original'
                    page: 'all', // 'all', 'current'
                    search: 'none' // 'none', 'applied', 'removed'
                    },
                        columns: [1, 2, 3, 4, 5, 6, 7, 8,9,10]
                    }
        });

        } );

  </script>

@endsection

<!-- MENU -->
