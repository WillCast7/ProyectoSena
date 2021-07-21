<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
        @include('ecommerce.head')
    <!-- ./Head -->

  <body id="body" class="body-wrapper version1 up-scroll">

    <div class="header clearfix">

    <!-- Preloader -->
        @include('ecommerce.preloader')
    <!-- ./Preloader -->

    <!-- NAVBAR -->
        @include('ecommerce.navbar')
    <!-- ./NAVBAR -->

</div>
    <div class="main-wrapper">

        <!-- HEADER -->
            @include('ecommerce.topbar')
        <!-- /.HEADER -->


        <!-- NAVBAR -->
            @include('ecommerce.navbar')
        <!-- ./NAVBAR -->


        <!-- BANNER -->
            @include('ecommerce.banner')
        <!-- /.BANNER -->

        <!-- MAIN CONTENT SECTION -->
            @include('ecommerce.mainSection')
        <!-- /.MAIN CONTENT SECTION -->


        <!-- LIGHT SECTION -->
            @include('ecommerce.logoSection')
        <!-- /.LIGHT SECTION -->

        <!-- FOOTER -->
		    @include('ecommerce.footer')
        <!-- /.FOOTER -->

	    <!-- LOGIN MODAL -->
		    @include('ecommerce.login')
        <!-- /.LOGIN MODAL -->

	    <!-- SIGN UP MODAL -->
		    @include('ecommerce.signUp')
        <!-- /.SIGN UP MODAL -->

	    <!-- PORDUCT QUICK VIEW MODAL -->
		    @include('ecommerce.qView')
        <!-- /.PORDUCT QUICK VIEW MODAL -->

        <!-- Main Sidebar Container -->
            @include('ecommerce.scripts')
        <!-- /.Main Sidebar Container -->

	</body>
</html>

