@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>Registrar Pagamento</h1>
    <ol class="breadcrumb">

        <li><a href="{{ route('admin.home') }}">Início</a></li>
        <li><a href="{{ route('admin.payment') }}">Pagamento</a></li>
        <li class="active"><a>Registrar</a></li>

    </ol>

@stop

@section('content')
@include('admin.template.message')
    <div class="box">

        <div class="box-header">

        </div>
        <div class="box-body">
            <form method="POST" action="{{ route('payment.store', ['client'=>$client]) }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row" >
                            <div class="col-lg-4">Nome do cliente:</div>

                            <label class="col-lg-8 col-form-label" >{{ isset($client) ?  $client->person->name : '' }}</label>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row" >
                            <div class="col-lg-4">CPF do cliente:</div>

                            <label class="col-lg-8 col-form-label" >{{ isset($client) ?  $client->person->cpf : '' }}</label>

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row" >
                                <div class="col-lg-4">Situação:</div>

                            @if(isset($client->payment))
                                @if(Carbon\Carbon::parse($client->payment->due_at)->addDays(1) <  Carbon\Carbon::now())
                                <label class="col-lg-8 col-form-label" >Inadimplente</label>
                                @else
                                <label class="col-lg-8 col-form-label" >Adimplente</label>
                                @endif
                            @else
                            <label class="col-lg-8 col-form-label" >-</label>

                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row" >
                                <div class="col-lg-4">Vencimento:</div>

                            <label class="col-lg-8 col-form-label" >{{  isset($client->payment) ?  Carbon\Carbon::parse($client->payment->due_at)->format('d/m/Y') :  Carbon\Carbon::today()->format('d/m/Y') }}</label>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row" >
                                <div class="col-lg-4">Data de pagamento:</div>
                            <label class="col-lg-8 col-form-label" >{{ Carbon\Carbon::today()->format('d/m/Y') }}</label>
                            <input class="form-control" type="hidden" id="paid_at" name="paid_at" value="{{ Carbon\Carbon::today() }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row" >
                                <div class="col-lg-4">Proximo pagamento:</div>
                            @if(isset($client->payment))
                            <label class="col-lg-8 col-form-label" >{{ Carbon\Carbon::parse($client->payment->due_at)->addMonths($client->plan->months)->format('d/m/Y') }}</label>
                            <input class="form-control" type="hidden" id="due_at" name="due_at" value="{{ Carbon\Carbon::parse($client->payment->due_at)->addMonths($client->plan->months) }}">
                            @else
                            <label class="col-lg-8 col-form-label" >{{ Carbon\Carbon::today()->addMonths($client->plan->months)->format('d/m/Y') }}</label>
                            <input class="form-control" type="hidden" id="due_at" name="due_at" value="{{ Carbon\Carbon::today()->addMonths($client->plan->months)}}">
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group row {{ $errors->has('value') ? 'has-error' : '' }}" >
                            <label style="font-weight:normal" class="col-lg-4" for="value">Valor do pagamento:</label>
                            <div class="col-lg-8">
                                <div class="input-group mb-3">
                                    <span class="input-group-addon">R$</span>
                                    <input min="0" max="99999" maxlength="11" class="form-control" type="number" placeholder="Valor" id="value" name="value" value="{{ old('value') }}">
                                    <span class="input-group-addon">,00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row" >
                                <div class="col-lg-4">Tipo de plano:</div>

                            <label class="col-lg-8 col-form-label" >{{ $client->plan->name }}</label>

                        </div>
                    </div>
                </div>
                <div class="form-group pull-right">
                    <button class="btn btn-success" type="submit" ><i class="fas fa-dollar-sign"></i> Pagar</button>
                </div>
            </form>
        </div>
    </div>

@stop
