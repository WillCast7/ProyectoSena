<!DOCTYPE html>
<html lang="en">

<!-- Head -->
    @include('ecommerce.head')
<!-- ./Head -->

  <body id="body" class="body-wrapper version1 up-scroll">

    <div class="main-wrapper">

      <!-- HEADER -->
      <div class="header clearfix">

        <!-- HEADER -->
            @include('ecommerce.topbar')
        <!-- /.HEADER -->

        <!-- NAVBAR -->
            @include('ecommerce.navbar')
        <!-- ./NAVBAR -->

      </div>

        <!-- LIGHT SECTION -->
            @include('ecommerce.subtitleSection')
        <!-- ./LIGHT SECTION -->

        <!-- MAIN CONTENT SECTION -->
            @include('ecommerce.mainShop')
        <!-- ./MAIN CONTENT SECTION -->

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

        <!-- Main scripts Container -->
            @include('ecommerce.scripts')
        <!-- /.Main scripts Container -->
	</body>
</html>
