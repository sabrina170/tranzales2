<div class="modal fade" id="crearviatico{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Asignación Viaticos - Personal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('crear-viatico')}}"  method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                    <div class="row">
                        <!-- Basic -->
                        <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <div class="col-6"></div>
                                    <div class="col-6">
                                        <div class="mb-1 row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label" for="first-name">
                                                    COSTO TOTAL VIATICO PERSONAL</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="number" id="costo_total_viatico{{$doc->id}}" class="form-control" 
                                                name="costo_total" placeholder="100.00" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="select2-basic">MOVILIDAD (S/.)</label>
                            <div class="mb-1">
                              <input type="number" id="movilidad{{$doc->id}}" name="movilidad" class="form-control "
                                         placeholder="100" onkeyup="calculo({{$doc->id}})" step="any" required>
                            </div>
                            <label class="form-label" for="select2-basic">ALIMENTO (S/.)</label>
                            <div class="mb-1">
                              <input type="number" id="alimento{{$doc->id}}" name="alimento" class="form-control "
                                         placeholder="100"  onkeyup="calculo({{$doc->id}})" step="any" required>
                            </div>
                            <label class="form-label" for="select2-basic">SERVICIO / APOYO (S/.)</label>
                            <div class="mb-1">
                              <input type="number" id="servicio{{$doc->id}}" name="servicio" class="form-control "
                                         placeholder="100" onkeyup="calculo({{$doc->id}})" step="any" required>
                            </div> 
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="select2-basic">MOTIVO</label>
                            <div class="mb-1">
                              <input type="text" name="motivo_mo" class="form-control"
                                         placeholder="motivo" required>
                            </div>
                            <label class="form-label" for="select2-basic">MOTIVO</label>
                            <div class="mb-1">
                              <input type="text" name="motivo_ali" class="form-control"
                                         placeholder="motivo" required>
                            </div>
                            <label class="form-label" for="select2-basic">MOTIVO</label>
                            <div class="mb-1">
                              <input type="text" name="motivo_ser" class="form-control"
                                         placeholder="motivo" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-1" for="select2-basic">ORIGEN DE TRANSICIÓN</label>
                            
                            <div class="mb-2">
                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="origen"
                                        id="origen" value="EMPRESA" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                        EMPRESA
                                        </label>
                                </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="origen"
                                     id="origen" value="CONDUCTOR">
                                    <label class="form-check-label" for="exampleRadios2">
                                        CONDUCTOR
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="origen"
                                     id="origen" value="TERCERO">
                                    <label class="form-check-label" for="exampleRadios3">
                                        TERCERO
                                    </label>
                                  </div>
                            </div>  
                                 
                        </div>
                        <div class="mb-1 mt-1">
                            <label class="d-block form-label"
                            for="validationBioBootstrap">OBSERVACIONES</label>
                            <textarea class="form-control" id="observaciones"
                            name="observaciones" rows="3"></textarea>
                        </div>
                    </div>
                    
            </div>

            <div class="modal-footer">
                <input type="hidden" name="id_soli" value="{{$doc->id}}" readonly>
                {{-- <button type="submit" class="btn btn-primary  waves-effect waves-float waves-light" name="accion" value="guardar">Guardar</button> --}}
                <button type="submit" class="btn btn-success  waves-effect waves-float waves-light" name="accion" value="finalizar">Finalizar</button>
              </div>
            </form>
        </div>
    </div>
</div>
