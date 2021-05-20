<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
        @include('ecomerce.head')
    <!-- ./Head -->

  <body id="body" class="body-wrapper version1 up-scroll">

    <div class="header clearfix">

    <!-- Preloader -->
        @include('ecomerce.preloader')
    <!-- ./Preloader -->

    <!-- NAVBAR -->
        @include('ecomerce.navbar')
    <!-- ./NAVBAR -->

</div>
    <div class="main-wrapper">

        <!-- HEADER -->
            @include('ecomerce.topbar')
        <!-- /.HEADER -->


        <!-- NAVBAR -->
            @include('ecomerce.navbar')
        <!-- ./NAVBAR -->


        <!-- BANNER -->
            @include('ecomerce.banner')
        <!-- /.BANNER -->

        <!-- MAIN CONTENT SECTION -->
            @include('ecomerce.mainSection')
        <!-- /.MAIN CONTENT SECTION -->


        <!-- LIGHT SECTION -->
            @include('ecomerce.logoSection')
        <!-- /.LIGHT SECTION -->

        <!-- FOOTER -->
		    @include('ecomerce.footer')
        <!-- /.FOOTER -->

	    <!-- LOGIN MODAL -->
		    @include('ecomerce.login')
        <!-- /.LOGIN MODAL -->

	    <!-- SIGN UP MODAL -->
		    @include('ecomerce.signUp')
        <!-- /.SIGN UP MODAL -->

	    <!-- PORDUCT QUICK VIEW MODAL -->
		    @include('ecomerce.qView')
        <!-- /.PORDUCT QUICK VIEW MODAL -->

        <!-- Main Sidebar Container -->
            @include('ecomerce.scripts')
        <!-- /.Main Sidebar Container -->

	</body>
</html>

