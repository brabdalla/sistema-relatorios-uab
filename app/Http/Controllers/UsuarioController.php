<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vinculacao;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('users.lista', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');//
        
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'max:20', 'unique:users'],
            'rg' => ['required', 'string', 'max:100'],
            'data_nascimento' => ['required', 'max:255'],
            'telefone' => ['required', 'string', 'max:20'],
            'curso_superior' => ['required', 'string', 'max:255'],
            'pos_graduacao' => ['required', 'string', 'max:255'],
            'area_pos' => ['nullable','string', 'max:255'],
            'sexo' => ['required', 'string', 'max:5'],
            'cep' => ['required', 'string', 'max:15'],
            'endereco' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255']
        ]);

        $dataAtual = Carbon::now()->toDateString();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($dataAtual),
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'curso_superior' => $request->curso_superior,
            'pos_graduacao' => $request->pos_graduacao,
            'area_pos' => $request->area_pos,
            'sexo' => $request->sexo,
            'cep' => $request->cep,
            'endereco' => $request->endereco,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->estado
        ]);

        $user->save();


        return redirect()->route('usuarios')
                     ->with('success', 'Função cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //buscando o usuario
      $user = User::find($id);

      //$vinculacoes = $user->vinculacao;
      $vinculacoes = Vinculacao::with('funcao', 'curso')
            ->where('user_id', $id)
            ->get();

      return view('users.detalhes', compact('user', 'vinculacoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //buscando o usuario
      $user = User::find($id);


      return view('users.editar', compact('user'));
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
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'cpf' => ['required', 'string', 'max:20'],
            'rg' => ['required', 'string', 'max:100'],
            'data_nascimento' => ['required', 'max:255'],
            'telefone' => ['required', 'string', 'max:20'],
            'curso_superior' => ['required', 'string', 'max:255'],
            'pos_graduacao' => ['required', 'string', 'max:255'],
            'area_pos' => ['nullable','string', 'max:255'],
            'sexo' => ['required', 'string', 'max:5'],
            'cep' => ['required', 'string', 'max:15'],
            'endereco' => ['required', 'string', 'max:255'],
            'bairro' => ['required', 'string', 'max:255'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255']
        ]);

    

        $user->update($request->all());


        return redirect()->route('usuarios')
                     ->with('success', 'dados cadastrado com sucesso!');
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
        $user = User::findOrFail($id);
        // Realiza a exclusão
        $user->delete();

        // Redireciona para uma página ou retorna uma resposta adequada
        return redirect()->route('usuarios')->with('success', 'Usuário desativado com sucesso!');
    }

    public function bolsistasCurso()
    {

        //pega usuário logado
        $user = auth()->user();
        //verifica se usuário é coordenador
       
        $vinculacoes = Vinculacao::with(['funcao', 'curso'])
            ->where('user_id', $user->id)
            ->get();

        
        $dataAtual = Carbon::now();
        $resultado = null;
        

        foreach($vinculacoes as $vindulo){
            if ($dataAtual->between($vindulo->data_inicio, $vindulo->data_fim) && $vindulo->deleted_at == NULL) {
                $resultado = $vindulo;
                break;
            }

        }
        if ($resultado == null) {
            ///não foi encontrado vinculo ativo
        }else{
           

            $bolsistas = Vinculacao::with(['user', 'curso', 'funcao'])
            ->where('curso_id', $resultado->curso->id)
            ->get();

            #dd($bolsistas);
            return view('users.listaBolsistas', compact('bolsistas'));
     

        }
      



    }


}
