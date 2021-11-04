@extends('layouts.app')
@section('content')
    <div style="padding: 10px;
    margin: 10px;">
        <form class="subscribe-form formFilter" method="get" id="filtro" action="{{ route('empresa.listar') }}">
            <div class="input-field col s4">
                <input id="pesquisar" name="razao_social"
                       value="{{ \Request::get('razao_social') }}"
                       type="text" class="validate"
                       placeholder="Procure por razão social da empresa">
                <label for="pesquisar">Buscar</label>
                <div class="form-group col-md-3">
                    <label for="status">Status</label>
                    <div>
                        <select name="status" class="form-control">
                            <option value="" selected>Selecione um status</option>
                            @foreach(\App\Models\Empresa::$status as $key => $value)
                                <option value="{{ $key }}" {{\Request::get('status') == $key ? 'selected' : ''}}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input-field col s12">
                    <input type="submit" class="waves-effect waves-light btn blue" value="Filtrar" />
{{--                    <input type="button" class="waves-effect waves-light btn red" id="clean_filters" value="Limpar" />--}}
                </div>
            </div>
        </form>
    </div>
    <div class="align-content-center" style="padding: 10px;
    margin: 10px;">
        <h3 class="page-header">Listagem de Empresas</h3>
        <h4>Total de empresas inativas: {{ $totalInativos }}</h4>
        <h4><a class="btn btn-success" href="{{ route('empresa.novo') }}">novo</a></h4>
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
            <a class="btn btn-success" href="{{ route('empresa.robo', ['id'=>$empresa->id]) }}">robô</a>
        </td>
    </tr>
    </tbody>
    @endforeach
</table>
</div>
@stop
