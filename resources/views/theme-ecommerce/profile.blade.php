<!-- head -->
@include('theme-ecommerce.header')
    <!-- LIGHT SECTION -->
    <section class="lightSection clearfix pageHeader">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="page-title">
                <h2>Perfil</h2>
            </div>
            </div>
            <div class="col-md-6">
            <ol class="breadcrumb float-right">
                <li>
                <a href="index.html">Home</a>
                </li>
                <li class="active">Perfil</li>
            </ol>
            </div>
        </div>
        </div>
    </section>

    <!-- MAIN CONTENT SECTION -->
    <section class="mainContent clearfix userProfile">
        <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="btn-group" role="group" aria-label="...">
                <!-- <a href="account-dashboard.html" class="btn btn-default"><i class="fa fa-th" aria-hidden="true"></i>Account Dashboard</a> -->
                <a href="account-profile.html" class="btn btn-default active"><i class="fa fa-user" aria-hidden="true"></i>Perfil</a>
                <!-- <a href="account-address.html" class="btn btn-default"><i class="fa fa-map-marker" aria-hidden="true"></i>My Address</a> -->
                <a href="account-all-orders.html" class="btn btn-default"><i class="fa fa-list" aria-hidden="true"></i>Ordenes</a>
                <!-- <a href="account-wishlist.html" class="btn btn-default"><i class="fa fa-gift" aria-hidden="true"></i>Wishlist</a> -->
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="innerWrapper profile">
                <div class="orderBox">
                <h2>Perfil</h2>
                </div>
                <div class="row">
                <div class="col-md-4 col-lg-3 col-xl-2 col-12">
                    <div class="thumbnail">
                    <img src="assets/img/products/profile/profile-image.jpg" alt="profile-image">
                    <div class="caption">
                        <a href="#" class="btn btn-primary btn-block" role="button">Cambiar Avatar</a>
                    </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9 col-xl-10 col-12">
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label for="" class="col-md-3 control-label">Primer Nombre</label>
                            <div class="col-md-7">
                                <input name="persona_nombre1" value="{{$persona_nombre1}}" type="text" class="form-control" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 control-label">Segundo Nombre</label>
                            <div class="col-md-7">
                                <input name="persona_nombre2" value="{{$persona_nombre2}}" type="text" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 control-label">Primer Apellido</label>
                            <div class="col-md-7">
                                <input name="persona_apellido1" value="{{$persona_apellido1}}" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 control-label">Segundo Apellido</label>
                            <div class="col-md-7">
                                <input name="persona_apellido2" value="{{$persona_apellido2}}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 control-label">Teléfono</label>
                            <div class="col-md-9">
                                <input type="text" name="persona_telefono" value="{{$persona_telefono}}" class="form-control" required >
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="persona_email" value="{{$persona_email}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-3 control-label">Contraseña</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                        <label for="" class="col-md-3 control-label">New Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="" placeholder="***********">
                        </div>
                        </div> -->
                        <div class="form-group row">
                        <div class=" col-md-12 ">
                            <button type="submit" class="btn btn-primary float-right">Guardar</button>
                        </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

<!-- footer -->
@include('theme-ecommerce.footer')