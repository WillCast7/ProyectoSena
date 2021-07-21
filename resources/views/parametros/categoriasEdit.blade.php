@extends('dashboard.base')
@section('titulo')
    Edicion de categorias
@endsection
@section('direccion')
    categorias  /  editar categoria
@endsection
@section('contenido')
@foreach($categorias as $categoria)
@endforeach

<!-- actualizar categoria  -->
<form action="{{route('c.update', $categoria->categoria_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group"><!--nombre-->
             <label for="categoria_nombre">Nombre del la categoria</label>
            <input type="text" name="categoria_nombre" class="form-control" value="{{$categoria->categoria_nombre}}">
        </div>
        <div class="form-group"><!--nombre-->
            <label for="categoira_url">URL</label>
            <input type="text" name="categoria_url" class="form-control" value="{{$categoria->categoria_url}}">
        </div>
        <div class="form-group"><!--categoria padre-->
            <label for="categoria_padre">Categoria padre</label>
            <select name="categoria_padre" id="Categoria" class="form-control">
                <option value="{{$categoria->categoria_padre}}">{{$categoria->categoria_nombre}}</option>
                @foreach($cate as $cat)
                <option value="{{$cat->categoria_id}}">{{$cat->categoria_nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Guardar" class="btn btn-primary">
        </form>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>
@endsection
