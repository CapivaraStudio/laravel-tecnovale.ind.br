@extends('admin.pages.layout')
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1>Dashboard</h1>
        </div>
        <div class="col">
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <h5 class="mt-4 mb-2">Informativos</h5>
      <div class="row">
        {{--News--}}
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-info rounded-0">
            <span class="info-box-icon"><i class="fas fa-newspaper"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Informativos</span>
              <span class="info-box-number">{{ $counter['news'] }}</span>
            </div>
          </div>
        </div>
        {{--News Images--}}
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-info rounded-0">
            <span class="info-box-icon"><i class="fas fa-camera"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Imagens em Informativos</span>
              <span class="info-box-number">{{ $counter['newsImages'] }}</span>
            </div>
          </div>
        </div>
      </div>
      <h5 class="mt-4 mb-2">Produtos</h5>
      <div class="row">
        {{--Products--}}
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-maroonFlush rounded-0">
            <span class="info-box-icon"><i class="fas fa-box-open"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Produtos</span>
              <span class="info-box-number">{{ $counter['products'] }}</span>
            </div>
          </div>
        </div>
        {{--Products Images--}}
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-maroonFlush rounded-0">
            <span class="info-box-icon"><i class="fas fa-camera"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Imagens em produtos</span>
              <span class="info-box-number">{{ $counter['productsImages'] }}</span>
            </div>
          </div>
        </div>
        {{--Category--}}
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-froly rounded-0">
            <span class="info-box-icon"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Categorias</span>
              <span class="info-box-number">{{ $counter['categories'] }}</span>
            </div>
          </div>
        </div>
      </div>
      <h5 class="mt-4 mb-2">Contatos</h5>
      <div class="row">
        {{--Contacts--}}
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-warning rounded-0">
            <span class="info-box-icon"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Contatos totais</span>
              <span class="info-box-number">{{ $counter['contacts'] }}</span>
            </div>
          </div>
        </div>
        {{--Read Contacts--}}
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-warning rounded-0">
            <span class="info-box-icon"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Contatos lidos</span>
              <span class="info-box-number">{{ $counter['readContacts'] }}</span>
            </div>
          </div>
        </div>
        {{--Unread Contacts--}}
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-danger rounded-0">
            <span class="info-box-icon"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Contatos não lidos</span>
              <span class="info-box-number">{{ $counter['unreadContacts'] }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection