<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa as EmpresaModel;

class Empresa extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function listar ()
    {
        $empresas = EmpresaModel::all();
        $totalInativos = EmpresaModel::select('id')
            ->where('status', '=', 'Inativo')->count();
        return view('empresas.listar',
            [
                'empresas'=>$empresas,
                'totalInativos' => $totalInativos
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
