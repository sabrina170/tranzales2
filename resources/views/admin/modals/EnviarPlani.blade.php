<div class="modal fade" id="enviarmodal{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Enviar Información al Conductor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- <form action="{{ route('crear-plani') }}"  method="post" enctype="multipart/form-data">
                @csrf --}}
            <div id="contenedorC" class="modal-body">
                    <div class="row">
                      
                        @foreach (json_decode($doc->datos_destinos) as $item)
                            @foreach ($destinos as $des)
                                @if ($des->id==$item)
                                <div class="col-3">
                                    <span class="badge badge-light-primary">{{$des->referencia}}</span>
                                    </div> 
                                @else
                                    
                                @endif
                            @endforeach
                        
                        @endforeach

                        
                    </div>
                   
            </div>

            <div class="modal-footer">
                
            <a class="btnPdf" id="btnPdf" >pdf</a>
                <input type="hidden" name="id_soli" value="{{$doc->id}}" readonly>
               
                <button type="submit" 
                class="btn btn-success 
                 waves-effect waves-float waves-light" name="enviar" value="enviar">Enviar</button>
              </div>
            {{-- </form> --}}
        </div>
    </div>
</div>