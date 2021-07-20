@extends('dashboard.base')

@section('contenido')
<?php   print_r($categorias);?>
@foreach($categorias as $categorias)
@endforeach

<!-- actualizar categoria  -->

