<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuncaoController;
use App\Http\Controllers\PoloController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\VinculacaoController;
use App\Http\Controllers\DisciplinasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\PermissoesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () { 
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');   
    
});
Route::group(['middleware' => ['role_or_permission:Bolsistas|Administrador']], function () {
    #Relatórios
    Route::get('novo_relatorio', [RelatorioController::class, 'create'])->name('novo.relatorio');
    Route::post('salvar_relatorio', [RelatorioController::class, 'store'])->name('salvar.relatorio');
    Route::get('vinculos', [RelatorioController::class, 'vinculos'])->name('relatorio.vinculo');
    Route::get('relatorios/{id}', [RelatorioController::class, 'index'])->name('lista.relatorio');
    Route::get('editar_relatorio/{id}', [RelatorioController::class, 'edit'])->name('editar.relatorio');
    Route::put('relatorios/salvar/{id}', [RelatorioController::class, 'update'])->name('editar.salvar.relatorio');
    Route::get('gerar_pdf/{id}', [RelatorioController::class, 'gerarPdf'])->name('gerarPdf.relatorio');
    Route::put('assinarBolsista/{id}', [RelatorioController::class, 'assinarBolsista'])->name('assinar.relatorio');
    
});

Route::group(['middleware' => ['role_or_permission:Coordenador|Administrador']], function () {
    #Bolsistas Curso
    Route::get('bolsistas', [UsuarioController::class, 'bolsistasCurso'])->name('bolsistas');
    Route::get('mensal/relatorios', [RelatorioController::class, 'relatorioMensal'])->name('mensal.relatorios');
    Route::post('mensal/relatorios/busca', [RelatorioController::class, 'relatorioMensalBusca'])->name('mensal.relatorios.busca');
    Route::get('mensal/relatorio/busca', [RelatorioController::class, 'relatorioBusca'])->name('relatorios.busca');
    #Route::get('vinculos', [RelatorioController::class, 'vinculos'])->name('relatorio.vinculo');
    
    #Route::get('editar_relatorio/{id}', [RelatorioController::class, 'edit'])->name('editar.relatorio');
    #Route::put('relatorios/salvar/{id}', [RelatorioController::class, 'update'])->name('editar.salvar.relatorio');
    Route::put('coordAssinarBolsista/{id}', [RelatorioController::class, 'assinarCoordenador'])->name('coord.assinar');
});



Route::group(['middleware' => ['role_or_permission:Administrador']], function () {
    #permissões
    Route::get('permissoes', [PermissoesController::class, 'permissions'])->name('permissoes.index');
    Route::get('roles', [PermissoesController::class, 'roles'])->name('roles.index');
    Route::post('permissoes_salvar', [PermissoesController::class, 'storePermissao'])->name('salvar.permissoes');
    Route::post('roles_salvar', [PermissoesController::class, 'storeRole'])->name('salvar.roles');
    Route::get('setar_permissoes/{id}', [PermissoesController::class, 'setarPermissoes'])->name('setar.permissoes');
    Route::put('setar_permissoes/add/{id}', [PermissoesController::class, 'addPermissao'])->name('add.permissoes');
    Route::put('setar_permissoes/remover/{id}', [PermissoesController::class, 'removerPermissao'])->name('remover.permissoes');
    Route::get('user_roles/{id}', [PermissoesController::class, 'userRoles'])->name('user.roles');
    Route::post('user_roles/delete', [PermissoesController::class, 'removePermissaoUser'])->name('role.user.excluir');
    Route::post('user_roles/add', [PermissoesController::class, 'addPermissaoUser'])->name('user.add.novaRegra');
    #usuarios
    Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios');
    Route::get('register/admin', [UsuarioController::class, 'create'])->name('register.admin');
    Route::post('register/admin/gravar', [UsuarioController::class, 'store'])->name('register.admin.gravar');
    Route::get('usuarios/detalhes/{id}', [UsuarioController::class, 'show'])->name('user.detalhes.admin');
    Route::get('usuarios/editar/{id}', [UsuarioController::class, 'edit'])->name('user.editar.admin');
    Route::put('usuarios/salvar/{id}', [UsuarioController::class, 'update'])->name('user.salvar.admin');
    Route::delete('usuarios/excluir/{id}', [UsuarioController::class, 'destroy'])->name('user.excluir');
     #Funções
     Route::get('funcoes', [FuncaoController::class, 'index'])->name('funcoes');
     Route::get('nova_funcao', [FuncaoController::class, 'create'])->name('nova_funcao');
     Route::post('salvar_funcao', [FuncaoController::class, 'store'])->name('salvar_funcao');
     #Polos
     Route::get('polos', [PoloController::class, 'index'])->name('polos');
     Route::get('novo_polo', [PoloController::class, 'create'])->name('novo_polo');
     Route::post('salvar_polo', [PoloController::class, 'store'])->name('salvar_polo');
     #Cursos
     Route::get('cursos', [CursoController::class, 'index'])->name('cursos');
     Route::get('novo_cursos', [CursoController::class, 'create'])->name('novo_cursos');
     Route::post('salvar_cursos', [CursoController::class, 'store'])->name('salvar_cursos');
     Route::put('curso/salvar/{id}', [CursoController::class, 'update'])->name('curso.editar');
     #disciplinas
     Route::get('disciplinas', [DisciplinasController::class, 'index'])->name('disciplinas');
     Route::post('salvar_disciplina', [DisciplinasController::class, 'store'])->name('salvar_disciplina');
     Route::delete('/disciplina/{id}', [DisciplinasController::class, 'destroy'])->name('disciplina.excluir');
     #Vinculação
     Route::get('vinculacoes/{id}', [VinculacaoController::class, 'index'])->name('vinculacoes');
     Route::get('novo_vinculo/{id}', [VinculacaoController::class, 'create'])->name('novo_vinculo');
     Route::post('salvar_vinculo', [VinculacaoController::class, 'store'])->name('salvar_vinculo');
     Route::delete('vinculacoes/excluir/{id}', [VinculacaoController::class, 'destroy'])->name('vinculacoes.excluir');

});



require __DIR__.'/auth.php';
