
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
                        <li class="breadcrumb-item"><a href="#">Choferes y Ayudantes</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="content-header-left text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-left">
            <a href="" type="button" class="dt-button add-new btn btn-danger"
            type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in">Agregar +</a>
        </div>
        
    </div> --}}
</div>
<div class="content-body">
    <section class="app-user-list">

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
           + Agregar
          </button> 
          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Vehiculo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('crear-chofer') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">Unidades</label>
                            <select class="form-select" id="basicSelect" name="tipo_cho" required>
                                <option value="1">Chofer</option>
                                <option value="2">Ayudante</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">Nombres</label>
                            <input type="text" id="country-floating" class="form-control" name="nombres_cho"
                             placeholder="nombres" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">Apellidos</label>
                            <input type="text" id="country-floating" class="form-control" name="apellidos_cho"
                             placeholder="apellidos" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="last-name-column">Celular</label>
                            <input type="number" id="last-name-column" class="form-control" placeholder="987912321" name="celular_cho" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">DNI/CELULA</label>
                            <input type="number" id="last-name-column" class="form-control" placeholder="76232414" name="dni_cho" required>
                            
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">Adjuntar</label>
                            <input type="file" id="first-name-column" class="form-control" name="dni_doc" required>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">Tipo de contrato</label>
                             <select class="form-select" id="basicSelect" name="tipo_contrato" required>
                                <option value="1">RR.HH</option>
                                <option value="2">Planilla</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">Adjuntar</label>
                            <input type="file" id="first-name-column" class="form-control" name="contrato_doc" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="city-column">Telefono Emergencia</label>
                            <input type="text" id="city-column" class="form-control" placeholder="AKJ888" name="telefono_emer" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Duración de contrato</label>
                            <input type="text" id="company-column" class="form-control" name="duracion_contrato"
                             placeholder="6 meses/1 año" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email-id-column">Fecha Inicio</label>
                            <input type="date" id="email-id-column" class="form-control" name="fecha_inicio"  required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="city-column">Brevete</label>
                            <input type="text" id="city-column" class="form-control" placeholder="AKJ888" name="brevete_cho">
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Fecha Vencimiento Brevete</label>
                            <input type="date" id="company-column" class="form-control" name="fecha_ven_cho" required>
                        </div>
                    </div>
                </div>
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger me-1 waves-effect waves-float waves-light">Agregar</button>

        </div>
    </form>
      </div>
    </div>
  </div>
        
         <!-- Basic Tables start -->
    <div class="row mt-2" id="basic-table">
        <div class="col-12">
            <div class="card p-1">
                
               
                <div class="table-responsive">
                    <table class="table" id="postulantes">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Nombres y Apellidos</th>
                                <th>Telefono</th>
                                <th>Brevete</th>
                                <th>Fecha Ven. Brevete</th>
                                <th>DNI</th>
                                <th>Tipo de Contrato</th>
                                <!--<th>Telefono de Emergencia</th>-->
                                <th>Fecha Creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($choferes as $doc)
                            <tr> 
                                <td> {{$doc->nombres_cho}} {{$doc->apellidos_cho}} </td>
                                <td>{{$doc->celular_cho}}</td>
                                <td>{{$doc->brevete_cho}} </td>
                                <td>{{$doc->fecha_ven_cho}} </td>
                                <td>{{$doc->dni_cho}} </td>
                                <td>
                                    @if ($doc->tipo_contrato==1)
                                        <strong>RR.HH</strong>
                                    @else
                                    <strong>PLANILLA</strong>
                                    @endif
                                    </td>
                                <!--<td>{{$doc->telefono_emer}}</td>-->
                                <td>{{$doc->created_at}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#view{{$doc->id}}"><i data-feather='eye'></i></a>
                                    {{-- <a type="button" class="btn btn-dark btn-sm" href="{{route('admin.vehiculos.edit-vehiculo',$doc->id)}}"><i data-feather='edit'></i></a> --}}
                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#elichofer{{$doc->id}}"><i data-feather='trash-2'></i></a>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.modals.modaldetchofer')
                            @include('admin.modals.EliChofer')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Tables end -->
       
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
    $('#postulantes').DataTable({
        dom: '<"border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',

        language: idioma,
        buttons: [
        // 'excel'
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'btn btn-sm btn-info round waves-effect',
              exportOptions: { columns: [0,1,2,3, 4, 5, 6,7] }
            },
            {
                extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'btn btn-sm btn-info round waves-effect',
              exportOptions: { columns: [0,1,2,3, 4, 5, 6,7] }

            },
            {
                extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
              className: 'btn btn-sm btn-info round waves-effect',
              exportOptions: { columns: [0,1,2,3, 4, 5, 6,7] }

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
            columns: [0,1, 2, 3, 4, 5, 6, 7, 8]
      }
    });
});

   
</script>
@endsection

<!-- MENU -->
