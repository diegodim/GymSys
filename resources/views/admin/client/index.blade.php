@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cliente</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Início</a></li>
        <li class="active"><a>Cliente</a></li>
    </ol>
@stop

@section('content')
@include('admin.template.message')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.min.js"></script>
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-4">
                    @include('admin.template.search')
                </div>
                <div class="col-sm-8">
                    <a href="{{ route('client.create') }}"  class="btn btn-success pull-right"><i class="fas fa-plus"></i> Cadastrar</a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Endereço</th>
                        <th width="100px">Ações</th>
                    </tr>
                </thead>
                @forelse ($clients as $client)
                <tbody>
                    <tr>
                        <td>{{ $client->person->name }}</td>
                        <td id='cpf'>{{ $client->person->cpf }}</td>
                       @if ($client->person->neighborhood != '')
                       <td>{{ $client->person->adress }}, {{ $client->person->neighborhood }}</td>
                       @else
                       <td>{{ $client->person->adress }}</td>
                       @endif


                        <td>
                            <a href="{{ route('client.edit', ['client'=>$client]) }}"  class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $client->person->id }})" data-target="#deleteModal" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                @empty
                <tbody>
                    <tr>
                    <td><b>Nenhum cliente encontrado!</b></td>
                    </tr>
                </tbody>
                @endforelse
            </table>
            </div>
        </div>
        <div class="pull-right">
            {{ $clients->links() }}
        </div>
        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
              <!-- Modal content-->
              <form action="" id="deleteForm" method="post">
                  <div class="modal-content">
                      <div class="modal-header bg-danger">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmação de exclusão!</h4>
                      </div>
                      <div class="modal-body">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <p id="deleteMessage" class="text-center">Deseja realmente excluir o cliente?</p>
                      </div>
                      <div class="modal-footer">

                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Sim, Deletar</button>
                      </div>
                  </div>
              </form>
            </div>
        </div
    </div>
    <script type="text/javascript">
        $("td[id*='cpf']").inputmask({mask: '999.999.999-99'});
        function deleteData(id)
        {
            var id = id;
            var url = '{{ route("client.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }

     </script>
@stop
