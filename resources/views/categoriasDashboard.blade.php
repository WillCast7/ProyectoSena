@extends('dashboard.base')
@section('contenido')
{{-- Tabla de Categorias --}}
@section('titulo')
    CATEGORIAS
@endsection
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
        <thead class="thead-dark">
            <tr>
                <th style="width: 200px">
                    ACCIONES
                </th>
                <th>
                    NOMBRE
                </th>
                <th>
                    Categoria padre
                </th>
                <th>
                    URL
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>
                <a class="btn btn-outline-success" data-toggle="modal" data-target="#viewProduct"><i class="far fa-eye"></i></a>
                    <a class="btn btn-outline-success" href="{{route('c.edit', $categoria->categoria_id)}}"><i class="far fa-edit"></i></a>
                    @if($categoria->categoria_estado == 1)
                        <a class="btn btn-outline-success" href="{{route('c.delete', $categoria->categoria_id)}}"><i class="fas fa-signal"></i></a>
                    @else
                        <a class="btn btn-outline-danger" href="{{route('c.undelete', $categoria->categoria_id)}}">Inactivo</a>
                    @endif
                        </td>
                <td>{{$categoria->categoria_nombre}}</td>
                <td>{{$categoria->categoria_padre}}</td>
                <td>{{$categoria->categoria_url}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategoria"><i class="fas fa-users"></i>
        AGREGAR CATEGORIA
    </button>

 <!-- Formulario Categoria -->
    <div class="modal fade" id="newCategoria" tabindex="-1" role="dialog" aria-labelledby="newCategoriaTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="title">AGREGAR CATEGORIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('c.new')}}" method="put" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group"><!--nombre-->
                                <input type="text" name="categoria_nombre" class="form-control" placeholder="Nombre Categoria">
                            </div>
                            <div class="form-group"><!--nombre-->
                                <input type="text" name="categoria_url" class="form-control" placeholder="URL Categoria">
                            </div>
                            <div class="form-group"><!--categoria padre-->
                                <select name="categoria_padre" id="Categoria" class="form-control">
                                    <option value=" ">Seleccione categoria padre</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->categoria_id}}">{{$categoria->categoria_nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Guardar" class="btn btn-primary">
                            </form>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
    </div>
@endsection
