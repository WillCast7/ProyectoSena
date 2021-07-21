<!-- head -->
@include('theme-ecommerce.header')
    <!-- LIGHT SECTION -->
    <section class="lightSection clearfix pageHeader">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="page-title">
                <h2>Método de pago</h2>
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
                <li class="active">Método de pago</li>
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
            <div class="innerWrapper clearfix stepsPage">
              <div class="row progress-wizard" style="border-bottom:0;">
                <div class="col-4 progress-wizard-step complete fullBar">
                  <div class="text-center progress-wizard-stepnum">Método de envío</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="checkout-step-1.html" class="progress-wizard-dot"></a>
                </div>

                <div class="col-4 progress-wizard-step active">
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

              <div class="page-header">
                <h4>Información de envío</h4>
              </div>

              <div class="row shipping-info">
                <div class="col-6">
                  <h5>Dirección</h5>
                  <address>
                    {{$address}}<br>
                    {{$department_name}}, {{$city_name}} <br>
                    {{$phone}} <br>
                    {{$email}}<br>
                  </address>
                </div>
                <div class="col-6">
                  <h5>Método de envío</h5>
                  <p>
                    Standard
                  </p>
                </div>
              </div>

              <div class="page-header">
                <h4>Información de pago</h4>
              </div>
              <form action="/checkout" class="row" method="POST" role="form">
                <div class=" checkboxArea card-check">
                  <!-- <div class="col-sm-12 mb-2">
                    <input id="checkbox1" type="radio" name="checkbox" value="1" >
                    <label for="checkbox1"><span></span>Pay with Paypal</label>
                  </div> -->
                  <div class="col-sm-12 mb-2">
                    <input id="checkbox2" type="radio" name="checkbox" value="1" checked="checked">
                    <label for="checkbox2"><span></span>Credit Card</label>
                    <small class="mb-2 d-block">Aceptamos las siguientes tarjetas</small>
                    <ul class="list-unstyled list-inline">
                      <li><img src="/resourcesEcommerce/img/products/card1.jpg" alt=""><!--  --></li>
                      <li><img src="/resourcesEcommerce/img/products/card2.jpg" alt=""><!--  --></li>
                      <li><img src="/resourcesEcommerce/img/products/card3.jpg" alt=""><!--  --></li>
                      <li><img src="/resourcesEcommerce/img/products/card4.jpg" alt=""><!--  --></li>
                    </ul>
                    <div class="form-group row my-3 ml-3">
                      <div class="col-md-6">
                        <label for=""  class="col-form-label">Titular</label>
                        <input name="cardholdername" class="form-control" type="text" required>
                      </div>

                      <div class="col-md-6">
                        <label for="" class="col-form-label">Numero de tarjeta</label>
                        <input class="form-control" max="16" name="cardnumber" type="text" required>
                      </div>
                      <div class="col-md-6 col-12 mb-4 mb-md-0">
                        <label for="">Expira</label>
                        <span class="step-drop">
                          <select name="yearexpired"  class="select-drop" required>
                            <option value="0">Año</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                          </select>
                        <!-- </span>
                        <span class="step-drop"> -->
                          <select name="monthexpired"  required class="select-drop">
                            <option value="">Mes</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                          </select>
                        </span>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="">CVC/CVV</label>
                        <div class="input-group">
                          <input type="text" max="4" name="securitycode" required class="form-control" aria-label="" placeholder="1234">
                          <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-sm-12 mb-2">
                    <input id="checkbox1" type="radio" name="checkbox" value="1" >
                    <label for="checkbox1"><span></span>Reward Points</label>
                  </div> -->
                </div>

                <div class="col-sm-12">
                  <div class="well well-lg clearfix">
                    <ul class="pager">
                      <li class="previous float-left">
                        <a class="btn btn-secondary btn-default float-left" href="#" onclick="back()">Atras</a>
                      </li>
                      <li class="next">
                        <button type="submit" class="btn btn-primary btn-default float-right">Contrinuar <i class="fa fa-angle-right"></i></button>
                        <!-- <a class="btn btn-primary btn-default float-right" href="checkout-step-3.html">Continuar <i class="fa fa-angle-right"></i></a> -->
                      </li>
                    </ul>
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