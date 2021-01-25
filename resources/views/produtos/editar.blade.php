@extends('layouts.app')
@section('content')

    <h3 class="page-header">Editando o Produto ID: {{ $produto->id }}</h3>

    <form action="{{ route('produto.salvar') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $produto->id }}">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}">
            </div>

            <div class="form-group col-md-4">
                <label for="idade">Valor</label>
                <input type="text" class="form-control" id="valor" name="valor" value="{{ $produto->valor  }}">
            </div>

        </div>

        <hr />
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="{{ route('produto.listar') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>
@stop
