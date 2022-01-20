<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VMG - @yield('title','Inicio') </title>


    <link rel="stylesheet" href="{!! asset('cms/css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('cms/css/app.css') !!}" />

    <!-- Custom -->
    <link rel="stylesheet" href="{!! asset('cms/css/custom.css') !!}" />

    <!-- DataTables -->
    <link href="{!! asset('cms/css/plugins/dataTables/datatables.min.css') !!}" rel="stylesheet">

    <!-- Chosen -->
    <link href="{!! asset('cms/css/plugins/chosen/bootstrap-chosen.css') !!}" rel="stylesheet">

    <!-- Summernote -->
    <link href="{!! asset('cms/css/plugins/summernote/summernote.css') !!}" rel="stylesheet">

    @yield ('css')

    <script>
        var base_url = '{{ url('/') }}';
    </script>
</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.cms.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.cms.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.cms.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

  <!-- App -->
    <script src="{!! asset('cms/js/app.js') !!}" type="text/javascript"></script>

  <!-- DataTables -->
  <script src="{!! asset('cms/js/plugins/dataTables/datatables.min.js') !!}"></script>

  <!-- Chosen -->
  <script src="{!! asset('cms/js/plugins/chosen/chosen.jquery.js') !!}" type="text/javascript"></script>

  <!-- Chosen -->
  <script src="{!! asset('cms/js/plugins/summernote/summernote.min.js') !!}" type="text/javascript"></script>

  <script>
      $(document).ready( function () {
          $('.dataTables-example').DataTable();
      });
  </script>

@yield('scripts')

</body>
</html>
