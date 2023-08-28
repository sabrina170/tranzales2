
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
                        <li class="breadcrumb-item"><a href="#">Vehiculos</a>
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
            <form action="{{ route('crear-vehiculo') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">Imagen</label>
                            <input type="file" id="first-name-column" class="form-control"
                             name="vehiculo_img" onchange="ValidarTamaño(this);" accept=".jpeg,.jpg,.png" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">Unidades</label>
                            <input type="text" id="first-name-column" class="form-control" placeholder="INTER" name="unidad" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="last-name-column">Marca</label>
                            <input type="text" id="last-name-column" class="form-control" placeholder="INTERNACIONAL" name="marca" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="city-column">Placa</label>
                            <input type="text" id="city-column" class="form-control" placeholder="AKJ888" name="placa" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">N° Tarjeta Circulacion</label>
                            <input type="text" id="country-floating" class="form-control" name="tar_circulacion"
                             placeholder="151729858" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">N° Certificado de  CITV</label>
                            <input type="text" id="company-column" class="form-control" name="n_certificado"
                             placeholder="C-2022-204-309-010614" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email-id-column">Fecha. Ven. CITV</label>
                            <input type="date" id="email-id-column" class="form-control" name="fecha_ven_citv" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Compañia SOAT</label>
                            <input type="text" id="company-column" class="form-control" name="soat"
                             placeholder="Mapfre Perú" required>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Fech. Venc. SOAT</label>
                            <input type="date" id="company-column" class="form-control" name="fecha_ven_soat"
                             placeholder="C-2022-204-309-010614" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Categoría</label>
                            <input type="text" id="company-column" class="form-control" name="categoria"
                             placeholder="A1" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Serie Chasis</label>
                            <input type="text" id="company-column" class="form-control" name="seria_chasis"
                             placeholder="3HAMMAAR4FL678363" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Año Fabricación</label>
                            <input type="number" id="company-column" class="form-control" name="anois_fab"
                             placeholder="2023" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">N° Ejes</label>
                            <input type="number" id="company-column" class="form-control" name="n_ejes"
                             placeholder="3" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Carga Util</label>
                            <input type="number" id="company-column" class="form-control" name="carga_util"
                             placeholder="17500" required>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Peso Seco</label>
                            <input type="number" id="company-column" class="form-control" name="peso_seco"
                             placeholder="7500" required>
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
            <div class="card">
                
               
                <div class="table-responsive">
                    <table class="table" id="postulantes">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Imagen</th>
                                <th>Unidades</th>
                                <th>Marca</th>
                                <th>Placa</th>
                                <th>N° Tarjeta Circulacion</th>
                                <th>N° Certificado de CITV</th>
                                <th>Fecha. Ven. CITV</th>
                                <th>Compañia Soat</th>
                                <th>Fech. Venc. SOAT</th>
                                <th>Categoría</th>
                                <th>Fecha Creación</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehiculos as $doc)
                            <tr> 
                                <td>
                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar pull-up my-0" title="" data-bs-original-title="Alberto Glotzbach">
                                        <img src="{{asset('images-vehiculos/'.$doc->imagen)}}" alt="Avatar" height="26" width="26">
                                    </div>
                                </td>
                                <td>{{$doc->unidad}}</td>
                                <td>{{$doc->marca}}</td>
                                <td>{{$doc->placa}} </td>
                                <td>{{$doc->tar_circulacion}} </td>
                                <td>{{$doc->n_certificado}} </td>
                                <td>{{$doc->fecha_ven_citv}}</td>
                                <td>{{$doc->soat}}</td>
                                <td>{{$doc->fecha_ven_soat}}</td>
                                <td>{{$doc->categoria}}</td>
                                <td>{{$doc->created_at}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#view{{$doc->id}}">
                                        <i data-feather='eye'></i></a>
                                    <a type="button" class="btn btn-dark btn-sm" href="{{route('admin.vehiculos.edit-vehiculo',$doc->id)}}"><i data-feather='edit'></i></a>
                                    <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eli{{$doc->id}}"><i data-feather='trash-2'></i></a>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.modals.modaldetvehi')
                            @include('admin.modals.modalelivehi')
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
});

function ValidarTamaño(obj)
{
  var uploadFile = obj.files[0];
  var sizeByte = obj.files[0].size;
  var siezekiloByte = parseInt(sizeByte / 1024);
  if(siezekiloByte >800){
    Swal.fire(
        'Upss !',
        'El tamaño supera el limite permitido de 800KB :'+ '<b>Tu imagen tiene </b>:' +siezekiloByte +'KB',
        'info'
        )
    //   alert('El tamaño supera el limite permitido de 800KB :'+ siezekiloByte);
      $(obj).val('');
      return;
  }
  }
</script>
@endsection

<!-- MENU -->
