<!-- head -->
@include('theme-ecommerce.header')
<!-- banner -->
@include('theme-ecommerce.banner')
<section class="mainContent clearfix">
    <div class="container">
        <!-- categorias -->
        @include('theme-ecommerce.section-category-products')
        <!-- productos -->
        @include('theme-ecommerce.section-products')
        <!-- posts -->
        @include('theme-ecommerce.section-posts')
    </div>
</section>
<!-- footer -->
@include('theme-ecommerce.footer')

