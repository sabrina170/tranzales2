
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
                        <li class="breadcrumb-item"><a href="index.html">Tarifas</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content-header-left text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-left">
            <a href="" type="button" class="dt-button add-new btn btn-danger"
            type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar +</a>
        </div>
    </div>
</div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Tarifa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  action="{{route('crear_tarifa')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Cliente - Referencia</label>
                                        <select class="form-select" name="cliente" id="cliente" required>
                                            <option value="">Selecciona un cliente</option>
                                            @foreach ($clientes as $doc)
                                            <option value="{{$doc->id}}"> {{$doc->nombre}} - {{$doc->referencia}}</option>
                                            @endforeach
                                        </select>

                                       
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                        <div class=" mb-1" data-select2-id="133">
                                            <label class="form-label" for="select2-limited"> Destinos (Seleccione 1 o más destinos)</label>
                                            <div class="position-relative" data-select2-id="132">
                                                <select class="select2 form-select select2-hidden-accessible" 
                                                id="select2-multiple" multiple="" 
                                                data-select2-id="select2-multiple" tabindex="-1"
                                                aria-hidden="true" name="datos_destinos[]" required>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Base</label>
                                        <input type="text"  class="form-control cant decimales" onKeyUp="Suma()" name="base" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">IGV</label>
                                        <input type="text"  class="form-control cant decimales" onKeyUp="Suma()" name="igv" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="first-name-column">Total</label>
                                            <input type="number" id="total" class="form-control"  name="total" readonly>
                                        </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button id="add-receta" type="submit" class="btn btn-danger me-1 waves-effect waves-float waves-light">Agregar</button>
            
                    </div>
                    </form>
              </div>
            </div>
        </div>
            

         <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card p-1">
                <div class="table-responsive">
                    <table class="table table-sm" id="clientes">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>CLIENTE</th>
                                {{-- <th>REFERENCIA(ORIGEN)</th> --}}
                                <th>DESTINOS</th>
                                <th>BASE</th>
                                <th>IGV</th>
                                <th>TOTAL</th>
                                <th>FECHA CREACIÓN</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarifas as $doc)
                            <tr> 
                                <td>{{$doc->nombre_cli}} - {{$doc->refe_cli}}</td>
                                <td>
                                    <div class="row">
                                        @foreach (json_decode($doc->destinos) as $item)
                                        @foreach ($destinos as $des)
                                            @if ($des->id==$item)
                                            <div class="col-3">
                                                <span class="badge badge-light-primary">{{$des->referencia}}</span>
                                                </div> 
                                            @else
                                                
                                            @endif
                                        @endforeach
                                        
                                        @endforeach
                                    </div>
                                </td>
                                <td>{{$doc->base}} </td>
                                <td>{{$doc->igv}}</td>
                                <td>
                                    {{$doc->total}}
                                </td>
                                {{-- <td>{{$doc->direccion}}</td> --}}
                                <td>{{$doc->created_at}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#view{{$doc->id}}">
                                            <i data-feather='eye'></i></a> --}}
                                        {{-- <a type="button" class="btn btn-dark btn-sm" href="{{route('admin.vehiculos.edit-vehiculo',$doc->id)}}"><i data-feather='edit'></i></a> --}}
                                        <a type="button" class="btn btn-danger btn-sm"
                                         data-bs-toggle="modal" data-bs-target="#eli{{$doc->id}}">X</a>
                                    </div>
                            </tr>
                            @include('admin.modals.modalelitari')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
    </section>
</div>
@endsection

@section('js')

<script>
     var app = angular.module("NewRows",[]);
    app.controller("Table",['$scope',function($scope){
      //
      $scope.rows = [
         {
         delete:false,
         names:'',
         last_names:''
         }
       ];
      /**
      * Add table row
      **/
      $scope.AddRow = function(){
        $scope.rows.push({
          delete:false,
          names:'',
          last_names:''
        })
      };
      /**
      * Remove table row
      **/
      $scope.RemoveRow = function(){
        for(var i = $scope.rows.length - 1; i >= 0; i--){
          if($scope.rows[i].delete){
            $scope.rows.splice(i,1);
          
          }
        }
      };
      /**
      * Send BD
      **/
      $scope.SaveRowsBD = function(){
        angular.forEach($scope.rows,function(value,key){
    
        });
      };
    }]);
</script>
<script>
    $('.decimales').on('input', function () {
  this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
});

            $('#cliente').on('change', function(){
                var id = $(this).val();
                // alert(id);
                    $.ajax({
                    url:'{{ route('buscardestino2') }}',
                    type:'GET',
                    data:{'id':id},
                    dataType:'json',
                    success:function (data) {
                        // $('#product_list').html(data);
                        $('#select2-multiple').html(data.table_data);
                        
                    // if (data.total_row==0) {
                    //     $('#destinos').css(data.table_data);
                    // }
                        // alert(data.table_data);
                    }
                })
            });

            $('#provincia').on('change', function(){
                var id = $(this).val();
                // alert(id);
                    $.ajax({
                    url:'{{ route('buscardistrito') }}',
                    type:'GET',
                    data:{'id':id},
                    dataType:'json',
                    success:function (data) {
                        // $('#product_list').html(data);
                        $('#distrito').html(data.table_data);
                        // alert(data.table_data);
                    }
                })
            });
</script>
  <script>
    var idioma=

        {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
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
                "sLast":     "Último",
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
                    order: [ 0, 'asc' ], // 'current', 'applied',
                    //'index', 'original'
                    page: 'all', // 'all', 'current'
                    search: 'none' // 'none', 'applied', 'removed'
                    },
                        columns: [1, 2, 3, 4, 5, 6, 7, 8,9,10]
                    }
        });

        } );

  </script>
  <script>
   function Suma() {
        var sum = 0;
    $('.cant').each(function() {
        sum += Number($(this).val());
    });
    console.log(sum);
    $('#total').val(sum);

    }
  </script>
@endsection

<!-- MENU -->
