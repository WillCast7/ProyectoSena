<!-- head -->
@include('theme-ecommerce.header')
  <!-- LIGHT SECTION -->
  <section class="lightSection clearfix pageHeader">
    <div class="container">
      <div class="row">
          <div class="col-md-6">
          <div class="page-title">
          </div>
          </div>
          <div class="col-md-6">
          <ol class="breadcrumb float-right">
              <li>
              <a href="/">Home</a>
              </li>
              <li class="active">Tienda</li>
          </ol>
          </div>
      </div>
    </div>
  </section>

  <!-- MAIN CONTENT SECTION -->
  <section class="mainContent clearfix stepsWrapper">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
          <div class="innerWrapper clearfix stepsPage">
              <div class="row justify-content-center order-confirm">
              <div class="col-md-8 col-lg-6 text-center">
                  <h2>Gracias por tu orden</h2>
                  <span>Hemos recibido tu pago.</span>
                  <p class="">
                    Su pedido: # {{$pedido_id}} <br>
                    Su pedido sera despachado los antes posible, Muchas gracias por preferirnos.
                    <!-- La confirmación y el recibo de su pedido se envían a: -->
                  </p>
                  <a href="/shop" class="btn btn-primary btn-default">Regresar a la tienda</a>
              </div>
              </div>
          </div>
          </div>
      </div>
    </div>
  </section>

<!-- footer -->
@include('theme-ecommerce.footer')