@extends('dashboard.base')
@section('titulo')
    DASHBOARD
@endsection
@section('contenido')
<div>
    <ul>
        <div class="marco">
            <a href="{{route('Usuarios')}}">
                <div id="module" class=" elevation-3">
                    <div id="lContainer">
                        <div id="ico-module"><i class="fas fa-users" style="font-size: 56px"></i></div>
                        <span id="txt-module">Usuarios</span>
                    </div>
                </div>
            </a>
            <a href="{{route('Marcas')}}">
                <div id="module" class=" elevation-3">
                    <div id="ico-module"><i class="fab fa-accusoft" style="font-size: 56px"></i></div>
                    <span id="txt-module">Marcas</span>
                </div>
            </a>
            <a href="{{route('Categorias')}}">
                <div id="module" class=" elevation-3">
                    <div id="ico-module"><i class="fab fa-buffer" style="font-size: 56px"></i></div>
                    <span id="txt-module">Categorias</span>
                </div>
            </a>
            <a href="{{route('Productos')}}">
                <div id="module" class=" elevation-3">
                    <div id="ico-module"><i class="fas fa-dolly" style="font-size: 56px"></i></div>
                    <span id="txt-module">Productos</span>
                </div>
            </a>
            <a href="{{route('Ordenes')}}">
                <div id="module" class=" elevation-3">
                    <div id="ico-module"><i class="fas fa-th-list" style="font-size: 56px"></i></div>
                    <span id="txt-module">Ordenes</span>
                </div>
            </a>
        </div>
    </ul>
</div>
@endsection


