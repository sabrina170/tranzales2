
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
                        <li class="breadcrumb-item"><a href="index.html">Usuarios</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-left text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-left">
            <a href="" type="button" class="dt-button add-new btn btn-danger"
            type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in">Agregar +</a>
        </div>
        
    </div>
</div>
<div class="content-body">
    <section class="app-user-list">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{$total}}</h3>
                            <span>Total Usuarios</span>
                        </div>
                        <div class="avatar bg-light-primary p-50">
                            <span class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user font-medium-4">
                                 <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{$admins}}</h3>
                            <span>Admins</span>
                        </div>
                        <div class="avatar bg-light-danger p-50">
                            <span class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                 width="14" height="14" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                                  stroke-linejoin="round" class="feather feather-user-plus font-medium-4">
                                  <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5"
                                   cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{$operarios}}</h3>
                            <span>Operarios</span>
                        </div>
                        <div class="avatar bg-light-success p-50">
                            <span class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check font-medium-4"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{$gerentes}}</h3>
                            <span>Gestión</span>
                        </div>
                        <div class="avatar bg-light-warning p-50">
                            <span class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x font-medium-4"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <h3 class="fw-bolder mb-75">{{$contas}}</h3>
                            <span>Contabilidad <br>(Facturación)</span>
                        </div>
                        <div class="avatar bg-light-warning p-50">
                            <span class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-x font-medium-4"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="18" y1="8" x2="23" y2="13"></line><line x1="23" y1="8" x2="18" y2="13"></line></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


         <!-- Basic Tables start -->
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card p-1">
                
                <div class="card-body">
                    {{-- <p class="card-text">
                        Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You
                        can use any example of below table for your table and it can be use with any type of bootstrap tables.
                    </p> --}}
                </div>
                <div class="table-responsive">
                    <table class="table" id="usuarios">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Celular</th>
                                <th>DNI</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $doc)
                            <tr> 
                                <td>{{$doc->name}}</td>
                                <td>{{$doc->apellido_ma}} {{$doc->apellido_pa}}</td>
                                <td>{{$doc->celular}}</td>
                                <td>{{$doc->dni}}</td>
                                <td>
                                    @if ($doc->estado==1)
                                    <span class="badge badge-light-success">Activo</span></td>
                                    @else
                                    <span class="badge badge-light-danger">Desactivado</span></td>
                                        
                                    @endif
                                <td>
                                    @if ($doc->tipo==1)
                                    <strong>Administrador</strong>
                                    @elseif ($doc->tipo==2)
                                    <strong>Operador</strong>
                                    @elseif ($doc->tipo==3)
                                    <strong>Gestión</strong>
                                    @else
                                    <strong>Contabilidad</strong>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#view{{$doc->id}}"><i data-feather='eye'></i></a>
                                        <a type="button" class="btn btn-dark btn-sm" href="{{route('admin.usuarios.edit-usuario',$doc->id)}}"><i data-feather='edit'></i></a>
                                        <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eli{{$doc->id}}"><i data-feather='trash-2'></i></a>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.modals.modaldetuser')
                            @include('admin.modals.modaleliuser')
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
                    <form  action="{{ route('crear-usuario') }}" method="post" class="add-new-user modal-content pt-0">
                        @csrf
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                        </div>
                        <div class="modal-body">
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-fullname">Nombres</label>
                                <input type="text" class="form-control dt-full-name"  placeholder="John Doe" name="name" required>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-uname">Apellido Paterno</label>
                                <input type="text" class="form-control dt-uname"
                                 placeholder="Web Developer" name="apellido_pa" required>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-email">Apellido Materno</label>
                                <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                                 placeholder="Developer" name="apellido_ma" required>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-contact">Telefono</label>
                                <input type="number" id="basic-icon-default-contact" class="form-control dt-contact"
                                 placeholder="987654321" name="celular" required>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-company">DNI</label>
                                <input type="number" id="basic-icon-default-company" class="form-control dt-contact"
                                 placeholder="76232414" name="dni" required>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="user-role">Rol de Usuario</label>
                                <select class="form-select" id="basicSelect" name="tipo" required>
                                    <option value="1">Administrador</option>
                                    <option value="2">Operario</option>
                                    <option value="3">Gerente</option>
                                    <option value="4">Contador</option>
                                </select>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-company">Usuario</label>
                                <input type="text" id="basic-icon-default-company" class="form-control dt-contact"
                                 placeholder="admin@gmail.com" name="email" required>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="basic-icon-default-company">Contraseña</label>
                                <input type="text" id="basic-icon-default-company" class="form-control dt-contact"
                                 placeholder="**********" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-danger me-1 waves-effect waves-float waves-light">Agregar</button>
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
@if (session()->get('data'))
<div class="alert alert-success">
    <script>
       var text = '{{session()->get('data')}}';
        Swal.fire(
        'Creado!',
        text,
        'success'
        )
    </script>
</div>
@endif
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

$(document).ready(function () {
    $('#usuarios').DataTable({
        dom: '<"border-bottom"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',

        language: idioma,
        buttons: [
        // 'excel'
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'btn btn-sm btn-info round waves-effect',
              exportOptions: { columns: [0,1,2,3, 4, 5] }
            },
            {
                extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'btn btn-sm btn-info round waves-effect',
              exportOptions: { columns: [0,1,2,3, 4, 5] }
            },
            {
                extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
              className: 'btn btn-sm btn-info round waves-effect',
              exportOptions: { columns: [0,1,2,3, 4, 5] }
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
            columns: [0,1, 2, 3, 4, 5]
      }
    });
});

          

  </script>
@endsection

<!-- MENU -->
