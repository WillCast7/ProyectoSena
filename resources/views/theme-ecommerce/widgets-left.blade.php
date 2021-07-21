<div class="col-lg-3 col-md-4 sideBar">
    <div class="panel panel-default">
      <div class="panel-heading">@yield('title-categories','Categorias')</div>
      <div class="panel-body">
        <div class="collapse navbar-collapse navbar-ex1-collapse navbar-side-collapse">
          <ul class="nav navbar-nav side-nav" id="accordion2" role="tablist" aria-multiselectable="true">
            @foreach($categories as $category)
            <li>
              <div class="" role="tab" id="heading1">
                <a href="javascript:;" data-toggle="collapse" aria-expanded="false" data-target="#{{$category['categoria_nombre']}}" aria-controls="{{$category['categoria_nombre']}}">{{$category['categoria_nombre']}} <i class="fa fa-plus"></i></a>
              </div>
              <ul id="{{$category['categoria_nombre']}}" class="collapse collapseItem" role="tabpanel" aria-labelledby="heading1" data-parent="#accordion2">
                @foreach($category['categorias_hijas'] as $child_category)
                <li><a href="/categorias/{{$child_category['categoria_url']}}"><i class="fa fa-caret-right" aria-hidden="true"></i>{{$child_category['categoria_nombre']}}</a></li>
                @endforeach
              </ul>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="panel panel-default priceRange">
      <div class="panel-heading">Filter by Price</div>
      <div class="panel-body clearfix">
        <div class="price-slider-inner">
          <span class="amount-wrapper">
            Price:
            <input type="text" id="price-amount-1" readonly>
            <strong>-</strong>
            <input type="text" id="price-amount-2" readonly>
          </span>
          <div id="price-range"></div>
        </div>
        <input class="btn-default" type="submit" value="Filter">
        <!-- <span class="priceLabel">Price: <strong>$12 - $30</strong></span> -->
      </div>
    </div>
    <!-- <div class="panel panel-default filterNormal">
      <div class="panel-heading">filter by Color</div>
      <div class="panel-body">
        <ul class="list-unstyled">
          <li><a href="#">Black<span>(15)</span></a></li>
          <li><a href="#">White<span>(10)</span></a></li>
          <li><a href="#">Red<span>(7)</span></a></li>
          <li><a href="#">Blue<span>(12)</span></a></li>
          <li><a href="#">Orange<span>(12)</span></a></li>
        </ul>
      </div>
    </div>
    <div class="panel panel-default filterNormal">
      <div class="panel-heading">filter by Size</div>
      <div class="panel-body">
        <ul class="list-unstyled clearfix">
          <li><a href="#">Small<span>(15)</span></a></li>
          <li><a href="#">Medium<span>(10)</span></a></li>
          <li><a href="#">Large<span>(7)</span></a></li>
          <li><a href="#">Extra Large<span>(12)</span></a></li>
        </ul>
      </div>
    </div> -->
</div>