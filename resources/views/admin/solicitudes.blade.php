

@extends('layouts.head')
<!-- MENU -->
@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Crear Solicitud</h2>
                
            </div>
        </div>
    </div>
    <div class="content-header-left text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-left">
            {{-- <a href="{{route('admin.solicitudes')}}" type="button" class="btn btn-danger waves-effect waves-float waves-light">Agregar +</a> --}}
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">UID{{ date("mdHis");}}</h4>
                </div>
                <div class="card-body">
                   
                    <div class="divider divider-danger">
                        <div class="divider-text">Datos</div>
                    </div>
                    <form class="form">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">Nombre Cliente</label>
                                    <select class="select2 form-select" ng-model="row.origen" name="datos_origen[]">
                                        <option value="AK" selected>SANTO MARTIN-LIMA-LIMA-VENTANILLA</option>
                                        <option value="HI">HUARANGOS-LIMA-CAÑETE-NUEVO IMPERIAL </option>
                                        <option value="CA">HUARANGOS -LIMA-LIMA-PACHACAMAC</option>
                                        <option value="NV">HUARANGOS -LIMA-LIMA-PACHACAMAC</option>
                                        <option value="OR">HUARANGOS -LIMA-HUAROCHIRI-HUAROCHIRI</option>
                                        <option value="WA">PAMPA FLORES-LIMA-PACHACAMAC-PACHACAMAC</option>
                                        <option value="AZ">MONTELIRIO-LIMA-CAÑETE-SAN VICENTE DE CAÑETE</option>
                                    
                                    </select> </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="last-name-column">Fecha y Hora Origen</label>
                                    <input type="date" id="last-name-column" class="form-control" value="{{date("Y-m-d H:i:s")}}" name="fecha_origen">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="city-column">Cantidad</label>
                                    <input type="text" id="city-column" class="form-control" placeholder="15 cerditos" name="cantidad">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country-floating">Fecha Translado</label>
                                    <input type="date" id="fecha_translado" class="form-control" name="fecha_translado">
                                </div>
                            </div>
                            
                        </div>

                        <div class="divider divider-danger">
                            <div class="divider-text">Translados</div>
                        </div>
                        {{-- inicio table --}}
                        <div ng-app="NewRows">
                            <div ng-controller="Table">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th></th>
                                          <th>Datos Origen</th>
                                          <th>Datos Guia</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr ng-repeat="row in rows">
                                          <td align="center"><input type="checkbox" ng-model="row.delete"></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6">
                                                     Sucursales (Origen)
                                                    <select class="select2 form-select" ng-model="row.origen" name="datos_origen[]">
                                                        <option value="AK" selected>CAMAL CONCHUCOS S A</option>
                                                        <option value="HI">FRIGORIFICO LA COLONIAL S.A.C.
                                                        </option>
                                                        <option value="CA">FRIGORIFICO CAMAL SAN PEDRO S.A.C.
                                                        </option>
                                                     
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    Destino
                                                    <select class="select2 form-select" ng-model="row.destino" name="datos_destino[]">
                                                        <option value="AK" selected>INVERSIONES PECUARIAS LURIN S A
                                                        </option>
                                                        <option value="HI">CAMAL FRIGORIFICO LURIN SOCIEDAD ANONIMA CERRADA
                                                        </option>
                                                        <option value="CA">ESMERALDA CORP S.A.C.
                                                        </option>
                                                        <option value="NV">CAMAL FRIGORIFICO LURIN SOCIEDAD ANONIMA CERRADA
                                                        </option>
                                                        <option value="OR">FRIGORIFICO LA COLONIAL S.A.C.
                                                        </option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    Cantidad
                                                     <input class="form-control" type="text" ng-model="row.cantidad" 
                                                     name="datos_cantidad[]" placeholder="5 cerditos">
                                                 </div>
                                            </div>
                                        </td>
                                        <td>
                                           <div class="row">
                                                <div class="col-md-6">
                                                    GUIA DE REMISION REMITENTE 
                                                    <input class="form-control" type="text" ng-model="row.numeroguiare" 
                                                    name="datos_numero_guia_re[]" placeholder="GUI092827272-R">
                                        
                                                </div>
                                                <div class="col-md-6">
                                                    Documento
                                                    <input class="form-control" type="file" ng-model="row.docrec" 
                                                    name="datos_doc_rec[]" placeholder="GUI092827272-T">
                                        
                                                </div>
                                           </div>
                                           <div class="row">
                                            <div class="col-md-6">
                                                GUIA DE REMISION TRANSPORTISTA 
                                                <input class="form-control" type="text" ng-model="row.numeroguiatra" 
                                                name="datos_numero_guia_tra[]" placeholder="GUI092827272-R">
                                    
                                            </div>
                                            <div class="col-md-6">
                                                Documento
                                                <input class="form-control" type="file" ng-model="row.doctra" 
                                                name="datos_doctra[]" placeholder="GUI092827272-T">
                                    
                                            </div>
                                       </div>
                                           <div class="row">
                                            <div class="col-md-6">
                                                FICHA DE RECEPCION
                                                <input class="form-control" type="text" ng-model="row.ficharece" 
                                                name="datos_ficha_rece[]" placeholder="GUI092827272">
                                    
                                            </div>
                                            <div class="col-md-6">
                                                Documento
                                                <input class="form-control" type="file" ng-model="row.docrece" 
                                                name="datos_doc_rece[]" placeholder="GUI092827272-T">
                                    
                                            </div>
                                       </div>
                                        
                                        </tr>
                                      </tbody>
                                    </table>
                                    
                                    <button type="button" class="btn btn-success mt-12" ng-click="AddRow()">Agregar</button>
                                    <button type="button" class="btn btn-danger mt-12" ng-click="RemoveRow()" ng-class="">Eliminar Filas</button>
                                </div>
                            </div>
                        </div>
                        {{-- fin de tabla --}}
                
                        <div class="divider divider-danger">
                            <div class="divider-text">Transporte</div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">N° de Placa</label>
                                            <select class="select2 form-select" ng-model="row.destino" name="datos_destino[]">
                                                <option value="AK">ASE740 </option>
                                                <option value="HI">ASE740</option>
                                                <option value="CA">AZQ855</option>
                                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="country-floating">Categoria</label>
                                            <select class="select2 form-select" ng-model="row.destino" name="datos_destino[]">
                                                <option value="AK">N3</option>
                                                <option value="HI">N2</option>
                                                <option value="CA">N3</option>
                                             
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">Chofer</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Juan Ivan, Vargas Alcantara" name="chofer">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">DNI</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="40256513" name="dni">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city-column">Ayudantes</label>
                                            <select class="form-select" id="normalMultiSelect" multiple="multiple">
                                                <option selected="selected">Alfonso, Llocclla Navarro</option>
                                                <option>Edher Lizardo, Cajahuanca Gomez</option>
                                                <option selected="selected">Jonathan Henry, Paucar Ilizarbe</option>
                                                <option>Darvin Lenin, Soto Guillen</option>
                                            </select>
                                            </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-1">
                                    <label class="form-label" for="exampleFormControlTextarea1">Observaciones</label>
                                    <textarea class="form-control" id="observaciones" name="observaciones" rows="8" placeholder="Textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn btn-success mt-12" >Finalizar</button>
                                <button type="button" class="btn btn-secondary mt-12">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->

   

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


          

  </script>
@endsection

<!-- MENU -->
