<aside class="main-sidebar sidebar-dark-primary bg-darkGray elevation-4">
  <!-- Brand Logo -->
  <a href="../../index3.html" class="text-center bg-darkGray brand-link elevation-4">
    <span class="brand-text font-weight-light"><b>Capivara</b>Studio</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">GERAL</li>
        <li class="nav-item">
          <a href="{{ route('admin.info.edit', $companyInfo->id) }}" class="nav-link {{ (request()->is('admin/info*') ? 'active' : '') }}">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>Empresa</p>
          </a>
        </li>
        <li class="nav-header">INFORMAÇÕES</li>
        <li class="nav-item">
          <a href="{{ route('admin.news') }}" class="nav-link {{ (request()->is('admin/news*') ? 'active' : '') }}">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>Informativos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.category') }}" class="nav-link {{ (request()->is('admin/category*') ? 'active' : '') }}">
            <i class="nav-icon fas fa-list-ul"></i>
            <p>Categorias</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.product') }}" class="nav-link {{ (request()->is('admin/product*') ? 'active' : '') }}">
            <i class="nav-icon fas fa-box-open"></i>
            <p>Produtos</p>
          </a>
        </li>
        <li class="nav-header">CLIENTES</li>
        <li class="nav-item">
          <a href="{{ route('admin.contact') }}" class="nav-link {{ (request()->is('admin/contact*') ? 'active' : '') }}">
            <i class="nav-icon fas fa-inbox"></i>
            <p>Contatos</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>