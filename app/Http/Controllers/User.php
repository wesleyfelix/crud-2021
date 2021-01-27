<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function listar()
    {
        $usuarios = UserModel::all();
        return view ('usuarios.listar', [ 'usuarios' => $usuarios]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function criar(Request $request)
    {
        if ($request->isMethod('post')) {
            $dados = $request->all();
            $dados['password'] = Hash::make($dados['password']);
            UserModel::create($dados);
            return redirect(route('usuario.listar'));
        }
        return view('usuarios.novo');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function editar($id)
    {
        $usuario = UserModel::find($id);
        return view ('usuarios.editar',['usuario'=>$usuario]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function salvar(Request $request)
    {
        $usuario = UserModel::find($request->get('id'));
        $dados = $request->all();
        if($dados['password'] == null ){

            $dados['password'] = $usuario['password'];

        }else{

            $dados['password'] = Hash::make($dados['password']);
        }
        $usuario->fill($dados);
        $usuario->save();
        return redirect(route('usuario.listar'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletar($id)
    {
        $usuario = UserModel::find($id);
        $usuario->delete();
        return redirect()->back();
    }

}
