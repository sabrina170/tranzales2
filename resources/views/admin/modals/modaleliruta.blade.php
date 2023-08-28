<div class="modal fade" id="eli{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Ruta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
      </div>
      <div class="modal-body">
          <form action="{{ route('delete-ruta',$doc->id) }}" method="post">
              @csrf
              @method('delete')
                  <div class="text-center">
                      <h4 class="mb-1 text-danger">¿Desea eliminar este ruta?</h4>
                      <p class="card-text m-auto w-75">
                        
                      </p>
                  </div>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger me-1 waves-effect waves-float waves-light">Eliminar</button>

      </div>
  </form>
    </div>
  </div>
</div>
