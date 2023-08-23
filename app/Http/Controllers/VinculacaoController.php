<?php

namespace App\Http\Controllers;
use App\Models\Vinculacao;
use App\Models\Curso;
use App\Models\Funcao;
use App\Models\User;
use App\Models\Polo;

use Illuminate\Http\Request;

class VinculacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       //Fazendo buscas
       $user = User::findOrFail($id);
       $cursos = Curso::all();
       $funcoes = Funcao::all();
       
       /*$vinculacoes = Vinculacao::with('funcao', 'curso')
            ->where('user_id', $id)
            ->get();*/
        $vinculacoes = Vinculacao::with(['funcao', 'curso'])
            ->where('user_id', $id)
            ->withTrashed()
            ->get();

       return view('vinculacao.lista', compact('vinculacoes', 'user', 'cursos', 'funcoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::findOrFail($id);
        $cursos = Curso::all();
        $funcoes = Funcao::all();

        return view('vinculacao.cadastro', compact('cursos', 'funcoes', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => ['required', 'exists:users,id'],
            'edital' => ['required', 'string', 'max:255'],
            'curso' => ['required', 'exists:curso,id'],
            'funcao_uab' => ['required', 'exists:funcao,id'],
            'data_inicio' => ['required','date_format:Y-m-d'],
            'data_fim' => ['required','date_format:Y-m-d']
        ]);

        $vinculo = Vinculacao::create([
            'user_id' => $request->user,
            'funcao_uab_id' => $request->funcao_uab,
            'curso_id' => $request->curso,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
            'edital' => $request->edital
        ]);

       
        $vinculo->save();


        return redirect()->route('vinculacoes', $request->user)
                     ->with('success', 'Curso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Encontra a disciplina pelo ID
         $vinculo = Vinculacao::findOrFail($id);
         $user = request('user');
 
         // Realiza a exclusão
         $vinculo->delete();
 
         // Redireciona para uma página ou retorna uma resposta adequada
         return redirect()->route('vinculacoes', $user)->with('success', 'Vínculo excluída com sucesso!');
    }
}
