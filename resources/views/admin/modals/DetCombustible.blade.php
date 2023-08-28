<div class="modal fade" id="detcombustible{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detalle Combustible</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=""  method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                @foreach ($combustibles as $item)
                    @if ($item->id==$doc->id_combustible)
                        
                    <div class="row">
                        <!-- Basic -->
                        <div class="col-md-12 mb-1">
                            <div class="card-header p-0">
                                <h4 class="card-title"></h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">COSTO TOTAL COMBUSTIBLE</p>
                                    <input id="costo_total" name="costo_total"
                                     class="form-control form-control" type="number"
                                     placeholder="100.00" value="{{$item->costo_total}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-1 border">
                            <label class="form-label" for="select2-basic">COMBUSTIBLE RECARGADO S/.</label>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number" id="recarga1" name="recarga1" class="form-control"
                                         placeholder="100" value="{{$item->recarga1}}" disabled>
                                        <p><small class="text-muted">1ra Recarga</small></p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number"  name="recarga2" 
                                        class="form-control" placeholder="100" value="{{$item->recarga2}}" disabled>
                                        <p><small class="text-muted">2da Recarga</small></p>
                                    </div>
                                </div>
                            </div> 
                   
                            <label class="form-label" for="select2-basic">PRECIO COMBUSTIBLE X GALÓN (S/.)</label>
                            <div class="row taby">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="text" name="precio_1re" 
                                        class="form-control decimales" placeholder="14.59" 
                                         value="{{$item->precio_1re}}" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="text" name="precio_2re"
                                         class="form-control decimales" placeholder="14.59"
                                         value="{{$item->precio_2re}}" disabled>
                                    </div>
                                </div>
                            </div> 
                            
                            <label class="form-label" for="select2-basic">CANTIDAD COMBUSTIBLE (GL) </label>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="text"  id="cant_1re{{$doc->id}}" name="cant_1re" 
                                        class="form-control decimales"
                                        value="{{$item->cant_1re}}" disabled>
                                        <p><small class="text-center">galones</small></p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="text" id="cant_2re{{$doc->id}}" name="cant_2re"
                                         class="form-control decimales"
                                         placeholder="10.23"  value="{{$item->cant_2re}}" disabled>
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
                            <label class="form-label mb-1" for="select2-basic">FACTURAS:</label>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <a href="{{asset('img-combustibles/'.$item->img_recarga1)}}" type="button" id="img_recarga1" name="img_recarga1"
                                          download>{{$item->img_recarga1}}</a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <a href="{{asset('img-combustibles/'.$item->img_recarga2)}}" type="button" id="img_recarga2" name="img_recarga2"
                                         download>{{$item->img_recarga2}}</a>
                                    </div>
                                </div>
                            </div> 
                   
                            <label class="form-label mb-1" for="select2-basic">ORIGEN DE TRANSICIÓN:</label>
                            
                            <div class="mb-2">
                                @if ($item->origen=="EMPRESA")
                                <p><strong class="form-check-label" for="exampleRadios1">
                                    EMPRESA
                                    </strong></p>
                                @elseif ($item->origen=="CONDUCTOR")
                                <p><strong class="form-check-label" for="exampleRadios2">
                                    CONDUCTOR
                                </strong></p>
                                @else
                                <p><strong class="form-check-label" for="exampleRadios3">
                                    TERCERO
                                </strong></p>
                                @endif
                                
                            </div>  
                                  <div class="mb-1 row">
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="first-name">FECHA FACTURA</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="date" id="fecha_fac" class="form-control" name="fecha_fac"
                                         placeholder="First Name" value="{{$item->fecha_fac}}" disabled>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="first-name">N° FACTURA</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" id="n_fac" class="form-control" name="n_fac"
                                         placeholder="FAC-022" value="{{$item->n_fac}}" disabled>
                                    </div>
                                </div>
                        </div>
                     
                        <div class="mb-1 mt-1">
                            <label class="d-block form-label"
                            for="validationBioBootstrap">OBSERVACIONES</label>
                            <p>
                                {{$item->observaciones}}
                            </p>
                        </div>
                    </div>
                    @else
                        
                    @endif
                @endforeach
            </div>

            </form>
        </div>
    </div>
</div>
