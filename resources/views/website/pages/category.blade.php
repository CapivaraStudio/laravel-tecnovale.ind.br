@extends('website.layout')
@section('content')
  <div class="page-title bg-dark-green py-5">
    <h2 class="text-center text-white m-0">{{ $category->name ?? 'Todos os produtos' }}</h2>
  </div>
  <section class="container py-5 ctg-container">
    <div class="row">
      @forelse($products as $product)
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-4">
          <div class="card shadow rounded-0 w-100">
            <div class="card-body text-center">
              <div class="ctg-products-image d-flex align-items-center">
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
      @empty
        <p>Nenhum produto encontrado</p>
      @endforelse
    </div>
  </section>
@endsection