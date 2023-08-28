<div class="modal fade" id="view{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de Chofe o Ayudante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">Unidades</label>
                            <select class="form-select" id="basicSelect" value="{{$doc->tipo_cho}}" disabled>
                                @if ($doc->tipo_cho==1)
                                <option value="1" selected>Chofer</option>
                                <option value="2">Ayudante</option>
                                @else
                                <option value="1">Chofer</option>
                                <option value="2" selected>Ayudante</option>
                                @endif
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">Nombres</label>
                            <input type="text" id="country-floating" class="form-control" value="{{$doc->nombres_cho}}"
                             placeholder="nombres" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">Apellidos</label>
                            <input type="text" id="country-floating" class="form-control" value="{{$doc->apellidos_cho}}"
                             placeholder="apellidos" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="last-name-column">Celular</label>
                            <input type="number" id="last-name-column" class="form-control" placeholder="987912321" value="{{$doc->celular_cho}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">DNI/CELULA</label>
                            <input type="number" id="last-name-column" class="form-control" placeholder="76232414" value="{{$doc->dni_cho}}" disabled>
                            
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">Documento DNI</label>
                            
                                <br>
                                <a href="{{asset('doc-dni-choferes/'.$doc->url_dni)}}" type="button" class="btn btn-outline-primary waves-effect"
                                    download="DNI-{{$doc->dni_cho}}">
                                    <i data-feather='download-cloud'></i>
                                    <span>Descrgar</span>
                                </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="city-column">Brevete</label>
                            <input type="text" id="city-column" class="form-control" placeholder="AKJ888" value="{{$doc->brevete_cho}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="country-floating">Tipo de contrato</label>
                             <select class="form-select" id="basicSelect" value="{{$doc->tipo_contrato}}" disabled>
                                <option value="1">RR.HH</option>
                                <option value="2">Planilla</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">Doc Contrato</label>
                           <br>
                                <a href="{{asset('doc-contrato-choferes/'.$doc->url_contrato)}}" type="button"
                                     class="btn btn-outline-primary waves-effect" download="Contrato-{{$doc->dni_cho}}">
                                    <i data-feather='download-cloud'></i>
                                    <span>Descrgar</span>
                                </a>
                         </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="city-column">Telefono Emergencia</label>
                            <input type="text" id="city-column" class="form-control" placeholder="AKJ888" value="{{$doc->telefono_emer}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Duración de contrato</label>
                            <input type="text" id="company-column" class="form-control" value="{{$doc->duracion_contrato}}"
                             placeholder="6 meses/1 año" disabled>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="email-id-column">Fecha Inicio</label>
                            <input type="date" id="email-id-column" class="form-control" value="{{$doc->fecha_inicio}}"  disabled>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="company-column">Fecha Vencimiento Brevete</label>
                            <input type="date" id="company-column" class="form-control" value="{{$doc->fecha_ven_cho}}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>