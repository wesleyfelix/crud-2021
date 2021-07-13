<?php

namespace App\Http\Controllers;

use App\Models\Colaborador;
use Illuminate\Http\Request;

class colaboradorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function listar()
    {

        $colaboradores = Colaborador::select([
            'colaborador.id as id',
            'colaborador.nome as colaborador_nome',
            'c.nome as cargo',
            'colaborador.adimissao as adimissao'
        ])
        ->join('cargo as c', 'c.id', '=', 'colaborador.cargo_id')
        ->get();

        return view ('colaboradores.listar', [
            'colaboradores' => $colaboradores
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function criar (Request $request)
    {
        if ($request->isMethod('post')) {
            $dados = $request->all();
            Colaborador::create($dados);
            return redirect(route('colaboradores.listar'));
        }

        return view('colaboradores.novo');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function editar($id)
    {
        $colaborador = Colaborador::find($id);

        return view('colaboradres.editar', ['colaborador'=>$colaborador]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function salvar(Request $request)
    {
        $colaborador = Colaborador::find($request->get('id'));
        $dados = $request->all();
        $colaborador->fill($dados);
        $colaborador->save();
        return redirect(route('colaboradores.listar'));
    }

    public function deletar ($id)
    {
        $colaborador = Colaborador::find($id);
        $colaborador->delete();
        return redirect()->back();
    }

}
