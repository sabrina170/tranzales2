<div class="modal fade" id="edit{{$doc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="first-name-column">Nombre</label>
                      <input type="text" id="first-name-column" class="form-control"  name="nombre" value="{{$doc->nombre}}" required>
                  </div>
              </div>
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="first-name-column">Ruc</label>
                      <input type="number" id="ruc" class="form-control"  name="ruc" value="{{$doc->ruc}}" required>
                  </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="first-name-column">Referencia</label>
                    <input type="text" id="ruc" class="form-control"  name="referencia" value="{{$doc->referencia}}" required>
                </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="last-name-column">Departamento</label>
                    <select  class="form-select info-ob" id="departamento" name="departamento"  @selected(old('departamento'))>

                    <option value="0">Seleccione un departamento</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{$departamento->id}}" @if ($departamento->id==$doc->id_dep) selected @else  @endif>{{$departamento->name}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="city-column">Provincia</label>
                      <select  class="form-select info-ob" id="provincia" name="provincia"  @selected(old('provincia'))>

                        <option value="0">Seleccione un departamento</option>
                            @foreach ($provincias as $prov)
                            <option value="{{$prov->id}}" @if ($prov->id==$doc->id_prov) selected @else  @endif>{{$prov->name}}</option>
                            @endforeach
                        </select>
                  </div>
              </div>
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="country-floating">Distrito</label>
                      <select  class="form-select info-ob" id="distrito" name="providistritoncia"  @selected(old('distrito'))>

                        <option value="0">Seleccione un departamento</option>
                            @foreach ($distritos as $dis)
                            <option value="{{$dis->id}}" @if ($dis->id==$doc->id_dis) selected @else  @endif>{{$dis->name}}</option>
                            @endforeach
                        </select>
                  </div>
              </div>
            
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="company-column">Direccion</label>
                      <input type="text" id="direccion" class="form-control" value="{{$doc->direccion}}" required>
                  </div>
              </div>
              <div class="col-md-4 col-12">
                  <div class="mb-1">
                      <label class="form-label" for="company-column">Tipo de Servicio</label>
                      <select class="form-select" name="tipo_servicio" required>
                        <option value="1" @if ($doc->tipo_servicio==1) selected @else  @endif>GORRINOS</option>
                        <option value="2" @if ($doc->tipo_servicio==2) selected @else  @endif>ALIMENTOS</option>
                        <option value="3" @if ($doc->tipo_servicio==3) selected @else  @endif>LECHONES</option>
                    </select>
                  </div>
              </div>
              <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label" for="company-column">Estado</label>
                    <select class="form-select" name="estado" required>
                      <option value="1" @if ($doc->estado==1) selected @else  @endif>Activo</option>
                      <option value="0" @if ($doc->estado==0) selected @else  @endif>Desactivo</option>
                  </select>
                </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="mb-1">
                  <label class="form-label" for="company-column">Contactos</label>
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
  