@extends('website.layout')
@section('title')
Tecnovale - Sementes e Cereais
@endsection
@section('metatags')
  <meta name="description" content="O melhor da indústria de processamento de cereais no Vale dos Sinos.">
{{--Open Graph--}}
  <meta property="og:locale" content="pt-br">
  <meta property="og:url" content="{{ url('') }}">
  <meta property="og:title" content="Tecnovale - Sementes e Cereais">
  <meta property="og:site_name" content="Tecnovale">
  <meta property="og:description" content="O melhor da indústria de processamento de cereais no Vale dos Sinos.">
  <meta property="og:image" content="{{ url('/images/logo.jpg') }}">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:type" content="website">
@endsection
@section('content')
  <section class="hm-hero">
    <div class="hm-hero-bg"></div>
    <div class="container d-flex h-100 p-2 justify-content-center">
      <div class="align-self-center row w-100 align-items-center">
        <div class="hm-hero-content-left col-lg-6 col-md-12">
          <h2>Bem vindo a <span>Tecnovale</span></h2>
          <h3>Qualidade e Tecnologia</h3>
          <p>O melhor da indústria de processamento de cereais no Vale dos Sinos.</p>
          <div class="hm-hero-buttons row">
            <a href="{{ route('website.aboutus') }}" class="btn btn-lg col-5 rounded-0 btn-dark-green mx-1">Sobre nós</a>
            <a href="{{ route('website.contact') }}" class="btn btn-lg col-5 rounded-0 btn-light-gray mx-1">Contato</a>
          </div>
        </div>
        <div class="hm-hero-content-right col-lg-6 d-none d-lg-block">
          <img src="{{ url('images/logotipo.png') }}" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>
  <section class="hm-cards pt-4">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-4 d-flex align-items-stretch mb-4">
          <div class="card shadow rounded-0">
            <div class="card-body text-center">
              <i class="material-icons">track_changes</i>
              <h5 class="card-title">Missão</h5>
              <p class="card-text">{{ $homeInfo->mission }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-stretch mb-4">
          <div class="card shadow rounded-0">
            <div class="card-body text-center">
              <i class="material-icons">signal_cellular_alt</i>
              <h5 class="card-title">Visão</h5>
              <p class="card-text">{{ $homeInfo->vision }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-stretch mb-4">
          <div class="card shadow rounded-0">
            <div class="card-body text-center">
              <i class="material-icons">anchor</i>
              <h5 class="card-title">Valores</h5>
              <p class="card-text">{{ $homeInfo->values }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="hm-aboutus py-4">
    <div class="container py-5">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <img src="{{ url('images/logistic.jpg') }}" class="img-fluid d-none d-lg-block" alt="">
        </div>
        <article class="col-lg-6">
          <h3 class="hm-section-title mb-2">Sobre nós</h3>
          <h4 class="mb-2">Por que nos escolher</h4>
          <p class="mb-5">A Tecnovale é sinonimo de qualidade e tecnologia. Estamos sempre em busca de fornecer o melhor para você e/ou sua empresa.</p>
          <section class="row mb-4">
            <div class="col-2 text-center">
              <i class="material-icons">bar_chart</i>
            </div>
            <div class="col-10">
              <h5>Qualidade</h5>
              <p>Nossos produtos são de alta qualidade, passando por rigoroso controle de qualidade, proveniente de fornecedores qualificados e confiáveis.</p>
            </div>
          </section>
          <section class="row mb-4">
            <div class="col-2 text-center">
              <i class="material-icons">attach_money</i>
            </div>
            <div class="col-10">
              <h5>Preço</h5>
              <p>Qualidade e tecnologia qualificam nossos produtos a terem um preço justo ao mercado, ao cliente e a empresa.</p>
            </div>
          </section>
          <section class="row">
            <div class="col-2 text-center">
              <i class="material-icons">usb</i>
            </div>
            <div class="col-10">
              <h5>Tecnologia</h5>
              <p>Hoje a tecnologia é a grande aliada do agro negócio, fazendo com que o produtor tenha a rentabilidade desejada na sua lavoura ou criação, qualificando seu produto e agregando valor.</p>
            </div>
          </section>
        </article>
      </div>
    </div>
  </section>
  <section class="hm-products py-4">
    <div class="container py-5">
      <h3 class="hm-section-title mb-3 text-center">Produtos</h3>
      <p class="mb-5 text-center">Conheça alguns de nossos produtos</p>
      <div class="row">
        @foreach($products as $product)
          <div class="col-md-3 d-flex align-items-stretch mb-2">
            <div class="card shadow rounded-0 w-100">
              <div class="card-body text-center">
                <div class="hm-products-image d-flex align-items-center">
                  @if($product->images()->where('primary', true)->first())
                    <img
                      src="{{ url('/storage/'.$product->images()->where('primary', true)->first()->path) }}"
                      class="img-fluid mb-3"
                      alt="">
                  @else
                    <i class="material-icons w-100">image_not_supported</i>
                  @endif
                </div>
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text text-justify">
                  {{ Illuminate\Support\Str::limit(strip_tags($product->description), 120) }}
                </p>
              </div>
              <a href="{{ route('website.product.detail',
                ['category'=>$product->category()->first()->slug,
                'product'=>$product->slug]) }}"
                class="btn btn-red-orange rounded-0 btn-lg">Saiba mais</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection