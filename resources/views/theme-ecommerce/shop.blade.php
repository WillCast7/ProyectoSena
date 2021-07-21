<!-- head -->
@include('theme-ecommerce.header')
<section class="mainContent clearfix productsContent">
    <div class="container">
      <div class="row">
        <!-- widgets left - categorias -->
        @include('theme-ecommerce.widgets-left')

        @include('theme-ecommerce.products-grids')
      </div>
    </div>
</section>
<!-- footer -->
@include('theme-ecommerce.footer')