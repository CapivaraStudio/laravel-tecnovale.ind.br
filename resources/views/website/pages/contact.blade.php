@extends('website.layout')
@section('content')
  <div class="page-title bg-dark-green py-5">
    <h2 class="text-center text-white m-0">Contato</h2>
  </div>
  <section class="container py-5 cnt-container">
    <div class="row">
      <div class="col-md-6 ctn-form mb-5">
        <h3 class="mb-3">Entre em contato</h3>
        <p class="mb-5">Preencha o formulário abaixo para entrar em contato conosco.</p>
        <form action="{{ route('website.contact.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="name">Nome</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text rounded-0"><i class="material-icons">person</i></div>
              </div>
              <input type="text" required class="form-control rounded-0" id="name" name="name" placeholder="Nome" value="{{ old('name') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="email">E-mail</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text rounded-0"><i class="material-icons">email</i></div>
              </div>
              <input type="email" required class="form-control rounded-0" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="phone">Telefone</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text rounded-0"><i class="material-icons">phone</i></div>
              </div>
              <input type="tel" required data-inputmask="'mask': ['(99) 9999-9999', '(99) 99999-9999']"
                     class="form-control rounded-0" id="phone" name="phone" placeholder="Telefone" value="{{ old('phone') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="message">Mensagem</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text rounded-0"><i class="material-icons">message</i></div>
              </div>
              <textarea required class="form-control" id="message" name="message" rows="4" placeholder="Mensagem">{{ old('message') }}</textarea>
            </div>
          </div>
          <button type="submit" class="btn rounded-0 btn-dark-green btn-block d-flex justify-content-center py-2">
            Enviar <i class="material-icons ml-3">send</i>
          </button>
          {{--Errors--}}
          @if($errors->all())
            @foreach($errors->all() as $error)
              <div class="alert alert-danger mt-3" role="alert">
                <h4 class="alert-heading">Erro!</h4>
                <hr>
                {{ $error }}
              </div>
            @endforeach
          @endif
          {{--Success--}}
          @if(session()->has('status'))
            <div class="alert alert-success mt-3" role="alert">
              <h4 class="alert-heading">Sucesso!</h4>
              <hr>
              <p>{{ session()->get('status') }}</p>
            </div>
          @endif
        </form>
      </div>
      <div class="col-md-5 offset-md-1 cnt-info">
        <h3 class="mb-3">Informações</h3>
        <p class="mb-5">Veja a baixo outras formas de entrar em contato conosco.</p>
        <section class="row mb-4 ">
          <div class="col-2 text-center">
            <i class="material-icons">location_on</i>
          </div>
          <div class="col-10">
            <h4>Endereço</h4>
            <a href="https://maps.google.com/?q=-29.5993395,-51.1933782" target="_blank">
              Rua Benno Johan Heinle, 441 - Industrial<br>
              Lindolfo Collor - RS, 93940-000
            </a>
          </div>
        </section>
        <section class="row mb-4 ">
          <div class="col-2 text-center">
            <i class="material-icons">email</i>
          </div>
          <div class="col-10">
            <h4>E-mail de contato</h4>
            <a href="mailto:{{ $contact->email }}" target="_blank">
              {{ $contact->email }}
            </a>
          </div>
        </section>
        <section class="row mb-4 ">
          <div class="col-2 text-center">
            <i class="material-icons">phone</i>
          </div>
          <div class="col-10">
            <h4>Telefone</h4>
            <a class="d-inline-block" href="{{ $contact->phone1 }}">{{ $contact->phone1 }}</a> / <a class="d-inline-block" href="{{ $contact->phone2 }}">{{ $contact->phone2 }}</a>
            <a href="https://wa.me/+55{{ preg_replace('/[^0-9]/','',$contact->whatsapp) }}" class="d-inline-block mt-3">{{ $contact->whatsapp }} <i class="fab fa-whatsapp"></i></a>
          </div>
        </section>
      </div>
    </div>
  </section>
  <section class="cnt-maps bg-light-gray">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867.287120219116!2d-51.19373849533412!3d-29.599369636539244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95195aa7122e514b%3A0x106e127621ca540b!2sR.%20Benno%20Johan%20Heinle%2C%20441%20-%20Industrial%2C%20Lindolfo%20Collor%20-%20RS%2C%2093940-000!5e0!3m2!1spt-BR!2sbr!4v1620248800013!5m2!1spt-BR!2sbr" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </section>
@endsection
@section('script')
  <script src="{{ url(mix('js/inputmask.js')) }}"></script>
  <script>
    Inputmask().mask(document.querySelectorAll("input"));
  </script>
@endsection