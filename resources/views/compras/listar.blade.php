@extends('layouts.app')
@section('content')
    <h3 class="page-header">Listagem de Compras</h3>
    <h4>Valor total: R${{ str_replace(".", ",",$total)  }}</h4>
    <h4><a class="btn btn-success" href="{{ route('compra.novo') }}">nova compra</a></h4>
<div class="align-content-center" style="padding: 10px;
    margin: 10px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" class="text-center">ID</th>
            @if(Auth::user()->id == 1)
            <th scope="col" class="text-center">Usuario</th>
            @endif
            <th scope="col" class="text-center">Produto</th>
            <th scope="col" class="text-center">Valor</th>
            <th scope="col" class="text-center">Ações</th>
        </tr>
        </thead>
    @foreach($compras as $compra)
    <tbody>
    <tr>
        <th scope="row" class="text-center">{{ $compra->id }}</th>
        @if(Auth::user()->id == 1)
        <td class="text-center">{{ $compra->usuario_nome }}</td>
        @endif
        <td class="text-center">{{ $compra->produto_nome }}</td>
        <td class="text-center"> R$ {{ str_replace(".", ",",$compra->produto_valor) }}</td>
        <td class="text-center">
            <a class="btn btn-info" href="{{ route('compra.editar', ['id'=>$compra->id]) }}">editar</a>
            <a class="btn btn-danger" href="{{ route('compra.deletar', ['id'=>$compra->id]) }}">deletar</a>
        </td>
    </tr>
    </tbody>
    @endforeach
</table>
</div>
@stop
