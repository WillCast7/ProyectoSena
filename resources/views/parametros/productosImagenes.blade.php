@extends('dashboard.base')
@section('titulo')
 Titulo
@endsection
@section('direccion')
usuarios / editar producto
@endsection
@section('contenido')
<div>
    <table id="tablita" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="width: 200px">
                    ACCIONES
                </th>
                <th>
                    ID
                </th>
                <th>
                    NOMBRE IMAGEN
                </th>
                <th>
                    TITULO IMAGEN
                </th>
                <th>
                    IMAGEN
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imagenProducto as $item)
            <tr>
                <td>
                    <div class="incons">
{{--                         <a class="btn btn-info elevation-1" href="{{route('u.edit', $item->imagen_id)}}" title="Editar"><i class="far fa-edit"></i></a>
 --}}                      @if($item->imagen_estado == 1)
                            <a class="btn btn-success elevation-1" href="{{route('i.delete', $item->imagen_id)}}" title="Activo"><i class="fas fa-check"></i></a>
                        @else
                            <a class="btn btn-danger elevation-1" href="{{route('i.undelete', $item->imagen_id)}}" title="Inactivo"><i class="fa fa-times-circle"></i></a>
                      @endif
                    </div>
                </td>
                <td>
                    {{$item->imagen_id}}
                </td>
                <td>
                    {{$item->imagen_nombre}}
                </td>
                <td>
                    {{$item->imagen_title}}
                </td>
                <td>
                    <div class="">
                        <div class="image">
                            <img src="{{$item->imagen_url}}" class="imagen">
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div style="text-align: center">
    <button type="button" class="btn btn-info elevation-2" data-toggle="modal" data-target="#newImage">
        AGREGAR IMAGEN
    </button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" class="btn btn-danger" onclick="history.back()" name="Volver" value="Volver">
</div>

<!-- formulario imagen-->
<div class="modal fade" id="newImage" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title">AGREGAR IMAGEN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('i.new', $producto_id)}}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                        <div class="form-group"><!--Nombre de la imagen-->
                            <label>Nombre de la imagen</label>
                            <input type="text" name="imagen_nombre" class="form-control">
                            @error('imagen_nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Titulo de la imagen-->
                            <label>Titulo de la imagen</label>
                            <input type="text" name="imagen_title" class="form-control">
                            @error('imagen_title')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group" ><!--imagen-->
                            <label for="persona_avatar">Subir imagen </label>
                            <input type="file" class="form-control-file" name="imagen_url" accept="image/*">
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger  elevation-1" data-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Guardar" class="btn btn-info  elevation-1">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
