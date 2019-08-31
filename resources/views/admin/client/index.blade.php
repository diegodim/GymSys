@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cliente</h1>
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Cliente</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-xs-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar">
                        <span class="input-group-btn">
                            <a haref="" class="btn btn-info btn-flat"><i class="fas fa-search"></i> Buscar</a>
                        </span>
                    </div>
                </div>
                <div class="col-xs-8">
                    <a haref=""  class="btn btn-success btn-flat pull-right"><i class="fas fa-plus"></i> Cadastrar</a>
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
                        <th>Identidade</th>
                        <th width="100px">Ações</th>
                    </tr>
                </thead>
                @forelse ($people as $person)
                <tbody>
                    <tr>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->cpf }}</td>
                        <td>{{ $person->id_number }}</td>
                        <td></td>
                    </tr>
                </tbody>
                @empty
                    <p>No clients</p>
                @endforelse
            </table>
            </div>
            {{ $people->links() }}
        </div>
    </div>
@stop
