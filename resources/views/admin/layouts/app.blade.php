<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr" >
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend/app-assets/images/ico/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('backend/app-assets/images/ico/favicon.png') }}">
        <title>
          Soft UI Dashboard by Creative Tim
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href=" {{ asset('backend/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('backend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('backend/assets/css/soft-ui-dashboard.css?v=1.0.6') }}" rel="stylesheet" />
      </head>
      {{-- @include('admin.includes.header') --}}
<body class="g-sidenav-show  bg-gray-100" >

  <!-- =============================================== -->
  <!-- Left side column. contains the sidebar -->
  @include('admin.includes.sidebar')
  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->


      @yield('content')
      <!-- /.content -->

  @include('admin.includes.footer')
  <script src="{{ asset('backend/assets/js/scripts/core/popper.min.js')}}"></script>
  <script src="{{ asset('backend/assets/js/scripts/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('backend/assets/js/scripts/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('backend/assets/js/scripts/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{ asset('backend/assets/js/scripts/plugins/chartjs.min.js')}}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{{ asset('backend/assets/js/scripts/soft-ui-dashboard.min.js?v=1.0.6"')}}"></script>
  @yield('scripts')
  @stack('scripts')
</body>
</html>
