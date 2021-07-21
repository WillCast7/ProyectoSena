@extends('dashboard.base')
@section('contenido')
{{-- Tabla de Categorias --}}
<h5>CATEGORIAS</h5>
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
                <a data-toggle="modal" data-target="#viewCategoria"> <i class="far fa-eye"></i> </a>
                    <a href="{{route('c.edit', $categoria->categoria_id)}}" > <i class="far fa-edit"></i> </a>

                </td>
                <td>
                    @if($categoria->categoria_estado == 1)
                        <a class="btn btn-success" href="{{route('c.delete', $categoria->categoria_id)}}">Activo</i> </a>
                    @else
                        <a class="btn btn-danger" href="{{route('c.undelete', $categoria->categoria_id)}}">Inactivo</i> </a>
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

<!-- vista categorias -->
<div class="modal fade bd-example-modal-lg " id="viewCategoria" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="container p-3 my-3 bg-dark text-white">

            <h2>{{$categoria->categoria_nombre}}</h2>
            <p>INFORMACION AVANZADA DEL LA CATEGORIA</p>
            <table class="table">
                    <thead style= "background-color:slategray;color:white; font-weight :bold;" >
                        <tr class="success">
                            <th>ID</th>
                            <th>ESTADO</th>
                            

                        </tr>
                    </thead>
                <tbody>
                    <tr class="danger">
                        <td>{{$categoria->categoria_id}}</td>
                        <td>
                        @if($categoria->categoria_estado == 1)
                        <a class="btn btn-success" href="{{route('c.delete', $categoria->categoria_id)}}">Activo</i> </a>
                        @else
                            <a class="btn btn-danger" href="{{route('c.undelete', $categoria->categoria_id)}}">Inactivo</i> </a>
                        @endif
                        </td>
                       
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
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
