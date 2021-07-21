@extends('dashboard.base')
@section('titulo')
    Gestion de Marcas
@endsection
@section('direccion')
    marcas
@endsection
@section('contenido')
{{-- Tabla de Marcas --}}
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
        <thead class="thead-dark">
            <tr>
                <th>
                    ACCIONES
                </th>
                <th>
                    ESTADO
                </th>
                <th>
                    NOMBRE
                </th>
                <th>
                    IMAGEN
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <td>
                    <a data-toggle="modal" data-target="#viewProduct"> <i class="far fa-eye"></i> </a>
                    <a href="{{route('m.edit', $marca->marca_id)}}" > <i class="far fa-edit"></i> </a>

                </td>
                <td>
                    @if($marca->marca_estado == 1)
                        <a class="btn btn-success" href="{{route('m.delete', $marca->marca_id)}}">Activo</i> </a>
                    @else
                        <a class="btn btn-danger" href="{{route('m.undelete', $marca->marca_id)}}">Inactivo</i> </a>
                    @endif
                </td>
                <td>{{$marca->marca_nombre}}</td>
                <td>{{$marca->marca_imagen}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newMarca"><i class="fas fa-users"></i>
        AGREGAR MARCA
    </button>
 <!-- Formulario Marca -->
    <div class="modal fade" id="newMarca" tabindex="-1" role="dialog" aria-labelledby="newMarcaTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="title">AGREGAR MARCA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('m.new')}}" method="put" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="form-group"><!--nombre-->
                            <input type="text" name="marca_nombre" class="form-control" placeholder="Nombre Marca">
                        </div>
                        <div class="form-group" ><!--avatar-->
                            <input type="file" class="form-control-file" name="marca_imagen" accept="image/*">
                            <br>
                            @error('marca_imagen')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                </form>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
