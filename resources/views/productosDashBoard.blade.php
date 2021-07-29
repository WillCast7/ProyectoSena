@extends('dashboard.base')
@section('titulo')
Gestion de Productos
@endsection
@section('direccion')
productos
@endsection
@section('contenido')
{{-- Tabla de productos --}}
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table id="tablita" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 200px">
                        ACCIONES
                    </th>
                    <th>
                        PRODUCTO
                    </th>
                    <th>
                        CANTIDAD
                    </th>
                    <th>
                        DESCRIPCION
                    </th>
                    <th>
                        MARCA
                    </th>
                    <th>
                        CATEGORIA
                    </th>
                    <th>
                        IMAGEN
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>
                        <a class="btn btn-info elevation-1"data-toggle="modal" data-target="#viewProduct" title="Ver"><i class="far fa-eye"></i></a>
                        <a class="btn btn-info elevation-1" href="{{route('p.edit', $producto->producto_id)}}" title="Editar"><i class="far fa-edit"></i></a>
                        <a class="btn btn-info elevation-1" href="{{route('p.image', $producto->producto_id)}}" title="Imagenes"><i class="fas fa-plus"></i></a>
                        @if($producto->producto_estado == 1)
                        <a class="btn btn-success elevation-1" href="{{route('p.delete', $producto->producto_id)}}" title="Activo"><i class="fas fa-check"></i></a>
                        @else
                        <a class="btn btn-danger elevation-1" href="{{route('p.undelete', $producto->producto_id)}}" title="Inactivo"><i class="fa fa-times-circle"></i></a>
                        @endif
                    </td>
                    <td>{{$producto->producto_nombre}}</td>
                    <td>{{$producto->producto_stock}}</td>
                    <td>{{$producto->producto_descripcion}}</td>
                    <td>{{$producto->marca_nombre}}</td>
                    <td>{{$producto->categoria_nombre}}</td>
                    <td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<!-- vistas producto  -->
<div class="modal fade bd-example-modal-lg " id="viewProduct" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="container p-3 my-3 bg-dark text-white">

            <h2>{{$producto->producto_nombre}}</h2>
            <p>INFORMACION AVANZADA DE PRODUCTO</p>
            <table class="table">
                    <thead style= "background-color:slategray;color:white; font-weight :bold;" >
                        <tr class="success">
                            <th>Producto descripcion</th>
                            <th>Productos en stock</th>
                            <th>categoria</th>
                            <th>marca</th>
                        </tr>
                    </thead>
                <tbody>
                    <tr class="danger">
                        <td>{{$producto->producto_descripcion}}</td>
                        <td>{{$producto->producto_stock}}</td>
                        <td>{{$producto->categoria_nombre}}</td>
                        <td>{{$producto->marca_nombre}}</td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-danger elevation-1" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
        <br>
    </div>
    <br>
    <button type="button" class="btn btn-info elevation-1" data-toggle="modal" data-target="#newProduct">
        AGREGAR PRODUCTO
    </button>

 <!-- Formulario producto -->
    <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="title">AGREGAR PRODUCTO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('p.new')}}" method="put" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group"><!--nombre-->
                            <label for="producto_nombre">Nombre del producto</label>
                            <input type="text" name="producto_nombre" class="form-control" placeholder="Nombre Producto">
                            @error('producto_nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--referencia-->
                            <label for="producto_referencia">Referencia del producto</label>
                            <input type="text" name="producto_referencia" class="form-control" placeholder="referencia">
                        </div>
                        <div class="form-group"><!--descripcion-->
                            <label for="producto_descripcion">Descripcion</label>
                            <input type="text" name="producto_descripcion" class="form-control" placeholder="Descripcion">
                            @error('producto_descripcion')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--descripcion corta-->
                            <label for="producto_descripcioncorta">Breve descripcion</label>
                            <input type="text" name="producto_descripcioncorta" class="form-control" placeholder="Descripcion corta">
                            @error('producto_descripcion')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--categoria-->
                            <label for="categoria_id">Seleccione categoria</label>
                            <select name="categoria_id" id="Categoria" class="form-control">
                                <option value=" ">Seleccione categoria</option>
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->categoria_id}}">{{$categoria->categoria_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Marca-->
                            <label for="marca_id">Marca</label>
                            <select name="marca_id" id="Marca" class="form-control">
                                <option value=" ">Seleccione Marca</option>
                                @foreach($marcas as $marca)
                                <option value="{{$marca->marca_id}}">{{$marca->marca_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--cantidad-->
                            <label for="producto_stock">Cantidad del producto</label>
                            <input type="text" name="producto_stock" class="form-control" placeholder="stock del producto">
                        </div>
                        <div class="form-group"><!--Precio-->
                            <label for="producto_precio">Precio</label>
                            <input type="text" name="producto_precio" class="form-control" placeholder="precio">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Guardar" class="btn btn-info elevation-1">
                            <button type="button" class="btn btn-danger elevation-1" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @endsection
 @section('script')
 <!-- Datable-->
 <script src="{{asset('resourcesDashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('resourcesDashboard/plugins/datatables/bootstrap5.min.js')}}"></script>
 <script>$(document).ready(function(){$('#tablita').DataTable();});</script>
 @endsection
