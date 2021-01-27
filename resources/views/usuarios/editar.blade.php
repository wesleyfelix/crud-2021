@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?php echo asset('js/teste.js')?>"></script>

    <h3 class="page-header">Editando o usuário ID: {{ $usuario->id }}</h3>

    <form action="{{ route('usuario.salvar') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $usuario->id }}">
        <div class="row" style="padding: 10px;
    margin: 10px;">
            <div class="form-group col-md-4">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}">
            </div>

            <div class="form-group col-md-4">
                <label for="cnpj">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
            </div>


            <div class="form-group col-md-4">
                <label for="password">Senha</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="digite sua senha"/>
            </div>

            <div id="actions" class="row" style="padding: 10px;
    margin: 10px;">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <a href="{{ route('usuario.listar') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
@stop
