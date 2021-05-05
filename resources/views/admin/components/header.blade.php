<header>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ (request()->is('admin') ? 'active' : '') }}">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item border-right">
        <a href="{{ route('admin.password.edit') }}" class="nav-link {{ (request()->is('admin/password*') ? 'active' : '') }}">
          <i class="fas fa-lock"></i>
          <span>Trocar Senha</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.logout') }}" class="nav-link">
          <i class="fas fa-sign-out-alt"></i>
          <span>Sair</span>
        </a>
      </li>
    </ul>
  </nav>
</header>