<div class="modal fade" id="editcierre{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">
                                  Fecha de Facturación  </label>
                                <input type="date"  class="form-control" name="fecha_fac" value="{{ date("Y-m-d");}}" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">
                                   N° Facturación</label>
                                <input type="text"  class="form-control" name="n_fac" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="id_soli" value="{{$doc->id}}" readonly>
                    <input type="hidden" name="id_cierre" value="{{$doc->id_cierre}}" readonly>
                    <button type="submit" class="btn btn-success  waves-effect waves-float waves-light" name="accion" value="finalizar">Finalizar</button>
                </div>
            </form>
        </div>
    </div>
</div>