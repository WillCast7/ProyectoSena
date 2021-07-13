@extends('dashboard.base')

@section('contenido')

{{-- Tabla de usuarios --}}
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-bordered table-striped mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>
                        ACCIONES
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
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $items)
                <tr>
                    <td>
                        <a data-toggle="modal" data-target="#viewUser"> <i class="far fa-eye"></i> </a>
                        <a href="/" > <i class="far fa-edit"></i> </a>
                        <a href="/" ><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <td>{{$items->nombres}}</td>
                    <td>{{$items->persona_telefono}}</td>
                    <td>{{$items->persona_email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<!-- vistas usuario  -->
    <div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="title">{{$items->nombres}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <div class="form-group" >

                <td>{{$items->persona_telefono}}</td>
                <td>{{$items->usuario_username}}</td>
                <td>{{$items->usuario_pass}}</td>
                <td>{{$items->perfil_nombre}}</td>
                <td>{{$items->persona_avatar}}</td>
                </div>



                <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
    <br>
    <hr/>
    </div>

<div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newUser"><i class="fas fa-users"></i>
            AGREGAR USUARIO
        </button>
    <br>
    <hr/>
    <br>
    <!-- Formulario usuario -->
    <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="title">AGREGAR USUARIO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('a.new')}}" method="put" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="form-group"><!--Primer nombre-->
                            <input type="text" name="persona_nombre1" class="form-control" placeholder="Primer nombre">
                            @error('persona_nombre1')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Segundo nombre-->
                            <input type="text" name="persona_nombre2" class="form-control" placeholder="Segundo nombre">
                        </div>
                        <div class="form-group"><!--Primer apellido-->
                            <input type="text" name="persona_apellido1" class="form-control" placeholder="Primer apellido">
                            @error('persona_apellido1')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Segundo apellido-->
                            <input type="text" name="persona_apellido2" class="form-control" placeholder="Segundo apellido">
                        </div>
                        <div class="form-group"><!--Tipos de documentos-->
                            <select name="persona_tipodocumento" id="input" class="form-control" placeholder="tipo de usuario">
                                <option value=" ">Tipo Documento</option>
                                @foreach($tipoDoc as $td)
                                <option value="{{$td->nombre_largo_parametro}}">{{$td->nombre_largo_parametro}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--DNI-->
                            <input type="text" name="persona_dni" class="form-control" placeholder="DNI">
                            @error('persona_dni')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Telefono-->
                            <input type="text" name="persona_telefono" class="form-control" placeholder="Telefono">
                            @error('persona_telefono')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Fecha nacimiento-->
                            <input type="date" name="persona_fnacimiento" class="form-control">
                            @error('persona_fnacimiento')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Ciuda de nacimiento-->
                            <select name="persona_ciudadnacimiento" id="ciudadNacimiento" class="form-control">
                                <option value=" ">Ciudad</option>
                                @foreach($city as $item)
                                <option value="{{$item->ciudad_nombre}}">{{$item->ciudad_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Sexo-->
                            <input type="text" name="persona_sexo" class="form-control" placeholder="sexo">
                            @error('persona_sexo')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Paises-->
                            <select name="pais_codigo" id="input" class="form-control" placeholder="tipo de usuario">
                                <option value=" ">Pais</option>
                                @foreach($paises as $pais)
                                <option value="{{$pais->pais_codigo}}">{{$pais->pais_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Departamentos-->
                            <select name="departamento_codigo" id="Departamentos" class="form-control" placeholder="tipo de usuario">
                                <option value=" ">Departamento</option>
                                @foreach($deptos as $depto)
                                <option value="{{$depto->departamento_codigo}}">{{$depto->departamento_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Ciudades-->
                            <select name="ciudad_codigo" id="ciudades" class="form-control" placeholder="tipo de usuario">
                                <option value=" ">Ciudad</option>
                                @foreach($city as $item)
                                <option value="{{$item->ciudad_codigo}}">{{$item->ciudad_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Direccion-->
                            <input type="text" name="persona_direccion" class="form-control" placeholder="sexo">
                        </div>
                        <div class="form-group"><!--Correo-->
                            <input type="text" name="persona_email" class="form-control" placeholder="Email">
                            @error('persona_email')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Nombre de usuario-->
                            <input type="text" name="usuario_username" class="form-control" placeholder="Usuario">
                            @error('usuario_username')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Contraseña-->
                            <input type="password" name="usuario_pass" class="form-control" placeholder="Contraseña">
                            @error('usuario_pass')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--Roles-->
                            <select name="perfil_id" id="perfiles" class="form-control" placeholder="perfiles">
                                <option value=" ">Perfil</option>
                                @foreach($roles as $rol)
                                <option value="{{$rol->perfil_id}}">{{$rol->perfil_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" ><!--avatar-->
                            <input type="file" class="form-control-file" name="persona_avatar" accept="image/*">
                            <br>
                            @error('persona_avatar')
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
    <br>
    <hr/>
    <br>
    <br>
</div>


{{-- Tabla de productos --}}
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-bordered table-striped mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>
                        ACCIONES
                    </th>
                    <th>
                        PRODUCTO
                    </th>
                    <th>
                        CANTIDAD
                    </th>
                    <th>
                        DESCRIPCION
                    </th>
                    <th>
                        MARCA
                    </th>
                    <th>
                        CATEGORIA
                    </th>
                    <th>
                        IMAGEN
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>
                        <a data-toggle="modal" data-target="#viewProduct"> <i class="far fa-eye"></i> </a>
                        <a href="/" > <i class="far fa-edit"></i> </a>
                        <a href="/" ><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <td>{{$producto->producto_nombre}}</td>
                    <td>{{$producto->producto_stock}}</td>
                    <td>{{$producto->producto_descripcion}}</td>
                    <td>{{$producto->marca_nombre}}</td>
                    <td>{{$producto->categoria_nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<!-- vistas producto  -->
    <div class="modal fade" id="viewProduct" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
               <h5 class="title">{{$producto->producto_nombre}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                    <div class="form-group" >


                        <td>{{$producto->producto_stock}}</td>
                        <td>{{$producto->producto_descripcion}}</td>
                        <td>{{$producto->marca_nombre}}</td>
                        <td>{{$producto->marca_nombre}}</td>
                    </div>



                    <div class="modal-footer">

              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
        <br>
        <hr/>
    </div>
<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newProduct"><i class="fas fa-users"></i>
        AGREGAR PRODUCTO
    </button>

 <!-- Formulario producto -->
    <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="title">AGREGAR PRODUCTO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{route('p.new')}}" method="put" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="form-group"><!--nombre-->
                            <input type="text" name="producto_nombre" class="form-control" placeholder="Nombre Producto">
                            @error('producto_nombre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--referencia-->
                            <input type="text" name="producto_referencia" class="form-control" placeholder="referencia">
                        </div>
                        <div class="form-group"><!--descripcion-->
                            <input type="text" name="producto_descripcion" class="form-control" placeholder="Descripcion">
                            @error('producto_descripcion')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--descripcion corta-->
                            <input type="text" name="producto_descripcioncorta" class="form-control" placeholder="Descripcion corta">
                            @error('producto_descripcion')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group"><!--categoria-->
                            <select name="categoria_id" id="Categoria" class="form-control">
                                <option value=" ">Seleccione categoria</option>
                                @foreach($categorias as $categoria)
                                <option value="{{$categoria->categoria_id}}">{{$categoria->categoria_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--Marca-->
                            <select name="marca_id" id="Marca" class="form-control">
                                <option value=" ">Seleccione Marca</option>
                                @foreach($marcas as $marca)
                                <option value="{{$marca->marca_id}}">{{$marca->marca_nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"><!--cantidad-->
                            <input type="text" name="producto_stock" class="form-control" placeholder="stock del producto">
                        </div>
                        <div class="form-group"><!--Precio-->
                            <input type="text" name="producto_precio" class="form-control" placeholder="precio">
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
<br>
<hr/>
<br>
<br>
{{-- Tabla de Marcas --}}
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-bordered table-striped mb-0">
        <thead class="thead-dark">
            <tr>
                <th>
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
                    <a data-toggle="modal" data-target="#viewProduct"> <i class="far fa-eye"></i> </a>
                    <a href="/" > <i class="far fa-edit"></i> </a>
                    <a href="/" ><i class="fas fa-trash-alt"></i></a>
                </td>
                <td>{{$marca->marca_nombre}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
{{-- @script
    <script>
        $(document).ready(fuction(){
                    const  selectElement = document.querySelector('#Departamentos')
                    selectElement.addEventListener('change', (event) => {
                    const resultado = document.querySelector('.resultado');
                    resultado.textContent = `Te gusta el sabor ${event.target.value}`;
                    });
        });
    </script>
@endscript
 --}}
