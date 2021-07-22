@extends('dashboard.base')

@section('contenido')
@foreach($productos as $producto)
@endforeach
@section('titulo')
    Edicion del Producto -{{$producto->producto_nombre}}-
@endsection
@section('direccion')
    usuarios / editar producto
@endsection
    <div class="modal-body">
        <form action="{{route('p.update', $producto->producto_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-group"><!--nombre-->
                    <label for="producto_nombre">Nombre del producto</label>
                    <input type="text" name="producto_nombre" class="form-control" value="{{$producto->producto_nombre}}">
                    @error('producto_nombre')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group"><!--referencia-->
                    <label for="producto_referencia">Referencia del producto</label>
                    <input type="text" name="producto_referencia" class="form-control" value="{{$producto->producto_referencia}}">
                </div>
                <div class="form-group"><!--descripcion-->
                    <label for="producto_descripcion">Descripcion</label>
                    <input type="text" name="producto_descripcion" class="form-control" value="{{$producto->producto_descripcion}}">
                    @error('producto_descripcion')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group"><!--descripcion corta-->
                    <label for="producto_descripcioncorta">Breve descripcion</label>
                    <input type="text" name="producto_descripcioncorta" class="form-control" value="{{$producto->producto_descripcioncorta}}">
                    @error('producto_descripcion')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group"><!--categoria-->
                    <label for="categoria_id">Seleccione categoria</label>
                    <select name="categoria_id" id="Categoria" class="form-control">
                        <option value="{{$producto->categoria_id}}">{{$producto->categoria_nombre}}</option>
                        @foreach($categorias as $categoria)
                        <option value="{{$categoria->categoria_id}}">{{$categoria->categoria_nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><!--Marca-->
                    <label for="marca_id">Marca</label>
                    <select name="marca_id" id="Marca" class="form-control">
                        <option value="{{$producto->marca_id}}">{{$producto->marca_nombre}}</option>
                        @foreach($marcas as $marca)
                        <option value="{{$marca->marca_id}}">{{$marca->marca_nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group"><!--cantidad-->
                    <label for="producto_stock">Cantidad del producto</label>
                    <input type="text" name="producto_stock" class="form-control" value="{{$producto->producto_stock}}">
                </div>
                <div class="form-group"><!--Precio-->
                    <label for="producto_precio">Precio</label>
                    <input type="text" name="producto_precio" class="form-control" value="{{$producto->producto_precio}}">
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Guardar" class="btn btn-primary">
                    <input type="button" class="btn btn-danger" onclick="history.back()" name="Volver" value="Volver">
                </form>
            </div>
        </div>
@endsection
