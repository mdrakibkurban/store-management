<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @stack('css')
  @include('admin.layouts.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layouts.nav')


  @include('admin.layouts.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @include('flash::message')
         @yield('title-content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
          @yield('main-content')
    </div>
    <!-- /.content -->
  </div>
   
  @include('admin.layouts.footer')
     
</div>
<!-- ./wrapper -->

@include('admin.layouts.scripts')

@stack('scripts')
</body>
</html>
