@extends('dashboard.base')
@section('titulo')
    Edicion de Marcas
@endsection
@section('direccion')
    marcas  /  editar marca
@endsection
@section('contenido')
@foreach($marcas as $marca)
@endforeach
@section('titulo')
    Edicion de la marca -{{$marca->marca_nombre}}-
@endsection
@section('direccion')
    usuarios / editar marca
@endsection
<!-- actualizar marca -->
            <div>
                <form action="{{route('m.update', $marca->marca_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><!--Nombre-->
                        <label for="marca_nombre">Nombre de la marca</label>
                        <input type="text" name="marca_nombre" class="form-control" value="{{$marca->marca_nombre}}">
                    </div>
                    <div class="form-group" ><!--avatar-->
                        <label for="marca_imagen">Imagen de la marca</label>
                        <input type="file" class="form-control-file" name="marca_imagen" accept="image/*">
                        <br>
                        @error('persona_avatar')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <input type="button" class="btn btn-danger" onclick="history.back()" name="Volver" value="Volver">
                    </form>
                    </div>
@endsection
