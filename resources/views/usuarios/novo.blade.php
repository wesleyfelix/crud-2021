@extends('layouts.app')
@section('content')

    <h3 class="page-header">Criando Empresa</h3>

    <form action="{{ route('usuario.criar') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row" style="padding: 10px;
    margin: 10px;">
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group col-md-4">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group col-md-4">
                <label for="password">Senha</label>
                <input name="password" type="password" class="form-control" id="password"/>
            </div>
        </div>

        <div id="actions" class="row" style="padding: 10px;
    margin: 10px;">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="{{ route('usuario.listar') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

@stop
