<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="{{ url(mix('css/admin/admin.css')) }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="adm-login login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Capivara</b>Studio</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Insira suas credenciais</p>
        <form action="{{ route('admin.login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="E-mail">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group border-maroonFlush mb-3">
            <input type="password" name="password" class="form-control" placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @if($errors->all())
            @foreach($errors->all() as $error)
              <p class="text-danger text-center">{{ $error }}</p>
            @endforeach
          @endif
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-maroonFlush btn-block">Entrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="{{ url(mix('js/jquery.js')) }}"></script>
  <script src="{{ url(mix('js/bootstrap.bundle.js')) }}"></script>
  <script src="{{ url(mix('js/adminLTE.js')) }}"></script>
  <script src="{{ url(mix('js/fontawesome.js')) }}"></script>
  <script src="{{ url(mix('js/admin.js')) }}"></script>
</body>
</html>