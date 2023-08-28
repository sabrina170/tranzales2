<div class="modal fade" id="detbalanza{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detalle Balanza</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=""  method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                @foreach ($balanzas as $item)
                    @if ($item->id==$doc->id_balanza)
                        
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <div class="card-header p-0">
                                <h4 class="card-title"></h4>
                                <div class="d-flex align-items-center">
                                    <p class="card-text font-small-2 me-25 mb-0">COSTO TOTAL BALANZA</p>
                                    <input name="costo_total"
                                     class="form-control form-control" type="number"
                                     value="{{$item->costo_total}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 p-1 border">
                            <label class="form-label" for="select2-basic">PRECIO DE BALANZA (S/.)</label>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="mb-1">
                                        <input type="number"  name="precio_ba" 
                                        class="form-control" value="{{$item->precio_ba}}" disabled>
                                    </div>
                                </div>
                            </div> 
                            <div class="mb-1 row">
                                <div class="col-sm-4">
                                    <label class="col-form-label" for="first-name">FECHA FACTURA</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" id="fecha_fac" class="form-control" name="fecha_fac"
                                     value="{{$item->fecha_fac}}" disabled>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <div class="col-sm-4">
                                    <label class="col-form-label" for="first-name">N° FACTURA</label>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="n_fac" class="form-control" name="n_fac"
                                    value="{{$item->n_fac}}" disabled>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <div class="col-sm-4">
                                    <label class="col-form-label" for="first-name">DESCARGAR DOCUMENTO</label>
                                </div>
                                <div class="col-sm-8">
                                    <a href="{{asset('img-balanzas/'.$item->img_fac)}}" type="button" id="img_recarga1" name="img_recarga1"
                                        download>{{$item->img_fac}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-1 border">
                            <label class="form-label mb-1" for="select2-basic">ORIGEN DE TRANSICIÓN</label>
                            
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
