<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
      {
        $roles = Role::all();
        return view('role-permission.index', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $modules = Module::all();

        // Already assigned
        $assigned = RolePermission::where('role_id', $id)->get();

        return view('role-permission.edit', compact('role', 'permissions', 'modules', 'assigned'));
    }

    public function update(Request $request, $id)
    {
        // Delete old permissions
        RolePermission::where('role_id', $id)->delete();

        if ($request->permissions) {
            foreach ($request->permissions as $permission_id => $module_id) {
                RolePermission::create([
                    'role_id'       => $id,
                    'permission_id' => $permission_id,
                    'module_id'     => $module_id,
                ]);
            }
        }

        return redirect()->route('role-permissions.index')->with('success', 'updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
