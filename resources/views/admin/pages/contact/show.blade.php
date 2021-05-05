@extends('admin.pages.layout')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1>Editar Contatos</h1>
        </div>
        <div class="col">
          <a href="{{ route('admin.contact') }}" class="btn btn-flat btn-maroonFlush float-right">
            Contatos
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
            <form role="form" >
              <div class="card-body">
                {{--Date--}}
                <div class="form-group row">
                  <label for="date" class="col-sm-3 col-form-label">Recebido em:</label>
                  <div class="input-group col-sm-9">
                    <input type="text" id="date" name="date" class="form-control" value="{{ date('d/m/Y - H:m', strtotime($contact->created_at)) }}" disabled>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-calendar-alt"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--Name--}}
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Nome</label>
                  <div class="input-group col-sm-9">
                    <input type="text" id="name" name="name" class="form-control" value="{{ $contact->name }}" disabled>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-tag"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--Email--}}
                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                  <div class="input-group col-sm-9">
                    <input type="text" id="email" name="email" class="form-control" value="{{ $contact->email }}" disabled>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--Phone--}}
                <div class="form-group row">
                  <label for="phone" class="col-sm-3 col-form-label">Telefone</label>
                  <div class="input-group col-sm-9">
                    <input  type="tel"
                            data-inputmask="'mask': ['(99) 9999-9999', '(99) 99999-9999']"
                            id="phone1"
                            name="phone1"
                            class="form-control"
                            value="{{ $contact->phone }}" disabled>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                  </div>
                </div>
                {{--Message--}}
                <div class="form-group row">
                  <label for="aboutus" class="col-sm-3 col-form-label">Mensagem</label>
                  <div class="col-sm-9">
                    <textarea name="message" id="message" class="form-control" rows="5" disabled>{{ $contact->message }}</textarea>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-maroonFlush text-right">
                Visualizado em: {{ date('d/m/Y - H:m', strtotime($contact->updated_at)) }}
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