<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //recebendo o parametro
        $cursoId = $request->input('curso');

        $curso = Curso::find($cursoId);

        $disciplinas = $curso->disciplina;
        #dd($disciplinas);

        return view('disciplinas.lista', compact('disciplinas', 'curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nome_disciplina' => ['required', 'string', 'max:255'],
            'ch' => ['required', 'string', 'max:255'],
            'semestre_modulo' => ['required', 'string']
        ]);

        $disciplina = Disciplina::create([
            'curso_id' => $request->curso,
            'nome_disciplina' => $request->nome_disciplina,
            'ch' => $request->ch,
            'semestre_modulo' => $request->semestre_modulo
        ]);
       
        $disciplina->save();


        return redirect()->route('disciplinas', ['curso' => $request->curso])
                     ->with('success', 'Disciplina cadastrada com sucesso!');
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
        $disciplina = Disciplina::findOrFail($id);
        $curso = $disciplina['curso_id'];

        // Realiza a exclusão
        $disciplina->delete();

        // Redireciona para uma página ou retorna uma resposta adequada
        return redirect()->route('disciplinas', ['curso' => $curso])->with('success', 'Disciplina excluída com sucesso!');
    }
}
