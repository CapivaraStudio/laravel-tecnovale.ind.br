@extends('admin.pages.layout')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1>Editar Produtos</h1>
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
              <h3 class="card-title">Editar informações</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('admin.product.update', ['product'=>$product]) }}" method="post">
              @method('patch')
              @csrf
              <div class="card-body">
                {{--Name--}}
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Nome</label>
                  <div class="input-group col-sm-9">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome" value="{{ $product->name }}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-tag"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--Categories--}}
                <div class="form-group row">
                  <label for="category" class="col-sm-3 col-form-label">Categoria</label>
                  <div class="input-group col-sm-9">
                    <select type="text" id="category" name="category" class="form-control">
                      @if($categories)
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}"{{ ($product->category == $category->id ? 'selected' : '') }}>{{ $category->name }}</option>
                        @endforeach
                      @endif
                    </select>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-tasks"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--Description--}}
                <div class="form-group row">
                  <label for="description" class="col-sm-3 col-form-label">Descrição</label>
                  <div class="col-sm-9">
                    <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                  </div>
                </div>
                {{--Technology--}}
                <div class="form-group row">
                  <label for="technology" class="col-sm-3 col-form-label">Tecnologia</label>
                  <div class="col-sm-9">
                    <textarea name="technology" id="technology" class="form-control">{{ $product->technology }}</textarea>
                  </div>
                </div>
                {{--Presentation--}}
                <div class="form-group row">
                  <label for="presentation" class="col-sm-3 col-form-label">Apresentação</label>
                  <div class="col-sm-9">
                    <textarea name="presentation" id="presentation" class="form-control">{{ $product->presentation }}</textarea>
                  </div>
                </div>
                {{--Active--}}
                <div class="form-group row">
                  <label for="active" class="col-sm-3">Ativo</label>
                  <div class="col-sm-9">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input"
                             id="active" name="active" value="1" {{ $product->active ? 'checked' : '' }}>
                      <label class="custom-control-label" for="active"></label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Editar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script')
  <script>
    ClassicEditor.create( document.querySelector( '#description' ), ckeditorConfig);
    ClassicEditor.create( document.querySelector( '#technology' ), ckeditorConfig);
    ClassicEditor.create( document.querySelector( '#presentation' ), ckeditorConfig);
    Inputmask().mask(document.querySelectorAll("input"));
  </script>
@endsection