<div class="modal fade" id="view{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Vehiculo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
            
                    <div class="row">
                        <div class="col-md-6 col-12 text-center">
                            <div class="mb-1">
                                <img src="{{asset('images-vehiculos/'.$doc->imagen)}}" alt=""
                                 class="img-thumbnail" height="200" width="200">
                                </div>
                                <h4>{{$doc->marca}}</h4>
                                <h6 class="text-muted">{{$doc->placa}}</h6>
                                <h6 class="text-muted"> {{$doc->unidad}}</h6>
                                @if ($doc->estado==1)
                                <span class="badge badge-light-success profile-badge">Activo</span>
                                @else
                                <span class="badge badge-light-danger profile-badge">Inactivo</span>
                                @endif
                                
                                <hr class="mb-2">
                                <p>Fech. Venc. SOAT : <strong> {{$doc->fecha_ven_soat}}</strong></p>
                        </div>
                        <div class="col-md-3 col-12 mt-2">
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="country-floating">N° Tarjeta Circulacion</label>
                                <p>{{$doc->tar_circulacion}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="company-column">N° Certificado de  CITV</label>
                                <p>{{$doc->n_certificado}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="email-id-column">Fecha. Ven. CITV</label>
                                <p>{{$doc->fecha_ven_citv}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="company-column">Compañia SOAT</label>
                                <p>{{$doc->soat}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="company-column">Categoría</label>
                                <p>{{$doc->categoria}}</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-12 mt-2">
                           
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="company-column">Serie Chasis</label>
                                <p>{{$doc->seria_chasis}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="company-column">Año Fabricación</label>
                                <p>{{$doc->anois_fab}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="company-column">N° Ejes</label>
                                <p>{{$doc->n_ejes}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="company-column">Carga Util</label>
                                <p>{{$doc->carga_util}}</p>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bolder" for="company-column">Peso Seco</label>
                                <p>{{$doc->peso_seco}}</p>
                            </div>
                        </div>
                        
                    </div>
                
            </div>
      </div>
    </div>
</div>
        
   