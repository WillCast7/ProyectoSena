@extends('dashboard.base')
@section('titulo')
    Gestion de Ordenes
@endsection
@section('direccion')
    ordenes
@endsection
@section('contenido')
{{-- Tabla de Pedidos --}}
@section('titulo')
    ORDENES
@endsection
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table id="tablita" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th style="width: 200px">
                    ACCIONES
                </th>
                <th>
                    PEDIDO No.
                </th>
                <th>
                    NOMBRE
                </th>
                <th>
                    CIUDAD
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>
                    <a class="btn btn-info elevation-1" data-toggle="modal" data-target="#viewOrder" title="Ver"><i class="far fa-eye"></i></a>
{{--                     <a class="btn btn-info elevation-1" href="#" title="Pagado"><i class="far fa-edit"></i></a>
 --}}                    @if($order->pedido_estado == "ENTREGADO")
                        <a class="btn btn-success elevation-1" href="#" title="Entregado"><i class="fa fa-check-double"></i></a>
                    @elseif($order->pedido_estado == "PAGADO")
                        <a class="btn btn-primary elevation-1" href="#" title="pagado"><i class="fa fa-check"></i></a>
                    @elseif($order->pedido_estado == "DESPACHADO")
                        <a class="btn btn-primary elevation-1" href="#" title="despachado"><i class="fas fa-truck"></i></a>
                    @elseif($order->pedido_estado == "PENDIENTE")
                        <a class="btn btn-warning elevation-1" href="#" title="Pendiente"><i class="fa fa-clock"></i></a>
                    @elseif($order->pedido_estado == "CANCELADO")
                        <a class="btn btn-danger elevation-1" href="#" title="Cancelado"><i class="fa fa-times-circle"></i></a>
                    @endif
                </td>
                <td>{{$order->pedido_id}}</td>
                <td>{{$order->pedido_nombre}} {{$order->pedido_apellidos}}</td>
                <td>{{$order->ciudad_nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- vista categorias -->
<div class="modal fade bd-example-modal-lg " id="viewOrder" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="container p-3 my-3">
            CLIENTE:
            <h2>{{$order->pedido_nombre}} {{$order->pedido_apellidos}}</h2>
            <p>DETALLES DE LA ORDEN</p>
            <div class="tablaVista">
                <TABLE class="table-bordered">
                    <tr>
                        <td class="item">
                            ID DE ORDEN
                        </td>
                        <td>
                            {{$order->pedido_id}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            TELEFONO DEL CLIENTE
                        </td>
                        <td>
                            {{$order->pedido_telefono}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            CORREO DEL CLIENTE
                        </td>
                        <td>
                            {{$order->pedido_email}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            DEPARTAMENTO
                        </td>
                        <td>
                            {{$order->departamento_nombre}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            CIUDAD
                        </td>
                        <td>
                            {{$order->ciudad_nombre}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            DIRECCION DEL CLIENTE &nbsp; &nbsp; &nbsp;
                        </td>
                        <td>
                            {{$order->pedido_direccion}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            ZIPCODE
                        </td>
                        <td>
                            {{$order->pedido_zipcode}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            SUBTOTAL
                        </td>
                        <td>
                            {{$order->pedido_subtotal}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            IMPUESTOS
                        </td>
                        <td>
                            {{$order->pedido_impuestos}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            TOTAL
                        </td>
                        <td>
                            {{$order->pedido_total}}
                        </td>
                    </tr>
                    <tr>
                        <td class="item">
                            OBSERVACION
                        </td>
                        <td>
                            {{$order->pedido_observacion}}
                        </td>
                    </tr>
                </TABLE>
            </div>
            <button type="button" class="btn btn-danger buttonCloseSesion" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
</div>
<br>

@endsection
@section('script')
<!-- Datable-->
<script src="{{asset('resourcesDashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('resourcesDashboard/plugins/datatables/bootstrap5.min.js')}}"></script>
<script>$(document).ready(function(){$('#tablita').DataTable();});</script>
@endsection
