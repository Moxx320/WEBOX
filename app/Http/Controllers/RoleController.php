<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**

     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_index'), 403);

        $roles = Role::paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), 403);

        $permissions = Permission::all()->pluck('name', 'id');
        return view('roles.create', compact('permissions'));
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->only('name'));

        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    /**
     * 
     *
     * @param  int  
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), 403);

        $role->load('permissions');
        return view('roles.show', compact('role'));
    }

    /**
     * 
     *
     * @param  int  
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), 403);

        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request
     * @param  int  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));

        $role->syncPermissions($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    /**
     *
     *
     * @param  int  
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        $role->delete();

        return redirect()->route('roles.index');
    }
}
