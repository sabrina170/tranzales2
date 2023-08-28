
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
                        <li class="breadcrumb-item"><a href="index.html">Rutas</a>
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
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Ruta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('crear-ruta')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="last-name-column">CLIENTE</label>
                                        <select  class="form-select info-ob" id="cliente" name="cliente"  @selected(old('cliente'))>

                                        <option value="0">Seleccione un cliente</option>
                                            @foreach ($clientes as $cli)
                                            <option value="{{$cli->id}}">{{$cli->nombre}}- <strong>{{$cli->referencia}}</strong></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">DESTINO</label>
                                        <select  class="form-select info-ob" data-type="select" data-msj="Seleccione un distrito" 
                                        id="destino" name="destino" required>
                                            {{-- <option value="0">Seleccione un origen</option> --}}
                                            {{-- <option value="Distrito 1">Distrito 1</option>
                                            <option value="Distrito 2">Distrito 2</option> --}}
                                        </select>
                                        @error('destino')
                                        <span class="badge badge-light-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="company-column">Distancia</label>
                                        <input type="number" id="company-column" class="form-control" name="distancia"
                                          required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="company-column">Galones</label>
                                        <input type="number" id="company-column" class="form-control" name="galones"
                                          required>
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
                                <th>PUNTO DE INICIO</th>
                                {{-- <th>ORIGEN</th> --}}
                                <th>PUNTO FINAL</th>
                                <th>DISTANCIA (KM)</th>
                                <th>GALONES</th>
                                <th>Fecha Creación</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rutas as $doc)
                            <tr> 
                                <td>{{$doc->nombre_cli}} - {{$doc->re_cli}}</td>
                                {{-- <td>{{$doc->id_origen}}</td> --}}
                                <td> {{$doc->nombre_des}} {{$doc->origen_cli}}</td>
                                <td>{{$doc->distancia}} KM</td>
                                <td>{{$doc->galones}}</td>
                                <td>{{$doc->created_at}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{-- <a type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#view{{$doc->id}}">
                                            <i data-feather='eye'></i></a> --}}
                                        {{-- <a type="button" class="btn btn-dark btn-sm" href="{{route('admin.vehiculos.edit-vehiculo',$doc->id)}}"><i data-feather='edit'></i></a> --}}
                                        <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eli{{$doc->id}}"><i data-feather='trash-2'></i></a>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.modals.modaleliruta')
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
    console.log(value);
        });
      };
    }]);
</script>
<script>
            $('#cliente').on('change', function(){
                var id = $(this).val();
                // alert(id);
                    $.ajax({
                    url:'{{ route('buscardestino') }}',
                    type:'GET',
                    data:{'id':id},
                    dataType:'json',
                    success:function (data) {
                        // $('#product_list').html(data);
                        $('#destino').html(data.table_data);
                        // alert(data.table_data);
                    }
                })
            });

            // $('#origen').on('change', function(){
            //     var id = $(this).val();
            //     // alert(id);
            //         $.ajax({
            //         url:'{{ route('buscardestino') }}',
            //         type:'GET',
            //         data:{'id':id},
            //         dataType:'json',
            //         success:function (data) {
            //             // $('#product_list').html(data);
            //             $('#destino').html(data.table_data);
            //             // alert(data.table_data);
            //         }
            //     })
            // });
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
