@extends('admin.pages.layout')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1>{{ $product->title }}</h1>
        </div>
        <div class="col">
          <a href="{{ route('admin.product') }}" class="btn btn-flat btn-maroonFlush float-right">
            Produtos
          </a>
        </div>
      </div>
    </div>
  </section>
  {{--Errors--}}
  @if($errors->all())
    @foreach($errors->all() as $error)
      <div class="alert alert-warning alert-dismissible rounded-0">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
        {{ $error }}
      </div>
    @endforeach
  @endif
  {{--Success--}}
  @if(session()->has('status'))
    <div class="alert alert-success alert-dismissible rounded-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-check"></i> Sucesso!</h5>
      {{ session()->get('status') }}
    </div>
  @endif
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-6 col-lg-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cadastrar imagens</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('admin.product.image.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="product" value="{{ $product->id }}">
              <div class="card-body">
                {{--Images--}}
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Imagens</label>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" id="images" name="images[]" class="custom-file-input" placeholder="Imagens" multiple>
                      <label class="custom-file-label" for="images"></label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Imagens Cadastradas</h3>
            </div>
            <div class="card-body">
              <div class="row">
                @if($productImages)
                  @foreach($productImages as $productImage)
                    <div class="col-sm-2">
                      <div class="position-relative mb-2">
                        <a href="{{ url('storage/'.$productImage->path) }}">
                          <img src="{{ url('storage/'.$productImage->path) }}" class="img-fluid" alt="">
                        </a>
                        <a href="{{ route('admin.product.image.destroy', $productImage->id) }}" class="btn btn-maroonFlush btn-flat btn-img-delete"><i class="fas fa-trash"></i></a>
                        @if($productImage->primary)
                          <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-maroonFlush">
                              Principal
                            </div>
                          </div>
                        @else
                          <a href="{{ route('admin.product.image.update', [$productImage->id, ($primaryImage ? $primaryImage->id : 0)]) }}" class="btn btn-flat btn-maroonFlush btn-block">Marcar como principal</a>
                        @endif
                      </div>
                    </div>
                  @endforeach
                @else
                  <div>
                    Nenhuma imagem cadastrada
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script')
  <script>
    bsCustomFileInput.init()
  </script>
@endsection