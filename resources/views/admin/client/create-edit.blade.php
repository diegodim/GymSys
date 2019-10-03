@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @if(isset($client))
    <h1>Editar Cliente</h1>
    @else
    <h1>Cadastrar Cliente</h1>
    @endif

    <ol class="breadcrumb">
        @if(isset($client))
        <li><a href="{{ route('admin.home') }}">Início</a></li>
        <li><a href="{{ route('admin.client') }}">Cliente</a></li>
        <li class="active"><a>Editar</a></li>
        @else
        <li><a href="{{ route('admin.home') }}">Início</a></li>
        <li><a href="{{ route('admin.client') }}">Cliente</a></li>
        <li class="active"><a>Cadastrar</a></li>
        @endif
    </ol>

@stop

@section('content')
@include('admin.template.message')
    <div class="box">

        <div class="box-header">

        </div>
        <div class="box-body">
        @if(isset($client))
            <form class="form" method="post" action="{{ route('client.update', ['client'=>$client]) }}">
             @method('put')
        @else
            <form method="POST" action="{{ route('client.store') }}">
        @endif
                @csrf
                <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}" >
                    <label for="name" class="col-lg-1 col-form-label">Nome:</label>
                    <div class="col-lg-11">
                        <input maxlength="50" size="50" class="form-control" type="text" placeholder="Nome" id="name" name="name" value="{{ old('name',  isset($client) ?  $client->person->name : '') }}">
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('cpf') ? 'has-error' : '' }}" >
                    <label for="cpf" class="col-lg-1 col-form-label">CPF:</label>
                    <div class="col-lg-11">
                            <input min="0" max="99999999999" maxlength="11" class="form-control" type="number" placeholder="CPF" id="cpf" name="cpf" value="{{  old('cpf', isset($client) ?  $client->person->cpf : '') }}">
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('id_number') ? 'has-error' : '' }}" >
                    <label for="id_number" class="col-lg-1 col-form-label">Idetidade:</label>
                    <div class="col-lg-11">
                        <input style="text-transform:uppercase" maxlength="10" size="10" class="form-control" type="text" placeholder="Indentidade" id="id_number" name="id_number" value="{{ old('id_number', isset($client) ?  $client->person->id_number : '') }}">
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('adress') ? 'has-error' : '' }}" >
                    <label for="adress" class="col-lg-1 col-form-label">Endereço:</label>
                    <div class="col-lg-11">
                        <input maxlength="50" size="50" class="form-control" type="text" placeholder="Endereço" id="adress" name="adress" value="{{ old('adress', isset($client) ?  $client->person->adress : '') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row {{ $errors->has('neighborhood') ? 'has-error' : '' }}" >
                            <label class="col-lg-2 col-form-label" for="neighborhood" >Bairro:</label>
                            <div class="col-lg-10">
                                <input maxlength="50" size="50" class="form-control" type="text" placeholder="Bairro" id="neeighborhood" name="neighborhood" value="{{ old('neighborhood', isset($client) ?  $client->person->neighborhood : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row {{ $errors->has('postal') ? 'has-error' : '' }}" >
                            <label class="col-lg-3 col-form-label" for="postal" >CEP:</label>
                            <div class="col-lg-9">
                                <input min="0" max="99999999" maxlength="8" class="form-control" type="number" placeholder="CEP" id="postal" name="postal" value="{{ old('postal', isset($client) ?  $client->person->postal : '') }}">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row {{ $errors->has('city') ? 'has-error' : '' }}" >
                            <label class="col-lg-2 col-form-label" for="city" >Cidade:</label>
                            <div class="col-lg-10">
                                <input maxlength="50" size="50" class="form-control" type="text" placeholder="Cidade" id="city" name="city" value="{{ old('city', isset($client) ?  $client->person->city : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row {{ $errors->has('state_id') ? 'has-error' : '' }}" >
                            <label class="col-lg-3 col-form-label" for="state_id" >Estado:</label>
                            <div class="col-lg-9">
                                {{  Form::select('state_id', $states , old('state_id', isset($client) ?  $client->person->state_id : null), ['class'=>'form-control', 'placeholder'=>'Estado']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row {{ $errors->has('phone') ? 'has-error' : '' }}" >
                            <label class="col-lg-2 col-form-label" for="phone" >Telefone:</label>
                            <div class="col-lg-10">
                                <input min="0" max="99999999999" maxlength="11" class="form-control" type="number" placeholder="Telefone" id="phone" name="phone" value="{{ old('phone', isset($client) ?  $client->person->phone : '') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row {{ $errors->has('plan_id') ? 'has-error' : '' }}" >
                            <label class="col-lg-3 col-form-label" for="plan_id" >Tipo plano:</label>
                            <div class="col-lg-9">
                                    {{  Form::select('plan_id', $plans , old('plan_id', isset($client) ?  $client->plan_id : null), ['class'=>'form-control', 'placeholder'=>'Tipo de plano']) }}
                            </div>
                        </div>
                    </div>
                    <div id="biometricModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">
                              <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Insira o indicador direito</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <i class="fas fa-fingerprint fa-w-16 fa-7x pull-center"></i>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal" @click="doEdit()">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group pull-right">

                        <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#biometricModal" ><i class="fas fa-fingerprint"></i> Biometria</button>
                        <input class="form-control" type="hidden" id="biometric_hash" name="biometric_hash" value="{{ old('biometric_hash', isset($client) ?  $client->biometric_hash : null) }}">
                        <button class="btn btn-success" type="submit" ><i class="fas fa-save"></i> Salvar</button>
                </div>

            </form>

        </div>
    </div>

@stop
