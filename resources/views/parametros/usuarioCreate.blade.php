@extends('dashboard.base')
@section('titulo')
    NUEVO USUARIO
@endsection
@section('direccion')
    usuarios  /  agregar usuario
@endsection
@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        <p>Revise los campos obligatorios</p>
    </div>
@endif
<div class="row justify-content-md-center">
<div class="col-md-8">
    <form action="{{route('a.new')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
            <div class="form-group"><!--Primer nombre-->
                <label for="persona_nombre1">Primer nombre<span class="text-danger">*</span></label>
                <input type="text" name="persona_nombre1" class="form-control" placeholder="Primer nombre" value="{{old('persona_nombre1')}}">
                @error('persona_nombre1')
                    <small class="text-danger">El Primer nombre es obligatorio</small>
                @enderror
            </div>
            <div class="form-group"><!--Segundo nombre-->
                <label for="persona_nombre2">Segundo nombre</label>
                <input type="text" name="persona_nombre2" class="form-control" placeholder="Segundo nombre" value="{{old('persona_nombre2')}}">
            </div>
            <div class="form-group"><!--Primer apellido-->
                <label for="persona_apellido1">Primer apellido<span class="text-danger">*</span></label>
                <input type="text" name="persona_apellido1" class="form-control" placeholder="Primer apellido" value="{{old('persona_apellido1')}}">
                @error('persona_apellido1')
                    <small class="text-danger">El Primer apellido es obligatorio</small>
                @enderror
            </div>
            <div class="form-group"><!--Segundo apellido-->
                <label for="persona_apellido2">Segundo apellido</label>
                <input type="text" name="persona_apellido2" class="form-control" placeholder="Segundo apellido" value="{{old('persona_apellido2')}}">
            </div>
            <div class="form-group"><!--Tipos de documentos-->
                <label for="persona_tipodocumento">Tipo de documento<span class="text-danger">*</span></label>
                <select name="persona_tipodocumento" id="input" class="form-control"  value="{{old('persona_tipodocumento')}}">
                    <option value=" ">Tipo Documento</option>
                    @foreach($tipoDoc as $td)
                    <option value="{{$td->nombre_largo_parametro}}">{{$td->nombre_largo_parametro}}</option>
                    @endforeach
                </select>
                @error('persona_tipodocumento')
                    <small class="text-danger">El Tipo Documento es obligatorio</small>
                @enderror
            </div>
            <div class="form-group"><!--DNI-->
                <label for="persona_dni">DNI<span class="text-danger">*</span></label>
                <input type="text" name="persona_dni" class="form-control" placeholder="DNI" value="{{old('persona_dni')}}">
                @error('persona_dni')
                    <small class="text-danger">EEl numero de documento es obligatorio</small>
                @enderror
            </div>
            <div class="form-group"><!--Telefono-->
                <label for="persona_telefono">Telefono<span class="text-danger">*</span></label>
                <input type="text" name="persona_telefono" class="form-control" placeholder="Telefono" value="{{old('persona_telefono')}}">
                @error('persona_telefono')
                    <small class="text-danger">El Telefono es obligatorio</small>
                @enderror
            </div>
            <div class="form-group"><!--Fecha nacimiento-->
                    <label for="pesona_fnacimiento">Fecha de nacimiento<span class="text-danger">*</span></label>
                <input type="date" name="persona_fnacimiento" class="form-control" value="{{old('persona_fnacimiento')}}">
                @error('persona_fnacimiento')
                    <small class="text-danger">La Fecha nacimiento es obligatoria</small>
                @enderror
            </div>
            <div class="form-group"><!--Ciudad de nacimiento-->
                <label for="persona_ciudadnacimiento">Ciudad de nacimiento<span class="text-danger">*</span></label>
                <select name="persona_ciudadnacimiento" id="ciudadNacimiento" class="form-control" value="{{old('ciudadNacimiento')}}">
                    <option value=" ">Ciudad</option>
                    @foreach($city as $item)
                    <option value="{{$item->ciudad_nombre}}">{{$item->ciudad_nombre}}</option>
                    @endforeach
                </select>
                @error('persona_ciudadnacimiento')
                    <small class="text-danger">La Ciudad de nacimiento es obligatoria</small>
                @enderror
            </div>
            <div class="form-group"><!--Paises-->
                <label for="pais_codigo">Seleccione pais de residencia<span class="text-danger">*</span></label>
                <select name="pais_codigo" id="input" class="form-control" placeholder="tipo de usuario" value="{{old('pais_codigo')}}">
                    <option value=" ">Pais</option>
                    @foreach($paises as $pais)
                    <option value="{{$pais->pais_codigo}}">{{$pais->pais_nombre}}</option>
                    @endforeach
                </select>
                @error('pais_codigo')
                    <small class="text-danger">El pais es obligatorio</small>
                @enderror
            </div>
            <div class="form-group"><!--Departamentos-->
                <label for="departamento_codigo">seleccione su departamento<span class="text-danger">*</span></label>
                <select name="departamento_codigo" id="Departamentos" class="form-control" value="{{old('departamento_codigo')}}">
                    <option value=" ">Departamento</option>
                    @foreach($deptos as $depto)
                    <option value="{{$depto->departamento_codigo}}">{{$depto->departamento_nombre}}</option>
                    @endforeach
                </select>
                @error('departamento_codigo')
                    <small class="text-danger">El Departamento es obligatorio</small>
                @enderror
            </div>
            <div class="form-group"><!--Ciudades-->
                    <label for="ciudad_codigo">Seleccione ciudad de residencia<span class="text-danger">*</span></label>
                <select name="ciudad_codigo" id="ciudades" class="form-control" placeholder="Ciudad" value="{{old('ciudad_codigo')}}">
                    <option value=" ">Ciudad</option>
                    @foreach($city as $item)
                    <option value="{{$item->ciudad_codigo}}">{{$item->ciudad_nombre}}</option>
                    @endforeach
                </select>
                @error('ciudad_codigo')
                    <small class="text-danger">La ciudad de residencia es obligatoria</small>
                @enderror
            </div>
            <div class="form-group"><!--Direccion-->
                <label for="persona_direccion">Direccion<span class="text-danger">*</span></label>
                <input type="text" name="persona_direccion" class="form-control" placeholder="Direccion" value="{{old('persona_direccion')}}">
                @error('persona_direccion')
                    <small class="text-danger">La Direccion es obligatoria</small>
                @enderror
            </div>
            <div class="form-group"><!--Correo-->
                <label for="persona_email">Correo electronico<span class="text-danger">*</span></label>
                <input type="text" name="persona_email" class="form-control" placeholder="Email" value="{{old('persona_email')}}">
                @error('persona_email')
                    <small class="text-danger">El Correo electronico es obligatorio</small>
                @enderror
            </div>
            <div class="form-group"><!--Contraseña-->
                <label for="usuario_pass">Contraseña<span class="text-danger">*</span></label>
                <input type="password" name="usuario_pass" class="form-control" placeholder="Contraseña">
                @error('usuario_pass')
                    <small class="text-danger">La contraseña es obligatoria</small>
                @enderror
            </div>
            <div class="form-group"><!--Roles-->
                <label for="perfil_id">Seleccione Perfil<span class="text-danger">*</span></label>
                <select name="perfil_id" id="perfiles" class="form-control" placeholder="perfiles" value="{{old('perfil_id')}}">
                    <option value=" ">Perfil</option>
                    @foreach($roles as $rol)
                    <option value="{{$rol->perfil_id}}">{{$rol->perfil_nombre}}</option>
                    @endforeach
                </select>
                @error('perfil_id')
                    <small class="text-danger">El Perfil es obligatorio</small>
                @enderror
            </div>
            <div class="form-group" ><!--avatar-->
                <label for="persona_avatar">Subir imagen de su avatar<span class="text-danger">*</span></label>
                <input type="file" class="form-control-file" name="persona_avatar" accept="image/*">
                <br>
                @error('persona_avatar')
                    <small class="text-danger">Debe seleccionar una imagen</small>
                @enderror
            </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-danger" onclick="history.back()" name="Volver" value="Volver">
            <input type="submit" value="Guardar" class="btn btn-info  elevation-1">
        </div>
    </form>
</div>
</div>
@endsection
