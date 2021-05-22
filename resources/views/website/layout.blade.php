<!doctype html>
<html lang="pt-br">
<head>
  <title>@yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="index, follow">
  {{--Favicon--}}
  <link rel="shortcut icon" href="/favicon/favicon.ico">
  <link rel="icon" sizes="16x16 32x32 64x64" href="/favicon/favicon.ico">
  <link rel="icon" type="image/png" sizes="196x196" href="/favicon/favicon-192.png">
  <link rel="icon" type="image/png" sizes="160x160" href="/favicon/favicon-160.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96.png">
  <link rel="icon" type="image/png" sizes="64x64" href="/favicon/favicon-64.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16.png">
  <link rel="apple-touch-icon" href="/favicon/favicon-57.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/favicon/favicon-114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favicon/favicon-72.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/favicon/favicon-144.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favicon/favicon-60.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/favicon/favicon-120.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favicon/favicon-76.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/favicon/favicon-152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/favicon-180.png">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta name="msapplication-TileImage" content="/favicon/favicon-144.png">
  <meta name="msapplication-config" content="/favicon/browserconfig.xml">
  {{--Metatags--}}
  @yield('metatags')
  {{--CSS--}}
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