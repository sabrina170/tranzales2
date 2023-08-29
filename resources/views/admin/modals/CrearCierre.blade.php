<div class="modal fade" id="crearcierre{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Cierre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('crear-cierre') }}"  method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                        <div class="row">
                            @php
                                $datos_destinos = json_decode($doc->datos_destinos, true);   
                                $cont = count($datos_destinos);
                            @endphp
                            {{-- <input type="hidden" name="datos_destinos" value="{{$doc->datos_destinos}}" readonly> --}}
                            @foreach ($datos_destinos as $item)
                                @foreach ($destinos as $des)
                                    @if ($des->id==$item)
                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">
                                                    Destino</label>
                                                    <br>
                                                    <span class="badge bg-primary">{{$des->referencia}}
                                                    </span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">
                                                   N° Guia Transporte</label>
                                                <input type="text" id="first-name-column"
                                                class="form-control" name="n_guias{{$des->id}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">
                                                    Guia Transporte</label>
                                                <input type="file" id="first-name-column"
                                                class="form-control" name="guia{{$des->id}}" accept=".pdf" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">
                                                   N° Guia Remisión</label>
                                                <input type="text" id="first-name-column"
                                                class="form-control" name="n_remision{{$des->id}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="first-name-column">
                                                    Guia Remisión</label>
                                                <input type="file" id="first-name-column"
                                                class="form-control" name="remision{{$des->id}}" accept=".pdf" required>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                @endforeach
                            @endforeach
                            
                                <div class="col-md-6 mb-1">
                                    <div class="mb-1">
                                        <label class="d-block form-label"
                                        for="validationBioBootstrap">Indicaciones Especiales</label>
                                        <textarea class="form-control" id="indicaciones"
                                        name="indicaciones" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">
                                          KM Inicial</label>
                                        <input type="number" id="first-name-column"
                                        class="form-control" name="km_inicial" required>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">
                                          KM Final</label>
                                        <input type="number" id="first-name-column"
                                        class="form-control" name="km_final" required>
                                    </div>
                                </div>
                        </div>
            </div>
            <input type="hidden" id="first-name-column"
            class="form-control" name="fecha_fac" value="{{date("Y-m-d");}}">
            <input type="hidden" id="first-name-column"
            class="form-control" name="n_fac" value="">

            <div class="modal-footer">
                <input type="hidden" name="id_soli" value="{{$doc->id}}" readonly>
               <button type="submit" class="btn btn-success  waves-effect waves-float waves-light" name="accion" value="finalizar">Finalizar</button>
              </div>
            </form>
        </div>
    </div>
</div>