<div class="modal fade" id="detpeaje{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detalle Peaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=""  method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                @foreach ($peajes as $item)
                    @if ($item->id==$doc->id_peaje)
                        
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <div class="card-header p-0">
                                <h4 class="card-title"></h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">COSTO TOTAL PEAJES</p>
                                    <input  name="costo_total"
                                     class="form-control form-control" type="number"
                                     placeholder="100.00" value="{{$item->costo_total}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 p-1 border">
                            <label class="form-label" for="select2-basic">PEAJES</label>
                            <div class="row">
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                          <p><small class="text-muted">1 PEAJE</small></p>
                                        <input type="number" name="peaje1" 
                                        class="form-control"  value="{{$item->peaje1}}" disabled>
                                        <a href="{{asset('img-peajes/'.$item->img_peaje1)}}" type="button" 
                                            id="img_recarga2" name="img_peaje1" class="badge bg-secondary"
                                            download>{{$item->img_peaje1}}</a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <p><small class="text-muted">2 PEAJE</small></p>
                                        <input type="number" id="peaje2{{$doc->id}}" name="peaje2" 
                                        class="form-control"  value="{{$item->peaje2}}" disabled>
                                        <a href="{{asset('img-peajes/'.$item->img_peaje2)}}" type="button" 
                                            id="img_recarga2" name="img_peaje2" class="badge bg-secondary"
                                            download>{{$item->img_peaje2}}</a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <p><small class="text-muted">3 PEAJE</small></p>
                                        <input type="number" id="peaje3{{$doc->id}}" name="peaje3" 
                                        class="form-control"  value="{{$item->peaje3}}" disabled>
                                        <a href="{{asset('img-peajes/'.$item->img_peaje3)}}" type="button" 
                                            id="img_recarga2" name="img_peaje3" class="badge bg-secondary"
                                            download>{{$item->img_peaje3}}</a>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <p><small class="text-muted">4 PEAJE</small></p>
                                        <input type="number" id="peaje4{{$doc->id}}" name="peaje4" 
                                        class="form-control"  value="{{$item->peaje4}}" disabled>
                                        <a href="{{asset('img-peajes/'.$item->img_peaje4)}}" type="button" 
                                            id="img_recarga2" name="img_peaje4" class="badge bg-secondary"
                                            download>{{$item->img_peaje4}}</a>
                                    </div>
                                </div>
                            </div> 
                   
                            <label class="form-label" for="select2-basic">PRECIO DEL PEAJE (S/.)</label>
                            <div class="row taby">
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="text"
                                         name="precio_peaje1" class="form-control decimales"
                                         placeholder="14.59" value="{{$item->precio_peaje1}}" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="text"
                                         name="precio_peaje2" class="form-control decimales" 
                                         placeholder="14.59"
                                         value=" {{$item->precio_peaje2}}" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="text"
                                         name="precio_peaje3" class="form-control decimales"
                                         placeholder="14.59" value="{{$item->precio_peaje3}}" disabled>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-3 col-12">
                                    <div class="mb-1">
                                        <input type="text"
                                         name="precio_peaje4" class="form-control decimales" 
                                         placeholder="14.59"
                                         value="{{$item->precio_peaje4}}" disabled>
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
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="first-name">FECHA FACTURA</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="date" id="fecha_fac" class="form-control" name="fecha_fac"
                                         placeholder="First Name" value="{{$item->fecha_fac}}" disabled>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="first-name">N° FACTURA</label>
                                    </div>
                                    <div class="col-sm-12">
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
