@extends('dashboard.base')      
@section('contenido')
<div>
    <ul>
        <div id="Marco1">
            <a href="{{route('Usuarios')}}">
                <div id="Listado">
                    <div id="imagen-listado"><i class="fas fa-clipboard-list"></i></div>
                    <span id="texto-listado">Listado</span>
                </div>
            </a>
            <a href="{{route('Marcas')}}">
                <div id="Marcas">
                    <div id="imagen-marcas"><i class="far fa-registered"></i></div>
                    <span id="texto-marcas">Marcas</span>
                </div>
            </a>
            <a href="{{route('Categorias')}}">
                <div id="Categorias">
                    <div id="imagen-categorias"><i class="fas fa-angle-double-down"></i></div>
                    <span id="texto-categorias">Categorias</span>
                </div>
            </a>
            <a href="{{route('Productos')}}">
                <div id="Eccomerce">
                    <div id="imagen-eccomerce"><i class="far fa-money-bill-alt"></i></div>
                    <span id="texto-eccomerce">Eccomerce</span>
                </div>
            </a>
        </div>
    </ul>
</div>
@endsection
@section('titulo')
<div id="Titulo-Dashboard">
    <h1>MODULOS DEL DASHBOARD</h1>
</div>
@endsection            