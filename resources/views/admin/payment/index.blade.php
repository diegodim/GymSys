@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cliente</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Início</a></li>
        <li class="active"><a>Pagamento</a></li>
    </ol>
@stop

@section('content')
@include('admin.template.message')
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
                        <td>{{ $client->person->cpf }}</td>
                        <td>{{ $client->person->adress }} {{ $client->person->neighborhood }}</td>
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
    </div>
@stop
