
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
                        <li class="breadcrumb-item"><a href="index.html">Clientes</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  action="{{route('crearcliente')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Nombre</label>
                                        <input type="text" id="first-name-column" class="form-control"  name="nombre" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Referencia</label>
                                        <input type="text" id="first-name-column" class="form-control"  name="referencia" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Ruc</label>
                                        <input type="number" id="ruc" class="form-control"  name="ruc" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="last-name-column">Departamento</label>
                                        <select  class="form-select info-ob" id="departamento" name="departamento"  @selected(old('departamento'))>

                                        <option value="0">Seleccione un departamento</option>
                                            @foreach ($departamentos as $departamento)
                                            <option value="{{$departamento->id}}">{{$departamento->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="city-column">Provincia</label>
                                        <select  class="form-select info-ob" data-type="select" data-msj="Seleccione una provincia" id="provincia" name="provincia"  @selected(old('provincia'))>
                                            <option value="0">Seleccione una provincia</option>
                                            {{-- <option value="Distrito 1">Distrito 1</option> --}}
                                        </select>
                                        @error('provincia')
                                        <span class="badge badge-light-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">Distrito</label>
                                        <select  class="form-select info-ob" data-type="select" data-msj="Seleccione un distrito" id="distrito" name="distrito" @selected(old('distrito'))>
                                            <option value="0">Seleccione un distrito</option>
                                            {{-- <option value="Distrito 1">Distrito 1</option>
                                            <option value="Distrito 2">Distrito 2</option> --}}
                                        </select>
                                        @error('distrito')
                                        <span class="badge badge-light-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="company-column">Direccion</label>
                                        <input type="text" id="company-column" class="form-control" name="direccion"
                                          required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="company-column">Tipo de Servicio</label>
                                      
                                          <select class="form-select" name="tipo_servicio" required>
                                            <option value="1">GORRINOS</option>
                                            <option value="2">ALIMENTOS</option>
                                            <option value="3">LECHONES</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="company-column">Contactos</label>
                                        {{-- inicio table --}}
                                            <div ng-app="NewRows">
                                                <div ng-controller="Table">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                            <th></th>
                                                            <th>Contacto</th>
                                                            <th>Telefono</th>
                                                            <th>Cargo</th>
                                                            <th>Correo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="trat" ng-repeat="row in rows">
                                                                <td align="center"><input type="checkbox" ng-model="row.delete"></td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <input type="text" id="company-column" class="datos_contacto form-control" name="datos_contacto[]" required>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="number" id="company-column" class="datos_telefono form-control" name="datos_telefono[]" required>
                                                                        </div>
                                                                </div>
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="text" id="company-column" class="datos_cargo form-control" name="datos_cargo[]" required>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="text" id="company-column" class="datos_correo form-control" name="datos_correo[]" required>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        
                                                        <button type="button" class="btn btn-success mt-12" ng-click="AddRow()">Agregar</button>
                                                        <button type="button" class="btn btn-danger mt-12" ng-click="RemoveRow()" ng-class="">Eliminar Filas</button>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- fin de tabla --}}
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
                                <th>GRANJA</th>
                                <th>REFERENCIA</th>
                                <th>DEPARTAMENTO</th>
                                <th>PROVINCIA</th>
                                <th>DISTRITO</th>
                                <th>ESTADO</th>
                                <th>TIPO SERVICIO</th>
                                {{-- <th>DIRECCION</th> --}}
                                <th>FECHA CREACIÓN</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $doc)
                            <tr> 
                                <td>{{$doc->nombre}}</td>
                                <td>
                                    <span class="badge badge-light-warning">{{$doc->referencia}}</span>
                                </td>
                                <td>{{$doc->nombre_dep}}</td>
                                <td>{{$doc->nombre_prov}} </td>
                                <td>{{$doc->nombre_dis}}</td>
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge badge-glow bg-success">Activo</span>
                                    @else
                                    <span class="badge badge-glow bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- {{$doc->tipo_servicio}} --}}
                                    @if ($doc->tipo_servicio==1)
                                        <strong>GORRINOS</strong>
                                    @elseif($doc->tipo_servicio==2)
                                    <strong>ALIMENTOS</strong>
                                    @elseif($doc->tipo_servicio==3)
                                    <strong>LECHONES</strong>
                                    @else
                                    <strong>-</strong>
                                    @endif
                                   
                                </td>
                                {{-- <td>{{$doc->direccion}}</td> --}}
                                <td>{{$doc->created_at}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#view{{$doc->id}}">
                                            <i data-feather='eye'></i></a>
                                            
                                        <a type="button" class="btn btn-dark btn-sm" href="{{ route('edit-cliente',$doc->id) }}"><i data-feather='edit'></i></a>
                                        <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eli{{$doc->id}}"><i data-feather='trash-2'></i></a> 
                                    </div>
                            </tr>
                            @include('admin.modals.modaldetcli')
                            @include('admin.modals.modalelicli')
                            {{-- @include('admin.modals.modaledicli') --}}

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
            $('#departamento').on('change', function(){
                var id = $(this).val();
                // alert(id);
                    $.ajax({
                    url:'{{ route('buscarprovincia') }}',
                    type:'GET',
                    data:{'id':id},
                    dataType:'json',
                    success:function (data) {
                        // $('#product_list').html(data);
                        $('#provincia').html(data.table_data);
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
  <script>
   

//     $('#add-receta').on('click', function(e) {
//         var Tratamiento = {};

//         // alert('sdasdasdasd');
//         // e.preventDefault();

//         var nombre = $('#nombre').val();
//         // var nombre = 'DASDASDS';

//         var ruc = $('#ruc').val();
//         var departamento = $('#departamento').val();
//         var provincia = $('#provincia').val();
//         var distrito = $('#distrito').val();
//         var direccion = $('#direccion').val();
//         var tipo_servicio = $('#tipo_servicio').val();

// /* ------------------- CONTACTOS ------------------- */

//         $('.trat').each(function() {

//             let tratamiento_temporal = {};

//             let datos_contacto = $(this).find('.datos_contacto').val();
//             let datos_telefono = $(this).find('.datos_telefono').val();
//             let datos_cargo = $(this).find('.datos_cargo').val();
//             let datos_correo = $(this).find('.datos_correo').val();


//             tratamiento_temporal["contacto"] = datos_contacto;
//             tratamiento_temporal["telefono"] = datos_telefono;
//             tratamiento_temporal["cargo"] = datos_cargo;
//             tratamiento_temporal["correo"] = datos_correo;

//             Tratamiento[datos_contacto] = tratamiento_temporal;
//             // console.log(tratamiento_temporal);
//         });

//         var tratamiento_final = JSON.stringify(Tratamiento);
//         datos_registro = $('#formulario_registro').serialize();

//         console.log(tratamiento_final);
//         $.ajax({
//             method: 'POST',
//             url: '{{route('crearcliente')}}',
//             // data: {
//             //     "_token": $("meta[name='csrf-token']").attr("content"),
//             //     nombre: nombre,
//             //     ruc: ruc,
//             //     departamento: departamento,
//             //     provincia: provincia,
//             //     distrito: distrito,
//             //     direccion:direccion,
//             //     tipo_servicio:tipo_servicio,
//             //     contactos: tratamiento_final
//             // },
//             data: datos_registro,
//             // type: "post",
//             // dataType: 'json',
//             success: function(data) {
//                 console.log(data);

//                 if (data == 1) {
//                     Swal.fire({
//                         icon: 'success',
//                         title: 'Receta Registrada',
//                         text: 'Se inserto correctamente'
//                     }).then(function() {
//                         //location.href = "page-recetas.php";
//                         window.location.href = '{{route('admin.clientes.index')}}';
//                     });
//                 } else {
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'No se pudo registrar la receta',
//                         text: data
//                     }).then(function() {
//                         //location.reload();
//                     });
//                 }

//                 return false;
//             }
//         });
//         return false;
// });
  </script>
@endsection

<!-- MENU -->
