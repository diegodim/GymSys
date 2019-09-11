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
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar">
                        <span class="input-group-btn">
                            <a href="" class="btn btn-info"><i class="fas fa-search"></i> Buscar</a>
                        </span>
                    </div>
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
                        <td>{{ $client->person->cpf }}</td>
                        <td>{{ $client->person->adress }} {{ $client->person->neighborhood }}</td>
                        <td>
                            <a href="{{ route('client.edit', ['client'=>$client]) }}"  class="btn btn-info btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href=""  class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                @empty
                <tbody>
                    <tr>
                    <td><b>Nenhum cliente!</b></td>
                    </tr>
                </tbody>
                @endforelse
            </table>
            </div>
        </div>
        <div class="pull-right">
            {{ $clients->links() }}
        </div>
    </div>
@stop
