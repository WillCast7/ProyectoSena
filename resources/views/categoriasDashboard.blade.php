@extends('dashboard.base')
@section('titulo')
    Gestion de Categorias
@endsection
@section('direccion')
    categorias
@endsection
@section('contenido')
{{-- Tabla de Categorias --}}
@section('titulo')
    CATEGORIAS
@endsection
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table id="tablita" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th style="width: 200px">
                    ACCIONES
                </th>
                <th>
                    NOMBRE
                </th>
                <th>
                    CAT. PADRE
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
                <a class="btn btn-info" data-toggle="modal" data-target="#viewProduct" title="Ver"><i class="far fa-eye"></i></a>
                    <a class="btn btn-info" href="{{route('c.edit', $categoria->categoria_id)}}" title="Editar"><i class="far fa-edit"></i></a>
                    @if($categoria->categoria_estado == 1)
                        <a class="btn btn-success elevation-1" href="{{route('c.delete', $categoria->categoria_id)}}" title="Activo"><i class="fa fa-check"></i></a>
                    @else
                        <a class="btn btn-danger elevation-1" href="{{route('c.undelete', $categoria->categoria_id)}}" title="Inactivo"><i class="fa fa-times-circle"></i></a>
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
                            <th>NOMBRE</th>
                            <th>CATEGORIA PADRE</th>
                            <th>URL</th>


                        </tr>
                    </thead>
                <tbody>
                    <tr class="danger">
                        <td>{{$categoria->categoria_nombre}}</td>
                        <td>{{$categoria->categoria_padre}}</td>
                        <td>{{$categoria->categoria_url}}</td>

                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-danger elevation-1" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
<br>
    <button type="button" class="btn btn-info elevation-1" data-toggle="modal" data-target="#newCategoria">
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
                                 <label for="categoria_nombre">Nombre del la categoria</label>
                                <input type="text" name="categoria_nombre" class="form-control" placeholder="Nombre Categoria">
                            </div>
                            <div class="form-group"><!--nombre-->
                                 <label for="categoira_url">URL</label>
                                <input type="text" name="categoria_url" class="form-control" placeholder="URL Categoria">
                            </div>
                            <div class="form-group"><!--categoria padre-->
                                <label for="categoria_padre">Categoria padre</label>
                                <select name="categoria_padre" id="Categoria" class="form-control">
                                    <option value=" ">Seleccione categoria padre</option>
                                    @foreach($categoriasPadres as $categoriap)
                                    <option value="{{$categoriap->categoria_id}}">{{$categoriap->categoria_nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Guardar" class="btn btn-info elevation-1">
                            </form>
                        <button type="button" class="btn btn-danger elevation-1" data-dismiss="modal">Cerrar</button>
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
