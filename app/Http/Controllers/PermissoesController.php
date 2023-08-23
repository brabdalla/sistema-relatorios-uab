<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissoesController extends Controller
{
    public function permissions()
    {
        // listar permições
        $permissions = Permission::all();

        return view('acesso.listaPermissoes', compact('permissions'));
    



    }
    
    public function storePermissao(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        $permission = Permission::create(['name' => $request->nome]);


        return redirect()->route('permissoes.index')
                     ->with('success', 'Nova permissão cadastrado com sucesso!');

    }


    public function roles()
    {
        // listar permições
        $roles = role::all();

        return view('acesso.listaRoles', compact('roles'));
    

    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
        ]);

        $role = Role::create(['name' => $request->nome]);


        return redirect()->route('roles.index')
                     ->with('success', 'Nova permissão cadastrada com sucesso!');

    }

    public function setarPermissoes($id)
    {
        
        // listar 
        $permissions = Permission::all();
        $role = Role::find($id);
        $permissionsAtt = $role->permissions;

        

        #dd($permissionsAtt);
        
           

        return view('acesso.papelPermissoes', compact('permissions', 'permissionsAtt', 'role'));
    
    }

    public function addPermissao(Request $request, $id)
    {
        $role = Role::find($id);
        $permission = Permission::find($request->permissao);
        $role->givePermissionTo($permission);

        return redirect()->route('setar.permissoes', $id)
                     ->with('success', 'Nova permissão adicionada com sucesso!');

    
    }

    public function removerPermissao(Request $request, $id)
    {
        $role = Role::find($id);
        $permission = Permission::find($request->permissao);
        $role->revokePermissionTo($permission);

        return redirect()->route('setar.permissoes', $id)
                     ->with('danger', 'Permissão removida com sucesso!');

    
    }

    public function userRoles($id)
    {

        $user = User::find($id);
        $permissoes = $user->getPermissionsViaRoles();
        $roles = Role::all();
        $rolesUser = $user->getRoleNames();

    

        return view('acesso.userRoles', compact('rolesUser', 'roles', 'user'));
    }

    public function addPermissaoUser(Request $request)
    {
        $user = User::find($request->user);


        
        $user->assignRole($request->role);


        return redirect()->route('user.roles', $request->user)
                     ->with('sucess', 'Regras adicionada com sucesso!');

    
    }


    public function removePermissaoUser(Request $request)
    {
        $user = User::find($request->userId);


        
        $user->removeRole($request->roleDel);


        return redirect()->route('user.roles', $request->userId)
                     ->with('danger', 'Regras removidas com sucesso!');

    
    }

    




}
