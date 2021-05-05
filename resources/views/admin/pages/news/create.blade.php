@extends('admin.pages.layout')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Novo Informativo</h1>
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
              <h3 class="card-title">Cadastrar informações</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('admin.news.store') }}" method="post">
              @csrf
              <div class="card-body">
                {{--Title--}}
                <div class="form-group row">
                  <label for="title" class="col-sm-3 col-form-label">Título</label>
                  <div class="input-group col-sm-9">
                    <input type="text" id="title" name="title" class="form-control" placeholder="Título">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-newspaper"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--Content--}}
                <div class="form-group row">
                  <label for="contenttext" class="col-sm-3 col-form-label">Conteúdo</label>
                  <div class="col-sm-9">
                    <textarea name="contenttext" id="contenttext" class="form-control"></textarea>
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
    </div>
  </section>
@endsection
@section('script')
  <script>
    ClassicEditor.create( document.querySelector( '#contenttext' ), ckeditorConfig);
    Inputmask().mask(document.querySelectorAll("input"));
  </script>
@endsection