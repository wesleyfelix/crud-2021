<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto as ProdutoModel;

class Produto extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function listar ()
    {
        $produtos = ProdutoModel::all();
        $total = ProdutoModel::sum('valor');
        return view ('produtos.listar', [
            'produtos' => $produtos,
            'total' => $total]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function criar(Request $request)
    {
        if ($request->isMethod('post')) {
            //aqui ele pega todos os dados que vem do request e cria um novo produto
            $dados = $request->all();
            $dados['valor']= str_replace(",", ".", $dados['valor']);
            ProdutoModel::create($dados);
            return redirect(route('produto.listar'));
        }
        //aqui é redirecionado para o formulário de criação
        return view('produtos.novo');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function editar($id)
    {
        //aqui ele pega o produto via parametro (id)
        $produto = ProdutoModel::find($id);

        //com o id, ele gera o formulário de edição do produto selecionado
        return view ('produtos.editar', ['produto'=> $produto]);
    }

    public function salvar (Request $request)
    {
        //aqui é pego o produto pelo id
        $produto = ProdutoModel::find($request->get('id'));

        //aqui é pego os dados enviados no submit
        $dados = $request->all();


        $dados['valor']= str_replace(",", ".", $dados['valor']);
        //os dados do submit é alterado no cliente que foi pego pelo id
        $produto->fill($dados);

        //aqui é alterado o produto
        $produto->save();

        //por fim, é redirecionado pra tela de listagem
        return redirect(route('produto.listar'));
    }

    public function deletar ($id)
    {
        //é pego o produto pelo id
        $produto = ProdutoModel::find($id);

        //depois de pegar id, ele é deletado
        $produto->delete();
        return redirect()->back();
    }


}
