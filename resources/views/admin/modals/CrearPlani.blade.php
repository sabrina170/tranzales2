<div class="modal fade" id="crearmodal{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Asignación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('crear-plani') }}"  method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                    <div class="row">
                        <!-- Basic -->
                        <div class="col-md-9 mb-1">
                            <label class="form-label" for="select2-basic">Unidad</label>
                            <select class="form-select" id="unidad" name="unidad" required>
                                <option value="" selected>Selecciona un unidad</option>
                                @foreach ($vehiculos as $ve)
                                <option value="{{$ve->id}}"> {{$ve->unidad}} - {{$ve->placa}} - {{$ve->marca}}</option>
                               
                                @endforeach   
                             </select>   
                        </div>
                        {{-- <div class="col-md-6 mb-1">
                            <label class="form-label" for="basicInput">Datos de la unidad</label>
                            <input type="text" class="form-control" id="datos_unidad"  readonly>
                        </div> --}}
                        {{-- datos chofer --}}
                        <div class="col-md-12 mb-1">
                            <label class="form-label" for="select2-basic">Chofer</label>
                            <select class="form-select" id="chofer" name="chofer" required>
                                <option value="" selected>Selecciona un chofer</option>
                                @foreach ($choferes as $cho)
                                <option value="{{$cho->id}}"> {{$cho->nombres_cho}} {{$cho->apellidos_cho}}</option>
                                @endforeach   
                            </select>   
                        </div>
                        {{-- <div class="col-md-6 mb-1">
                            <label class="form-label" for="basicInput">Nombres y Apellido</label>
                            <input type="text" class="form-control" id="datos_chofer" readonly>
                        </div> --}}
                        {{-- ayudantes --}}
                        <div class="col-md-8 mb-1">
                            <label class="form-label" for="select2-basic">Ayudantes</label>
                            <select class="form-select" id="ayudantes" name="ayudantes" required>
                            <option value="" selected>Selecciona un ayudante</option>
                                @foreach ($ayudantes as $ayu)
                                <option value="{{$ayu->id}}"> {{$ayu->nombres_cho}} {{$cho->apellidos_cho}} - {{$ayu->dni_cho}}</option>
                                @endforeach   
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <div class="demo-inline-spacing">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_des"
                                     id="carga" value="carga">
                                    <label class="form-check-label" for="exampleRadios1">
                                     Carga
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_des"
                                     id="descarga" value="Descarga">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Descarga
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_des"
                                     id="descarga2" value="Carga y Descarga" checked>
                                    <label class="form-check-label" for="exampleRadios3">
                                        Carga y Descarga
                                    </label>
                                  </div>
                                
                            </div>
                        </div>
                        <div class="col-md-12 mb-1">
                            <div class="mb-1">
                                <label class="d-block form-label"
                                 for="validationBioBootstrap">Indicaciones Especiales</label>
                                <textarea class="form-control" id="observaciones"
                                 name="observaciones" rows="3"></textarea>
                            </div>
                        </div>
                       
                        
                    </div>
            </div>

            <div class="modal-footer">
                <input type="hidden" name="id_soli" value="{{$doc->id}}" readonly>
                <button type="submit" class="btn btn-primary  waves-effect waves-float waves-light" name="accion" value="guardar">Guardar</button>
                <button type="submit" class="btn btn-success  waves-effect waves-float waves-light" name="accion" value="finalizar">Finalizar</button>
              </div>
            </form>
        </div>
    </div>
</div>