@extends('dashboard.base')

@section('contenido')
{{-- Tabla de usuarios --}}
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
        <thead class="thead-dark">
            <tr>
                <th>
                    ACCIONES
                </th>
                <th>
                    NOMBRE COMPLETO
                </th>
                <th>
                    TELEFONO
                </th>
                <th>
                    NOMBRE USUARIO
                </th>
                <th>
                    CONTRASEÑA
                </th>
                <th>
                    ROL
                </th>
                <th>
                    AVATAR
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $item)
            <tr>
                <td>
                    <a href="/" > <i class="far fa-plus-circle"></i> </a>
                    <a href="/" > <i class="far fa-edit"></i> </a>
                    <a href="/" ><i class="fas fa-trash-alt"></i></a>
                </td>
                <td>{{$item->nombres}}</td>
                <td>{{$item->persona_telefono}}</td>
                <td>{{$item->usuario_username}}</td>
                <td>{{$item->usuario_pass}}</td>
                <td>{{$item->perfil_nombre}}</td>
                <td>{{$item->persona_avatar}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUser"><i class="fas fa-users"></i>
    AGREGAR USUARIO
</button>
<br>
 <!-- Formulario usuario -->
 <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="title">AGREGAR USUARIO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('a.new')}}" method="put" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <div class="form-group">
                        <input type="text" name="persona_nombre1" class="form-control" placeholder="Primer nombre">
                        @error('persona_nombre1')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_nombre2" class="form-control" placeholder="Segundo nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_apellido1" class="form-control" placeholder="Primer apellido">
                        @error('persona_apellido1')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_apellido2" class="form-control" placeholder="Segundo apellido">
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_tipodocumento" class="form-control" placeholder="Tipo documento">
                        @error('persona_tipodocumento')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_dni" class="form-control" placeholder="DNI">
                        @error('persona_dni')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="persona_telefono" class="form-control" placeholder="Telefono">
                        @error('persona_telefono')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="date" name="persona_fnacimiento" class="form-control">
                        @error('persona_fnacimiento')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="persona_sexo" class="form-control" placeholder="sexo">
                        @error('persona_sexo')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_email" class="form-control" placeholder="Email">
                        @error('persona_email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="usuario_username" class="form-control" placeholder="Usuario">
                        @error('usuario_username')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="usuario_pass" class="form-control" placeholder="Contraseña">
                        @error('usuario_pass')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="roles" id="input" class="form-control" placeholder="tipo de usuario">
                            <option value=" ">Seleccione...</option>
                            @foreach($roles as $rol)
                            <option value="{{$rol->perfil_id}}">{{$rol->perfil_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group " >
                    <input type="file" class="form-control-file" name="imagen" accept="image/*">
                    <br>
                    @error('image')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>



                <div class="modal-footer">
                <input type="submit" value="Guardar" class="btn btn-primary">
        </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<br>
<hr/>
</div>

{{-- Tabla de productos --}}
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
        <thead class="thead-dark">
            <tr>
                <th>
                    ACCIONES
                </th>
                <th>
                    PRODUCTO
                </th>
                <th>
                    CANTIDAD
                </th>
                <th>
                    DESCRIPCION
                </th>
                <th>
                    MARCA
                </th>
                <th>
                    CATEGORIA
                </th>
                <th>
                    IMAGEN
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $prod)
            <tr>
                <td>
                    <a href="/" > <i class="far fa-plus-circle"></i> </a>
                    <a href="/" > <i class="far fa-edit"></i> </a>
                    <a href="/" ><i class="fas fa-trash-alt"></i></a>
                </td>
                <td>{{$prod->producto_nombre}}</td>
                <td>{{$prod->producto_cantidad}}</td>
                <td>{{$prod->producto_descripcion}}</td>
                <td>{{$prod->producto_empresa}}</td>
                <td>{{$prod->categoria_nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newProduct"><i class="fas fa-users"></i>
    AGREGAR PRODUCTO
</button>

 <!-- Formulario producto -->
 <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="title">AGREGAR PRODUCTO</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('p.new')}}" method="put" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <div class="form-group">
                        <input type="text" name="persona_nombre1" class="form-control" placeholder="Primer nombre">
                        @error('persona_nombre1')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_nombre2" class="form-control" placeholder="Segundo nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_apellido1" class="form-control" placeholder="Primer apellido">
                        @error('persona_apellido1')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_apellido2" class="form-control" placeholder="Segundo apellido">
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_tipodocumento" class="form-control" placeholder="Tipo documento">
                        @error('persona_tipodocumento')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_dni" class="form-control" placeholder="DNI">
                        @error('persona_dni')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="persona_telefono" class="form-control" placeholder="Telefono">
                        @error('persona_telefono')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="date" name="persona_fnacimiento" class="form-control">
                        @error('persona_fnacimiento')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="text" name="persona_sexo" class="form-control" placeholder="sexo">
                        @error('persona_sexo')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="persona_email" class="form-control" placeholder="Email">
                        @error('persona_email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="usuario_username" class="form-control" placeholder="Usuario">
                        @error('usuario_username')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="usuario_pass" class="form-control" placeholder="Contraseña">
                        @error('usuario_pass')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="roles" id="input" class="form-control" placeholder="tipo de usuario">
                            <option value=" ">Seleccione...</option>
                            @foreach($categorias as $cat)
                            <option value="{{$cat->categoria_id}}">{{$cat->categoria_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group " >
                    <input type="file" class="form-control-file" name="imagen" accept="image/*">
                    <br>
                    @error('image')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>



                <div class="modal-footer">
                <input type="submit" value="Guardar" class="btn btn-primary">
        </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>





  @endsection

