@extends('layouts.app')
@section('content')
    <h3 class="page-header">Listagem de Produtos</h3>
    <h4><a class="btn btn-success" href="{{ route('produto.novo') }}">novo</a></h4>
<div class="align-content-center">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col" >Nome</th>
            <th scope="col" >Valor</th>
            <th scope="col" >Ações</th>
        </tr>
        </thead>
    @foreach($produtos as $produto)
    <tbody>
    <tr>
        <th scope="row">{{ $produto->id }}</th>
        <td>{{ $produto->nome }}</td>
        <td>R$ {{ str_replace(".", ",",$produto->valor) }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('produto.editar', ['id'=>$produto->id]) }}">editar</a>
            <a class="btn btn-danger" href="{{ route('produto.deletar', ['id'=>$produto->id]) }}">deletar</a>
        </td>
    </tr>
    </tbody>
    @endforeach
</table>
</div>
@stop
