
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
                        <li class="breadcrumb-item"><a href="index.html">Editar Cliente</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <a href="{{route('admin.clientes.index')}}" type="button" class="btn btn-icon btn-outline-primary waves-effect mt-2">
            <i data-feather='arrow-left'></i>Volver
        </a>
    </div>
</div>

     
<div class="card">
    <div class="card-body">
        @foreach ($cliente as $doc)
        <form action="{{route('update-cliente',$doc->id)}}"  method="POST">
            @csrf
            
       
        <div class="row">
          <div class="col-md-4 col-12">
              <div class="mb-1">
                  <label class="form-label" for="first-name-column">Nombre</label>
                  <input type="text" id="first-name-column" class="form-control"  name="nombre" value="{{$doc->nombre}}" required>
              </div>
          </div>
          <div class="col-md-4 col-12">
              <div class="mb-1">
                  <label class="form-label" for="first-name-column">Ruc</label>
                  <input type="number" id="ruc" class="form-control"  name="ruc" value="{{$doc->ruc}}" required>
              </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="mb-1">
                <label class="form-label" for="first-name-column">Referencia</label>
                <input type="text" id="ruc" class="form-control"  name="referencia" value="{{$doc->referencia}}" required>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="mb-1">
                <label class="form-label" for="last-name-column">Departamento</label>
                <select  class="form-select info-ob" id="departamento" name="departamento"  required>

                <option value="0">Seleccione un departamento</option>
                    @foreach ($departamentos as $departamento)
                    <option value="{{$departamento->id}}" @if ($departamento->id==$doc->departamento) selected @else  @endif>{{$departamento->name}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-4 col-12">
              <div class="mb-1">
                  <label class="form-label" for="city-column">Provincia</label>
                  <select  class="form-select info-ob" data-type="select" data-msj="Seleccione una provincia" id="provincia" name="provincia"  required>
                    @foreach ($provincias as $prov)
                   <option value="{{$prov->id}}" @if ($prov->id==$doc->provincia) selected @else  @endif>{{$prov->name}}</option>
                    @endforeach
                    {{-- <option value="Distrito 1">Distrito 1</option> --}}
                </select>
              </div>
          </div>
          <div class="col-md-4 col-12">
              <div class="mb-1">
                  <label class="form-label" for="country-floating">Distrito</label>
                  <select  class="form-select info-ob" data-type="select" data-msj="Seleccione un distrito" id="distrito" name="distrito" required>
                    @foreach ($distritos as $dis)
                   <option value="{{$dis->id}}" @if ($dis->id==$doc->distrito) selected @else  @endif>{{$dis->name}}</option>
                    @endforeach
                </select>
              </div>
          </div>
        
          <div class="col-md-4 col-12">
              <div class="mb-1">
                  <label class="form-label" for="company-column">Direccion</label>
                  <input type="text" id="direccion" name="direccion" class="form-control" value="{{$doc->direccion}}" required>
              </div>
          </div>
          <div class="col-md-4 col-12">
              <div class="mb-1">
                  <label class="form-label" for="company-column">Tipo de Servicio</label>
                  <select class="form-select" name="tipo_servicio" required>
                    <option value="1" @if ($doc->tipo_servicio==1) selected @else  @endif>GORRINOS</option>
                    <option value="2" @if ($doc->tipo_servicio==2) selected @else  @endif>ALIMENTOS</option>
                    <option value="3" @if ($doc->tipo_servicio==3) selected @else  @endif>LECHONES</option>
                </select>
              </div>
          </div>
          <div class="col-md-4 col-12">
            <div class="mb-1">
                <label class="form-label" for="company-column">Estado</label>
                <select class="form-select" name="estado" required>
                  <option value="1" @if ($doc->estado==1) selected @else  @endif>Activo</option>
                  <option value="0" @if ($doc->estado==0) selected @else  @endif>Desactivo</option>
              </select>
            </div>
          </div>
        
          {{-- arregldo --}}
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
                                    @foreach (json_decode($doc->contactos) as $item)
                                    <tr class="trat" ng-repeat="row in rows">
                                        <td align="center"><input type="checkbox" ng-model="row.delete"></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" id="company-column" class="datos_contacto form-control" 
                                                    name="datos_contacto[]" value="{{$item->contacto}}" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <input type="number" id="company-column" class="datos_telefono form-control"
                                                     name="datos_telefono[]" value="{{$item->telefono}}" required>
                                                </div>
                                        </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="company-column" class="datos_cargo form-control" 
                                                    name="datos_cargo[]" value="{{$item->cargo}}" required>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="company-column" class="datos_correo form-control"
                                                     name="datos_correo[]" value="{{$item->correo}}" required>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- <div class="row">
                                      <div class="col-3">{{$item->contacto}}</div>
                                      <div class="col-3">{{$item->telefono}}</div>
                                      <div class="col-3">{{$item->cargo}}</div>
                                      <div class="col-3">{{$item->correo}}</div>
                                    </div> --}}
                                      @endforeach
                                   
                                </tbody>
                                </table>
                                </div>
                        </div>
                    </div>
                {{-- fin de tabla --}}
            </div>
        </div>

        </div>
        <div class="card-footer">
<input type="hidden" value="{{$doc->id}}" name="id">
        <button type="submit" class="btn btn-danger me-1 waves-effect waves-float waves-light">Editar</button>

        </div>

        </form>
        @endforeach
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
 
@endsection

<!-- MENU -->
