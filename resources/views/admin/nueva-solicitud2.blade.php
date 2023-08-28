@extends('layouts.head')
<!-- MENU -->
@section('content')
            
            <div class="content-body">
                <form action="{{ route('admin.crear-solicitud') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">SOLICITUD Y DETALLE DEL CLIENTE:</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">COD. SOLICITUD:</label>
                                                <input type="text" class="form-control" id="codigo_solicitud" name="codigo_solicitud"
                                                 value="UID{{ date("mdHis");}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helpInputTop">FECHA SOLITUD:</label>
                                                <input type="date" class="form-control" name="fecha_solicitud" id="fecha_solicitud" required>
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="helperText">CLIENTE (GRANJA):</label>
                                                <select class="select2 form-select" id="cliente">
                                                    {{-- @if (isset($clientes)) --}}
                                                        @foreach ($clientes as $doc)
                                                        <option value="{{$doc->id}}">{{$doc->nombre}}-{{$doc->referencia}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <label class="form-label" for="disabledInput">FECHA DE TRASLADO:</label>
                                            <input type="date" class="form-control" id="fecha_traslado" name="fecha_traslado" required>
                                        </div>
                                        
                                        <div class="col-md-4 col-12">
                                            <label class="form-label" for="disabledInput">HORA EN GRANJA:</label>
                                            <input type="time" class="form-control" name="hora" id="hora" required>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="disabledInput">CANT. TOTAL</label>
                                                <input type="number" class="form-control" name="cantidad" id="cantidad" value="0" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-6">
                                    {{-- inicio table --}}
                                        <div ng-app="NewRows">
                                            <div ng-controller="Table">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                        <th></th>
                                                        <th>Datos Origen</th>
                                                        <th>Cantidad</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="row in rows">
                                                        <td align="center"><input type="checkbox" ng-model="row.delete"></td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <select class="form-select" name="datos_destinos[]" id="destino" ng-model="row.destinos" required>
                                                                            {{-- @foreach ($destinos as $doc2)
                                                                            <option value="{{$doc2->id}}"> {{$doc2->empresa}}</option>
                                                                            @endforeach --}}
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input class="price2 form-control" type="number" ng-model="row.cantidad" 
                                                                    name="datos_cantidad[]"  onKeyUp="Suma()" placeholder="20" value="0" required>
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
                                    <div class="col-6">

                                        <div class="mb-1">
                                            <label class="form-label" for="exampleFormControlTextarea1">Observaciones</label>
                                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Textarea"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class=" col-md-12 mb-1 mb-lg-0 text-center">
             <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Crear Solicitud</button>
                </div>
                </form>
            </div>
       
@endsection
@section('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.8/angular.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js" type="text/javascript"></script>

<script>

//     $(document).ready(function() {
//     $('.js-example-basic-single').select2();
// });
//Función que realiza la suma
    function Suma() {
        var sum = 0;
    $('.price2').each(function() {
        sum += Number($(this).val());
    });
    console.log(sum);
    $('#cantidad').val(sum);

    }
</script>
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

    $("#BtnEnviar").click(function (e) {
      e.preventDefault();
      var nombre = $('#txtNombre').val();
      $.ajax({
        type: "post",
        url: "mi_ruta_post",
        data: {
            nombre: nombre
        }, success: function (msg) {
                alert("Se ha realizado el POST con exito "+msg);
        }
      });
  });
        </script>
        <script>
            $('#cliente').on('change', function(){
                var id = $(this).val();
                alert(id);
                console.log(id);
                    // $.ajax({
                    // url:'{{ route('buscardestino') }}',
                    // type:'GET',
                    // data:{'id':id},
                    // dataType:'json',
                    // success:function (data) {
                    //     // $('#product_list').html(data);
                    //     $('#destino').html(data.table_data);
                    //     // alert(data.table_data);
                    // }
                // })
            });
        </script>
    