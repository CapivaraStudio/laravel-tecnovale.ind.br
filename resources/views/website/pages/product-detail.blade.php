@extends('website.layout')
@section('title')
  Tecnovale - {{ $product->name??'' }}
@endsection
@section('metatags')
  <meta name="description" content="{{ Illuminate\Support\Str::limit(strip_tags($product->description), 200) }}">
  {{--Open Graph--}}
  <meta property="og:locale" content="pt-br">
  <meta property="og:url" content="{{ url($product->slug??'') }}">
  <meta property="og:title" content="Tecnovale - {{ $product->title??'' }}">
  <meta property="og:site_name" content="Tecnovale">
  <meta property="og:description" content="{{ Illuminate\Support\Str::limit(strip_tags($product->description), 200) }}">
  @if($product->images()->where('primary', true)->first())
    <meta property="og:image" content="{{ url('storage/'.$product->images()->where('primary', true)->first()->path) }}">
  @else
    <meta property="og:image" content="{{ url('/images/logo.jpg') }}">
  @endif
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:type" content="website">
@endsection
@section('content')
  <div class="page-title bg-dark-green py-5">
    <h2 class="text-center text-white m-0">{{ $product->name }}</h2>
  </div>
  <section class="container py-5 pdt-container">
    <div class="row flex-column">
      <div class="pdt-description">
        <h3>Descrição</h3>
        @if($product->images()->where('primary', true)->first())
          <img src="{{ url('storage/'.$product->images()->where('primary', true)->first()->path) }}" alt="">
        @endif
        <article>{!! $product->description !!}</article>
      </div>
      @if($product->technology)
        <div class="pdt-technology">
          <h3>Tecnologia</h3>
          {!! $product->technology !!}
        </div>
      @endif
      @if($product->presentation)
        <div class="pdt-presentation">
          <h3>Apresentação</h3>
          {!! $product->presentation !!}
        </div>
      @endif
      @if($product->images()->first())
        <div class="pdt-images">
          <h3>Imagens</h3>
          <div class="pdt-images-container row">
            @foreach($product->images()->get() as $images)
              <a href="{{ url('storage/'.$images->path) }}" data-lightbox="product" class="col-lg-2 col-md-4 col-sm-6 mb-2">
                <img src="{{ url('storage/'.$images->path) }}" alt="" class="img-fluid">
              </a>
            @endforeach
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection
@section('script')
  <script src="{{ url(mix('js/lightbox2.js')) }}"></script>
  <script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': false,
      'albumLabel': "Imagem %1 de %2"
    })
  </script>
@endsection