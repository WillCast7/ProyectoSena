@extends('dashboard.base')
@section('contenido')
@foreach($usuario as $item)
@endforeach
@section('titulo')
    Edicion del usuario -{{$item->persona_nombre1}} {{$item->persona_apellido1}}-
@endsection
@section('direccion')
    usuarios / editar usuario
@endsection
 <!-- Actualizar usuario-->
<div class="form" id="updateUser">
                <form action="{{route('u.update', $item->persona_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><!--Primer nombre-->
                        <label for="persona_nombre1">Primer nombre</label>
                        <input type="text" name="persona_nombre1" class="form-control" value="{{$item->persona_nombre1}}">
                    </div>
                    <div class="form-group"><!--Segundo nombre-->
                    <label for="persona_nombre2">Segundo nombre</label>
                        <input type="text" name="persona_nombre2" class="form-control" value="{{$item->persona_nombre2}}">
                    </div>
                    <div class="form-group"><!--Primer apellido-->
                    <label for="persona_apellido1">Primer apellido</label>
                        <input type="text" name="persona_apellido1" class="form-control" value="{{$item->persona_apellido1}}">
                        @error('persona_apellido1')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Segundo apellido-->
                        <label for="persona_apellido2">Segundo apellido</label>
                        <input type="text" name="persona_apellido2" class="form-control" value="{{$item->persona_apellido2}}">
                    </div>
                    <div class="form-group"><!--Tipos de documentos-->
                        <label for="persona_tipodocumento">Tipo de documento</label>
                        <select name="persona_tipodocumento" id="input" class="form-control" value="{{$item->persona_tipodocumento}}">
                            <option value="{{$item->persona_tipodocumento}}">{{$item->nombre_largo_parametro}}</option>
                             @foreach($tipoDoc as $td)
                            <option value="{{$td->id_parametro}}">{{$td->nombre_largo_parametro}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><!--DNI-->
                        <label for="persona_dni">DNI</label>
                        <input type="text" name="persona_dni" class="form-control" value="{{$item->persona_dni}}">
                        @error('persona_dni')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Telefono-->
                        <label for="persona_telefono">Telefono</label>
                        <input type="text" name="persona_telefono" class="form-control" value="{{$item->persona_telefono}}">
                        @error('persona_telefono')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Fecha nacimiento-->
                        <label for="pesona_fnacimiento">Fecha de nacimiento</label>
                        <input type="date" name="persona_fnacimiento" class="form-control" value="{{$item->persona_fnacimiento}}">
                        @error('persona_fnacimiento')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Ciudad de nacimiento-->
                        <label for="persona_ciudadnacimiento">Ciudad de nacimiento</label>
                        <select name="persona_ciudadnacimiento" id="ciudadNacimiento" class="form-control">
                            <option value="{{$item->persona_ciudadnacimiento}}">{{$item->persona_ciudadnacimiento}}</option>
                            @foreach($city as $citi)
                            <option value="{{$citi->ciudad_nombre}}">{{$citi->ciudad_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><!--Paises-->
                        <label for="pais_codigo">Seleccione pais de residencia</label>
                        <select name="pais_codigo" id="input" class="form-control">
                            <option value="{{$item->pais_codigo}}">{{$item->pais_nombre}}</option>
                             @foreach($paises as $pais)
                            <option value="{{$pais->pais_codigo}}">{{$pais->pais_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><!--Departamentos-->
                        <label for="departamento_codigo">seleccione su departamento</label>
                        <select name="departamento_codigo" id="Departamentos" class="form-control">
                            <option value="{{$item->departamento_codigo}}">{{$item->departamento_nombre}}</option>
                            @foreach($deptos as $depto)
                            <option value="{{$depto->departamento_codigo}}">{{$depto->departamento_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><!--Ciudades-->
                            <label for="ciudad_codigo">Seleccione ciudad de residencia</label>
                        <select name="ciudad_codigo" id="ciudades" class="form-control">
                            <option value="{{$item->ciudad_codigo}}">{{$item->ciudad_nombre}}</option>
                            @foreach($city as $citi)
                            <option value="{{$citi->ciudad_codigo}}">{{$citi->ciudad_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><!--Direccion-->
                        <label for="persona_direccion">Direccion</label>
                        <input type="text" name="persona_direccion" class="form-control" value="{{$item->persona_direccion}}">
                    </div>
                    <div class="form-group"><!--Correo-->
                        <label for="persona_email">Correo electronico</label>
                        <input type="text" name="persona_email" class="form-control" value="{{$item->persona_email}}">
                        @error('persona_email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
             
                    <div class="form-group"><!--Roles-->
                        <label for="perfil_id">Seleccione Perfil</label>
                        <select name="perfil_id" id="perfiles" class="form-control">
                            <option value="{{$item->perfil_id}}">{{$item->perfil_nombre}}</option>
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
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <input type="button" class="btn btn-danger" onclick="history.back()" name="Volver" value="Volver">
                    </div>
                </form>

</div>

@endsection
