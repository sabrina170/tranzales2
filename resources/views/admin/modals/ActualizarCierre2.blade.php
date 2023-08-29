<div class="modal fade" id="editcierre2{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Cierre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('edit-cierre') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                       @foreach ($cierres as $item)
                           @if ($item->id==$doc->id_cierre)
                           <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">
                                    Fecha de Facturación </label>
                                <input type="date" class="form-control" name="fecha_fac" value="{{$item->fecha_fac}}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">
                                    N° Facturación</label>
                                <input type="text" class="form-control" name="n_fac" value="{{$item->n_fac}}" required>
                            </div>
                        </div>
                           @else
                               
                           @endif
                       @endforeach 
                        
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="id_soli" value="{{$doc->id}}" readonly>
                    <input type="hidden" name="id_cierre" value="{{$doc->id_cierre}}" readonly>
                    <button type="submit" class="btn btn-success  waves-effect waves-float waves-light" 
                    name="accion" value="finalizar">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>