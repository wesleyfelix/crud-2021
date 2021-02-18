@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script type="text/javascript" src="<?php echo asset('js/teste.js')?>"></script>
    <h3 class="page-header">Criando Produto</h3>


    <form action="{{ route('compra.criar') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row" style="padding: 10px;
    margin: 10px;">
            <div class="custom-control custom-checkbox">
                @foreach($produtos as $produto)
                    <div class="form-check" >
                        <input class="form-check-input" type="checkbox" name="produto_id" value="{{ $produto->id }}" id="defaultCheck1" >
                        <label class="form-check-label" for="defaultCheck1">
                            {{ $produto->nome }} - Valor: R$ {{ $produto->valor }}
                        </label>
                    </div>
                @endforeach
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            </div>
        </div>

        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Comprar</button>
                <a href="{{ route('compra.listar') }}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

@stop
