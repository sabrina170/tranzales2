
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
                        <li class="breadcrumb-item"><a href="index.html">Solicitudes</a>
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
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card p-1">
                <div class="table-responsive">
                    <table class="table table-striped-dark table-sm" id="solicitudes">
                        <thead class="text-center">
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>CODIGO SOLICITUD</th>
                                <th>FECHA SOLICITUD</th>
                                <th>CLIENTE</th>
                                <th>ORIGEN</th>
                                <th>DESTINOS</th>
                                <th>FECHA TRASLADO</th>
                                <th>HORA</th>
                                <th>CANT.</th>
                                <th>COSTO FLETE</th>
                                <th>ESTADO</th>
                                <th>PLANIFICACIÓN <br>(Unidad-Chofer) </th>
                                <th>PLANIFICACIÓN <br>(Ayudante)</th>
                                <th>LAVADO</th>
                                <th>N° COMP.</th>
                                <th>CIERRE</th>
                                {{-- <th>ACCIONES</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $doc)
                            
                            <tr> 
                                <td>{{$doc->codigo}}</td>
                                <td>{{$doc->fecha}}</td>
                                <td>{{$doc->nombre_cli}}</td>
                                <td>{{$doc->referencia_cli}}</td>
                                <td> 
                                    @foreach (json_decode($doc->destinos) as $item)
                                    @foreach ($destinos as $des)
                                        @if ($des->id==$item)
                                            <span class="badge badge-light-primary">{{$des->referencia}}</span>
                                        @else
                                        @endif
                                    @endforeach
                                    @endforeach
                                </td>
                                <td>{{$doc->fecha_traslado}}</td>
                                {{-- <td>{{$doc->origen}}</td> --}}
                                <td class="table-secondary"> <strong>{{$doc->hora}}</strong></td>
                                <td>{{$doc->cantidad}}</td>
                                <td>{{$doc->costo}}</td>
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge bg-info">Creado</span>
                                    @elseif ($doc->estado==3)
                                    <span class="badge bg-warning">En proceso</span>
                                    @elseif ($doc->estado==4)
                                    <span class="badge bg-success">Entregado</span>
                                    @else 
                                    <span class="badge bg-danger">Pendiente Asig.</span>
                                    @endif
                                </td>
                                <td>
                                       
                                        @if ($doc->estado==3 || $doc->estado==4) 
                                        @foreach ($planificaciones as $pla)
                                        @if ($pla->id ==$doc->id_plani)
                                                @foreach ($vehiculos as $uni)
                                                    @if ($uni->id==$pla->id_unidad)
                                                     
                                                    {{$uni->unidad}}
                                                    @else
                                                    @endif
                                                @endforeach
                                                @foreach ($choferes as $ch)
                                                @if ($ch->id==$pla->id_chofer)
                                               {{$ch->nombres_cho}} {{$ch->apellidos_cho}}
                                                @else
                                                @endif
                                            @endforeach
                                            
                                            <a type="button" class="btn btn-icon btn-icon rounded-circle
                                            btn-success waves-effect waves-float waves-light"
                                             href="{{route('enviar_info_conductor',$doc->id)}}">
                                            <i data-feather='phone'></i> </a>
                                            
                                        @else
                                        @endif
                                        @endforeach
                                       
                                        @elseif ($doc->estado==2) 
                                        <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-toggle="modal" data-bs-target="#editmodal{{$doc->id}}">
                                       Asignación...
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-toggle="modal" data-bs-target="#crearmodal{{$doc->id}}">
                                       Asignar
                                        </button>
                                        @endif
                                
                                </td>
                                <td>
                                    @if ($doc->estado==3 || $doc->estado==4) 
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
                                <td>{{$doc->lavado}}</td>
                                <td>{{$doc->comprobante}}</td>
                                <td>
                                        @if ($doc->estado==3) 
                                        <button type="button" class="btn btn-secondary waves-effect"
                                        data-bs-toggle="modal" data-bs-target="#crearcierre{{$doc->id}}">
                                            Asignar
                                        </button>
                                        @elseif ($doc->estado==4) 
                                        <button type="button" class="btn btn-danger waves-effect"
                                        data-bs-toggle="modal" data-bs-target="#detcierre{{$doc->id}}">
                                        <i data-feather='download-cloud'></i> Pdfs
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-outline-secondary waves-effect" 
                                        data-bs-toggle="modal" data-bs-target="#crearcierre{{$doc->id}}" disabled>
                                            Asignar
                                        </button>
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

$(document).ready( function () {
   var table = $('#colegios').DataTable({
    dom: 'Blfrtip',
    // "dom": 'Br<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',
    // "lengthMenu": [[5,10,20, -1],[5,10,50,"Mostrar Todo"]],
    // "dom": 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
    language: idioma,
    buttons: [
        'excel'
    ],
    exportOptions: {
        modifier: {
          // DataTables core
          order: 'index', // 'current', 'applied',
          //'index', 'original'
          page: 'all', // 'all', 'current'
          search: 'none' // 'none', 'applied', 'removed'
        },
    
            columns: [1, 2, 3, 4, 5, 6, 7,8,9]
      
      }
   });

} );

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
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12,13] }
                        },
                        {
                            extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        className: 'btn btn-sm btn-info round waves-effect',
                        exportOptions: { columns: [0,1,2,3, 4, 5, 6,7,8,9,10,11,12,13] }
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
                        columns: [0,1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12,13]
                        
                    }
                })

        } );
</script>
@endsection

