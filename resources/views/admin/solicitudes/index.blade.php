
@extends('layouts.head')
<!-- MENU -->
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Modulo</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Solicitudes</a>
                        </li>
                        <li class="breadcrumb-item active">Detalle
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- --}}
    <div class="content-header-left text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-left">
            <a href="{{route('admin.solicitudes.nueva-solicitud')}}" type="button" class="btn btn-danger waves-effect waves-float waves-light">Agregar +</a>
        </div>
    </div>
</div>


<div class="content-body">
    @if (Auth::user()->tipo==1 || Auth::user()->tipo==2)
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card p-1">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive table-sm" id="solicitudes">
                        <thead class="text-center">
                            <tr>
                                {{-- <th>ID</th> --}}
                                {{-- <th>CODIGO SOLICITUD</th> --}}
                                <th style="font-size: 10px">FECHA <br> TRASLADO</th>
                                <th style="font-size: 10px">CLIENTE</th>
                                <th style="font-size: 10px">HORA <br> EN GRANJA</th>
                                <th style="font-size: 10px">CANTIDAD <br> TOTAL</th>
                                <th style="font-size: 10px">ORIGEN</th>
                                <th style="font-size: 10px;width: 40px">DESTINOS</th>
                                <th style="font-size: 10px;width: 40px">ASIGNAR</th>
                                <th style="font-size: 10px;width: 40px">UNIDAD</th>
                                <th style="font-size: 10px;width: 40px">PLACA</th>
                                <th style="font-size: 10px;width: 40px">CHOFER</th>
                                <th style="font-size: 10px;width: 40px">AYUDANTE</th>
                                {{-- <th>LAVADO</th>
                                <th>N° COMP.</th> --}}
                                <th style="font-size: 10px">HORA <br> EN COCHERA</th>
                                <th style="font-size: 10px">ESTADO</th>

                                {{-- <th>CIERRE</th> --}}
                                {{-- <th tyle="font-size: 10px;width: 20px">ACCIONES</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $doc)
                            
                            <tr style="font-size: 12px;"> 
                                {{-- <td>{{$doc->codigo}}</td> --}}
                                @php
                                $fecha= $doc->fecha_traslado;
                                $date = new DateTime($fecha);    
                                @endphp
                                <td><strong>{{$date->format('d-m-Y')}}</strong></td>
                                <td style="font-size: 12px"><strong>{{$doc->nombre_cli}}</strong></td>
                                <td><strong>{{$doc->hora}}</strong></td>
                                <td>{{$doc->cantidad}}</td>
                                <td>{{$doc->referencia_cli}}</td>
                               
                                <td> 
                                    @foreach (json_decode($doc->destinos) as $item)
                                    @foreach ($destinos as $des)
                                        @if ($des->id==$item)
                                        {{$des->referencia}} <br>
                                       
                                        @else
                                        @endif
                                    @endforeach
                                    @endforeach
                                    @php
                                    @endphp
                                </td>
                                {{-- <td>{{$doc->fecha_traslado}}</td> --}}
                                {{-- <td>{{$doc->origen}}</td> --}}
                                
                               
                                {{-- <td>{{$doc->costo}}</td> --}}
                                
                               <td>
                                @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                    <a type="button" class="btn btn-icon btn-icon rounded-circle
                                    btn-success waves-effect waves-float waves-light"
                                    href="{{route('enviar_info_conductor',$doc->id)}}">
                                    <i data-feather='phone'></i> </a>
                                @elseif ($doc->estado==2) 
                                    <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-toggle="modal" data-bs-target="#editmodal{{$doc->id}}">
                                     Asignación...
                                    </button>
                                @else
                                    <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                    data-bs-toggle="modal" data-bs-target="#crearmodal{{$doc->id}}">
                                    <i data-feather='plus'></i>
                                    </button>
                                @endif
                               </td>
                                    @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                        @foreach ($planificaciones as $pla)
                                                @if ($pla->id ==$doc->id_plani)
                                                    @foreach ($vehiculos as $uni)

                                                        @if ($uni->id==$pla->id_unidad)
                                                        {{-- UNIDAD --}}
                                                       <td>  {{$uni->unidad}} </td>
                                                       <td>  {{$uni->placa}} </td>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                    @foreach ($choferes as $ch)
                                                        @if ($ch->id==$pla->id_chofer)
                                                          <td>  {{$ch->nombres_cho}} <br> {{$ch->apellidos_cho}}</td>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                @else
                                                @endif
                                        @endforeach
                                    @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @endif
                                <td>
                                    @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                        @foreach ($planificaciones as $pla)
                                            @if ($pla->id ==$doc->id_plani)
                                                        @foreach ($ayudantes as $ayu)
                                                            @if ($ayu->id==$pla->choferes)
                                                            {{$ayu->nombres_cho}} {{$ayu->apellidos_cho}}
                                                            @else
                                                            @endif
                                                        @endforeach
                                                    - <strong>{{$pla->tipo_des}}</strong>
                                             
                                            @else
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                {{-- <td>{{$doc->lavado}}</td> --}}
                                <td>{{$doc->hora_cochera}}</td>
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge bg-info">Creado</span>
                                    @elseif ($doc->estado==3)
                                    <span class="badge bg-warning">En proceso</span>
                                    @elseif ($doc->estado==4)
                                    <span class="badge bg-success">Entregado</span>
                                    @elseif ($doc->estado==5)
                                    <span class="badge bg-primary">Facturado</span>
                                    @else 
                                    <span class="badge bg-danger">Pendiente Asig.</span>
                                    @endif
                                </td>
                                
                                {{-- <td>
                                    <div class="col-lg-6 col-12">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a type="button" class="btn btn-secondary waves-effect"  href="{{route('detalle-solicitud',$doc->id)}}">
                                                <i data-feather='eye'></i></a>
                                            <button type="button" class="btn btn-warning waves-effect">
                                                <i data-feather='edit'> </i></button>
                                                <button type="button" class="btn btn-danger waves-effect">
                                                    <i data-feather='trash-2'></i></button>
                                          </div>
                                    </div>
                                   
                                </td> --}}
                            </tr>
                            @include('admin.modals.CrearPlani')
                            @include('admin.modals.EditPlani')
                            @include('admin.modals.CrearCierre')
                            @include('admin.modals.DetCierre')
                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
    @elseif (Auth::user()->tipo==3)
     <!-- Basic Tables start -->
     <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card p-1">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive table-sm" id="solicitudes2">
                        <thead class="text-center">
                            <tr>
                                {{-- <th>ID</th> --}}
                                {{-- <th>CODIGO SOLICITUD</th> --}}
                                <th style="font-size: 10px;width: 40px">FECHA <br> TRASLADO</th>
                                <th style="width: 40px">CLIENTE</th>
                                <th style="font-size: 10px; width: 30px">HORA <br> EN GRANJA</th>
                                <th style="font-size: 10px; width: 20px">CANT<br> Des 1</th>
                                <th style="font-size: 10px; width: 20px">CANT <br> Des 2</th>
                                <th style="font-size: 10px; width: 20px">CANT <br> Des 3</th>
                                <th style="font-size: 10px; width: 20px">CANT <br> Des 4</th>
                                <th style="width: 20px">ORIGEN</th>
                                <th style="width: 40px">DESTINOS</th>
                                {{-- <th style="font-size: 10px;width: 40px">ASIGNAR</th> --}}
                                <th style="width: 40px">UNIDAD</th>
                                <th style="width: 40px">PLACA</th>
                                <th style="width: 40px">CHOFER</th>
                                <th style="width: 40px">ASIG</th>
                                {{-- <th>LAVADO</th>
                                <th>N° COMP.</th> --}}
                                <th style="font-size: 10px;width: 40px">GUÍAS DE <br> TRANSPORTISTA</th>
                                <th style="font-size: 10px;width: 40px">GUÍAS DE <br> CLIENTE</th>
                                <th style="width: 40px">ESTADO</th>

                                {{-- <th>CIERRE</th> --}}
                                {{-- <th>ACCIONES</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $doc)
                            
                            <tr style="font-size: 12px;"> 
                                {{-- <td>{{$doc->codigo}}</td> --}}
                                @php
                                $fecha= $doc->fecha_traslado;
                                $date = new DateTime($fecha);    
                                @endphp
                                <td><strong>{{$date->format('d-m-Y')}}</strong></td>
                                <td style="font-size: 12px"><strong>{{$doc->nombre_cli}}</strong></td>
                                <td><strong>{{$doc->hora}}</strong></td>
                                @php
                                $datos_destinos2 = json_decode($doc->destinos, true);   
                                $datos_cantidad2 = json_decode($doc->datos_cantidad, true);   
                               $cont = count($datos_destinos2);
                                @endphp
                                {{-- cantidades --}}
                                @for($i=0; $i<count($datos_destinos2); $i++)
                                {{-- {{$i}}  --}}
                                <td style="font-size: 10px;">
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
                              @php
                               $new = 4- $cont;
                              @endphp
                              @for ($i = 0; $i < $new; $i++)
                                <td></td>
                              @endfor

                                {{-- <td>{{$doc->cantidad}}</td>
                                <td>{{$doc->cantidad}}</td>
                                <td>{{$doc->cantidad}}</td>
                                <td>{{$doc->cantidad}}</td> --}}
                                <td>{{$doc->referencia_cli}}</td>
                               
                                <td> 
                                    @foreach (json_decode($doc->destinos) as $item)
                                    @foreach ($destinos as $des)
                                        @if ($des->id==$item)
                                        {{$des->referencia}} <br>
                                       
                                        @else
                                        @endif
                                    @endforeach
                                    @endforeach
                                    @php
                                    @endphp
                                </td>
                                    @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                        @foreach ($planificaciones as $pla)
                                                @if ($pla->id ==$doc->id_plani)
                                                    @foreach ($vehiculos as $uni)

                                                        @if ($uni->id==$pla->id_unidad)
                                                        {{-- UNIDAD --}}
                                                       <td>  {{$uni->unidad}} </td>
                                                       <td>  {{$uni->placa}} </td>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                    @foreach ($choferes as $ch)
                                                        @if ($ch->id==$pla->id_chofer)
                                                          <td>  {{$ch->nombres_cho}} <br> {{$ch->apellidos_cho}}</td>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                @else
                                                @endif
                                        @endforeach
                                    @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @endif
                                <td>
                                    @if ($doc->estado==3) 
                                        <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#crearcierre{{$doc->id}}">
                                        <i data-feather='plus'></i>
                                        </button>
                                        @elseif ($doc->estado==4) 
                                        <button type="button" class="btn btn-danger btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#detcierre{{$doc->id}}">
                                        <i data-feather='download-cloud'></i>
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-outline-secondary btn-icon rounded-circle" 
                                        data-bs-toggle="modal" data-bs-target="#crearcierre{{$doc->id}}" disabled>
                                        <i data-feather='plus'></i>
                                        </button>
                                        @endif
                                </td>
                                {{-- GUIAS --}}
                                @if ($doc->estado==4 || $doc->estado==5)
                                    @foreach ($cierres as $item)
                                    {{-- @foreach ($item->datos_guias as $des) --}}
                                        @if ($doc->id_cierre==$item->id)
                                                              @php
                                                            $datos_n_guias = json_decode($item->n_guias, true);
                                                            $datos_n_remision = json_decode($item->n_remision, true);
                                                            @endphp
                                                <td>
                                                    @foreach ($datos_n_guias as $item)
                                                    {{$item}} <br>
                                                @endforeach</td>
                                                <td>
                                                    @foreach ($datos_n_remision as $item2)
                                                    {{$item2}} <br>
                                                @endforeach
                                                </td>
                                        @endif
                                    @endforeach
                                @else
                                <td></td>
                                <td></td>
                                @endif
                                
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge bg-info">Creado</span>
                                    @elseif ($doc->estado==3)
                                    <span class="badge bg-warning">En proceso</span>
                                    @elseif ($doc->estado==4)
                                    <span class="badge bg-success">Entregado</span>
                                    @elseif ($doc->estado==5)
                                    <span class="badge bg-primary">Facturado</span>
                                    @else 
                                    <span class="badge bg-danger">Pendiente Asig.</span>
                                    @endif
                                </td>
                                
                                {{-- <td><i data-feather='edit'></i>Editar</td> --}}
                            </tr>
                            @include('admin.modals.CrearPlani')
                            @include('admin.modals.EditPlani')
                            @include('admin.modals.CrearCierre')
                            @include('admin.modals.DetCierre')
                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
    @elseif (Auth::user()->tipo==4)
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card p-1">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive table-sm" id="solicitudes3">
                        <thead class="text-center">
                            <tr >
                                {{-- <th>ID</th> --}}
                                {{-- <th>CODIGO SOLICITUD</th> --}}
                                <th style="font-size: 10px;width: 40px">FECHA <br> TRASLADO</th>
                                <th style="font-size: 10px;width: 40px">CLIENTE</th>
                                <th style="font-size: 10px; width: 30px">HORA <br> EN GRANJA</th>
                                <th style="font-size: 10px; width: 20px">CANT<br> Des 1</th>
                                <th style="font-size: 10px; width: 20px">CANT <br> Des 2</th>
                                <th style="font-size: 10px; width: 20px">CANT <br> Des 3</th>
                                <th style="font-size: 10px; width: 20px">CANT <br> Des 4</th>
                                <th style="font-size: 10px;width: 20px">ORIGEN</th>
                                <th style="font-size: 10px;width: 40px">DESTINOS</th>
                                {{-- <th style="font-size: 10px;width: 40px">ASIGNAR</th> --}}
                                <th style="font-size: 10px;width: 40px">UNi.</th>
                                <th style="font-size: 10px;width: 40px">PLACA</th>
                                <th style="font-size: 10px;width: 40px">CHOFER</th>
                               
                                {{-- <th>LAVADO</th>
                                <th>N° COMP.</th> --}}
                                <th style="font-size: 10px;width: 40px">GUÍAS DE <br> TRANSP.</th>
                                <th style="font-size: 10px;width: 40px">GUÍAS DE <br> CLIENTE</th>
                                <th style="font-size: 10px;width: 40px">COSTO FLETE</th>
                                <th style="font-size: 8px;width: 20px">FECHA DE <br> FACTURACIÓN</th>
                                <th style="font-size: 8px;width: 20px">N° FACTURACIÓN</th>
                                <th style="font-size: 10px;width: 40px">ESTADO</th>
                                {{-- <th>ACCIONES</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $doc)
                            
                            <tr style="font-size: 12px;"> 
                                {{-- <td>{{$doc->codigo}}</td> --}}
                                @php
                                $fecha= $doc->fecha_traslado;
                                $date = new DateTime($fecha);    
                                @endphp
                                <td><strong>{{$date->format('d-m-Y')}}</strong></td>
                                <td style="font-size: 12px"><strong>{{$doc->nombre_cli}}</strong></td>
                                <td><strong>{{$doc->hora}}</strong></td>
                                @php
                                $datos_destinos2 = json_decode($doc->destinos, true);   
                                $datos_cantidad2 = json_decode($doc->datos_cantidad, true);   
                               $cont = count($datos_destinos2);
                                @endphp
                                {{-- cantidades --}}
                                @for($i=0; $i<count($datos_destinos2); $i++)
                                {{-- {{$i}}  --}}
                                <td>
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
                              @php
                               $new = 4- $cont;
                              @endphp
                              @for ($i = 0; $i < $new; $i++)
                                <td></td>
                              @endfor

                                {{-- <td>{{$doc->cantidad}}</td>
                                <td>{{$doc->cantidad}}</td>
                                <td>{{$doc->cantidad}}</td>
                                <td>{{$doc->cantidad}}</td> --}}
                                <td>{{$doc->referencia_cli}}</td>
                               
                                <td> 
                                    @foreach (json_decode($doc->destinos) as $item)
                                    @foreach ($destinos as $des)
                                        @if ($des->id==$item)
                                        {{$des->referencia}} <br>
                                       
                                        @else
                                        @endif
                                    @endforeach
                                    @endforeach
                                    @php
                                    @endphp
                                </td>
                                    @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                        @foreach ($planificaciones as $pla)
                                                @if ($pla->id ==$doc->id_plani)
                                                    @foreach ($vehiculos as $uni)

                                                        @if ($uni->id==$pla->id_unidad)
                                                        {{-- UNIDAD --}}
                                                       <td>  {{$uni->unidad}} </td>
                                                       <td>  {{$uni->placa}} </td>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                    @foreach ($choferes as $ch)
                                                        @if ($ch->id==$pla->id_chofer)
                                                          <td>  {{$ch->nombres_cho}} <br> {{$ch->apellidos_cho}}</td>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                @else
                                                @endif
                                        @endforeach
                                    @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    @endif
                                
                                {{-- GUIAS --}}
                                @if ($doc->estado==4 || $doc->estado==5)
                                    @foreach ($cierres as $item)
                                    {{-- @foreach ($item->datos_guias as $des) --}}
                                        @if ($doc->id_cierre==$item->id)
                                                           @php
                                                            $datos_n_guias = json_decode($item->n_guias, true);
                                                            $datos_n_remision = json_decode($item->n_remision, true);
                                                            @endphp
                                                <td>
                                                    @foreach ($datos_n_guias as $item)
                                                    {{$item}} <br>
                                                @endforeach</td>
                                                <td>
                                                    @foreach ($datos_n_remision as $item2)
                                                    {{$item2}} <br>
                                                @endforeach
                                                </td>
                                        @endif
                                    @endforeach
                                @else
                                <td></td>
                                <td></td>
                                @endif
                                <td>{{$doc->costo}}</td>
                                
                                    @if ($doc->estado==4)
                                    <td>
                                        <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                                    data-bs-toggle="modal" data-bs-target="#editcierre{{$doc->id}}">
                                                    <i data-feather='plus'></i>
                                        </button>
                                    </td>
                                    <td></td>
                                    @endif
                                    @if ($doc->estado==5)
                                    @foreach ($cierres as $item)
                                        @if ($doc->id_cierre==$item->id)
                                                <td> {{$item->fecha_fac}}</td>
                                                <td> {{$item->n_fac}}</td>
                                        @endif
                                    @endforeach
                                    @endif
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge bg-info">Creado</span>
                                    @elseif ($doc->estado==3)
                                    <span class="badge bg-warning">En proceso</span>
                                    @elseif ($doc->estado==4)
                                    <span class="badge bg-success">Entregado</span>
                                    @elseif ($doc->estado==5)
                                    <span class="badge bg-primary">Facturado</span>
                                    @else 
                                    <span class="badge bg-danger">Pendiente Asig.</span>
                                    @endif
                                </td>
                                {{-- <td><i data-feather='edit'></i>Editar</td> --}}
                            </tr>
                            @include('admin.modals.ActualizarCierre')
                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
    @else
    @endif
</div>
@endsection

@section('js')
@if (session()->get('data'))
<div class="alert alert-success">
    <script>
       var text = '{{session()->get('data')}}';
       Swal.fire(
        'Ok!',
        text,
        'success'
        )       
    </script>
</div>
@endif
  <script>

$( function() {
    $("#ayudantes").change( function() {
        if ($(this).val() !== "") {
            $("#carga").prop("disabled", false);
            $("#descarga").prop("disabled", false);
            $("#descarga2").prop("disabled", false);
        } else {
            $("#carga").prop("disabled", true);
            $("#descarga").prop("disabled", true);
            $("#descarga2").prop("disabled", true);
        }
    });
});

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



//Convierte el div a imagen y la descarga
document.querySelector('button').addEventListener('click', function() {
  
});


$('#unidad').on('change', function(){
       
       var id = $(this).val();
       // alert(id);
       // alert(id);
           $.ajax({
           url:'{{ route('buscarunidad') }}',
           type:'GET',
           data:{'id':id},
           dataType:'json',
           success:function (data) {
               console.log(data);
               // $('#product_list').html(data);
               $('#datos_unidad').val(data);
               // alert(data.table_data);
           }
       })
   });

   $('#chofer').on('change', function(){

var id = $(this).val();
// alert(id);
// alert(id);
  $.ajax({
  url:'{{ route('buscarchofer') }}',
  type:'GET',
  data:{'id':id},
  dataType:'json',
  success:function (data) {
      console.log(data);
      // $('#product_list').html(data);
      $('#datos_chofer').val(data);
      // alert(data.table_data);
  }
})
});


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
        var table = $('#solicitudes').DataTable({
                    dom: '<"border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    language: idioma,
                    buttons: [
                    // 'excel'
                        {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12] }
                        },
                        {
                            extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12] }
                        },
                    ],
                    "order": [[ 4, 'asc' ], [ 5, 'asc' ]],
                    exportOptions: {
                    modifier: {
                    // DataTables core
                    // 'current', 'applied',
                    //'index', 'original'
                    page: 'all', // 'all', 'current'
                    search: 'none' // 'none', 'applied', 'removed'
                    },
                        columns: [0,1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12]
                        
                    }
                })

        } );

        $(document).ready( function () {
        var table = $('#solicitudes2').DataTable({
                    dom: '<"border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    language: idioma,
                    buttons: [
                    // 'excel'
                        {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12] }
                        },
                        {
                            extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12] }
                        },
                    ],
                    "order": [[ 4, 'asc' ], [ 5, 'asc' ]],
                    exportOptions: {
                    modifier: {
                    // DataTables core
                    // 'current', 'applied',
                    //'index', 'original'
                    page: 'all', // 'all', 'current'
                    search: 'none' // 'none', 'applied', 'removed'
                    },
                        columns: [0,1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12]
                        
                    }
                })

        } );
        $(document).ready( function () {
        var table = $('#solicitudes3').DataTable({
                    dom: '<"border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                    language: idioma,
                    buttons: [
                    // 'excel'
                        {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12] }
                        },
                        {
                            extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12] }
                        },
                    ],
                    "order": [[ 4, 'asc' ], [ 5, 'asc' ]],
                    exportOptions: {
                    modifier: {
                    // DataTables core
                    // 'current', 'applied',
                    //'index', 'original'
                    page: 'all', // 'all', 'current'
                    search: 'none' // 'none', 'applied', 'removed'
                    },
                        columns: [0,1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12]
                        
                    }
                })

        } );
</script>
@endsection

