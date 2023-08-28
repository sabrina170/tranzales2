
@extends('layouts.head')
<!-- MENU -->
@section('content')

                            
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Modulo Editar</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Vehiculos</a>
                        </li>
                    </ol>
                    
                </div>
                
            </div>
            
            <a href="{{route('admin.vehiculos.index')}}"><span class="badge badge-light-danger">< Volver</span></a>
        </div>
    </div>
    {{-- <div class="content-header-left text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-left">
            <a href="" type="button" class="dt-button add-new btn btn-danger"
            type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in">Agregar +</a>
        </div>
        
    </div> --}}
</div>


@foreach ($vehiculo as $doc)
<div class="card">
<div class="modal-body">
    <form action="{{ route('update-vehiculo',$doc->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4 col-12">
                <img src="{{asset('images-vehiculos/'.$doc->imagen)}}" class="img-thumbnail" id="img1" height="200" width="200">
                {{-- <img src="{{asset('images-vehiculos/'.$doc->imagen)}}" alt="" class="img-fluid"> --}}
                       
                <div class="mb-1">
                    <label class="form-label" for="first-name-column">Imagen</label>
                    <input type="file" id="imagenSeleccionada" class="form-control"
                    onchange="ValidarTamaño(this);" accept=".jpeg,.jpg,.png" name="vehiculo_img">
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="first-name-column">Unidades</label>
                    <input type="text" id="first-name-column" class="form-control" name="unidad" value="{{$doc->unidad}}" required>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="city-column">Placa</label>
                    <input type="text" id="city-column" class="form-control" name="placa" value="{{$doc->placa}}" required>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="country-floating">N° Tarjeta Circulacion</label>
                    <input type="text" id="country-floating" class="form-control" name="tar_circulacion"
                    value="{{$doc->tar_circulacion}}" required>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="last-name-column">Marca</label>
                    <input type="text" id="last-name-column" class="form-control" name="marca" value="{{$doc->marca}}" required>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="company-column">N° Certificado de  CITV</label>
                    <input type="text" id="company-column" class="form-control" name="n_certificado"
                    value="{{$doc->n_certificado}}" required>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="email-id-column">Fecha. Ven. CITV</label>
                    <input type="date" id="email-id-column" class="form-control" name="fecha_ven_citv" 
                    value="{{$doc->fecha_ven_citv}}" required>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Compañia SOAT</label>
                    <input type="text" id="company-column" class="form-control" name="soat"
                    value="{{$doc->soat}}" required>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Fech. Venc. SOAT</label>
                    <input type="date" id="company-column" class="form-control" name="fecha_ven_soat"
                    value="{{$doc->fecha_ven_soat}}" required>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Categoría</label>
                    <input type="text" id="company-column" class="form-control" name="categoria"
                    value="{{$doc->categoria}}" required>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Estado</label>
                    <select class="form-select" id="basicSelect" name="estado">
                        @if ($doc->estado)
                        <option value="1" selected>Activo</option>
                        <option value="0" >Inactivo</option>
                        @else
                        <option value="1" >Activo</option>
                        <option value="0" selected>Inactivo</option>
                        @endif
                    </select>
                   
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Serie Chasis</label>
                    <input type="text" id="company-column" class="form-control" name="seria_chasis"
                    value="{{$doc->seria_chasis}}" required>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Año Fabricación</label>
                    <input type="number" id="company-column" class="form-control" name="anois_fab"
                    value="{{$doc->anois_fab}}" required>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">N° Ejes</label>
                    <input type="number" id="company-column" class="form-control" name="n_ejes"
                    value="{{$doc->n_ejes}}" required>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Carga Util</label>
                    <input type="number" id="company-column" class="form-control" name="carga_util"
                    value="{{$doc->carga_util}}" required>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Peso Seco</label>
                    <input type="number" id="company-column" class="form-control" name="peso_seco"
                    value="{{$doc->peso_seco}}" required>
                </div>
            </div>
        </div>
    
 </div>
<div class="modal-footer">
  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button> --}}
  <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">Actualizar</button>

</div>

</form>
</div>
@endforeach

@endsection

@section('js')
@if (session()->get('data'))
    <div class="alert alert-success">
        <script>
           var text = '{{session()->get('data')}}';
            Swal.fire(
            'Actualizado!',
            text,
            'success'
            )
        </script>
    </div>
@endif
<script>
 

    function init() {
        var inputFile = document.getElementById('imagenSeleccionada');
        inputFile.addEventListener('change', mostrarImagen, false);
    }

    function mostrarImagen(event) {
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = function(event) {
            var img = document.getElementById('img1');
            img.src = event.target.result;
        }
        reader.readAsDataURL(file);
    }

    window.addEventListener('load', init, false);
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
