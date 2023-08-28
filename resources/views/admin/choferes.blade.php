
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
                        <li class="breadcrumb-item"><a href="index.html">Choferes</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <section class="app-user-list">
       
         <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                
                <div class="card-body">
                    {{-- <p class="card-text">
                        Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You
                        can use any example of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>NOMBRES</th>
                                <th>DEPARTAMENTO</th>
                                <th>PROVINCIA</th>
                                <th>DISTRITO</th>
                                <th>DIRECCION</th>
                                <th>Fecha Creación</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($choferes as $doc)
                            <tr> 
                                <td>{{$doc->nombre}}</td>
                                <td>{{$doc->departamento}}</td>
                                <td>{{$doc->provincia}} </td>
                                <td>{{$doc->distrito}}</td>
                                <td>{{$doc->direccion}}</td>
                                <td>{{$doc->created_at}}</td>
                                <td><a href=""><i data-feather='eye'></i>Detalles</a>
                                    <a href=""><i data-feather='edit'></i>Editar</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
        <!-- list and filter start -->
        <div class="card">
            
            <!-- Modal to add new user starts-->
            <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                <div class="modal-dialog">
                    <form class="add-new-user modal-content pt-0" novalidate="novalidate">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-fullname">Nombres</label>
                                <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" name="user-fullname">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-uname">Apellido Paterno</label>
                                <input type="text" id="basic-icon-default-uname" class="form-control dt-uname"
                                 placeholder="Web Developer" name="user-name">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-email">Apellido Materno</label>
                                <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                 placeholder="Developer" name="user-email">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-contact">Telefono</label>
                                <input type="number" id="basic-icon-default-contact" class="form-control dt-contact" placeholder="+1 (609) 933-44-22" name="user-contact">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-company">DNI</label>
                                <input type="number" id="basic-icon-default-company" class="form-control dt-contact"
                                 placeholder="76232414" name="user-company">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="user-role">Rol de Usuario</label>
                                <select class="form-select" id="basicSelect">
                                    <option>Operario</option>
                                    <option>Gerente</option>
                                    <option>Administrador</option>
                                </select>  </div>
                           
                            <button type="submit" class="btn btn-danger me-1 data-submit waves-effect waves-float waves-light">Agregar</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal to add new user Ends-->
        </div>
        <!-- list and filter end -->
    </section>
</div>
@endsection

@section('js')


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
