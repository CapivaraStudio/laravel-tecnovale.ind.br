<header>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white border-bottom py-0">
    <div class="container align-items-stretch">
      <a class="navbar-brand text-hide flex-grow-1 w-25" href="{{ route('website.home') }}">
        Tecnovale - Sementes e Cereais
      </a>
      <button class="navbar-toggler rounded-0 border-0"
              type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ (request()->is('/') ? 'active' : '') }}">
            <a class="nav-link p-4" href="{{ route('website.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-4" href="{{ route('website.aboutus') }}">Sobre nós</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link p-4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Produtos
            </a>
            <div class="dropdown-menu p-0 rounded-0 m-0" aria-labelledby="navbarDropdown">
              @if($navbarCategories)
                @foreach($navbarCategories as $navbarCategory)
                  <a class="dropdown-item py-3 border-bottom" href="{{ route('website.product.category', $navbarCategory->slug) }}">
                    {{ $navbarCategory->name }}
                  </a>
                @endforeach
              @endif
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link p-4" href="{{ route('website.news') }}">Informativos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link p-4" href="{{ route('website.contact') }}">Contato</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>
</header>