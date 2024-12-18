<!DOCTYPE html>
<html lang="en">
<head>
@notifyCss
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    @include('notify::components.notify')

    <!-- Include header and sidebar -->
    =@include('backend.partials.header')
    @include('backend.partials.sideber')

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Insert child view content here -->
      @yield('content')
    </div>
    <!-- End of Main content -->

    <!-- Control sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>

  <!-- Scripts -->
  
  <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/chart.js/Chart.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/sparklines/sparkline.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/jquery-knob/jquery.knob.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/moment/moment.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="https://adminlte.io/themes/v3/dist/js/adminlte.js?v=3.2.0"></script>

  <script src="https://adminlte.io/themes/v3/dist/js/pages/dashboard.js"></script>
  @notifyJs
</body>
</html>
