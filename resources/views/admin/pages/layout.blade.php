<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
  <link rel="stylesheet" href="{{ url(mix('css/admin/admin.css')) }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('head')
</head>
<body class="sidebar-mini layout-navbar-fixed">
  <div class="wrapper">
    {{--Header component--}}
    <x-admin.header></x-admin.header>
    {{--Sidebar--}}
    <x-admin.sidebar></x-admin.sidebar>
    {{--Page content--}}
    <main class="content-wrapper">
      @yield('content')
    </main>
    {{--Footer component--}}
    <x-admin.footer></x-admin.footer>
  </div>

  <script src="{{ url(mix('js/jquery.js')) }}"></script>
  <script src="{{ url(mix('js/bootstrap.bundle.js')) }}"></script>
  <script src="{{ url(mix('js/adminLTE.js')) }}"></script>
  <script src="{{ url(mix('js/ckeditor/ckeditor.js')) }}"></script>
  <script src="{{ url(mix('js/inputmask.js')) }}"></script>
  <script src="{{ url(mix('js/fontawesome.js')) }}"></script>
  <script src="{{ url(mix('js/admin.js')) }}"></script>
  <script src="{{ url(mix('js/bs-custom-file-input.js')) }}"></script>
  @yield('script')
</body>
</html>