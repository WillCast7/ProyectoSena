<div class="col-lg-9 col-md-8">
    <div class="row filterArea">
      <div class="col-6">
        <select name="guiest_id1" id="guiest_id1" class="select-drop">
          <option value="0">Default sorting</option>
          <option value="1">Sort by popularity</option>
          <option value="2">Sort by rating</option>
          <option value="3">Sort by newness</option>
          <option value="3">Sort by price</option>
        </select>
      </div>
      <div class="col-6">
        <div class="btn-group float-right" role="group">
          <button type="button" class="btn btn-default active" onclick="window.location.href='product-grid-left-sidebar.html'"><i class="fa fa-th" aria-hidden="true"></i><span>Grid</span></button>
          <!-- <button type="button" class="btn btn-default" onclick="window.location.href='product-list-left-sidebar.html'"><i class="fa fa-th-list" aria-hidden="true"></i><span>List</span></button> -->
        </div>
      </div>
    </div>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-6 col-lg-4">
            <div class="productBox">
            <div class="productImage clearfix">
                <img src="{{$product->imagen_url}}" alt="products-img">
                <!-- <img src="resourcesEcommerce/img/products/products-01.jpg" alt="products-img"> -->
                <div class="productMasking">
                <ul class="list-inline btn-group" role="group">
                    <!-- <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li> -->
                    <li><a href="#" onclick="addToCart({{$product->producto_id}},{{$product->producto_precio}},'{{$product->producto_nombre}}','{{$product->imagen_url}}')" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                    <li><a class="btn btn-default" href="/products/{{$product->producto_id}}" ><i class="fa fa-eye"></i></a></li>
                </ul>
                </div>
            </div>
            <div class="productCaption clearfix">
                <a href="/products/{{$product->producto_id}}">
                    <h5>{{$product->producto_nombre}}</h5>
                </a>
                <h3>$ {{number_format($product->producto_precio,2,',','.')}}</h3>
            </div>
            </div>
        </div>
        @endforeach
      <!-- <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-01.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Nike Sportswear</h5>
            </a>
            <h3>$199</h3>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-02.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Dip Dyed Sweater</h5>
            </a>
            <h3>$249</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-03.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Scarf Ring Corner</h5>
            </a>
            <h3>$179</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-04.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Sun Buddies</h5>
            </a>
            <h3>$149</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-05.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Nike Sportswear</h5>
            </a>
            <h3>$199</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-06.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Dip Dyed Sweater</h5>
            </a>
            <h3>$249</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-07.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Scarf Ring Corner</h5>
            </a>
            <h3>$179</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-08.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Sun Buddies</h5>
            </a>
            <h3>$149</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-09.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Nike Sportswear</h5>
            </a>
            <h3>$199</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-10.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Dip Dyed Sweater</h5>
            </a>
            <h3>$249</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-11.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Scarf Ring Corner</h5>
            </a>
            <h3>$179</h3>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="productBox">
          <div class="productImage clearfix">
            <img src="resourcesEcommerce/img/products/products-12.jpg" alt="products-img">
            <div class="productMasking">
              <ul class="list-inline btn-group" role="group">
                <li><a class="btn btn-default btn-wishlist"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="javascript:void(0)" class="btn btn-default" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" class="btn btn-default"><i class="fa fa-shopping-basket"></i></a></li>
                <li><a class="btn btn-default" data-toggle="modal" href=".quick-view" ><i class="fa fa-eye"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="productCaption clearfix">
            <a href="single-product.html">
              <h5>Sun Buddies</h5>
            </a>
            <h3>$149</h3>
          </div>
        </div>
      </div> -->
    </div>
</div>
<!-- <script type="text/javascript" src="/resourcesEcommerce/js/bold-custom.js"> -->