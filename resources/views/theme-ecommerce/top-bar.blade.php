<div class="topBar">
  <div class="container">
    <div class="row">
      <div class="col-md-6 d-none d-md-block">
        <ul class="list-inline">
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
      <div class="col-md-6 col-12">
        <ul class="list-inline float-right top-right">
            @if( session()->get('auth') !== true)
            <li class="account-login"><span><a data-toggle="modal" href='.login-modal'>Log in</a><small>or</small><a data-toggle="modal" href='#signup'>Create an account</a></span></li>
            @else
            <li class="account-login dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle nick-name" data-toggle="dropdown" id="dropdownOptionUser" data-bs-toggle="dropdown" aria-expanded="false">{{session()->get('name')}}</a>
                <ul class="dropdown-user dropdown-menu" aria-labelledby="dropdownOptionUser">
                    <li><a href=" {{ route('auth.logout') }}">Cerrar sesión</a></li>
                </ul>
            </li>
            @endif
            <li class="searchBox">
                <a href="#"><i class="fa fa-search"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <span class="input-group">
                    <input type="text" class="form-control" placeholder="Search…" aria-describedby="basic-addon2">
                    <button type="submit" class="input-group-addon">Submit</button>
                    </span>
                </li>
                </ul>
            </li>
            <li class="dropdown cart-dropdown">
                <a href="javascript:void(0)" id="items-cart" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i></a>
                <ul class="dropdown-menu dropdown-menu-right" id="cartShop">
                </ul>
            </li>
        </ul>
      </div>
    </div>
  </div>
</div>