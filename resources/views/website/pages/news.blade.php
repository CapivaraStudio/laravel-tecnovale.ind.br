@extends('website.layout')
@section('title')
Tecnovale - Informativos
@endsection
@section('metatags')
  <meta name="description" content="Fique por dentro das ultimas novidades que a Tecnovale tem para você.">
  {{--Open Graph--}}
  <meta property="og:locale" content="pt-br">
  <meta property="og:url" content="{{ url('/informativos') }}">
  <meta property="og:title" content="Tecnovale - Informativos">
  <meta property="og:site_name" content="Tecnovale">
  <meta property="og:description" content="Fique por dentro das ultimas novidades que a Tecnovale tem para você.">
  <meta property="og:image" content="{{ url('/images/logo.jpg') }}">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:type" content="website">
@endsection
@section('content')
  <div class="page-title bg-dark-green py-5">
    <h2 class="text-center text-white m-0">Informativos</h2>
  </div>
  <section class="container py-5 ctg-container">
    <div class="row flex-column">
      @forelse($news as $new)
        <div class="card mb-3 w-100">
          <div class="row no-gutters">
            <div class="col-md-4">
              @if($new->images()->where('primary', true)->first())
                <img src="{{ url('storage/'.$new->images()->where('primary', true)->first()->path) }}" alt="..." class="img-fluid">
              @endif
            </div>
            <div class="col-md-8">
              <div class="card-body h-100 flex-column d-flex">
                <h5 class="card-title text-dark-green">{{ $new->title }}</h5>
                <p class="card-text"><small class="text-muted">{{ date('d/m/Y', strtotime($new->created_at)) }}</small></p>
                <p class="card-text">{!! $new->content !!}</p>
                <a class="card-link text-red-orange align-self-end" href="{{ route('website.news.detail', $new->slug) }}">Ver mais</a>
              </div>
            </div>
          </div>
        </div>
      @empty
        <p>Nenhum produto encontrado</p>
      @endforelse
    </div>
  </section>
@endsection