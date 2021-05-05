@extends('website.layout')
@section('content')
  <div class="page-title bg-dark-green py-5">
    <h2 class="text-center text-white m-0">{{ $news->title }}</h2>
  </div>
  <section class="container py-5 nw-container">
    <div class="row flex-column">
      <div class="nw-description">
        <small class="text-muted">{{ date('d/m/Y', strtotime($news->created_at)) }}</small>
        @if($news->images()->where('primary', true)->first())
          <img src="{{ url('storage/'.$news->images()->where('primary', true)->first()->path) }}" alt="">
        @endif
        <article>{!! $news->content !!}</article>
      </div>
      @if($news->images()->first())
        <div class="nw-images">
          <h3>Imagens</h3>
          <div class="nw-images-container row">
            @foreach($news->images()->get() as $images)
              <a href="{{ url('storage/'.$images->path) }}" data-lightbox="news" class="col-lg-2 col-md-4 col-sm-6 mb-2">
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