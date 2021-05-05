@extends('admin.pages.layout')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Empresa</h1>
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
              <h3 class="card-title">Alterar informações</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('admin.info.update', ['info'=>$info]) }}" method="post">
              @csrf
              @method('patch')
              <div class="card-body">
                {{--email--}}
                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                  <div class="input-group col-sm-9">
                    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="{{ $info->email }}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--phone1--}}
                <div class="form-group row">
                  <label for="phone1" class="col-sm-3 col-form-label">Telefone 1</label>
                  <div class="input-group col-sm-9">
                    <input type="tel"
                           data-inputmask="'mask': ['(99) 9999-9999', '(99) 99999-9999']"
                           id="phone1"
                           name="phone1"
                           class="form-control"
                           placeholder="Telefone 1"
                           value="{{ $info->phone1 }}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--phone2--}}
                <div class="form-group row">
                  <label for="phone2" class="col-sm-3 col-form-label">Telefone 2</label>
                  <div class="input-group col-sm-9">
                    <input type="tel"
                           data-inputmask="'mask': ['(99) 9999-9999', '(99) 99999-9999']"
                           id="phone2"
                           name="phone2"
                           class="form-control"
                           placeholder="Telefone 2"
                           value="{{ $info->phone2 }}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--Whatsapp--}}
                <div class="form-group row">
                  <label for="whatsapp" class="col-sm-3 col-form-label">Whatsapp</label>
                  <div class="input-group col-sm-9">
                    <input type="tel"
                           data-inputmask="'mask': ['(99) 9999-9999', '(99) 99999-9999']"
                           id="whatsapp"
                           name="whatsapp"
                           class="form-control"
                           placeholder="Whatsapp"
                           value="{{ $info->whatsapp }}">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--About Us--}}
                <div class="form-group row">
                  <label for="aboutus" class="col-sm-3 col-form-label">Sobre a empresa</label>
                  <div class="col-sm-9">
                    <textarea name="aboutus" id="aboutus" class="form-control">{{ $info->aboutus }}</textarea>
                  </div>
                </div>
                {{--Mission--}}
                <div class="form-group row">
                  <label for="mission" class="col-sm-3 col-form-label">Missão</label>
                  <div class="col-sm-9">
                    <textarea name="mission" rows="5" id="mission" class="form-control shadow-none">{{ $info->mission }}</textarea>
                  </div>
                </div>
                {{--Vision--}}
                <div class="form-group row">
                  <label for="vision" class="col-sm-3 col-form-label">Visão</label>
                  <div class="col-sm-9">
                    <textarea name="vision" rows="5" id="vision" class="form-control shadow-none">{{ $info->vision }}</textarea>
                  </div>
                </div>
                {{--Values--}}
                <div class="form-group row">
                  <label for="values" class="col-sm-3 col-form-label">Valores</label>
                  <div class="col-sm-9">
                    <textarea name="values" rows="5" id="values" class="form-control shadow-none">{{ $info->values }}</textarea>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Confirmar</button>
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
    ClassicEditor.create( document.querySelector( '#aboutus' ), ckeditorConfig);
    Inputmask().mask(document.querySelectorAll("input"));
  </script>
@endsection