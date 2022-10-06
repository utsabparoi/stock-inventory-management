<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('layouts.partial._head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.partial._navbar')
    @include('layouts.partial._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app">
    @include('flash::message')
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
    @include('layouts.partial._footer')
</div>
<!-- ./wrapper -->

@include('layouts.partial._footer-script')
</body>
</html>
