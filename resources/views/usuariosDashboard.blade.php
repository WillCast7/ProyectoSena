@extends('dashboard.base')
@section('titulo')
    GESTIÓN DE USUARIOS
@endsection
@section('direccion')
    usuarios
@endsection
@section('contenido')

<!-- Tabla de usuarios -->
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table id="tablita" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th style="width: 200px">
                        ACCIONES
                    </th>
                    <th>
                        DOCUMENTO
                    </th>
                    <th>
                        NOMBRE COMPLETO
                    </th>
                    <th>
                        TELEFONO
                    </th>
                    <th>
                        CORREO ELECTRONICO
                    </th>
                    <th>
                        PERFIL
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $items)
                    <tr>
                        <td>
                            <div class="incons">
                                <a class="btn btn-info elevation-1" data-toggle="modal" data-target="#viewUser" title="Ver"><i class="far fa-eye"></i></a>
                                <a class="btn btn-info elevation-1" href="{{route('u.edit', $items->persona_id)}}" title="Editar"><i class="far fa-edit"></i></a>
                              @if($items->persona_estado == 1)
                                    <a class="btn btn-success elevation-1" href="{{route('u.delete', $items->persona_id)}}" title="Activo"><i class="fas fa-check"></i></a>
                                @else
                                    <a class="btn btn-danger elevation-1" href="{{route('u.undelete', $items->persona_id)}}" title="Inactivo"><i class="fa fa-times-circle"></i></a>
                              @endif
                            </div>
                        </td>
                        <td>{{$items->persona_dni}}</td>
                        <td>{{$items->nombres}}</td>
                        <td>{{$items->persona_telefono}}</td>
                        <td>{{$items->persona_email}}</td>
                        <td>{{$items->perfil_nombre}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!-- vistas usuario  -->
<div class="modal fade bd-example-modal-lg " id="viewUser" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="container p-3 my-3 bg-dark text-white">
                <div class="modal-body">
                    <h2>{{$items->nombres}}</h2>
                    <p>INFORMACION AVANZADA DEL USUARIO</p>
                    <table class="table">
                            <thead style= "background-color:slategray;color:white; font-weight :bold;" >
                                <tr class="success">
                                    <th>Telefono Usuario</th>
                                    <th>Tipo Documento</th>
                                    <th>DNI </th>
                                    <th>Direccion</th>
                                    <th>nacimiento</th>
                                    <th>Ciudad Nacimiento</th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr class="danger">
                                <td>{{$items->persona_telefono}}</td>
                                <td>{{$items->nombre_largo_parametro}}</td>
                                <td>{{$items->persona_dni}}</td>
                                <td>{{$items->persona_direccion}}</td>
                                <td>{{$items->persona_fnacimiento}}</td>
                                <td>{{$items->persona_ciudadnacimiento}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<a type="button" class="btn btn-info elevation-2" href="{{Route('formNewUser')}}">
    AGREGAR USUARIO
</a>
@endsection
@section('script')
<!-- Datable-->
<script src="{{asset('resourcesDashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resourcesDashboard/plugins/datatables/bootstrap5.min.js')}}"></script>
<script>$(document).ready(function(){$('#tablita').DataTable();});</script>
@endsection
