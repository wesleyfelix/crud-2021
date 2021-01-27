@extends('layouts.app')
@section('content')
    <h3 class="page-header">Listagem de Usuarios</h3>
    <h4><a class="btn btn-success" href="{{ route('usuario.novo') }}">novo</a></h4>
<div class="align-content-center" style="padding: 10px;
    margin: 10px;">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">Nome</th>
            <th scope="col" class="text-center">E-mail</th>
            <th scope="col" class="text-center">Ações</th>
        </tr>
        </thead>
    @foreach($usuarios as $usuario)
    <tbody>
    <tr>
        <th scope="row" class="text-center">{{ $usuario->id }}</th>
        <td class="text-center">{{ $usuario->name }}</td>
        <td class="text-center">{{ $usuario->email }}</td>
        <td class="text-center">
            <a class="btn btn-info" href="{{ route('usuario.editar', ['id'=>$usuario->id]) }}">editar</a>
            <a class="btn btn-danger" href="{{ route('usuario.deletar', ['id'=>$usuario->id]) }}">deletar</a>
        </td>
    </tr>
    </tbody>
    @endforeach
</table>
</div>
@stop
