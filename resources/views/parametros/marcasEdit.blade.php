@extends('dashboard.base')

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
<<<<<<< HEAD
<div class="form" id="updateUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title">ACTUALIZAR MARCA</h5>
                <br>
                <label for="">{{$marca->nombre_marca}}</label>
                <div style="padding-left:25%">
                    <label style="float: right">{{$marca->marca_id}}</label>
                </div>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('u.update', $marca_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><!--Marca Nombre-->
                        <input type="text" name="marca_nombre" class="form-control" value="{{$marca->marca_nombre}}">
                    </div>
                    <div class="form-group"><!--Marca Estado-->
                        <input type="text" name="persona_nombre2" class="form-control" value="{{$marca->marca_estado}}">
                   
                    <div class="form-group" ><!--Imagen Marca-->
                        <input type="file" class="form-control-file" name="persona_avatar" accept="image/*">
                        <br>
                        @error('marca_imagen')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
=======

            <div>
                <form action="{{route('m.update', $marca->marca_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><!--Nombre-->
                        <input type="text" name="marca_nombre" class="form-control" value="{{$marca->marca_nombre}}">
                    </div>
                    <div class="form-group" ><!--avatar-->
                        <input type="file" class="form-control-file" name="marca_imagen" accept="image/*">
                        <br>
                        @error('persona_avatar')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
>>>>>>> 7d08a466edb7f033ea53882529d2dcb6f7f69835
                        <input type="submit" value="Guardar" class="btn btn-primary">
                        <input type="button" class="btn btn-danger" onclick="history.back()" name="Volver" value="Volver">
                    </form>
                    </div>
<<<<<<< HEAD
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

=======
>>>>>>> 7d08a466edb7f033ea53882529d2dcb6f7f69835
@endsection
