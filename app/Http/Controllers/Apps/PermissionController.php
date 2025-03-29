<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //get Permission

        $permissions = Permission::when(request()->q, function ($permissions) {
            $permissions = $permissions->where('name', 'like', '%' . request()->q . '%');
        })->latest()->paginate(5);


        // return internia view
        return inertia('Apps/Permissions/Index', [
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // render with inertia
        return inertia('Apps/Permissions/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'guard_name'   => 'required'
        ]);

        // create Role
        $permissions = Permission::create(
            [
                'name' => $request->name,
                'guard_name' => $request->guard_name,
            ]
        );

        $permissions->save();

        // redirect
        return redirect()->route('apps.permissions.index');
    }
}
