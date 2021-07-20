@extends('dashboard.base')
@section('contenido')
{{-- Tabla de productos --}}
<h5>PRODUCTOS</h5>
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
                        <a data-toggle="modal" data-target="#viewProduct"> <i class="far fa-eye"></i> </a>
                        <a href="{{route('p.edit' $producto->producto_id)}}" > <i class="far fa-edit"></i> </a>
                        
                    </td>
                    <td>
                            <br>
                              @if($producto->producto_estado == 1)
                              <button type="button" class="btn btn-sm btn-success">Activa</button>
                                  @else
                              <button type="button" class="btn btn-sm btn-danger">Inactiva</button>
                              @endif

                        </td>
                    <td>{{$producto->producto_nombre}}</td>
                    <td>{{$producto->producto_stock}}</td>
                    <td>{{$producto->producto_descripcion}}</td>
                    <td>{{$producto->marca_nombre}}</td>
                    <td>{{$producto->categoria_nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<!-- vistas producto  -->
    <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
               <h5 class="title">{{$producto->producto_nombre}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <div class="form-group" >


                        <td>{{$producto->producto_stock}}</td>
                        <td>{{$producto->producto_descripcion}}</td>
                        <td>{{$producto->marca_nombre}}</td>
                        <td>{{$producto->marca_nombre}}</td>
                    </div>



                    <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
        <br>
    </div>
    <br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newProduct"><i class="fas fa-users"></i>
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
                            <input type="text" name="producto_nombre" class="form-control" placeholder="Nombre Producto">
                            @error('producto_nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--referencia-->
                            <input type="text" name="producto_referencia" class="form-control" placeholder="referencia">
                        </div>
                        <div class="form-group"><!--descripcion-->
                            <input type="text" name="producto_descripcion" class="form-control" placeholder="Descripcion">
                            @error('producto_descripcion')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--descripcion corta-->
                            <input type="text" name="producto_descripcioncorta" class="form-control" placeholder="Descripcion corta">
                            @error('producto_descripcion')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--categoria-->
                            <select name="categoria_id" id="Categoria" class="form-control">
                                <option value=" ">Seleccione categoria</option>
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->categoria_id}}">{{$categoria->categoria_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Marca-->
                            <select name="marca_id" id="Marca" class="form-control">
                                <option value=" ">Seleccione Marca</option>
                                @foreach($marcas as $marca)
                                <option value="{{$marca->marca_id}}">{{$marca->marca_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--cantidad-->
                            <input type="text" name="producto_stock" class="form-control" placeholder="stock del producto">
                        </div>
                        <div class="form-group"><!--Precio-->
                            <input type="text" name="producto_precio" class="form-control" placeholder="precio">
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
