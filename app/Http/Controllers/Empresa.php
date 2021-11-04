<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa as EmpresaModel;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\WebDriverWindow;
use \Facebook\WebDriver\WebDriverBy;


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
//        dd($request->get('status'));
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

    public function robo ($id)
    {
        $empresa = EmpresaModel::find($id);
        $host = 'http://localhost:4444/wd/hub';

        $capabilities = DesiredCapabilities::firefox();

        $driver = RemoteWebDriver::create($host, $capabilities);




        $driver->manage()->window()->maximize();

        sleep(1);
        $driver->get('https://www.ibge.gov.br/explica/codigos-dos-municipios.php')->wait(1, 100000);
        sleep(2);
        $driver->findElement(WebDriverBy::className('input-codigos'))
            ->sendKeys($empresa->cidade);
        sleep(2);
        $dado = $driver->findElement(WebDriverBy::className('numero'))->getText();
        echo $dado;
        $driver->takeScreenshot('/home/wesley/Selenium/'.$empresa->cidade.'ibge.png');
        $driver->get('https://pt.wikipedia.org/wiki/Wikip%C3%A9dia:P%C3%A1gina_principal');

        $driver->findElement(WebDriverBy::name('search'))
            ->sendKeys($empresa->cidade)
            ->submit();
        sleep(2);
        $driver->takeScreenshot('/home/wesley/Selenium/'.$empresa->cidade.'.png');


        $driver->quit();
        return redirect(route('empresa.listar'));
    }
}
