@extends('dashboard.base')
@section('contenido')
@foreach($usuario as $item)
@endforeach
 <!-- Actualizar usuario-->
<div class="form" id="updateUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title">ACTUALIZAR USUARIO</h5>
                <br>
                <label for="">{{$item->persona_nombre1}} {{$item->persona_apellido1}}</label>
                <div style="padding-left:25%">
                    <label style="float: right">{{$item->persona_id}}</label>
                </div>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('u.update', $item->persona_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><!--Primer nombre-->
                        <input type="text" name="persona_nombre1" class="form-control" value="{{$item->persona_nombre1}}">
                    </div>
                    <div class="form-group"><!--Segundo nombre-->
                        <input type="text" name="persona_nombre2" class="form-control" value="{{$item->persona_nombre2}}">
                    </div>
                    <div class="form-group"><!--Primer apellido-->
                        <input type="text" name="persona_apellido1" class="form-control" value="{{$item->persona_apellido1}}">
                        @error('persona_apellido1')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Segundo apellido-->
                        <input type="text" name="persona_apellido2" class="form-control" value="{{$item->persona_apellido2}}">
                    </div>
                    <div class="form-group"><!--Tipos de documentos-->
                        <select name="persona_tipodocumento" id="input" class="form-control" value="{{$item->persona_tipodocumento}}">
                            <option value="{{$item->persona_tipodocumento}}">{{$item->nombre_largo_parametro}}</option>
{{--                             @foreach($tipoDoc as $td)
                            <option value="{{$td->id_parametro}}">{{$td->nombre_largo_parametro}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group"><!--DNI-->
                        <input type="text" name="persona_dni" class="form-control" value="{{$item->persona_dni}}">
                        @error('persona_dni')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Telefono-->
                        <input type="text" name="persona_telefono" class="form-control" value="{{$item->persona_telefono}}">
                        @error('persona_telefono')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Fecha nacimiento-->
                        <input type="date" name="persona_fnacimiento" class="form-control" value="{{$item->persona_fnacimiento}}">
                        @error('persona_fnacimiento')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Ciudad de nacimiento-->
                        <select name="persona_ciudadnacimiento" id="ciudadNacimiento" class="form-control">
                            <option value="{{$item->persona_ciudadnacimiento}}">{{$item->persona_ciudadnacimiento}}</option>
{{--                             @foreach($city as $item)
                            <option value="{{$item->ciudad_nombre}}">{{$item->ciudad_nombre}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group"><!--Paises-->
                        <select name="pais_codigo" id="input" class="form-control">
                            <option value="{{$item->pais_codigo}}">{{$item->pais_nombre}}</option>
{{--                             @foreach($paises as $pais)
                            <option value="{{$pais->pais_codigo}}">{{$pais->pais_nombre}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group"><!--Departamentos-->
                        <select name="departamento_codigo" id="Departamentos" class="form-control">
                            <option value="{{$item->departamento_codigo}}">{{$item->departamento_nombre}}</option>
{{--                             @foreach($deptos as $depto)
                            <option value="{{$depto->departamento_codigo}}">{{$depto->departamento_nombre}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group"><!--Ciudades-->
                        <select name="ciudad_codigo" id="ciudades" class="form-control">
                            <option value="{{$item->ciudad_codigo}}">{{$item->ciudad_nombre}}</option>
{{--                             @foreach($city as $item)
                            <option value="{{$item->ciudad_codigo}}">{{$item->ciudad_nombre}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group"><!--Direccion-->
                        <input type="text" name="persona_direccion" class="form-control" value="{{$item->persona_direccion}}">
                    </div>
                    <div class="form-group"><!--Correo-->
                        <input type="text" name="persona_email" class="form-control" value="{{$item->persona_email}}">
                        @error('persona_email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Nombre de usuario-->
                        <input type="text" name="usuario_username" class="form-control" value="{{$item->usuario_username}}">
                        @error('usuario_username')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Contraseña-->
                        <input type="password" name="usuario_pass" class="form-control" value="{{$item->usuario_pass}}">
                        @error('usuario_pass')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group"><!--Roles-->
                        <select name="perfil_id" id="perfiles" class="form-control">
                            <option value="{{$item->perfil_id}}">{{$item->perfil_nombre}}</option>
{{--                             @foreach($roles as $rol)
                            <option value="{{$rol->perfil_id}}">{{$rol->perfil_nombre}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group" ><!--avatar-->
                        <input type="file" class="form-control-file" name="persona_avatar" accept="image/*">
                        <br>
                        @error('persona_avatar')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </div>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection
