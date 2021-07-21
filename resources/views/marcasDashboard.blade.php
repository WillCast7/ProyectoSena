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
                <th style="width: 200px">
                    ACCIONES
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
                    <a class="btn btn-outline-primary" data-toggle="modal" data-target="#viewProduct"><i class="far fa-eye"></i></a>
                    <a class="btn btn-outline-warning" href="{{route('m.edit', $marca->marca_id)}}"><i class="far fa-edit"></i></a>
                    @if($marca->marca_estado == 1)
                        <a class="btn btn-outline-success" href="{{route('m.delete', $marca->marca_id)}}"><i class="fas fa-check"></i></a>
                    @else
                        <a class="btn btn-outline-danger" href="{{route('m.undelete', $marca->marca_id)}}"><i class="fa fa-times-circle"></i></a>
                    @endif
                </td>
                <td>{{$marca->marca_nombre}}</td>
                <td>{{$marca->marca_imagen}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- vista marca -->
<div class="modal fade bd-example-modal-lg " id="viewMarca" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="container p-3 my-3 bg-dark text-white">

            <h2>{{$marca->marca_nombre}}</h2>
            <p>INFORMACION AVANZADA DE MARCA</p>
            <table class="table">
                    <thead style= "background-color:slategray;color:white; font-weight :bold;" >
                        <tr class="success">
                            <th>Marca</th>
                            <th>Imagen</th>


                        </tr>
                    </thead>
                <tbody>
                    <tr class="danger">
                        <td>{{$marca->marca_nombre}}</td>
                        <td>{{$marca->marca_imagen}}</td>

                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>



<br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newMarca">
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
