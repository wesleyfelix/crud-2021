@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?php echo asset('js/teste.js')?>"></script>

    <h3 class="page-header">Editando o Produto ID: {{ $produto->id }}</h3>

    <form action="{{ route('produto.salvar') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $produto->id }}">
        <div class="row" style="padding: 10px;
    margin: 10px;">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}">
            </div>

            <div class="form-group col-md-4">
                <label for="idade">Valor</label>
                <input type="text" class="dinheiro form-control" id="valor" name="valor" value="{{ $produto->valor  }}">
            </div>

        </div>

        <hr />
        <div id="actions" class="row" style="padding: 10px;
    margin: 10px;">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="{{ route('produto.listar') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>
@stop
