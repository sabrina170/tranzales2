<div class="modal fade" id="detviatico{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detalle Viaticos - Personal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  method="post" enctype="multipart/form-data">
            <div class="modal-body">
                    <div class="row">
                        @foreach ($viaticos as $item)
                        @if ($item->id==$doc->id_viaticos)
                            <div class="col-md-12">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6"></div>
                                        <div class="col-6">
                                            <div class="row p-0">
                                                <div class="col-sm-6">
                                                    <label class="col-form-label" for="first-name">
                                                        COSTO TOTAL VIATICO PERSONAL</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" 
                                                    name="costo_total" value="{{$item->costo_total}}" placeholder="100.00" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-4 p-1 border">
                                <label class="form-label" for="select2-basic">MOVILIDAD (S/.)</label>
                                <div class="mb-1">
                                <input type="number" name="movilidad" class="form-control "
                                            placeholder="100" value="{{$item->movilidad}}" step="any" disabled>
                                </div>
                                <label class="form-label" for="select2-basic">ALIMENTO (S/.)</label>
                                <div class="mb-1">
                                <input type="number" name="alimento" class="form-control "
                                            placeholder="100"  value="{{$item->alimento}}" step="any" disabled>
                                </div>
                                <label class="form-label" for="select2-basic">SERVICIO / APOYO (S/.)</label>
                                <div class="mb-1">
                                <input type="number" name="servicio" class="form-control "
                                            placeholder="100"  value="{{$item->servicio}}"  step="any" disabled>
                                </div> 
                            </div>
                            <div class="col-md-4 p-1 border">
                                <label class="form-label" for="select2-basic">MOTIVO</label>
                                <div class="mb-1">
                                <p><strong>{{$item->motivo_mo}}</strong></p>
                                </div>
                                <label class="form-label" for="select2-basic">MOTIVO</label>
                                <div class="mb-1">
                                <p><strong>{{$item->motivo_ali}}</strong></p>
                                </div>
                                <label class="form-label" for="select2-basic">MOTIVO</label>
                                <div class="mb-1">
                                <p><strong>{{$item->motivo_ser}}</strong></p>

                                </div>
                            </div>
                            <div class="col-md-4 p-1 border">
                                <label class="form-label mb-1" for="select2-basic">ORIGEN DE TRANSICIÓN</label>
                                
                                <div class="mb-1">
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
                                    
                            </div>
                            <div class="mb-1 mt-1">
                                <label class="d-block form-label"
                                for="validationBioBootstrap">OBSERVACIONES</label>
                                <p>
                                    {{$item->observaciones}}
                                </p>
                            </div>
                        @else
                        @endif
                        @endforeach
                    </div>
                    
            </div>

    
            </form>
        </div>
    </div>
</div>
