@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastro de Cliente</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Início</a></li>
        <li><a href="{{ route('admin.client') }}">Cliente</a></li>
        <li class="active"><a>Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            <form action="">
                <div class="form-group row" >
                    <label for="inputName" class="col-lg-1 col-form-label">Nome:</label>
                    <div class="col-lg-11">
                        <input class="form-control" type="text" placeholder="Nome" id="inputName">
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="inputIdNumber" class="col-lg-1 col-form-label">Indetidade:</label>
                    <div class="col-lg-11">
                        <input class="form-control" type="text" placeholder="Indentidade" id="inputIdNumber">
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="inputCpf" class="col-lg-1 col-form-label">CPF:</label>
                    <div class="col-lg-11">
                            <input class="form-control" type="text" placeholder="CPF" id="inputCpf">
                    </div>
                </div>
                <div class="form-group row" >
                    <label for="inputPublicPlace" class="col-lg-1 col-form-label">Logradouro:</label>
                    <div class="col-lg-11">
                        <input class="form-control" type="text" placeholder="Logradouro" id="inputPublicPlace">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row" >
                            <label class="col-lg-2 col-form-label" for="inputNeighborhood" >Bairro:</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" placeholder="Bairro" id="inputNeighborhood">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row" >
                            <label class="col-lg-2 col-form-label" for="inputCity" >CIdade:</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" placeholder="Cidade" id="inputCity">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row" >
                                <label class="col-lg-2 col-form-label" for="inputNeighborhood" >Bairro:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" placeholder="Bairro" id="inputNeighborhood">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row" >
                                <label class="col-lg-2 col-form-label" for="inputCity" >CIdade:</label>
                                <div class="col-lg-10">
                                    <input class="form-control" type="text" placeholder="Cidade" id="inputCity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row" >
                            <label for="inputName" class="col-lg-1 col-form-label">Nome:</label>
                            <div class="col-lg-11">
                                <input class="form-control" type="text" placeholder="Nome" id="inputName">
                            </div>
                        </div>
                <div>
                    <button class="btn btn-success pull-right" type="submit" ><i class="fas fa-save"></i> Salvar</button>
                </div>
            </form>

        </div>
    </div>
@stop
