@extends('dashboard.base')

@section('contenido')
    <form action="{{route('a.update', $usuario)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

            <div class="form-group">
                <label>Nombre del aprendiz</label>
                <input type="text" name="nombre" class="form-control"
                value="{{$usuario->persona_nombre1}}">
            </div>

            <div class="form-group">
                <label>Usuario del aprendiz</label>
                <input type="text" name="usuario" class="form-control"
                value="{{$usuario->persona_nombre1}}">
            </div>

            <div class="form-group">
                <label>Email del aprendiz</label>
                <input type="text" name="email" class="form-control"
                value="{{$usuario->persona_nombre1}}">
            </div>

            <div class="form-group">
                <label>Password del aprendiz</label>
                <input type="password" name="password" class="form-control"
                value="{{$usuario->persona_nombre1}}">
            </div>

            <div class="form-group">
                <input type="submit" value="Guardar" class="form-control btn btn-primary mb-2"">
        </div>
    </form>
@endsection
