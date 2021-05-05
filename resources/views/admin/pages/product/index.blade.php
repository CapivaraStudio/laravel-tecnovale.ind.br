@extends('admin.pages.layout')
@section('head')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
@endsection
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1>Produtos</h1>
        </div>
        <div class="col">
          <a href="{{ route('admin.product.create') }}" class="btn btn-flat btn-maroonFlush float-right">
            Cadastrar
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de produtos</h3>
            </div>
            <!-- /.card-header -->
            {{--  card body--}}
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <table id="productTable" class="table table-bordered table-striped order-column ">
                    <thead>
                    <tr>
                      <th>Ações</th>
                      <th>Nome</th>
                      <th>Ativo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                      <!-- Modal -->
                      <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Excluir produto</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Deseja excluir o produto<br>
                              "{{ $product->name }}"?
                            </div>
                            <div class="modal-footer">
                              <form action="{{ route('admin.product.destroy', ["product"=> $product->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="news" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-maroonFlush">Apagar</button>
                              </form>
                              <button type="button" class="btn btn-darkGray" data-dismiss="modal">Fechar</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{--Data table infos--}}
                      <tr>
                        <td class="fitwidth">
                          <a href="{{ route('website.product.detail',
                            ['category'=>$categories->where('id', $product->category)->first()->slug, 'product'=>$product->slug])
                          }}" class="btn btn-maroonFlush btn-flat" target="_blank">
                            <i class="fas fa-globe-americas"></i>
                          </a>
                          <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-maroonFlush btn-flat">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="{{ route('admin.product.image', $product->slug) }}" class="btn btn-maroonFlush btn-flat">
                            <i class="fas fa-camera"></i>
                          </a>
                          <a class="btn btn-maroonFlush btn-flat" data-toggle="modal" data-target="#productModal{{ $product->id }}">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                        <td>{{ $product->name }}</td>
                        <td class="fitwidth">{{ $product->active==1 ? 'Sim' : 'Não' }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $('#productTable').DataTable({
      language: dataTableLanguage
    });
  </script>
@endsection