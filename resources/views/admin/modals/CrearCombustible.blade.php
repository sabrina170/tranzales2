<div class="modal fade" id="crearcombustible{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Asignación Combustible</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('crear-combustible') }}"  method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                    <div class="row">
                        <!-- Basic -->
                        <div class="col-md-12 mb-1">
                            <div class="card-header p-0">
                                <h4 class="card-title"></h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">COSTO TOTAL COMBUSTIBLE</p>
                                    <input id="costo_total{{$doc->id}}" name="costo_total"
                                     class="form-control form-control" type="number"
                                     placeholder="100.00" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-1 border">
                            <label class="form-label" for="select2-basic">COMBUSTIBLE RECARGADO S/.</label>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number" id="recarga1{{$doc->id}}" name="recarga1" class="form-control"
                                         placeholder="100" readonly>
                                        <p><small class="text-muted">1ra Recarga</small></p>
                                        <input type="file" id="img_recarga1" name="img_recarga1"
                                         class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number" id="recarga2{{$doc->id}}" name="recarga2" 
                                        class="form-control" placeholder="100" readonly>
                                        <p><small class="text-muted">2da Recarga</small></p>
                                        <input type="file"  id="img_recarga2" name="img_recarga2"
                                         class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                            </div> 
                   
                            <label class="form-label" for="select2-basic">PRECIO COMBUSTIBLE X GALÓN (S/.)</label>
                            <div class="row taby">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number"  id="precio_1re{{$doc->id}}"
                                         name="precio_1re" class="form-control"
                                         placeholder="14.59" onkeyup="calculo({{$doc->id}});" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number" id="precio_2re{{$doc->id}}" name="precio_2re"
                                         class="form-control" placeholder="14.59"
                                         onkeyup="calculo({{$doc->id}});" required>
                                    </div>
                                </div>
                            </div> 
                            
                            <label class="form-label" for="select2-basic">CANTIDAD COMBUSTIBLE (GL) </label>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number"  id="cant_1re{{$doc->id}}" name="cant_1re" 
                                        class="form-control" onkeyup="calculo({{$doc->id}});" >
                                        <p><small class="text-center">galones</small></p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number" id="cant_2re{{$doc->id}}" name="cant_2re"
                                         class="form-control"
                                         placeholder="10.23" onkeyup="calculo({{$doc->id}});" required>
                                         <p><small class="text-center">galones</small></p>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        {{-- <div class="col-md-6 mb-1">
                            <label class="form-label" for="basicInput">Datos de la unidad</label>
                            <input type="text" class="form-control" id="datos_unidad"  readonly>
                        </div> --}}
                        {{-- datos chofer --}}
                        <div class="col-md-6 p-1 border">
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
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="first-name">FECHA FACTURA</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="date" id="fecha_fac" class="form-control" name="fecha_fac"
                                         placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="first-name">N° FACTURA</label>
                                    </div>
                                    <div class="col-sm-8">
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
