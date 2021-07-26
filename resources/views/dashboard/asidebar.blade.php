<aside class="main-sidebar sidebar-dark-info elevation-4" style="position: fixed">
    <!--main-sidebar-->
    <div>
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
        <img src="{{asset('resourcesDashboard/dist/img/sena.JPG')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TPS-102</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{asset('resourcesDashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{session()->get('name')}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-chess-knight"></i>
                                <p>
                                Modulos Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('Usuarios')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Productos')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Productos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Marcas')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Marcas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Categorias')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categorias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Ordenes')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ordenes</p>
                                    </a>
                                </li>
                            </ul>
                    </li>

                </ul>

                    <div class="buttonCloseSesion">
                        <a name="" id="" class="btn btn-info closeSesion" href="{{ route('auth.logout') }}" role="button">Cerrar sesión</a>
                    </div>

            </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </div>
</aside>
