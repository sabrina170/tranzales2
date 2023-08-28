<div class="modal fade" id="crearpeaje{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Asignación Combustible</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('crear-peaje') }}"  method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                    <div class="row">
                        <!-- Basic -->
                        <div class="col-md-12 mb-1">
                            <div class="card-header p-0">
                                <h4 class="card-title"></h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">COSTO TOTAL PEAJES</p>
                                    <input id="costo_total_peaje{{$doc->id}}" name="costo_total"
                                     class="form-control form-control" type="number"
                                     placeholder="100.00" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 p-1 border">
                            <label class="form-label" for="select2-basic">PEAJES</label>
                            <div class="row">
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="number" class="form-control" id="total1{{$doc->id}}"readonly>
                                          <p><small class="text-muted">1 PEAJE</small></p>
                                        <input type="number" id="peaje1{{$doc->id}}" name="peaje1" 
                                        class="form-control" placeholder="100" onkeyup="calculo({{$doc->id}});" required>
                                      
                                        <input type="file" id="img_peaje1" name="img_peaje1"
                                         class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="number" class="form-control" id="total2{{$doc->id}}"readonly>
                                        <p><small class="text-muted">2 PEAJE</small></p>
                                        <input type="number" id="peaje2{{$doc->id}}" name="peaje2" 
                                        class="form-control" placeholder="100" onkeyup="calculo({{$doc->id}});" required>
                                       
                                        <input type="file"  id="img_peaje2" name="img_peaje2"
                                         class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="number" class="form-control" id="total3{{$doc->id}}"readonly>
                                        <p><small class="text-muted">3 PEAJE</small></p>
                                        <input type="number" id="peaje3{{$doc->id}}" name="peaje3" 
                                        class="form-control" placeholder="100" onkeyup="calculo({{$doc->id}});" required>
                                      
                                        <input type="file"  id="img_peaje3" name="img_peaje3"
                                         class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="number" class="form-control" id="total4{{$doc->id}}"readonly>
                                        <p><small class="text-muted">4 PEAJE</small></p>
                                        <input type="number" id="peaje4{{$doc->id}}" name="peaje4" 
                                        class="form-control" placeholder="100" onkeyup="calculo({{$doc->id}});" required>
                                     
                                        <input type="file"  id="img_peaje4" name="img_peaje4"
                                         class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                            </div> 
                   
                            <label class="form-label" for="select2-basic">PRECIO DEL PEAJE (S/.)</label>
                            <div class="row taby">
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="number"  id="precio_peaje1{{$doc->id}}"
                                         name="precio_peaje1" class="form-control"
                                         placeholder="14.59" onkeyup="calculo({{$doc->id}});" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="number" id="precio_peaje2{{$doc->id}}"
                                         name="precio_peaje2" class="form-control" 
                                         placeholder="14.59"
                                         onkeyup="calculo({{$doc->id}});" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="number"  id="precio_peaje3{{$doc->id}}"
                                         name="precio_peaje3" class="form-control"
                                         placeholder="14.59" onkeyup="calculo({{$doc->id}});" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="number" id="precio_peaje4{{$doc->id}}"
                                         name="precio_peaje4" class="form-control" 
                                         placeholder="14.59"
                                         onkeyup="calculo({{$doc->id}});" required>
                                    </div>
                                </div>
                            </div> 
                            
                        </div>
                        {{-- <div class="col-md-6 mb-1">
                            <label class="form-label" for="basicInput">Datos de la unidad</label>
                            <input type="text" class="form-control" id="datos_unidad"  readonly>
                        </div> --}}
                        {{-- datos chofer --}}
                        <div class="col-md-3 p-1 border">
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
                                  <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="first-name">FECHA FACTURA</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="date" id="fecha_fac" class="form-control" name="fecha_fac"
                                         placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="first-name">N° FACTURA</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" id="n_fac" class="form-control" name="n_fac"
                                         placeholder="FAC-022" required>
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
