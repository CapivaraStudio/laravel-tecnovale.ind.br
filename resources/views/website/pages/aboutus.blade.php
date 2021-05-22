@extends('website.layout')
@section('title')
Tecnovale - Sobre nós
@endsection
@section('metatags')
  <meta name="description" content="{{ Illuminate\Support\Str::limit(strip_tags($aboutus->aboutus), 200) }}">
  {{--Open Graph--}}
  <meta property="og:locale" content="pt-br">
  <meta property="og:url" content="{{ url('/sobre-nos') }}">
  <meta property="og:title" content="Tecnovale - Sobre nós">
  <meta property="og:site_name" content="Tecnovale">
  <meta property="og:description" content="{{ Illuminate\Support\Str::limit(strip_tags($aboutus->aboutus), 200) }}">
  <meta property="og:image" content="{{ url('/images/logo.jpg') }}">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:type" content="website">
@endsection
@section('content')
  <div class="page-title bg-dark-green py-5">
    <h2 class="text-center text-white m-0">Sobre nós</h2>
  </div>
  <section class="abt-know-more py-5">
    <div class="container py-4">
      <div class="row">
        <div class="col-lg-7">
          <div class="card shadow rounded-0 mb-4">
            <div class="card-header">
              <h3 class="m-0">Conheça a Tecnovale</h3>
            </div>
            <div class="card-body">
              {!! $aboutus->aboutus !!}
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card shadow rounded-0">
            <div class="card-header">
              <h3 class="m-0">Por que escolher a Tecnovale?</h3>
            </div>
            <div class="card-body">
              <section class="row mb-4 ">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="abt-cards pt-4">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-4 d-flex align-items-stretch mb-4">
          <div class="card shadow rounded-0">
            <div class="card-body text-center">
              <i class="material-icons">track_changes</i>
              <h5 class="card-title">Missão</h5>
              <p class="card-text">{{ $aboutus->mission }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-stretch mb-4">
          <div class="card shadow rounded-0">
            <div class="card-body text-center">
              <i class="material-icons">signal_cellular_alt</i>
              <h5 class="card-title">Visão</h5>
              <p class="card-text">{{ $aboutus->vision }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-items-stretch mb-4">
          <div class="card shadow rounded-0">
            <div class="card-body text-center">
              <i class="material-icons">anchor</i>
              <h5 class="card-title">Valores</h5>
              <p class="card-text">{{ $aboutus->values }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection