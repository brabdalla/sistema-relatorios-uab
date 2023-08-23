<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Models\Vinculacao;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class NivelAcessos
{

    protected $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        /*$dataAtual = Carbon::now()->toDateString();
        $vinculacao = Vinculacao::with(['funcao', 'curso'])
            ->where('user_id', '=', $user->id)
            ->whereDate('data_fim', '>=', $dataAtual)
            ->get()->first();*/
        
        $routeName = Route::currentRouteName();

        $resp = $user->getPermissionsViaRoles($routeName);



            

        
        dd($resp);
           

        
        return $next($request);




        
    }
}
