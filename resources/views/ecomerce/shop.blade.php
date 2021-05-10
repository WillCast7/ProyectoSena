<!DOCTYPE html>
<html lang="en">

<!-- Head -->
    @include('ecomerce.head')
<!-- ./Head -->

  <body id="body" class="body-wrapper version1 up-scroll">

    <div class="main-wrapper">

      <!-- HEADER -->
      <div class="header clearfix">

        <!-- HEADER -->
            @include('ecomerce.topbar')
        <!-- /.HEADER -->

        <!-- NAVBAR -->
            @include('ecomerce.navbar')
        <!-- ./NAVBAR -->

      </div>

        <!-- LIGHT SECTION -->
            @include('ecomerce.subtitleSection')
        <!-- ./LIGHT SECTION -->

        <!-- MAIN CONTENT SECTION -->
            @include('ecomerce.mainShop')
        <!-- ./MAIN CONTENT SECTION -->

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
