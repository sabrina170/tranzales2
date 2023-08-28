<div class="modal fade" id="view{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Vehiculo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
               
                    <div class="row">
                        <div class="col-md-12 col-12 text-center">
                            <h4>{{$doc->name}}</h4>
                            <h6 class="text-muted">{{$doc->apellido_pa}}</h6>
                            <h6 class="text-muted"> {{$doc->apellido_ma}}</h6>
                            @if ($doc->estado==1)
                            <span class="badge badge-light-success profile-badge">Activo</span>
                            @else
                            <span class="badge badge-light-danger profile-badge">Inactivo</span>
                            @endif

                            <hr class="mb-2">
                            <p>DNI : <strong> {{$doc->dni}}</strong></p>
                        </div>
                        <div class="col-md-12 col-12 text-center">
                            <div class="mb-1">
                                <label class="form-label fw-bolder">Usuario</label>
                                <p>{{$doc->email}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder">Contraseña</label>
                                <p>{{$doc->re_password}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder">Celular</label>
                                <p>{{$doc->celular}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder">Fecha de creación</label>
                                <p>{{$doc->created_at}}</p>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>