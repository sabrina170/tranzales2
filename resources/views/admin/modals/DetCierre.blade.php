<div class="modal fade" id="detcierre{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Descargar PDFS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <form action="{{ route('crear-cierre') }}"  method="post" enctype="multipart/form-data">
                @csrf --}}
            <div class="modal-body">
                            @php
                                $datos_destinos = json_decode($doc->datos_destinos, true);   
                                $cont = count($datos_destinos);
                            @endphp
                            {{-- maner mas ordenada --}}

                            <div class="card card-apply-job">
                                <div class="card-body">
                                        <div class="row">
                                            @foreach ($datos_destinos as $item)
                                           
                                            @endforeach
                                             
                                                @foreach ($cierres as $item)
                                                {{-- @foreach ($item->datos_guias as $des) --}}
                                                    @if ($doc->id_cierre==$item->id)
                                                    <div class="row">
                                                    
                                                        @php
                                                        $datos_guias = json_decode($item->datos_guias, true); 
                                                        $datos_n_guias = json_decode($item->n_guias, true); 

                                                        $datos_remision = json_decode($item->datos_remision, true); 
                                                        $datos_n_remision = json_decode($item->n_remision, true);
                                                        @endphp
                                                   
                                                            @for ($i = 0; $i < $cont; $i++)
                                                                <div class="col-md-3">
                                                                    <h6 class="d-inline me-25">Destino</h6>
                                                                    <div class="design-planning-wrapper mb-2 py-75">
                                                                        <div class="apply-job-package bg-light-primary rounded">
                                                                            
                                                                              
                                                                            <span class="btn btn-primary waves-effect btn-sm">
                                                                                @foreach ($destinos as $des)
                                                                                @if ($des->id==$datos_destinos[$i])
                                                                            {{$des->referencia}}
                                                                                
                                                                            @else
                                                                            @endif
                                                                        @endforeach
                                                                            </span>
                                                                        </div>    
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="design-planning-wrapper mb-2 py-75">
                                                                        <div class="apply-job-package bg-light-primary rounded">
                                                                            <h6 class="d-inline me-25"><strong>Guia de Transporte</strong> </h6>
                                                                            
                                                                            <h6 class="d-inline me-25">N° {{$datos_n_guias[$i]}}</h6>
                                                                            
                                                                            <a class="btn btn-outline-primary waves-effect btn-sm" 
                                                                            href="{{asset('pdfs-guias/'.$datos_guias[$i])}}" 
                                                                            download="{{$datos_guias[$i]}}"> 
                                                                            <i data-feather='download'></i>
                                                                            <span>  {{$datos_guias[$i]}}</span> </a> 
                                                                        </div>
                                                                        <div class="apply-job-package bg-light-primary rounded">
                                                                            <h6 class="d-inline me-25"><strong>Guia de Remison</strong> </h6>
                                                                            
                                                                            <h6 class="d-inline me-25">N° {{$datos_n_remision[$i]}}</h6>
                                                                            
                                                                            <a class="btn btn-outline-primary waves-effect btn-sm" 
                                                                            href="{{asset('pdfs-guias/'.$datos_remision[$i])}}" 
                                                                            download="{{$datos_remision[$i]}}"> 
                                                                            <i data-feather='download'></i>
                                                                            <span>  {{$datos_remision[$i]}}</span> </a> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endfor
                                                        
                                                    <div class="col-md-12">
                                                        <h4> Indicaciones Especiales: </h4>
                                                      {{$item->indicaciones}}
                                                    </div>
                                        </div>
                                                    @else
                                                    @endif  
                                                @endforeach  
                                         
                                        </div>
                                </div>
                            </div>
                        </div>
            </div>

            {{-- <div class="modal-footer">
                <input type="hidden" name="id_soli" value="{{$doc->id}}" readonly>
               <button type="submit" class="btn btn-success  waves-effect waves-float waves-light" name="accion" value="finalizar">Finalizar</button>
              </div> --}}
            {{-- </form> --}}
        </div>
    </div>
</div>