<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Coordenador;
use Carbon\Carbon;
use App\Models\User;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('curso.lista', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        return view('curso.cadastro', compact('usuarios'));
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
            'nome_curso' => ['required', 'string', 'max:255'],
            'oferta' => ['required', 'string', 'max:255'],
            'inicio_curso' => ['required','date_format:Y-m-d'],
            'fim_curso' => ['required','date_format:Y-m-d'],
            'coordenador_curso' =>['required']
        ]);

        $curso = Curso::create([
            'nome_curso' => $request->nome_curso,
            'oferta' => $request->oferta,
            'inicio_curso' => $request->inicio_curso,
            'fim_curso' => $request->fim_curso
        ]);

       
        $curso->save();

        $currentDate = Carbon::now();

        $coordenador = Coordenador::create([
            'user_coordenador_id' => $request->coordenador_curso,
            'curso_coordenador_id' => $curso->getKey(),
            'data_inicio' => $currentDate->format('Y-m-d'),
            'data_fim' => $request->fim_curso
        ]);


        return redirect()->route('cursos')
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
        $curso = Curso::find($id);
        $usuarios = User::all();
        return view('curso.alterar', compact('usuarios', 'curso'));
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
        //
    }
}
