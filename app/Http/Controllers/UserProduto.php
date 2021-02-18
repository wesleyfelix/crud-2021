<?php

namespace App\Http\Controllers;

use App\Models\UsersProdutos as UserProdutosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto as ProdutoModel;
use App\User as UserModel;

class UserProduto extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function listar()
    {
        if (Auth::user()->id == 1) {
            $userProduto = UserProdutosModel::select([
                'users_produtos.id as id',
                'p.nome as produto_nome',
                'p.valor as produto_valor',
                'u.name as usuario_nome'])
                ->join('produtos as p', 'p.id', '=', 'users_produtos.produto_id')
                ->join('users as u', 'u.id', '=', 'users_produtos.user_id')
                ->get();
            $total = $userProduto->sum('produto_valor');
            $total = number_format($total, 2, '.', '');

            return view ('compras.listar', [
                'compras' => $userProduto,
                'total' => $total
            ]);
        }

        $userProduto = UserProdutosModel::select([
            'users_produtos.id as id',
            'p.nome as produto_nome',
            'p.valor as produto_valor',
            'u.name as usuario_nome'])
            ->join('produtos as p', 'p.id', '=', 'users_produtos.produto_id')
            ->join('users as u', 'u.id', '=', 'users_produtos.user_id')
            ->where('users_produtos.user_id', Auth::user()->id)
            ->get();
        $total = $userProduto->sum('produto_valor');
        $total = number_format($total, 2, '.', '');

        return view ('compras.listar', [
            'compras' => $userProduto,
            'total' => $total
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
            UserProdutosModel::create($dados);
            return redirect(route('compra.listar'));
        }

        return view('compras.novo',['produtos'=>ProdutoModel::all()]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function editar($id)
    {
        $userProduto = UserProdutosModel::find($id);
        return view('compras.editar', ['userProduto'=>$userProduto]);
    }

    public function salvar(Request $request)
    {
        $userProduto = UserProdutosModel::find($request->get('id'));
        $dados = $request->all();
        $userProduto->fill($dados);
        $userProduto->save();
        return redirect(route('compras.listar'));
    }

    public function deletar($id)
    {
        $userProduto = UserProdutosModel::find($id);
        $userProduto->delete();
        return redirect()->back();
    }

}
