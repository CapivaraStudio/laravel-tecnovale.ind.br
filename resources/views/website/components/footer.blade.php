<footer class="pt-4">
  <div class="container pt-5">
    <div class="row">
      <div class="col-md-4 align-items-stretch">
        <h5>Tecnovale</h5>
        <p>O melhor da indústria de processamento de cereais no Vale dos Sinos.</p>
      </div>
      <div class="col-md-3 offset-md-1">
        <h5>Páginas</h5>
        <a class="d-block mt-2" href="{{ route('website.aboutus') }}">Sobre nós</a>
        <a class="d-block mt-3" href="{{ route('website.product') }}">Produtos</a>
        <a class="d-block mt-3" href="{{ route('website.news') }}">Informativos</a>
        <a class="d-block mt-3" href="{{ route('website.contact') }}">Contato</a>
      </div>
      <div class="col-md-4">
        <h5>Contato</h5>
        <a href="https://maps.google.com/?q=-29.5993395,-51.1933782">
          Rua Benno Johan Heinle, 441 - Industrial<br>
          Lindolfo Collor - RS, 93940-000
        </a>
        <hr class="bg-white">
        <a href="mailto:{{ $info->email }}">{{ $info->email }}</a>
        <div class="ft-phones mt-3">
          <a href="{{ $info->phone1 }}">{{ $info->phone1 }}</a> / <a href="{{ $info->phone2 }}">{{ $info->phone2 }}</a>
          <a href="https://wa.me/+55{{ preg_replace('/[^0-9]/','',$info->whatsapp) }}" class="d-block mt-3">{{ $info->whatsapp }} <i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
    </div>
  </div>
  <hr class="bg-white mb-0 mt-5">
  <div class="container">
    <div class="row ft-credits text-center justify-content-center">
      <span class="py-3 text-light-gray">Tecnovale - Sementes e Cereais. Todos os direitos reservados</span>
    </div>
  </div>
</footer>