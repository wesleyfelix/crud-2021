@extends('layouts.app')
@section('content')
    <h3 class="page-header">Listagem de Empresas</h3>
    <h4><a class="btn btn-success" href="{{ route('empresa.novo') }}">novo</a></h4>
<div class="align-content-center">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col" >Razão Social</th>
            <th scope="col" >CNPJ</th>
            <th scope="col" >Status</th>
            <th scope="col" >Ações</th>
        </tr>
        </thead>
    @foreach($empresas as $empresa)
    <tbody>
    <tr>
        <th scope="row">{{ $empresa->id }}</th>
        <td>{{ $empresa->razao_social }}</td>
        <td>{{ $empresa->cnpj }}</td>
        <td>{{ $empresa->status }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('empresa.editar', ['id'=>$empresa->id]) }}">editar</a>
            <a class="btn btn-danger" href="{{ route('empresa.deletar', ['id'=>$empresa->id]) }}">deletar</a>
        </td>
    </tr>
    </tbody>
    @endforeach
</table>
</div>
@stop
