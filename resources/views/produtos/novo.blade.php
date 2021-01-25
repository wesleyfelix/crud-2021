@extends('layouts.app')
@section('content')
    <h3 class="page-header">Criando Produto</h3>

    <form action="{{ route('produto.criar') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>

            <div class="form-group col-md-4">
                <label for="idade">Valor</label>
                <input type="text" class="form-control" id="valor" name="valor">
            </div>

        </div>
        
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="{{ route('produto.listar') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

@stop
