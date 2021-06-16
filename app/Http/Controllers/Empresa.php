<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa as EmpresaModel;

class Empresa extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function listar (Request $request)
    {
        $razao_social = $request->get('razao_social', false);
        $status = $request->get('status', false);

        $empresas = EmpresaModel::select([
            'id',
            'razao_social',
            'cnpj',
            'status'
        ]);

        if($razao_social !== false){
            $empresas->where('razao_social','like', '%'.$razao_social.'%');
        }

        if($status !== false){
            $empresas->where('status', $status);
        }

        $empresas = $empresas->get();
        return view('empresas.listar',
            [
                'empresas'=>$empresas,
                'totalInativos' => EmpresaModel::getTotal('Inativo')
            ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function criar(Request $request)
    {
        if ($request->isMethod('post')) {
            $dados = $request->all();
            EmpresaModel::create($dados);
            return redirect(route('empresa.listar'));
        }
        return view('empresas.novo');
    }

    public function editar($id)
    {
        $empresa = EmpresaModel::find($id);

        return view('empresas.editar', ['empresa'=>$empresa]);
    }

    public function salvar(Request $request)
    {
        $empresa = EmpresaModel::find($request->get('id'));
        $dados = $request->all();
        $empresa->fill($dados);
        $empresa->save();
        return redirect(route('empresa.listar'));
    }

    public function deletar ($id)
    {
        $empresa = EmpresaModel::find($id);
        $empresa->delete();
        return redirect()->back();
    }

}
