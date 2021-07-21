<!DOCTYPE html>
<html lang="en">

<!-- Head -->
        @include('dashboard.head')
<!-- /.Head -->

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
       @include('dashboard.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
        @include('dashboard.asidebar')
  <!-- /.Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
       @include('dashboard.header')
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- /.container-fluid -->
            {{-- @include('dashboard.contentbody') --}}
        <!-- /.container-fluid -->
        @yield('contenido')
    </div>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    @include('dashboard.footer')
  <!-- ./Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    @include('dashboard.scripts')
<!-- ./REQUIRED SCRIPTS -->

@yield('script')
</body>
</html>
