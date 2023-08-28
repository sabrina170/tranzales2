
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
                        <li class="breadcrumb-item"><a href="index.html">Solicitud</a>
                        </li>
                    </ol>
                </div>
            </div>
           
            {{-- <button class="btn btn-primary">Volver</button> --}}
        </div>
        <a href="{{route('admin.solicitudes.index')}}" type="button" class="btn btn-icon btn-outline-primary waves-effect mt-2">
            <i data-feather='arrow-left'></i>Volver
        </a>
    </div>
    
{{-- crea soli --}}
<form action="{{route('buscarclientexdestino')}}" method="get">
    @csrf
  Buscar sus Destino por Cliente - Origen
  <div class="row">
    <div class="col-md-4 col-12">
        <select  class="form-select info-ob" id="cliente" name="cliente"  @selected(old('cliente'))>
            
                @if (isset($id_cli))
                @foreach ($clientes as $cli)
                <option value="{{$cli->id}}" @if( $cli->id == $id_cli ) selected @endif>{{$cli->nombre}}- <strong>{{$cli->referencia}}</strong></option>
                @endforeach
                @else
                <option value="0">Seleccione un cliente</option>
                @foreach ($clientes as $cli)
                <option value="{{$cli->id}}" >{{$cli->nombre}}- <strong>{{$cli->referencia}}</strong></option>
                @endforeach  
                @endif
                
        </select>
    </div>
    <div class="col-md-4 col-12">
        <input type="submit" name="search" id="search" value="Buscar" class="btn btn-primary">
    </div>
    </form>
        <div class="card mt-2">
                <form  action="{{route('admin.crear-solicitud')}}" method="post">
                    @csrf
                <div class="card-body">
                        <div class="row">
                          <input type="hidden" class="form-control" id="codigo_solicitud" name="codigo_solicitud"
                                    value="UID{{ date("mdHis");}}" readonly>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="helpInputTop">FECHA SOLITUD:</label>
                                    <input type="date" value="{{ date("Y-m-d");}}" class="form-control" name="fecha_solicitud" id="fecha_solicitud" @selected(old('fecha_solicitud'))>
                                </div>
                            </div>
                            @if (isset($id_cli))
                            <input type="hidden" id="idcliente" name="idcliente" value="{{$id_cli}}">

                            @else
                                
                            @endif
                            {{-- <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="last-name-column">Cliente - ORIGEN</label>
                                    <select  class="form-select info-ob" id="cliente" name="cliente"  @selected(old('cliente'))>

                                        <option value="0">Seleccione un cliente</option>
                                            @foreach ($clientes as $cli)
                                            <option value="{{$cli->id}}">{{$cli->nombre}}- <strong>{{$cli->referencia}}</strong></option>
                                            @endforeach
                                        </select>
                                </div>
                            </div> --}}
                            
                            <div class="col-md-3 col-12">
                                <label class="form-label" for="disabledInput">FECHA DE TRASLADO:</label>
                                <input type="date" class="form-control" id="fecha_traslado" name="fecha_traslado">
                            </div>
                            
                            <div class="col-md-2 col-12">
                                <label class="form-label" for="disabledInput">HORA EN GRANJA:</label>
                                <input type="time" class="form-control" name="hora" id="hora">
                            </div>
                            <div class="col-md-2 col-12">
                                <label class="form-label" for="disabledInput">HORA EN COCHERA:</label>
                                <input type="time" class="form-control" name="hora_cochera" id="hora_cochera">
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="disabledInput">CANT. TOTAL</label>
                                    <input type="number" class="form-control" name="cantidad" id="cantidad" value="0" readonly>
                                </div>
                            </div>
                            {{-- <div class="col-md-3 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="disabledInput">Precio TOTAL</label>
                                    <input type="number" class="form-control" name="precio_total" id="precio_total" value="0" readonly>
                                </div>

                            </div> --}}
                            <div class="col-md-12 col-12">
                                <div class="mb-1">
                                    
                                    {{-- inicio table --}}
                                    <div ng-app="NewRows">
                                        <div ng-controller="Table">
                                            <div class="table-responsive">
                                                <table id="ejemplosuma" class="table table-bordered">
                                                <thead class="text-center">
                                                    <tr>
                                                    <th></th>
                                                    <th> Destinos</th>
                                                    <th></th>
                                                    <th>Cantidades</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="trat" ng-repeat="row in rows">
                                                        <td align="center"><input type="checkbox" ng-model="row.delete"></td>
                                                        <td style="width: 20%">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <select id="datos_destinos" name="datos_destinos[]"
                                                                     class="destinos_ar form-select info-ob"
                                                                     data-type="select"
                                                                     >
                                                                  
                                                                    @if (isset($destinos))
                                                                    @foreach ($destinos as $des)
                                                                    <option value="{{$des->id}}">{{$des->referencia}}</strong></option>
                                                                    @endforeach
                                                                    @else
                                                                        <option value="">Selecciona</option>
                                                                    @endif
                                                                       </select> 
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12">
                                                                <input class="price2 cantidad1 form-control" type="number"
                                                                 ng-model="row.cantidad1" id="cantidad1"
                                                                name="datos_cantidad1[]" oninput="multiplicar(event)"
                                                                 onKeyUp="Suma()" value="0">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12">
                                                                <input class="price2 cantidad2 form-control" type="number" ng-model="row.cantidad2" 
                                                                name="datos_cantidad2[]" oninput="multiplicar(event)" 
                                                                 onKeyUp="Suma()" value="0">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12">
                                                                <input class="price2 cantidad3 form-control" type="number" ng-model="row.cantidad3" 
                                                                name="datos_cantidad3[]" oninput="multiplicar(event)" 
                                                                onKeyUp="Suma()" value="0">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12">
                                                                <input class="price2 cantidad4 form-control" type="number" ng-model="row.cantidad4" 
                                                                name="datos_cantidad4[]" oninput="multiplicar(event)"
                                                                 onKeyUp="Suma()" value="0" >
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12">
                                                                <input class="subtotal form-control" 
                                                                 type="number" name="subtotal[]" value="0"
                                                                readonly> </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                                
                                                <button type="button" class="btn btn-success btn-sm mt-12" ng-click="AddRow()">+</button>
                                                <button type="button" class="btn btn-danger btn-sm mt-12" ng-click="RemoveRow()" ng-class="">x</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- fin de tabla --}}
                                </div>
                            </div>
                            <div class="col-md-3 col-4">
                                <div class="mb-1">
                                    <label class="form-label" for="exampleFormControlTextarea1">Lavado</label>
                                    {{-- <input type="text" class="form-control" name="lavado" id="lavado"> --}}
                                    <select class="form-select" name="lavado" id="lavado" required>
                                        <option value="" selected>Selecione un lavado</option>
                                        <option value="Lurin" >Lurin</option>
                                        <option value="Ventanilla" >Ventanilla</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-4">
                                <div class="mb-1">
                                    <label class="form-label" for="exampleFormControlTextarea1">N° Comprobante</label>
                                    <input type="text" class="form-control" value="" name="comprobante" id="comprobante" >
                                </div>
                            </div>
                            <div class="col-md-6 col-4">
                                <div class="mb-1">
                                    <label class="form-label" for="exampleFormControlTextarea1">Observaciones</label>
                                    <textarea class="form-control" name="observaciones" rows="3" value=""
                                    placeholder="Observaciones"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- medium modal -->
   
                <div class="modal fade" id="smallModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle"  aria-modal="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Fin de Solicitud</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row text-center">
                                    <label class="form-label" for="basicInput">Costo de esta Solicitud</label>
                                            <div id="texto" class="text-danger" style="display:none;"></div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            
                                            <input type="number" name="costo-soli" class="form-control"
                                             id="costo-soli" placeholder="165.00" readonly>
                                            {{-- <input type="number" name="id-cliente" class="form-control" id="id-cliente"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success">Agregar</button>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- medium modal -->
                
                <div class="card-footer">
                        <button id="smallButton" class="btn btn-danger me-1 waves-effect waves-float waves-light">Validar</button>
                </div>
                </form>
        
        </div>
</div>
@endsection

@section('js')

<script>

   
 // display a modal (small modal)
//  $(document).on('click', '#smallButton', function(event) {
        $('#smallButton').on('click', function(e){
                
                if ($("#datos_destinos option:selected").val() == "") {
                    Swal.fire({ icon: 'error', title: 'Selecciona un Cliente para seleccionar los destinos',})
                return false; 
                } else if ($("#fecha_solicitud").val() == "") {
                    Swal.fire({ icon: 'error', title: 'Poner una Fecha de Solicitud',})
                return false;
                }else  if ($("#fecha_traslado").val() == "") {
                    Swal.fire({ icon: 'error', title: 'Poner una Fecha de Traslado',})
                return false; 
                } else  if ($("#hora").val() == "") {
                    Swal.fire({ icon: 'error', title: 'Poner una Hora',})
                return false; 
                }else  if ($("#hora_cochera").val() == "") {
                    Swal.fire({ icon: 'error', title: 'Poner una Hora en cochera',})
                return false; 
                }else  if ($("#cantidad1").val() == "") {
                    Swal.fire({ icon: 'error', title: 'Ingresa una cantidad',})
                return false; 
                }else  if ($("#lavado").val() == "") {
                    Swal.fire({ icon: 'error', title: 'Poner un lavado',})
                return false; 
                }
            else{

            e.preventDefault();
            let href = $(this).attr('data-attr');
            var idcliente =  $("#idcliente").val();
            var lista = new Array();
            $('.destinos_ar').each(function() {
            var valor_input = $(this).val();
                    lista.push(valor_input);
            });
            var cont_lista =lista.length;

        
            $.ajax({
                // url: href,
                url:'{{ route('BuscarCosto') }}',
                    type:'GET',
                    data:{
                        'idcliente':idcliente,
                        'costo_des':lista,
                        'cont_lista':cont_lista
                    },
                    dataType:'json',
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(data) {
                    $('#smallModal').modal("show");
                    if (data==1) {
                        // $('#texto').style.display = '';
                        $('#texto').css({ 'display': ''});
                        $('#texto').html("Estos destinos no tienen un costo definido, porfavor agregarlo");
                        // $('#costo-soli').val(data);
                        $('#costo-soli').removeAttr("readonly");
                        $('#costo-soli').val(0);
                    }else{
                        $('#costo-soli').val(data);
                        $('#texto').css({ 'display': 'none'});
                        $('#costo-soli').attr("readonly","readonly");
                    }
                    
                    console.log(data);
                    return false;
                },
                
                timeout: 9000
            })
        } 
        });

        $('#smallButton2').on('click', function(e){
           
            // var codigo_solicitud =  $("#codigo_solicitud").val();
            // var fecha_solicitud =  $("#fecha_solicitud").val();
            // var idcliente =  $("#idcliente").val();
            // var fecha_traslado =  $("#fecha_traslado").val();
            // var hora =  $("#hora").val();
            // var cantidad =  $("#cantidad").val();
            // var observaciones =  $("#observaciones").val();
            // console.log(codigo_solicitud);

            var Tratamiento = {};
            $('.trat').each(function() {

                let tratamiento_temporal = {};

                let id_destino = $(this).find('.destinos_ar option:selected').val();
                let cantidad1 = $(this).find('.cantidad1').val();
                let cantidad2 = $(this).find('.cantidad2').val();
                let cantidad3 = $(this).find('.cantidad3').val();
                let cantidad4 = $(this).find('.cantidad4').val();
                let subtotal = $(this).find('.subtotal').val();


                tratamiento_temporal["id"] = id_destino;
                tratamiento_temporal["cant1"] = cantidad1;
                tratamiento_temporal["cant2"] = cantidad2;
                tratamiento_temporal["cant3"] = cantidad3;
                tratamiento_temporal["cant4"] = cantidad4;
                tratamiento_temporal["subtotal"] = subtotal;

                Tratamiento[id_destino] = tratamiento_temporal;
                });

                var tratamiento_final = JSON.stringify(Tratamiento);

            console.log(tratamiento_final);

            // mandar
            // $.ajax({
            //     // url: href,
            //     url:'{{ route('admin.crear-solicitud') }}',
            //         type:'POST',
            //         data:{
            //             'codigo_solicitud':codigo_solicitud,
            //             'fecha_solicitud':fecha_solicitud,
            //             'idcliente':idcliente,
            //             'fecha_traslado':fecha_traslado,
            //             'hora':hora,
            //             'cantidad':cantidad,
            //             'observaciones':observaciones,
            //             'datos_destinos':tratamiento_final
            //         },
            //         dataType:'json',
            //     beforeSend: function() {
            //         $('#loader').show();
            //     },
            //     // return the result
            //     success: function(data) {
            //         if (data==1) {
            //         }else{
                        
            //         }
            //         console.log(data);
            //         return false;
            //     },
            //     timeout: 9000
            // })
        });

    function multiplicar(e) {
        // Obtener LI padre desde el evento
        var li = $(e.target).closest('tr');
        // Obtener texto de precio, separando por 'Precio:'
         cant1 = Number($(li).find('[name^="datos_cantidad1"]').val());
         cant2 = Number($(li).find('[name^="datos_cantidad2"]').val());
         cant3 = Number($(li).find('[name^="datos_cantidad3"]').val());
         cant4 = Number($(li).find('[name^="datos_cantidad4"]').val());

        // // Multiplicar y asignar
         suma = cant1 + cant2 + cant3 + cant4;
        $(li).find('[name^="subtotal"]').val(suma);
        
    }
    
     function Suma() {
        var sum = 0;
        $('.price2').each(function() {
            sum += Number($(this).val());
        });
        // console.log(sum);
        $('#cantidad').val(sum);

    }


     var app = angular.module("NewRows",[]);
    app.controller("Table",['$scope',function($scope){
      //
      $scope.rows = [
         {
         delete:false,
         cantidad1:'0',
         cantidad2:'0',
         cantidad3:'0',
         cantidad4:'0',
         subtotal:'0'
         }
       ];
      /**
      * Add table row
      **/
      $scope.AddRow = function(){
        $scope.rows.push({
          delete:false,
          cantidad1:'0',
         cantidad2:'0',
         cantidad3:'0',
         cantidad4:'0',
         subtotal:0
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
