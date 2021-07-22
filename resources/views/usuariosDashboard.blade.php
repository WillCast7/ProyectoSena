@extends('dashboard.base')
@section('titulo')
    GESTIÓN DE USUARIOS
@endsection
@section('direccion')
    usuarios
@endsection
@section('contenido')

<!-- Tabla de usuarios -->
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table id="tablita" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 200px">
                        ACCIONES
                    </th>
                    <th>
                        DOCUMENTO
                    </th>
                    <th>
                        NOMBRE COMPLETO
                    </th>
                    <th>
                        TELEFONO
                    </th>
                    <th>
                        CORREO ELECTRONICO
                    </th>
                    <th>
                        PERFIL
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $items)
                    <tr>
                        <td>
                            <div class="incons">
                                <a class="btn btn-info" data-toggle="modal" data-target="#viewUser" title="Ver"><i class="far fa-eye"></i></a>
                                <a class="btn btn-info" href="{{route('u.edit', $items->persona_id)}}" title="Editar"><i class="far fa-edit"></i></a>
                              @if($items->persona_estado == 1)
                                    <a class="btn btn-success" href="{{route('u.delete', $items->persona_id)}}" title="Activo"><i class="fas fa-check"></i></a>
                                @else
                                    <a class="btn btn-danger" href="{{route('u.undelete', $items->persona_id)}}" title="Inactivo"><i class="fa fa-times-circle"></i></a>
                              @endif
                            </div>
                        </td>
                        <td>{{$items->persona_dni}}</td>
                        <td>{{$items->nombres}}</td>
                        <td>{{$items->persona_telefono}}</td>
                        <td>{{$items->persona_email}}</td>
                        <td>{{$items->perfil_nombre}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!-- vistas usuario  -->
<div class="modal fade bd-example-modal-lg " id="viewUser" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="container p-3 my-3 bg-dark text-white">
                <div class="modal-body">
                    <h2>{{$items->nombres}}</h2>
                    <p>INFORMACION AVANZADA DEL USUARIO</p>
                    <table class="table">
                            <thead style= "background-color:slategray;color:white; font-weight :bold;" >
                                <tr class="success">
                                    <th>Telefono Usuario</th>
                                    <th>Tipo Documento</th>
                                    <th>DNI </th>
                                    <th>Direccion</th>
                                    <th>nacimiento</th>
                                    <th>Ciudad Nacimiento</th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr class="danger">
                                <td>{{$items->persona_telefono}}</td>
                                <td>{{$items->nombre_largo_parametro}}</td>
                                <td>{{$items->persona_dni}}</td>
                                <td>{{$items->persona_direccion}}</td>
                                <td>{{$items->persona_fnacimiento}}</td>
                                <td>{{$items->persona_ciudadnacimiento}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUser">
    AGREGAR PRODUCTO
</button>



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
                        <div class="form-group"><!--Primer nombre-->
                            <label for="persona_nombre1">Primer nombre</label>
                            <input type="text" name="persona_nombre1" class="form-control" placeholder="Primer nombre">
                            @error('persona_nombre1')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Segundo nombre-->
                            <label for="persona_nombre2">Segundo nombre</label>
                            <input type="text" name="persona_nombre2" class="form-control" placeholder="Segundo nombre">
                        </div>
                        <div class="form-group"><!--Primer apellido-->
                            <label for="persona_apellido1">Primer apellido</label>
                            <input type="text" name="persona_apellido1" class="form-control" placeholder="Primer apellido">
                            @error('persona_apellido1')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Segundo apellido-->
                            <label for="persona_apellido2">Segundo apellido</label>
                            <input type="text" name="persona_apellido2" class="form-control" placeholder="Segundo apellido">
                        </div>
                        <div class="form-group"><!--Tipos de documentos-->
                            <label for="persona_tipodocumento">Tipo de documento</label>
                            <select name="persona_tipodocumento" id="input" class="form-control" placeholder="C">
                                <option value=" ">Tipo Documento</option>
                                @foreach($tipoDoc as $td)
                                <option value="{{$td->nombre_largo_parametro}}">{{$td->nombre_largo_parametro}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--DNI-->
                            <label for="persona_dni">DNI</label>
                            <input type="text" name="persona_dni" class="form-control" placeholder="DNI">
                            @error('persona_dni')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Telefono-->
                            <label for="persona_telefono">Telefono</label>
                            <input type="text" name="persona_telefono" class="form-control" placeholder="Telefono">
                            @error('persona_telefono')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Fecha nacimiento-->
                              <label for="pesona_fnacimiento">Fecha de nacimiento</label>
                            <input type="date" name="persona_fnacimiento" class="form-control">
                            @error('persona_fnacimiento')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Ciuda de nacimiento-->
                            <label for="persona_ciudadnacimiento">Ciudad de nacimiento</label>
                            <select name="persona_ciudadnacimiento" id="ciudadNacimiento" class="form-control">
                                <option value=" ">Ciudad</option>
                                @foreach($city as $item)
                                <option value="{{$item->ciudad_nombre}}">{{$item->ciudad_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Paises-->
                            <label for="pais_codigo">Seleccione pais de residencia</label>
                            <select name="pais_codigo" id="input" class="form-control" placeholder="tipo de usuario">
                                <option value=" ">Pais</option>
                                @foreach($paises as $pais)
                                <option value="{{$pais->pais_codigo}}">{{$pais->pais_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Departamentos-->
                            <label for="departamento_codigo">seleccione su departamento</label>
                            <select name="departamento_codigo" id="Departamentos" class="form-control" placeholder="tipo de usuario">
                                <option value=" ">Departamento</option>
                                @foreach($deptos as $depto)
                                <option value="{{$depto->departamento_codigo}}">{{$depto->departamento_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Ciudades-->
                             <label for="ciudad_codigo">Seleccione ciudad de residencia</label>
                            <select name="ciudad_codigo" id="ciudades" class="form-control" placeholder="Ciudad">
                                <option value=" ">Ciudad</option>
                                @foreach($city as $item)
                                <option value="{{$item->ciudad_codigo}}">{{$item->ciudad_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Direccion-->
                            <label for="persona_direccion">Direccion</label>
                            <input type="text" name="persona_direccion" class="form-control" placeholder="Direccion">
                        </div>
                        <div class="form-group"><!--Correo-->
                            <label for="persona_email">Correo electronico</label>
                            <input type="text" name="persona_email" class="form-control" placeholder="Email">
                            @error('persona_email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Contraseña-->
                            <label for="usuario_pass">Contraseña</label>
                            <input type="password" name="usuario_pass" class="form-control" placeholder="Contraseña">
                            @error('usuario_pass')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Roles-->
                            <label for="perfil_id">Seleccione Perfil</label>
                            <select name="perfil_id" id="perfiles" class="form-control" placeholder="perfiles">
                                <option value=" ">Perfil</option>
                                @foreach($roles as $rol)
                                <option value="{{$rol->perfil_id}}">{{$rol->perfil_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" ><!--avatar-->
                            <label for="persona_avatar">Subir imagen de su avatar</label>
                            <input type="file" class="form-control-file" name="persona_avatar" accept="image/*">
                            <br>
                            @error('persona_avatar')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

