<!-- head -->
@include('home-ecommerce.header')
<!-- banner -->
@include('home-ecommerce.banner')
<section class="mainContent clearfix">
    <div class="container">
        <!-- categorias -->
        @include('home-ecommerce.section-category-products')
        <!-- productos -->
        @include('home-ecommerce.section-products')
        <!-- posts -->
        @include('home-ecommerce.section-posts')
    </div>
</section>
<!-- footer -->
@include('home-ecommerce.footer')

