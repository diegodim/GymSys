@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Pagamento</h1>
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
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Situação</th>
                        <th>Vencimento</th>
                        <th width="80px">Pagar</th>
                    </tr>
                </thead>
                @forelse ($clients as $client)
                <tbody>
                    <tr>
                        <td>{{ $client->person->name }}</td>
                        <td>{{ $client->person->cpf }}</td>
                        @if(isset($client->payment))
                            @if(Carbon\Carbon::parse($client->payment->due_at)->addDays(1) <  Carbon\Carbon::now())
                            <td>Inadimplente</td>
                            @else
                            <td>Adimplente</td>
                            @endif
                        <td>{{ Carbon\Carbon::parse($client->payment->due_at)->format('d/m/Y') }}</td>
                        @else
                        <td>-</td>
                        <td>{{ Carbon\Carbon::today()->format('d/m/Y') }}</td>
                        @endif
                        <td>
                            <a href="{{ route('client.edit', ['client'=>$client]) }}"  class="btn btn-warning btn-sm">
                                <i class="fas fa-dollar-sign"></i>
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
