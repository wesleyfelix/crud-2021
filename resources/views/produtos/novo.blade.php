@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo asset('js/teste.js')?>"></script>
    <h3 class="page-header">Criando Produto</h3>


    <form action="{{ route('produto.criar') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>

            <div class="form-group col-md-4">
                <label for="valor">Valor</label>
                <input type="text" class="dinheiro form-control" id="valor" name="valor">
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
