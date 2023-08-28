
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
                        <li class="breadcrumb-item active">Costos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- --}}
    
</div>


<div class="content-body">
    {{-- @if (Auth::user()->tipo==1 || Auth::user()->tipo==2) --}}
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
                                <th style="font-size: 10px;width: 40px">COSTO FLETE</th>
                                <th style="font-size: 10px;width: 40px">COSTO COMBUSTIBLE</th>
                                <th style="font-size: 10px;width: 40px">COSTO PEAJE</th>
                                <th style="font-size: 10px;width: 40px">COSTO BALANZA</th>
                                <th style="font-size: 10px;width: 40px">COSTO VIATICOS</th>
                                {{-- <th>LAVADO</th>
                                <th>N° COMP.</th> --}}
                                {{-- <th style="font-size: 10px">HORA <br> EN COCHERA</th> --}}
                                <th style="font-size: 10px">ESTADO</th>

                                {{-- <th>CIERRE</th> --}}
                                <th tyle="font-size: 10px;width: 20px">ACCIONES</th>
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
                                
                               <td>S/. <strong>{{$doc->costo}}</strong></td>
                                    <td>
                                        
                                        @if ($doc->id_combustible ==0)
                                        <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#crearcombustible{{$doc->id}}">
                                        <i data-feather='plus'></i>
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-danger btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#detcombustible{{$doc->id}}">
                                        <i data-feather='eye'></i>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @if ($doc->id_peaje ==0)
                                        <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#crearpeaje{{$doc->id}}">
                                        <i data-feather='plus'></i>
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-danger btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#detpeaje{{$doc->id}}">
                                        <i data-feather='eye'></i>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($doc->id_balanza ==0)
                                        <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#crearbalanza{{$doc->id}}">
                                        <i data-feather='plus'></i>
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-danger btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#detbalanza{{$doc->id}}">
                                        <i data-feather='eye'></i>
                                        </button>
                                        @endif
                                    </td>
                                     <td> 
                                        @if ($doc->id_viaticos ==0)
                                        <button type="button" class="btn btn-secondary btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#crearviatico{{$doc->id}}">
                                        <i data-feather='plus'></i>
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-danger btn-icon rounded-circle"
                                        data-bs-toggle="modal" data-bs-target="#detviatico{{$doc->id}}">
                                        <i data-feather='eye'></i>
                                        </button>
                                        @endif
                                </td>
                                {{-- <td>{{$doc->lavado}}</td> --}}
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
                                
                                <td>
                                    <div class="col-lg-6 col-12">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a type="button" class="btn btn-secondary waves-effect"  href="{{route('detalle-solicitud',$doc->id)}}">
                                                <i data-feather='eye'></i></a>
                                            {{-- <button type="button" class="btn btn-warning waves-effect">
                                                <i data-feather='edit'> </i></button>
                                                <button type="button" class="btn btn-danger waves-effect">
                                                    <i data-feather='trash-2'></i></button> --}}
                                          </div>
                                    </div>
                                   
                                </td>
                            </tr>
                            @include('admin.modals.CrearCombustible')
                            @include('admin.modals.CrearBalanza')
                            @include('admin.modals.CrearPeaje')
                            @include('admin.modals.CrearViatico')
                            @include('admin.modals.DetCombustible')
                            @include('admin.modals.DetBalanza')
                            @include('admin.modals.DetPeaje')
                            @include('admin.modals.DetViatico')
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div id="suma">
                        <input type="text" onKeyUp="calcular()" class="decimales" name="text" id="valor1" >
                        <label for="text"> Introduce primer num</label><br>
                        <input type="text" onKeyUp="calcular()" class="decimales" name="text" id="valor2">
                        <label for="text"> Introduce segundo num</label><br>
                        
                        <div class='text'>Total</div>
                        <div class='input'>
                            <input type='text' name='total' id='total' disabled></div>
                        
                        <p id="yo"></p>
                        <p id="po"></p>
                        <p id="sum"></p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
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

//Convierte el div a imagen y la descarga
document.querySelector('button').addEventListener('click', function() {
  
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

        $('.decimales').on('input', function () {
  this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
});

$(document).ready(inicio);
function inicio(){
	$("#suma input").keyup(calcular);
 
}
 
function calculo(val) {
    var precio = Number(document.getElementById("precio_1re" + val).value);
  var cantidad = Number(document.getElementById("cant_1re" + val).value);
  var resultado = document.getElementById("recarga1" + val);
//   var totalgeneral = document.getElementById("totgen");
  resultado.value = Math.round(cantidad * precio);
    resul =cantidad * precio;

  var precio2 = Number(document.getElementById("precio_2re" + val).value);
  var cantidad2 = Number(document.getElementById("cant_2re" + val).value);
  var resultado2 = document.getElementById("recarga2" + val);
//   var totalgeneral = document.getElementById("totgen");
  resultado2.value = Math.round(cantidad2 * precio2);
  resul2 =cantidad2 * precio2;

    total= resul+ resul2;
  var costo_total = document.getElementById("costo_total" + val);
  costo_total.value= Math.round(total);

//   PARA LOS PEAJES

    var peaje1 = Number(document.getElementById("peaje1" + val).value);
    var peaje2 = Number(document.getElementById("peaje2" + val).value);
    var peaje3 = Number(document.getElementById("peaje3" + val).value);
    var peaje4 = Number(document.getElementById("peaje4" + val).value);

    var precio1 = Number(document.getElementById("precio_peaje1" + val).value);
    var precio2 = Number(document.getElementById("precio_peaje2" + val).value);
    var precio3 = Number(document.getElementById("precio_peaje3" + val).value);
    var precio4 = Number(document.getElementById("precio_peaje4" + val).value);

    var total1 = Math.round(peaje1 * precio1);
    var total2 = Math.round(peaje2 * precio2);
    var total3 = Math.round(peaje3 * precio3);
    var total4 = Math.round(peaje4 * precio4);
    total_peaje = total1+total2+total3+total4;
    var resultado_peaje = document.getElementById("costo_total_peaje" + val);
    resultado_peaje.value = total_peaje ;
    var resultado_total1 = document.getElementById("total1" + val);
    var resultado_total2 = document.getElementById("total2" + val);
    var resultado_total3 = document.getElementById("total3" + val);
    var resultado_total4 = document.getElementById("total4" + val);
    resultado_total1.value = total1;
    resultado_total2.value = total2;
    resultado_total3.value = total3;
    resultado_total4.value = total4;

    // PARA VIATICOS

    var movilidad = Number(document.getElementById("movilidad" + val).value);
    var alimento = Number(document.getElementById("alimento" + val).value);
    var servicio = Number(document.getElementById("servicio" + val).value);

    total_viatico = movilidad+alimento+servicio;
    var resultado_viatico= document.getElementById("costo_total_viatico" + val);
    resultado_viatico.value = Math.round(total_viatico);
    
    console.log(total_viatico);
}
</script>
@endsection