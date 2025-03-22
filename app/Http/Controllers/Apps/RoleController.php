<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get Roles
        $roles = Role::when(request()->q, function ($roles) {
            $roles = $roles->where('name', 'like', '%' . request()->q . '%');
        })->with('permissions')->latest()->paginate(5);

        // render inertia
        return inertia('Apps/Roles/Index', [
            'roles'         => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get Permission All
        $permissions = Permission::all();

        // render with inertia
        return inertia('Apps/Roles/Create', [
            'permissions'   => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'permissions'   => 'required'
        ]);

        // create Role
        $role = Role::create(['name' => $request->name]);

        // assign Permission to Role
        $role->givePermissionTo($request->permissions);

        // redirect
        return redirect()->route('apps.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get role
        $role = Role::with('permissions')->findOrFail($id);

        // get permission all 
        $permissions = Permission::all();

        // render with inertia
        return inertia('Apps/Roles/Edit', [
            'role'          => $role,
            'permissions'   => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
        $request->validate([
            'name'          => 'required',
            'permissions'   => 'required'
        ]);

        // update role
        $role->update(['name' => $request->name]);

        // sync permission
        $role->syncPermissions($request->permissions);

        //redirect
        return redirect()->route('apps.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //find role by ID
        $role = Role::findOrFail($id);

        // delete Role
        $role->delete();

        // redirect
        return redirect()->route('apps.roles.index');
    }
}
