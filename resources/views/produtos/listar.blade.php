@extends('layouts.app')
@section('content')
    <h3 class="page-header">Listagem de Produtos</h3>
    <h3>Valor total de produtos R$: {{ str_replace(".", ",",$total) }}</h3>
    <h4><a class="btn btn-success" href="{{ route('produto.novo') }}">novo</a></h4>
<div class="align-content-center" style="padding: 10px;
    margin: 10px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">Nome</th>
            <th scope="col" class="text-center">Valor</th>
            <th scope="col" class="text-center">Ações</th>
        </tr>
        </thead>
    @foreach($produtos as $produto)
    <tbody>
    <tr>
        <th scope="row" class="text-center">{{ $produto->id }}</th>
        <td class="text-center">{{ $produto->nome }}</td>
        <td class="text-center">R$ {{ str_replace(".", ",",$produto->valor) }}</td>
        <td class="text-center">
            <a class="btn btn-info" href="{{ route('produto.editar', ['id'=>$produto->id]) }}">editar</a>
            <a class="btn btn-danger" href="{{ route('produto.deletar', ['id'=>$produto->id]) }}">deletar</a>
        </td>
    </tr>
    </tbody>
    @endforeach
</table>
</div>
@stop
