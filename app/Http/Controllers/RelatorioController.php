<?php

namespace App\Http\Controllers;

use App\Models\Vinculacao;
use App\Models\Curso;
use App\Models\Funcao;
use App\Models\User;
use App\Models\Relatorio;
use App\Models\Coordenador;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = auth()->user();
        
        $relatorios = Relatorio::with(['vinculo', 'coordenador'])
            ->where('vinculo_id', $id)
            ->get();

        
        if (!empty($relatorios->items)) {
            $cursos = null;
            $funcoes = null;

           
        }else{
            $cursos = Curso::find($relatorios[0]->vinculo->curso_id);
            $funcoes = Funcao::find($relatorios[0]->vinculo->funcao_uab_id);

           
        }

       
      
       
      
     
        return view('relatorio.listaRelatorios', compact('relatorios', 'user', 'cursos', 'funcoes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vinculos()
    {
        $user = auth()->user();
        $vinculacoes = Vinculacao::with(['funcao', 'curso'])
            ->where('user_id', $user->id)
            ->get();

        $cursos = Curso::all();
        $funcoes = Funcao::all();
      
     
        return view('relatorio.listaVinculo', compact('vinculacoes', 'user', 'cursos', 'funcoes'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = auth()->user();

        $vinculacoes = Vinculacao::with(['funcao', 'curso'])
            ->where('user_id', $usuario->id)
            ->get();
        
        return view('relatorio.cadastro',compact('vinculacoes','usuario'));
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
            'usuario' => ['required', 'exists:users,id'],
            'vinculo' => ['required', 'exists:vinculo,id'],
            'referencia' => ['required','date_format:Y-m-d'],
            'descricao' => ['required','string',],
            
        ]);

        #$vinculacoes = Vinculacao::findOrFail($request->vinculo);
        $vinculacoes = Vinculacao::with(['curso'])
            ->where('id', $request->vinculo)
            ->get();

        #$curso = Curso::findOrFail($vinculacoes[0]->curso->id);
        $coordenador = Coordenador::with(['user','curso'])
            ->where('curso_coordenador_id', $vinculacoes[0]->curso->id)
            ->get();

        #dd($coordenador[0]->user->id);  
    

        $relatorio = Relatorio::create([
            'vinculo_id' => $request->vinculo,
            'descrição_atividades' => $request->descricao,
            'mes_ano_referencia' => $request->referencia,
            'user_coordenador_id' => $coordenador[0]->user->id
        ]);

       
        $relatorio->save();


        return redirect()->route('lista.relatorio', $request->vinculo)
                     ->with('success', 'Relatório salvo com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relatorios = Relatorio::with(['vinculo', 'coordenador'])
            ->where('id', $id)
            ->get();

        //dd($relatorios);


        $vinculacao = Vinculacao::with(['funcao', 'curso'])
            ->where('id', $relatorios[0]->vinculo->id)
            ->get();
      
        #dd($vinculacao);
      
     
        return view('relatorio.editar', compact('relatorios', 'vinculacao'));
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
        
        
        $request->validate([
            'descricao' => ['required','string'],
            
        ]);
               
        $relatorio = Relatorio::find($id);


        $relatorio->descrição_atividades = $request->descricao;
        $relatorio->hash_validacao_bolsista = NULL;
        $relatorio->data_validacao_bolsista = NULL;
            

    
       
        $relatorio->save();


        return redirect()->route('lista.relatorio', $relatorio->vinculo_id )
                     ->with('success', 'Relatório atualizado com sucesso!');
    }

    /**
     * Gera PDF do relatório.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gerarPdf($id)
    {
        $relatorios = Relatorio::with(['vinculo', 'coordenador'])
            ->where('id', $id)
            ->get();

        #dd($relatorios);


        $vinculacao = Vinculacao::with(['funcao', 'curso', 'user'])
            ->where('id', $relatorios[0]->vinculo->id)
            ->get();

        #dd($vinculacao);

        $data = [
            'relatorio' => $relatorios[0],
            'vinculo' => $vinculacao[0]
        ];

        $pdf = PDF::loadView('PDF.modelo', $data);

        return $pdf->download('relatorio.pdf');
    }

    /**
     * Gera lista de relatórios.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function relatorioMensal()
    {
        $anoInicial = 2023;
        $dataAtual = Carbon::now();
        $anoAtual = $dataAtual->year; // Obtém o ano atual
        $diferencaAnos = $anoAtual - $anoInicial;

        return view('relatorio.relatoriosMensal',compact('anoInicial','diferencaAnos','anoAtual'));

    }

    public function relatorioMensalBusca(Request $request)
    {

        $anoInicial = 2023;
        $dataAtual = Carbon::now();
        $anoAtual = $dataAtual->year; // Obtém o ano atual
        $diferencaAnos = $anoAtual - $anoInicial;
   
        // Salvar os parâmetros na sessão
        Session::put('ano', $request->ano);
        Session::put('mes', $request->mes);
        $ano = $request->ano;
        $mes = $request->mes;
        
        $dataInicio = $ano."-".$mes."-01";
        $dataFim = $ano."-".$mes."-31";
        
        $relatorios = Relatorio::with(['vinculo.user'])
            ->whereBetween('mes_ano_referencia', [Carbon::parse($dataInicio), Carbon::parse($dataFim)])
            ->get();

        return view('relatorio.relatoriosMensal',compact('anoInicial','diferencaAnos','anoAtual','relatorios'));


        

    }

    public function relatorioBusca()
    {

        $anoInicial = 2023;
        $dataAtual = Carbon::now();
        $anoAtual = $dataAtual->year; // Obtém o ano atual
        $diferencaAnos = $anoAtual - $anoInicial;

   
        if (Session::has('ano') && Session::has('mes')) {

            $ano = Session::get('ano');
            $mes = Session::get('mes');
            $dataInicio = $ano."-".$mes."-01";
            $dataFim = $ano."-".$mes."-31";
    
            
            $relatorios = Relatorio::with(['vinculo.user'])
                ->whereBetween('mes_ano_referencia', [Carbon::parse($dataInicio), Carbon::parse($dataFim)])
                ->get();
    
            return view('relatorio.relatoriosMensal',compact('anoInicial','diferencaAnos','anoAtual','relatorios'));
    
    
            
            
        } else {

            return redirect()->route('mensal.relatorios')->with('error', 'Senha Inválida');
            
            
        }

        

       
        

    }





    public function assinarBolsista(Request $request, $id)
    {
        $relatorio = Relatorio::findOrFail($id);

        $senhaDigitada = $request->senha;

        //pega usuário logado
        $user = auth()->user();

        if (Auth::attempt(['email' => $user->email, 'password' => $request->senha])) {
            if ($relatorio) {
            
        
                $relatorio->hash_validacao_bolsista = Hash::make($relatorio->descrição_atividades.Carbon::now().$user->cpf);
                $relatorio->data_validacao_bolsista = Carbon::now('America/Cuiaba');
                $relatorio->save();
            
                
                return redirect()->route('lista.relatorio', $relatorio->vinculo_id )
                         ->with('success', 'Relatório assinado com sucesso!');
            } else {
                return redirect()->route('lista.relatorio', $relatorio->vinculo_id )
                         ->with('error', 'Erro ao assinar o relatório');
            }
        } else {
            return redirect()->route('lista.relatorio', $relatorio->vinculo_id )
                         ->with('error', 'Senha Inválida');
        }




        

    }

    public function assinarCoordenador(Request $request, $id)
    {
        $relatorio = Relatorio::findOrFail($id);


        $senhaDigitada = $request->senha;

        //pega usuário logado
        $user = auth()->user();

        if (Auth::attempt(['email' => $user->email, 'password' => $request->senha])) {
            if ($relatorio) {
            
        
                $relatorio->hash_validacao_coordenador = Hash::make($relatorio->descrição_atividades.Carbon::now().$user->cpf);
                $relatorio->data_validacao_coordenador = Carbon::now('America/Cuiaba');
                $relatorio->save();
            
                
                return redirect()->route('relatorios.busca')->with('success', 'Relatório assinado com sucesso!');
            } else {
                return redirect()->route('relatorios.busca')->with('error', 'Erro ao assinar o relatório');
            }
        } else {
            return redirect()->route('relatorios.busca')->with('error', 'Senha Inválida');
        }




        

    }


    
}
