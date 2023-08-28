<div class="modal fade" id="view{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalle Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="first-name-column">Nombre</label>
                    <input type="text" id="first-name-column" class="form-control"  name="nombre" value="{{$doc->nombre}}" disabled>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="first-name-column">Ruc</label>
                    <input type="number" id="ruc" class="form-control"  name="ruc" value="{{$doc->ruc}}" disabled>
                </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="mb-1">
                  <label class="form-label" for="first-name-column">Referencia</label>
                  <input type="text" id="ruc" class="form-control"  name="referencia" value="{{$doc->referencia}}" disabled>
              </div>
          </div>
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="last-name-column">Departamento</label>
                    <input type="text" id="ruc" class="form-control" value="{{$doc->nombre_dep}}" disabled>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="city-column">Provincia</label>
                    <input type="text" id="ruc" class="form-control" value="{{$doc->nombre_prov}}" disabled>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="country-floating">Distrito</label>
                    <input type="text" id="ruc" class="form-control" value="{{$doc->nombre_dis}}" disabled>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Direccion</label>
                    <input type="text" id="ruc" class="form-control" value="{{$doc->direccion}}" disabled>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Tipo de Servicio</label>
                    <br>
                    {{-- {{$doc->tipo_servicio}} --}}
                    @if ($doc->tipo_servicio==1)
                    <strong>GORRINOS</strong>
                    @elseif($doc->tipo_servicio==2)
                    <strong>ALIMENTOS</strong>
                    @elseif($doc->tipo_servicio==3)
                    <strong>LECHONES</strong>
                    @else
                    <strong>-</strong>
                    @endif
                </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="mb-1">
                  <label class="form-label" for="company-column">Contactos</label>
              </div>
              
            </div> 
            
          </div>
          <div class="container text-center">
            <div class="row ">
              <div class="col badge badge-light-dark">CONTACTO</div>
              <div class="col badge badge-light-dark">TELEFONO</div>
              <div class="col badge badge-light-dark">CARGO</div>
              <div class="col badge badge-light-dark">CORREO</div>
            </div>
          </div>
          <div class="container text-center">
              @foreach (json_decode($doc->contactos) as $item)
              <div class="row">
                <div class="col-3">{{$item->contacto}}</div>
                <div class="col-3">{{$item->telefono}}</div>
                <div class="col-3">{{$item->cargo}}</div>
                <div class="col-3">{{$item->correo}}</div>
              </div>
                @endforeach
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  