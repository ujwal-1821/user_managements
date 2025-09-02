<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['roles'] = Role::paginate(10);
        return view('UserManagement.Roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('UserManagement.Roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'string|required',
            'description' => 'required'
        ]);

        $roles = new Role();
        $roles->name = $request->name;
        $roles->description = $request->description;
        $roles->save();
        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
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

    $modules = Module::all();
    $permissions = Permission::all();

    $rolePermissions = DB::table('role_permission')
        ->where('role_id', $role->id)
        ->get()
        ->groupBy('module_id')
        ->map(function ($items) {
            return $items->pluck('permission_id')->toArray();
        })
        ->toArray();

    return view('UserManagement.Roles.edit', compact('role', 'modules', 'permissions', 'rolePermissions'));
}



    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $role = Role::findOrFail($id);

    $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'permissions' => 'array',
    ]);

    $role->update([
        'name'        => $request->name,
        'description' => $request->description,
    ]);

    DB::table('role_permission')->where('role_id', $role->id)->delete();

    if ($request->has('permissions')) {
        foreach ($request->permissions as $moduleId => $permissionIds) {
            foreach ($permissionIds as $permissionId) {
                DB::table('role_permission')->insert([
                    'role_id'       => $role->id,
                    'permission_id' => $permissionId,
                    'module_id'     => $moduleId,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
        }
    }

    return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = Role::findOrFail($id);
        $roles->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}
