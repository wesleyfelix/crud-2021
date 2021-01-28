@extends('layouts.app')
@section('content')
    <h3 class="page-header">Listagem de Empresas</h3>
    <h4>Total de empresas inativas: {{ $totalInativos }}</h4>
    <h4><a class="btn btn-success" href="{{ route('empresa.novo') }}">novo</a></h4>
<div class="align-content-center" style="padding: 10px;
    margin: 10px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">Razão Social</th>
            <th scope="col" class="text-center">CNPJ</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Ações</th>
        </tr>
        </thead>
    @foreach($empresas as $empresa)
    <tbody>
    <tr>
        <th scope="row" class="text-center">{{ $empresa->id }}</th>
        <td class="text-center">{{ $empresa->razao_social }}</td>
        <td class="text-center">{{ $empresa->cnpj }}</td>
        <td class="text-center">{{ $empresa->status }}</td>
        <td class="text-center">
            <a class="btn btn-info" href="{{ route('empresa.editar', ['id'=>$empresa->id]) }}">editar</a>
            <a class="btn btn-danger" href="{{ route('empresa.deletar', ['id'=>$empresa->id]) }}">deletar</a>
        </td>
    </tr>
    </tbody>
    @endforeach
</table>
</div>
@stop
