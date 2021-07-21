<!-- head -->
@include('theme-ecommerce.header')
    <!-- LIGHT SECTION -->
    <section class="lightSection clearfix pageHeaderImage">
        <div class="container">
        <div class="tableBlock">
            <div class="row tableInner">
            <div class="col-sm-12">
                <div class="page-title">
                <h2>Carrito</h2>
                <ol class="breadcrumb">
                    <li>
                    <a href="/">Home</a>
                    </li>
                    <li class="active">carrito</li>
                </ol>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- MAIN CONTENT SECTION -->
    <section class="mainContent clearfix cartListWrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(sizeof($products)>0)
                    <div class="cartListInner">
                        <form action="#">
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                    <th></th>
                                    <th>Nombre Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="">
                                            <button onclick="removeItemCart({{$product['producto_id']}})" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <span class="cartImage"><img src="{{$product['images'][0]->imagen_url}}" alt="image"></span>
                                        </td>
                                        <td class="">{{$product['producto_nombre']}}</td>
                                        <td class="">$ {{number_format($product['producto_precio'],2,',','.')}}</td>
                                        <td class="count-input">
                                            <a class="incr-btn" onclick="decrementItemCart({{$product['producto_id']}})" data-action="decrease" href="#"><i class="fa fa-minus"></i></a>
                                            <input class="quantity" type="text" value="{{$product->cantidad}}">
                                            <a class="incr-btn" onclick="incrementItemCart({{$product['producto_id']}})" data-action="increase" href="#"><i class="fa fa-plus"></i></a>
                                        </td>
                                        <td class="">$ {{number_format($product->cantidad * $product['producto_precio'],2,',','.')}}</td>
                                    </tr>
                                    @endforeach
                                    <!-- <tr>
                                    <td class="">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span class="cartImage"><img src="assets/img/products/cart-image2.jpg" alt="image"></span>
                                    </td>
                                    <td class="">Italian Winter Hat</td>
                                    <td class="">$ 99.00</td>
                                    <td class="count-input">
                                                    <a class="incr-btn" data-action="decrease" href="#"><i class="fa fa-minus"></i></a>
                                                    <input class="quantity" type="text" value="1">
                                                    <a class="incr-btn" data-action="increase" href="#"><i class="fa fa-plus"></i></a>
                                    </td>
                                    <td class="">$ 99.00</td>
                                    </tr>
                                    <tr>
                                    <td class="">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <span class="cartImage"><img src="assets/img/products/cart-image3.jpg" alt="image"></span>
                                    </td>
                                    <td class="">Italian Winter Hat</td>
                                    <td class="">$ 99.00</td>
                                    <td class="count-input">
                                                    <a class="incr-btn" data-action="decrease" href="#"><i class="fa fa-minus"></i></a>
                                                    <input class="quantity" type="text" value="1">
                                                    <a class="incr-btn" data-action="increase" href="#"><i class="fa fa-plus"></i></a>
                                    </td>
                                    <td class="">$ 99.00</td>
                                    </tr> -->
                                </tbody>
                                
                                </table>
                            </div>
                            <!-- <div class="updateArea">
                                <div class="input-group">
                                <input type="text" class="form-control" placeholder="I have a discount coupon" aria-describedby="basic-addon2">
                                <a href="#" class="btn btn-primary-outlined" id="basic-addon2">apply coupon</a>
                                </div>
                                <a href="#" class="float-right btn btn-secondary-outlined">update cart</a>
                            </div> -->
                            <div class="row totalAmountArea">
                                <div class="col-sm-4 ml-sm-auto">
                                    <a href="#" onclick="updateCartCantities()" class="btn btn-primary btn-default update-cart-bold no-view">Actualizar carrito<i class="fa fa-update" aria-hidden="true"></i></a>
                                    <ul class="list-unstyled">
                                        <li>Sub Total <span>$ {{number_format($subtotal,2,',','.')}}</span></li>
                                        <li>IVA <span>$ {{$iva}}</span></li>
                                        <li>Total <span class="grandTotal">$ {{number_format($total,2,',','.')}}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="checkBtnArea">
                                <a id="checkout-bold-btn" href="/checkout" class="btn btn-primary btn-default">checkout<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                            </div>
                        </form>
                    </div>
                    @else
                        <h4>No hay elementos en el carrito</h4>
                    @endif
                </div>
            </div>
        </div>
    </section>
<!-- footer -->
@include('theme-ecommerce.footer')