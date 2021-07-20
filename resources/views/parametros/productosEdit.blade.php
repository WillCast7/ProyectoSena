@extends('dashboard.base')

@section('contenido')
<?php   print_r($productos);?>
@foreach($productos as $producto)
@endforeach

<!-- actualizar producto -->