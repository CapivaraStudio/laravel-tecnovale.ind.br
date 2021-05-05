<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tecnovale</title>
  <link rel="stylesheet" href="{{ url(mix('css/website/website.css')) }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
  @yield('head')
</head>
<body class="">
  {{--Header component--}}
  <x-website.header></x-website.header>
  {{--Page content--}}
  <main class="content">
    @yield('content')
  </main>
  {{--Footer component--}}
  <x-website.footer></x-website.footer>

  <script src="{{ url(mix('js/jquery.js')) }}"></script>
  <script src="{{ url(mix('js/bootstrap.bundle.js')) }}"></script>
  <script src="{{ url(mix('js/inputmask.js')) }}"></script>
  <script src="{{ url(mix('js/fontawesome.js')) }}"></script>
  <script src="{{ url(mix('js/website.js')) }}"></script>
  @yield('script')
</body>
</html>