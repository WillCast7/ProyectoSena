@extends('dashboard.base')

@section('contenido')
    <form action="{{route('a.new')}}" method="put" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label>Hi</label>
            <div class="form-group">
                <input type="text" name="persona_nombre1" class="form-control" placeholder="Primer nombre">
            </div>
            <div class="form-group">
                <input type="text" name="persona_nombre2" class="form-control" placeholder="Segundo nombre">
            </div>
            <div class="form-group">
                <input type="text" name="persona_apellido1" class="form-control" placeholder="Primer apellido">
            </div>
            <div class="form-group">
                <input type="text" name="persona_apellido2" class="form-control" placeholder="Segundo apellido">
            </div>
            <div class="form-group">
                <input type="text" name="persona_tipodocumento" class="form-control" placeholder="Tipo documento">
            </div>
            <div class="form-group">
                <input type="text" name="persona_dni" class="form-control" placeholder="DNI">
            </div>
            <div class="form-group">
                <input type="text" name="persona_telefono" class="form-control" placeholder="Telefono">
            </div>
            <div class="form-group">
                <input type="text" name="usuario_username" class="form-control" placeholder="Usuario">
            </div>
            <div class="form-group">
                <input type="password" name="usuario_pass" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <input type="text" name="usuario_tipousuario" class="form-control" placeholder="tipo de usuario">
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="form-control btn btn-primary mb-2">
        </div>
    </form>
    @endsection
