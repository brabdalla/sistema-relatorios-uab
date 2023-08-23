<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcao;

class FuncaoController extends Controller
{

    
    public function index()
    {
        $funcoes = Funcao::all();
        return view('funcao.lista', compact('funcoes'));
    }
    
    public function create()
    {
        return view('funcao.cadastro');
    }

   
    public function store(Request $request)
    {

       
        $request->validate([
            'nome_funcao' => ['required', 'string', 'max:255'],
        ]);

        $funcao = Funcao::create([
            'nome_funcao' => $request->nome_funcao
        ]);

       
        $funcao->save();


        return redirect()->route('funcoes')
                     ->with('success', 'Função cadastrado com sucesso!');


      
    }

    
}
