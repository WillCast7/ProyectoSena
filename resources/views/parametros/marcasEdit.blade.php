@extends('dashboard.base')

@section('contenido')
<?php   print_r($marcas);?>
@foreach($marcas as $marca)
@endforeach

<!-- actualizar marca -->
<div class="form" id="updateMar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="title">ACTUALIZAR MARCA</h5>
                <br>
                <label for="">{{$marca->nombre_marcas}}</label>
                <div style="padding-left:25%">
                    <label style="float: right">{{$item->persona_id}}</label>
                </div>
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
                <form action="{{route('u.update', $item->persona_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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