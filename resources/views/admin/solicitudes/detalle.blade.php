
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
        <a href="{{route('admin.costos.index')}}" type="button" class="btn btn-icon btn-outline-primary waves-effect mt-2">
            <i data-feather='arrow-left'></i>Volver
        </a>
    </div>
    
        <div class="card mt-2">
                <div class="specific card-body">
                        <div class="">
                            {{-- <div class="card-header">
                                <button id="btnImg" class="btn btn-danger me-1 waves-effect
                                 waves-float waves-light" onclick="f()">Descargar imagen</button>
                            </div> --}}
                            <div class="text-center">
                                <h1 class="mb-1 text-danger"><strong>GONZALES <br> TRANSPORT S.A.C</strong></h1>
                            </div>
                            @foreach ($solicitudes as $doc)
                            @php
                                                    $datos_destinos2 = json_decode($doc->datos_destinos, true);   
                                                    $datos_cantidad2 = json_decode($doc->datos_cantidad, true);   
                                                   $cont = count($datos_destinos2);
                                                    @endphp
                            <div class="divider divider-danger"><div class="divider-text">Solicitud</div></div>
                            <div class="row">
                                <div class="col-xl-4 col-12">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-6 fw-bolder mb-1">CODIGO DE SOLICITUD:</dt>
                                        <dd class="col-sm-6 mb-1">PIXINVENT</dd>

                                        <dt class="col-sm-6 fw-bolder mb-1">FECHA:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->fecha}}</dd>
                                        <dt class="col-sm-6 fw-bolder mb-1">FECHA TRANSLADO:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->fecha_traslado}}</dd>
                                        <dt class="col-sm-6 fw-bolder mb-1">HORA:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->hora}}</dd>
                                        <dt class="col-sm-6 fw-bolder mb-1">HORA EN COCHERA:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->hora_cochera}}</dd>
                                    </dl>
                                </div>
                                <div class="col-xl-4 col-12">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-6 fw-bolder mb-1">CLIENTE:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->nombre_cli}}</dd>
                                        <dt class="col-sm-6 fw-bolder mb-1">ORIGEN:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->referencia_cli}}</dd>
                                        <dt class="col-sm-6 fw-bolder mb-1">DESTINOS:</dt>
                                        <dd class="col-sm-6 mb-1">
                                            @foreach ($datos_destinos2 as $item)
                                                @foreach ($destinos as $des)
                                                    @if ($des->id==$item)
                                                    {{$des->referencia}} <br>
                                                    @else
                                                    @endif
                                                @endforeach
                                            @endforeach</dd>
                                        <dt class="col-sm-6 fw-bolder mb-1">CANTIDAD TOTAL:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->cantidad}}</dd>
                                    </dl>
                                </div>
                                <div class="col-xl-4 col-12">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-6 fw-bolder mb-1">LAVADO:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->lavado}}</dd>

                                        <dt class="col-sm-6 fw-bolder mb-1">COMPROBANTE:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->comprobante}}</dd>

                                        <dt class="col-sm-6 fw-bolder mb-1">COSTO:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->costo}}</dd>
                                        <dt class="col-sm-6 fw-bolder mb-1">OBSERVACIONES:</dt>
                                        <dd class="col-sm-6 mb-1">{{$doc->observaciones}}</dd>
                                    </dl>
                                </div>
                            </div> 
                                    
                                    <div class="divider divider-danger"><div class="divider-text">Transporte</div></div>
                                    @foreach ($planificaciones as $pla)
                                        @if ($pla->id ==$doc->id_plani)
                                            <div class="row">
                                                <div class="col-xl-4 col-12">
                                                    <dl class="row mb-0">
                                                        @foreach ($vehiculos as $uni)
                                                            @if ($uni->id==$pla->id_unidad)
                                                                <dt class="col-sm-6 fw-bolder mb-1">UNIDAD:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$uni->unidad}}</dd>

                                                                <dt class="col-sm-6 fw-bolder mb-1">MARCA:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$uni->marca}}</dd>
                                                                <dt class="col-sm-6 fw-bolder mb-1">PLACA:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$uni->placa}}</dd>
                                                                <dt class="col-sm-6 fw-bolder mb-1">N° DE INSCRIPCIÓN:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$uni->seria_chasis}}</dd>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </dl>
                                                </div>
                                                <div class="col-xl-4 col-12">
                                                    <dl class="row mb-0">
                                                        @foreach ($choferes as $ch)
                                                            @if ($ch->id==$pla->id_chofer)
                                                                <dt class="col-sm-6 fw-bolder mb-1">CONDUCTOR:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$ch->nombres_cho}} {{$ch->apellidos_cho}}</dd>
                                                                <dt class="col-sm-6 fw-bolder mb-1">BREVETE:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$ch->brevete_cho}}</dd>
                                                                <dt class="col-sm-6 fw-bolder mb-1">DNI:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$ch->dni_cho}}</dd>
                                                                <dt class="col-sm-6 fw-bolder mb-1">CELULAR:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$ch->celular_cho}}</dd>
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    </dl>
                                                </div>
                                                <div class="col-xl-4 col-12">
                                                    <dl class="row mb-0">
                                                        @foreach ($ayudantes as $ayu)
                                                            @if ($ayu->id==$pla->choferes)
                                                                <dt class="col-sm-6 fw-bolder mb-1">AYUDANTE:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$ayu->nombres_cho}} {{$ayu->apellidos_cho}}</dd>

                                                                
                                                            @else
                                                            @endif
                                                        @endforeach
                                                        <dt class="col-sm-6 fw-bolder mb-1">INDICACIONES ESPECIALES:</dt>
                                                                <dd class="col-sm-6 mb-1">{{$pla->observaciones}}</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    @endforeach
                               
                            @endforeach
                        </div>
                </div>

                <div class="divider divider-danger"><div class="divider-text">Cierre</div></div>
                

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Destinos</h4>
                            </div>
                            <div class="card-body">
                                <ul class="timeline">
                                    @for($i=0; $i<count($datos_destinos2); $i++)
                                    <li class="timeline-item">
                                        <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
                                        <div class="timeline-event">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                
                                                <h6>
                                                    @foreach ($destinos as $des)
                                                    @if ($des->id==$datos_destinos2[$i])
                                                     <strong>{{$des->referencia}}</strong>
                                                    @else
                                                    @endif
                                                 @endforeach
                                                </h6>
                                                {{-- <span class="timeline-event-time">03:00PM</span> --}}
                                            </div>
                                            <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column">
                                                <div>
                                                    <p class="text-muted mb-50">Cantidades</p>
                                                    <div class="d-flex align-items-center">
                                                        @foreach ($datos_cantidad2 as $key => $valor)
                                                                            
                                                                    @if ($valor[$i]==0)
                                                                    @else
                                                                        @if ($key!== 'sub')
                                                                            @if ($key=='cant1')
                                                                            <div class="avatar bg-light-danger avatar-sm me-50">
                                                                                <span class="avatar-content"> {{$valor[$i]}}</span>
                                                                            </div> 
                                                                            @else
                                                                            +  
                                                                            <div class="avatar bg-light-danger avatar-sm">
                                                                                <span class="avatar-content">{{$valor[$i]}}</span>
                                                                            </div>
                                                                            
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                        @endforeach
                                                       
                                                    </div>
                                                </div>
                                                <div class="mt-sm-0 mt-1">
                                                    <p class="text-muted mb-50">SubTotal</p>
                                                    <p class="mb-0">
                                                        @foreach ($datos_cantidad2 as $key => $valor)
                                                                    @if ($valor[$i]==0)
                                                                    @else
                                                                        @if ($key=='sub')
                                                                         {{$valor[$i]}}
                                                                        @else
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Guias</h4>
                            </div>
                            <div class="card-body">
                                <ul class="timeline">
                                    @for($i=0; $i<count($datos_destinos2); $i++)

                                            
                                    <li class="timeline-item">
                                        <span class="timeline-point timeline-point-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                        </span>
                                        <div class="timeline-event">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                <h6>
                                                    @foreach ($destinos as $des)
                                                        @if ($des->id==$datos_destinos2[$i])
                                                        <strong>{{$des->referencia}}</strong>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                </h6>
                                               
                                            </div>
                                            <div class="d-flex justify-content-between flex-wrap flex-sm-row flex-column">
                                                @foreach ($cierres as $item)
                                                {{-- @foreach ($item->datos_guias as $des) --}}
                                                    @if ($doc->id_cierre==$item->id)
                                                    @php
                                                                    $datos_guias = json_decode($item->datos_guias, true); 
                                                                    $datos_n_guias = json_decode($item->n_guias, true); 
            
                                                                    $datos_remision = json_decode($item->datos_remision, true); 
                                                                    $datos_n_remision = json_decode($item->n_remision, true);
                                                                    @endphp
                                                      
                                                <div class="mt-sm-0 mt-1">
                                                    <p class="text-muted mb-50">N° Guias</p>
                                                    <p class="text-muted mb-50">Documento</p>
                                                    
                                                </div>
                                                <div class="mt-sm-0 mt-1">
                                                    <p class="text-muted mb-50">Guía de Transportista</p>
                                                    <a class="btn btn-outline-danger btn-sm waves-effect" 
                                                    type="button" href="{{asset('pdfs-guias/'.$datos_guias[$i])}}" 
                                                    download="{{$datos_n_guias[$i]}}">
                                                        {{$datos_n_guias[$i]}}
                                                    </a>
                                                </div>
                                                <div class="mt-sm-0 mt-1">
                                                    <p class="text-muted mb-50">Guía de Cliente</p>
                                                    <a class="btn btn-outline-danger btn-sm waves-effect" 
                                                    type="button" href="{{asset('pdfs-guias/'.$datos_remision[$i])}}" 
                                                    download="{{$datos_n_remision[$i]}}">
                                                     {{$datos_n_remision[$i]}}
                                                    </a>
                                                </div>
                                                @else
                                                     @endif
                                                    @endforeach 
                                            </div>
                                        </div>
                                    </li>
                                   @endfor
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="divider divider-danger"><div class="divider-text">Facturación</div></div>

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
