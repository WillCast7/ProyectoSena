<!-- head -->
@include('theme-ecommerce.header')
    <!-- LIGHT SECTION -->
    <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="page-title">
                <h2>Dirección de Facturacion &amp; Envío</h2>
              </div>
            </div>
            <div class="col-md-6">
              <ol class="breadcrumb">
                <li>
                  <a href="index.html">Home</a>
                </li>
                <li>
                  <a href="#">Tienda</a>
                </li>
                <li class="active">Información de envío</li>
              </ol>
            </div>
          </div>
        </div>
    </section>

    <!-- MAIN CONTENT SECTION -->
    <section class="mainContent clearfix stepsWrapper">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
            @if($msg != "")
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Mensaje!</strong> {{$msg}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
              <div class="innerWrapper clearfix stepsPage">
                <div class="row progress-wizard" style="border-bottom:0;">

                  <div class="col-4 progress-wizard-step active">
                    <div class="text-center progress-wizard-stepnum">Método de envío</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="checkout-step-1.html" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-4 progress-wizard-step disabled">
                    <div class="text-center progress-wizard-stepnum">Método de pago</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="checkout-step-2.html" class="progress-wizard-dot"></a>
                  </div>

                  <div class="col-4 progress-wizard-step disabled">
                    <div class="text-center progress-wizard-stepnum">Revisión</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="checkout-step-3.html" class="progress-wizard-dot"></a>
                  </div>
                </div>

                <form action="/checkout" class="row" method="POST" role="form">
                    @csrf;
                  <div class="col-12">
                    <div class="page-header">
                      <h4>Dirección de envío</h4>
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Primer Nombre</label>
                    <input type="text" name="firstname" required class="form-control">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Apellidos</label>
                    <input type="text" name="lastname" required class="form-control">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Email</label>
                    <input type="email" name="email" required class="form-control">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Teléfono</label>
                    <input type="text" name="phone" class="form-control">
                  </div>
                  <!-- <div class="form-group col-md-6 col-12"> -->
                  <div class="form-group col-md-6 col-12 mb-3">
                    <label for="departamento">Departamento</label>
                    <select required class="input-group form-select" name="department" id="departamento" onchange="getCiudades(this)">
                        <option value="">Seleccione..</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{$departamento->codigo}}">{{$departamento->nombre}}</option>
                        @endforeach
                    </select>
                    <!-- <div class="form-group row">
                      <div class="quick-drop col-12 selectOptions ">
                        <select name="country" class="form-control select-drop">
                            <option value="">Seleccione..</option>
                            @foreach($departamentos as $departamento)
                                <option value="{{$departamento->codigo}}">{{$departamento->nombre}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div> -->
                  </div>
                    <!-- ciudad -->
                  <div class="form-group col-md-6 col-12 mb-3">
                    <label for="ciudades">Ciudad</label>
                    <select required class="input-group form-select" name="city" id="ciudadesCheckout" >
                        <option value="">Seleccione..</option>
                    </select>
                  </div>


                  <!-- <div class="form-group col-md-6 col-12">
                    <label for="">Ciudad</label>
                    <div class="form-group row">
                      <div class="quick-drop col-12 selectOptions ">
                        <select name="country" class="form-control select-drop">
                          <option></option>
                          <option>USA</option>
                          <option>Singapore</option>
                          <option>Bangladesh</option>
                        </select>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group col-md-6 col-12">
                    <label for="">Dirección</label>
                    <input required type="text" name="address" class="form-control">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label for="">Codigo ZIP</label>
                    <input required type="text" name="zipcode" class="form-control">
                  </div>
                  <!-- <div class="col-12">
                    <div class="page-header">
                      <h4>Select A Shipping Method</h4>
                    </div>
                  </div>
                  <div class="row checkboxArea">
                    <div class="col-12 col-lg-6 mb-4">
                      <input id="checkbox1" type="radio" name="checkbox" value="1" checked="checked">
                      <label for="checkbox1"><span></span>Standard Ground (USPS) - $7.50</label>
                      <small>Delivered in 8-12 business days.</small>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                      <input id="checkbox2" type="radio" name="checkbox" value="1">
                      <label for="checkbox2"><span></span>Premium Ground (UPS) - $12.50</label>
                      <small>Delivered in 4-7 business days.</small>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                      <input id="checkbox3" type="radio" name="checkbox" value="1">
                      <label for="checkbox3"><span></span>UPS 2 Business Day - $15.00</label>
                      <small>Orders placed by 9:45AM PST will ship same day.</small>
                    </div>
                    <div class="col-12 col-lg-6 mb-4">
                      <input id="checkbox4" type="radio" name="checkbox" value="1">
                      <label for="checkbox4"><span></span>UPS 1 Business Day - $35.00</label>
                      <small>Orders placed by 9:45AM PST will ship same day.</small>
                    </div>
                  </div> -->
                  <div class="col-12">
                    <div class="well well-lg clearfix">
                        <button class="btn btn-primary float-right" type="submit">Continuar</button>
                      <!-- <ul class="pager">
                        <li class="next "><a class="btn btn-primary btn-default float-right" href="checkout-step-2.html">Continuar <i class="fa fa-angle-right"></i></a></li>
                      </ul> -->
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-4">
              <div class="summery-box">
                <h4>Resumen</h4>
                <p>El resumen de tu orden es.</p>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <span class="tag">Subtotal</span>
                    <span class="val">$ {{number_format($subtotal,2,',','.')}}</span>
                  </li>
                  <!-- <li class="d-flex justify-content-between">
                    <span class="tag">Shipping & Handling</span>
                    <span class="val">$12.00 </span>
                  </li> -->
                  <li class="d-flex justify-content-between">
                    <span class="tag">Impuesto</span>
                    <span class="val">$0.00 </span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <span class="tag">Total</span>
                    <span class="val">$ {{number_format($total,2,',','.')}} </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </section>

<!-- footer -->
@include('theme-ecommerce.footer')