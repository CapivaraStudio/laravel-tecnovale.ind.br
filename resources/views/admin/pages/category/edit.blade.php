@extends('admin.pages.layout')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1>Editar Categorias</h1>
        </div>
        <div class="col">
          <a href="{{ route('admin.category') }}" class="btn btn-flat btn-maroonFlush float-right">
            Categorias
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
            <form role="form" action="{{ route('admin.category.update', ['category'=>$category]) }}" method="post">
              @method('patch')
              @csrf
              <div class="card-body">
                {{--Name--}}
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Nome</label>
                  <div class="input-group col-sm-9">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nome" value="{{ $category->name }}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-tag"></span>
                      </div>
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
    Inputmask().mask(document.querySelectorAll("input"));
  </script>
@endsection