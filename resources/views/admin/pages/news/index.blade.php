@extends('admin.pages.layout')
@section('head')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
@endsection
@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1>Informativos</h1>
        </div>
        <div class="col">
          <a href="{{ route('admin.news.create') }}" class="btn btn-flat btn-maroonFlush float-right">
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
              <h3 class="card-title">Lista de informativos</h3>
            </div>
            <!-- /.card-header -->
            {{--  card body--}}
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <table id="newsTable" class="table table-bordered table-striped order-column ">
                    <thead>
                    <tr>
                      <th>Ações</th>
                      <th>Título</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                      <!-- Modal -->
                      <div class="modal fade" id="newsModal{{ $new->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Excluir informativo</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Deseja excluir o informativo<br>
                              "{{ $new->title }}"?
                            </div>
                            <div class="modal-footer">
                              <form action="{{ route('admin.news.destroy', ["news"=> $new->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="news" value="{{ $new->id }}">
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
                          <a href="{{ route('website.news.detail', ['news'=>$new->slug]) }}" class="btn btn-maroonFlush btn-flat" target="_blank">
                            <i class="fas fa-globe-americas"></i>
                          </a>
                          <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-maroonFlush btn-flat">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="{{ route('admin.news.image', $new->slug) }}" class="btn btn-maroonFlush btn-flat">
                            <i class="fas fa-camera"></i>
                          </a>
                          <a class="btn btn-maroonFlush btn-flat" data-toggle="modal" data-target="#newsModal{{ $new->id }}">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                        <td>{{ $new->title }}</td>
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
    $('#newsTable').DataTable({
      language: dataTableLanguage
    });
  </script>
@endsection