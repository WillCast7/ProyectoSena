@extends('dashboard.base')

@section('contenido')
<?php   print_r($marcas);?>
@foreach($marcas as $marca)
@endforeach

<!-- actualizar marca -->
<div class="form" id="updateUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title">ACTUALIZAR MARCA</h5>
                <br>
                <label for="">{{$marca->nombre_marca}}</label>
                <div style="padding-left:25%">
                    <label style="float: right">{{$marca->marca_id}}</label>
                </div>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('u.update', $marca_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group"><!--Marca Nombre-->
                        <input type="text" name="marca_nombre" class="form-control" value="{{$marca->marca_nombre}}">
                    </div>
                    <div class="form-group"><!--Marca Estado-->
                        <input type="text" name="persona_nombre2" class="form-control" value="{{$marca->marca_estado}}">
                   
                    <div class="form-group" ><!--Imagen Marca-->
                        <input type="file" class="form-control-file" name="persona_avatar" accept="image/*">
                        <br>
                        @error('marca_imagen')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Guardar" class="btn btn-primary">
                    </div>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection
