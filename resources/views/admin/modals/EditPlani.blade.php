<div class="modal fade" id="editmodal{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                @foreach ($planificaciones as $pla)
                    @if ($pla->id ==$doc->id_plani)
                            <!-- Basic -->
                            <div class="col-md-9 mb-1">
                                <label class="form-label" for="select2-basic">Unidad</label>
                                <select class="form-select" id="unidad" name="unidad" required>
                                    @foreach ($vehiculos as $ve)
                                    <option value="{{$ve->id}}"  @if($ve->id == $pla->id_unidad) selected @endif> {{$ve->unidad}} - {{$ve->placa}} - {{$ve->marca}}</option>
                                    @endforeach   
                                </select>   
                            </div>
                    
                    
                        {{-- datos chofer --}}
                        <div class="col-md-12 mb-1">
                            <label class="form-label" for="select2-basic">Chofer</label>
                            <select class="form-select" id="chofer" name="chofer" required>
                                @foreach ($choferes as $cho)
                                <option value="{{$cho->id}}" @if($cho->id == $pla->id_chofer) selected @endif> {{$cho->nombres_cho}} {{$cho->apellidos_cho}}</option>
                                @endforeach   
                            </select>   
                        </div>
                        {{-- ayudantes --}}
                        <div class="col-md-8 mb-1">
                            <label class="form-label" for="select2-basic">Ayudantes</label>
                            <select class="form-select" name="ayudantes" required>
                               
                                @foreach ($ayudantes as $ayu)
                                            @if ($ayu->id == $pla->choferes) 
                                                <option value="{{$ayu->id}}" selected> {{$ayu->nombres_cho}}- {{$ayu->dni_cho}}</option>
                                            @else
                                        @endif
                                @endforeach   
                            </select>
                        </div>
                        <div class="col-md-4 mb-1">
                            <div class="demo-inline-spacing">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_des"
                                     id="carga" value="carga"  @if($pla->tipo_des == 'carga') checked @endif>
                                    <label class="form-check-label" for="exampleRadios1">
                                     Carga
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_des"
                                     id="descarga" value="Descarga" @if($pla->tipo_des == 'Descarga') checked @endif>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Descarga
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo_des"
                                     id="descarga2" value="Carga y Descarga" @if($pla->tipo_des == 'Carga y Descarga') checked @endif> 
                                    <label class="form-check-label" for="exampleRadios3">
                                        Carga y Descarga
                                    </label>
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1">
                            <div class="mb-1">
                                <label class="d-block form-label"
                                 for="validationBioBootstrap">Observaciones</label>
                                <textarea class="form-control" id="observaciones"
                                 name="observaciones" rows="3"> 
                                {{$pla->observaciones}}
                                </textarea>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <input type="hidden" name="id_soli" value="{{$doc->id}}" readonly>
                <input type="hidden" name="id_plani" value="{{$doc->id_plani}}" readonly>
                <button type="submit" class="btn btn-warning 
                 waves-effect waves-float waves-light" name="accion" value="actualizar">Actualizar</button>
                <button type="submit" class="btn btn-success 
                 waves-effect waves-float waves-light" name="accion" value="finalizar2">Finalizar</button>
              </div>
              @endif
              @endforeach
            </form>
        </div>
    </div>
</div>