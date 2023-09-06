
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
    @if (Auth::user()->tipo==1 || Auth::user()->tipo==2)
    <div class="content-header-left text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-left">
            <a href="{{route('admin.solicitudes.nueva-solicitud')}}" type="button" class="btn btn-danger waves-effect waves-float waves-light">Agregar +</a>
    
        </div>
       
    </div>
    @else
    @endif
</div>


<div class="content-body">
    @if (Auth::user()->tipo==1 || Auth::user()->tipo==2)
    <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm" 
                    id="tablamaestro" style="display: none">
                        <thead class="text-center">
                            <tr>
                                {{-- <th>ID</th> --}}
                                {{-- <th>CODIGO SOLICITUD</th> --}}
                                <th style="font-size: 10px">FECHA <br> TRASLADO</th>
                                <th style="font-size: 10px">CLIENTE</th>
                                <th style="font-size: 10px">HORA <br> EN GRANJA</th>
                                <th style="font-size: 10px">CANTIDAD <br> TOTAL</th>
                                <th style="font-size: 10px">ORIGEN</th>
                                <th style="font-size: 10px">ORIGEN 2</th>
                                <th style="font-size: 10px;width: 40px">DESTINOS</th>
                                <th style="font-size: 10px;width: 40px">UNIDAD</th>
                                <th style="font-size: 10px;width: 40px">PLACA</th>
                                <th style="font-size: 10px;width: 40px">CHOFER</th>
                                <th style="font-size: 10px;width: 40px">AYUDANTE</th>
                                <th style="font-size: 10px;width: 40px">JORNADA DE AYUDANTE</th>
                                <th style="font-size: 10px;width: 40px">LAVADO</th>
                                <th style="font-size: 10px;width: 40px">N° COMPROBANTE</th>
                                <th style="font-size: 10px;width: 40px">INDICACIONES ESPECIALES</th>
                                <th style="font-size: 10px;width: 40px">OBSERVACIONES FINAL DEL VIAJE</th>
                                <th style="font-size: 10px">HORA DE SALIDA EN COCHERA</th>
                                <th style="font-size: 10px;width: 40px">GUIA DE TERCEROS</th>
                                <th style="font-size: 10px;width: 40px">GUIA DE TRANSPORTISTA</th>
                                <th style="font-size: 10px;width: 40px">GUIA DE CLIENTE </th>
                                <th style="font-size: 10px;width: 40px">REVISADO POR</th>
                                <th style="font-size: 10px;width: 40px">PAGO DE CHOFER</th>
                                <th style="font-size: 10px;width: 40px">PAGO AYUDANTE</th>
                                <th style="font-size: 10px;width: 40px">DEVOLUCION DE GASTOS AL CONDUCTOR (**)</th>
                                <th style="font-size: 10px;width: 40px">DEVOLUCION PTA HERMOSA (GLH)</th>
                                <th style="font-size: 10px;width: 40px">CAJA CHICA - MIGUEL</th>
                                <th style="font-size: 10px;width: 40px">CAJA GT</th>
                                <th style="font-size: 10px;width: 40px">PEAJE TOTAL</th>
                                <th style="font-size: 10px;width: 40px">PEAJE E-PASS</th>
                                <th style="font-size: 10px;width: 40px">PEAJE PEX</th>
                                <th style="font-size: 10px;width: 40px">PEAJE EASY WAY</th>
                                <th style="font-size: 10px;width: 40px">OTRO PEAJES(**)</th>
                                <th style="font-size: 10px;width: 40px">BALANZA2</th>
                                <th style="font-size: 10px;width: 40px">GASTOS (EXTRAS)(**)</th>
                                <th style="font-size: 10px;width: 40px">CONTEXTO GASTO EXTRA</th>
                                <th style="font-size: 10px;width: 40px">LAVADERO (INICIO DE LAVADO)</th>
                                <th style="font-size: 10px;width: 40px">TURNO</th>
                                <th style="font-size: 10px;width: 40px">COSTO LAVADO Y DESINFECCION</th>
                                <th style="font-size: 10px;width: 40px">CANTIDAD DE COMBUSTIBLE RECARGADO</th>
                                <th style="font-size: 10px;width: 40px">PRECIO DEL COMBUSTIBLE</th>
                                <th style="font-size: 10px;width: 40px">COMBUSTIBLE RECARGADO</th>
                                <th style="font-size: 10px;width: 40px">CANTIDAD DE COMBUSTIBLE CONSUMIDO</th>
                                <th style="font-size: 10px;width: 40px">COMBUSTIBLE CONSUMIDO</th>
                                <th style="font-size: 10px;width: 40px">GASTOS TOTAL</th>
                                <th style="font-size: 10px;width: 40px">FECHA FACTURACION</th>
                                <th style="font-size: 10px;width: 40px">N° FACTURA</th>
                                <th style="font-size: 10px;width: 40px">FACTURADO</th>
                                <th style="font-size: 10px;width: 40px">KM INICIAL</th>
                                <th style="font-size: 10px;width: 40px">HORA INICIAL</th>
                                <th style="font-size: 10px;width: 40px">KM FINAL</th>
                                <th style="font-size: 10px;width: 40px">HORA FINAL</th>
                                <th style="font-size: 10px;width: 40px">KM RECORRIDO</th>
                                <th style="font-size: 10px;width: 40px">OBSERVACIONES</th>
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
                                <td> -</td>
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
                                {{-- <td  style="visibility:collapse; display:none;"> {{$doc->observaciones}}</td> --}}
                               
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
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                   

                                    @endif
                                <td>
                                    @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                        @foreach ($planificaciones as $pla)
                                            @if ($pla->choferes==0)
                                            Ninguno
                                        @else
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
                                         @endif
                                        @endforeach
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>-</td>
                                <td>{{$doc->lavado}}</td>
                                <td>{{$doc->comprobante}}</td>
                                <td>
                                    @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                        @foreach ($planificaciones as $pla)
                                            @if ($pla->id ==$doc->id_plani)
                                                 {{$pla->observaciones}}
                                            @else
                                            @endif
                                        @endforeach
                                    @else
                                    -
                                    @endif
                                </td>
                                <td>-</td>
                                
                                <td>{{$doc->hora_cochera}}</td>
                                <td>-</td>
                               
                                    {{-- GUIAS --}}
                               @if ($doc->id_cierre==0)
                               <td>-</td>
                               <td>-</td>
                               @else
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
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($datos_n_remision as $item2)
                                                {{$item2}} <br>
                                                @endforeach
                                            </td>
                                    @else
                                    
                                    @endif
                                @endforeach
                               @endif
                                    
                               
                                {{-- FIN GUIAS --}}
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>
                                    @if ($doc->id_peaje==0)
                                    0.0034312
                                    @else
                                        @foreach ($peajes as $item)
                                        {{-- @foreach ($item->datos_guias as $des) --}}
                                            @if ($doc->id_peaje==$item->id)
                                                {{$item->costo_total}}  
                                            @else
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                {{-- INICIO BALANZA --}}
                                <td>
                                    @if ($doc->id_balanza==0)
                                    0.000
                                    @else
                                        @foreach ($balanzas as $ba)
                                        {{-- @foreach ($item->datos_guias as $des) --}}
                                            @if ($doc->id_balanza==$ba->id)
                                                {{$ba->costo_total}}  
                                            @else
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                {{-- FIN DE BALANAZAS --}}
                                <td>0.00</td>
                                <td>bala</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                {{-- COMBUSTIBLES --}}
                               
                                @if ($doc->id_combustible==0)
                                
                                <td>0</td>
                                <td>0.00</td>
                                <td>0</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                @else
                                        @foreach ($combustibles as $co)
                                        {{-- @foreach ($item->datos_guias as $des) --}}
                                            @if ($doc->id_combustible==$co->id)
                                            <td>
                                                {{$co->cant_1re}} <br>
                                                {{$co->cant_2re}} 
                                                
                                            </td>
                                            <td>
                                                {{$co->precio_1re}} <br>
                                                {{$co->precio_2re}} 
                                            </td>
                                            <td>
                                                {{$co->recarga1}} <br>
                                                {{$co->recarga2}} 
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>{{$co->fecha_fac}}</td>
                                            <td>{{$co->n_fac}}</td>
                                            <td>-</td>  
                                            @else
                                            @endif
                                        @endforeach
                                @endif
                                
                                @if ($doc->id_cierre==0)
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                @else
                                        @foreach ($cierres as $cie)
                                       
                                            @if ($doc->id_cierre==$cie->id)
                                            <td>{{$cie->km_inicial}} </td>
                                            <td>-</td>
                                            <td>{{$cie->km_final}} </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            @else
                                            @endif
                                        @endforeach
                                @endif
                                
                                {{-- FIN DE COMBUSTIBLES --}}
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge bg-danger">Creado</span>
                                    @elseif ($doc->estado==3)
                                    <span class="badge bg-warning">Confirmado</span>
                                    @elseif ($doc->estado==4)
                                    <span class="badge bg-info">Finalizado</span>
                                    @elseif ($doc->estado==5)
                                    <span class="badge bg-primary">Facturado</span>
                                    @else 
                                    <span class="badge bg-danger">Pendiente Asig.</span>
                                    @endif
                                </td>
                                
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </div>    
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
                                {{-- <th style="font-size: 10px;width: 40px; display:none;">OBSERVACIONES</th> --}}
                                <th style="font-size: 10px;width: 40px">ASIGNAR</th>
                                <th style="font-size: 10px;width: 40px">UNIDAD</th>
                                <th style="font-size: 10px;width: 40px">PLACA</th>
                                <th style="font-size: 10px;width: 40px">CHOFER</th>
                                <th style="font-size: 10px;width: 40px">AYUDANTE</th>
                                {{-- <th>LAVADO</th>
                                <th>N° COMP.</th> --}}
                                <th style="font-size: 10px">HORA <br> EN COCHERA</th>
                                <th style="font-size: 10px">ESTADO</th>
                                <th style="font-size: 10px">ACCIONES</th>

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
                                {{-- <td  style="visibility:collapse; display:none;"> {{$doc->observaciones}}</td> --}}
                               <td>
                                @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                    <a type="button" class="btn  btn-icon rounded-circle
                                    btn-success waves-effect waves-float waves-light"
                                    href="{{route('enviar_info_conductor',$doc->id)}}">
                                    <i data-feather='phone'></i> </a>
                                    <a type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success waves-effect"
                                    data-bs-toggle="modal" data-bs-target="#editmodal{{$doc->id}}">
                                    <i data-feather='edit'> </i></a>
                                @elseif ($doc->estado==2) 
                                    {{-- <button type="button" class="btn btn-secondary waves-effect"
                                    data-bs-toggle="modal" data-bs-target="#editmodal{{$doc->id}}">
                                     Asignación...
                                    </button> --}}
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
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    @endif
                                <td>
                                    @if ($doc->estado==3 || $doc->estado==4 || $doc->estado==5) 
                                        @foreach ($planificaciones as $pla)
                                             @if ($pla->choferes==0)
                                               Ninguno
                                              @else
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
                                            @endif
                                        @endforeach
                                    @else
                                    -
                                    @endif
                                </td>
                                {{-- <td>{{$doc->lavado}}</td> --}}
                                <td>{{$doc->hora_cochera}}</td>
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge bg-danger">Creado</span>
                                    @elseif ($doc->estado==3)
                                    <span class="badge bg-warning">Confirmado</span>
                                    @elseif ($doc->estado==4)
                                    <span class="badge bg-info">Finalizado</span>
                                    @elseif ($doc->estado==5)
                                    <span class="badge bg-primary">Facturado</span>
                                    @else 
                                    <span class="badge bg-danger">Pendiente Asig.</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="col-lg-6 col-12">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                               
                                                <a type="button" class="btn btn-icon btn-warning waves-effect waves-float
                                                waves-light" href="{{route('admin.solicitudes.editar',$doc->id)}}">
                                                <i data-feather='edit'> </i></a>
                                                <a type="button" class="btn btn-icon btn-danger waves-effect waves-float waves-light"
                                                data-bs-toggle="modal" data-bs-target="#eli{{$doc->id}}">
                                                    <i data-feather='trash-2'></i></a>
                                          </div>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.modals.EliSoli')
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

    {{-- Tabla maestra --}}
    

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
                                
                                <th style="font-size: 10px;width: 40px">INDICACIONES<br> ESPECIALES</th>
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
                                                    <td>{{$pla->observaciones}}</td>
                                                @else
                                                @endif
                                        @endforeach
                                    @else
                                    <td></td>
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
                                        @elseif ($doc->estado==4 || $doc->estado==5) 
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
                                                        //    $fecha = $item->indicaciones;
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
                                                {{-- <td>{{$fecha}}</td> --}}
                                        @endif
                                    @endforeach
                                @else
                                <td></td>
                                <td></td>
                                @endif
                                
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge bg-danger">Creado</span>
                                    @elseif ($doc->estado==3)
                                    <span class="badge bg-warning">Confirmado</span>
                                    @elseif ($doc->estado==4)
                                    <span class="badge bg-info">Finalizado</span>
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
                    <table class="table table-striped table-bordered table-sm" id="solicitudes3">
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
                                <th>ACCIONES</th>
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
                                    @elseif ($doc->estado==5)
                                        @foreach ($cierres as $item)
                                            @if ($doc->id_cierre==$item->id)
                                                    <td> {{$item->fecha_fac}}</td>
                                                    <td> {{$item->n_fac}}</td>
                                            @endif
                                        @endforeach
                                    @else
                                    <td> <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#editcierre{{$doc->id}}" disabled>
                                        <i data-feather='plus'></i>
                            </button>
                        </td>
                                    <td></td>
                                    @endif
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge bg-danger">Creado</span>
                                    @elseif ($doc->estado==3)
                                    <span class="badge bg-warning">Confirmado</span>
                                    @elseif ($doc->estado==4)
                                    <span class="badge bg-info">Finalizado</span>
                                    @elseif ($doc->estado==5)
                                    <span class="badge bg-primary">Facturado</span>
                                    @else 
                                    <span class="badge bg-danger">Pendiente Asig.</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($doc->estado==5)
                                    <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                    data-bs-toggle="modal" data-bs-target="#editcierre2{{$doc->id}}">
                                    <i data-feather='edit'></i>
                                </button> 
                                    @else
                                    <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                  disabled>
                                    <i data-feather='edit'></i>
                                </button> 
                                    @endif
                                    
                                </td>
                            </tr>
                            @include('admin.modals.ActualizarCierre')
                            @include('admin.modals.ActualizarCierre2')
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
        var idioma2=

{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
    "sInfo":           "",
    "sInfoEmpty":      "",
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
                    "order": [[ 0, 'desc' ], [ 2, 'asc' ]],
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
        var table = $('#tablamaestro').DataTable({
                    dom:'Brt<"col-md-6 inline"i> <"col-md-6 inline">',
                    language: idioma2,
                    buttons: [
                    // 'excel'
                        {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel Maestro',
                        className: 'btn btn-sm btn-success round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,
                            32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53] }
                        }

                    ],
                    "order": [[ 0, 'desc' ], [ 2, 'asc' ]],
                    exportOptions: {
                    modifier: {
                    // DataTables core
                    // 'current', 'applied',
                    //'index', 'original'
                    page: 'all', // 'all', 'current'
                    search: 'none' // 'none', 'applied', 'removed'
                    },
                        columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,
                            32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53]
                        
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
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16] }
                        },
                        {
                            extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16] }
                        },
                    ],
                    "order": [[ 0, 'desc' ], [ 2, 'asc' ]],
                    exportOptions: {
                    modifier: {
                    // DataTables core
                    // 'current', 'applied',
                    //'index', 'original'
                    page: 'all', // 'all', 'current'
                    search: 'none' // 'none', 'applied', 'removed'
                    },
                        columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12,13,14,15,16]
                        
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