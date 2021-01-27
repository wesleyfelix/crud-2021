@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?php echo asset('js/teste.js')?>"></script>

    <h3 class="page-header">Editando a Empresa ID: {{ $empresa->id }}</h3>

    <form action="{{ route('empresa.salvar') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $empresa->id }}">
        <div class="row" style="padding: 10px;
    margin: 10px;">
            <div class="form-group col-md-4">
                <label for="razao_social">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{ $empresa->razao_social }}">
            </div>

            <div class="form-group col-md-4">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="cnpj form-control" id="cnpj" name="cnpj" value="{{ $empresa->cnpj }}">
            </div>

            <div class="form-group col-md-3">
                <label for="status">Status</label>
                <div>
                    <select name="status" class="form-control">
                        <option value="" selected>Selecione um status</option>
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="cep">CEP</label>
                <input type="text" class="cep form-control" id="cep" name="cep" onblur="pesquisacep(this.value);" value="{{ $empresa->cep }}">
            </div>
            <div class="form-group col-md-2">
                <label for="rua">Rua</label>
                <input name="rua" class="form-control" type="text" id="rua" value="{{ $empresa->rua }}"/>
            </div>

            <div class="form-group col-md-2">
                <label for="bairro">Bairro</label>
                <input name="bairro" class="form-control" type="text" id="bairro" value="{{ $empresa->bairro }}"/>
            </div>

            <div class="form-group col-md-2">
                <label for="cidade">Cidade</label>
                <input name="cidade" type="text" class="form-control" id="cidade" value="{{ $empresa->cidade }}"/>
            </div>
            <div class="form-group col-md-2">
                <label for="uf">Estado</label>
                <input name="uf" type="text" class="form-control" id="uf" value="{{ $empresa->uf }}"/>
            </div>
            <div class="form-group col-md-1">
                <label for="numero">Número</label>
                <input name="numero" type="text" class="form-control" id="numero" value="{{ $empresa->numero }}"/>
            </div>
            <div id="actions" class="row" style="padding: 10px;
    margin: 10px;">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="{{ route('empresa.listar') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
@stop
