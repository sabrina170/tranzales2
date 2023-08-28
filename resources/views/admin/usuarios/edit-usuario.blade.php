
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
                        <li class="breadcrumb-item"><a href="#">Usuarios</a>
                        </li>
                    </ol>
                    
                </div>
                
            </div>
            
            <a href="{{route('admin.usuarios.index')}}"><span class="badge badge-light-danger">< Volver</span></a>
        </div>
    </div>
    {{-- <div class="content-header-left text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-left">
            <a href="" type="button" class="dt-button add-new btn btn-danger"
            type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in">Agregar +</a>
        </div>
        
    </div> --}}
</div>


@foreach ($usuario as $doc)
<div class="card">
<div class="modal-body">
    <form action="{{ route('update-usuario',$doc->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-1 col-3">
                <label class="form-label" for="basic-icon-default-fullname">Nombres</label>
                <input type="text" class="form-control dt-full-name" value="{{$doc->name}}" name="name" required>
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="basic-icon-default-uname">Apellido Paterno</label>
                <input type="text" class="form-control dt-uname"
                value="{{$doc->apellido_pa}}" name="apellido_pa" required>
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="basic-icon-default-email">Apellido Materno</label>
                <input type="text" id="basic-icon-default-email" class="form-control dt-email"
                value="{{$doc->apellido_ma}}" name="apellido_ma" required>
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="basic-icon-default-contact">Telefono</label>
                <input type="number" id="basic-icon-default-contact" class="form-control dt-contact"
                value="{{$doc->celular}}" name="celular" required>
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="basic-icon-default-company">DNI</label>
                <input type="number" id="basic-icon-default-company" class="form-control dt-contact"
                value="{{$doc->dni}}" name="dni" required>
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="user-role">Rol de Usuario</label>
                <select class="form-select" id="basicSelect" name="tipo" required>
                    @if ($doc->tipo==1)
                    <option value="1" selected>Administrador</option> 
                    <option value="2" >Operario</option>
                    <option value="3" >Gerente</option>
                    <option value="4">Contador</option>
                    @elseif ($doc->tipo==2)
                    <option value="1" >Administrador</option> 
                    <option value="2" selected>Operario</option>
                    <option value="3" >Gerente</option>
                    <option value="4">Contador</option>
                    @elseif ($doc->tipo==3)
                    <option value="1" >Administrador</option> 
                    <option value="2" >Operario</option>
                    <option value="3" selected>Gerente</option>
                    <option value="4">Contador</option>
                     @elseif ($doc->tipo==4)
                    <option value="1" >Administrador</option> 
                    <option value="2" >Operario</option>
                    <option value="3" >Gerente</option>
                    <option value="4" selected>Contador</option>
                    @endif
                </select>
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="basic-icon-default-company">Usuario</label>
                <input type="text" id="basic-icon-default-company" class="form-control dt-contact"
                value="{{$doc->email}}" name="email" required>
            </div>
            <div class="mb-1 col-3">
                <label class="form-label" for="basic-icon-default-company">Contraseña</label>
                <input type="text" id="basic-icon-default-company" class="form-control dt-contact"
                value="{{$doc->re_password}}" name="password" required>
                <input type="hidden" name="id" value="{{$doc->id}}" readonly>
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
</script>

@endsection

<!-- MENU -->
