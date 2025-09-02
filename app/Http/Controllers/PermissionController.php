<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['modules'] = Module::all();
        $data['permissions'] = Permission::all();

        return view('UserManagement.Permission.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('UserManagement.Permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'module_name' => 'required|string|max:255',
            'access'      => 'required|string|max:255|unique:permissions,name',
            'description' => 'nullable|string|max:500',
        ]);

        $module = Module::firstOrCreate(['name' => $request->module_name]);

        $permission = new Permission([
            'name'        => $request->access,
            'description' => $request->description ?? null,
        ]);

        $module->permissions()->save($permission);

        return redirect()->route('permissions.index')
            ->with('success', 'Module and Permission created successfully!');
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
        $data['modules'] = Module::findOrFail($id);
        $data['permissions'] = Permission::findOrFail($id);


        return view('UserManagement.Permission.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'module_name'  => 'required|string|max:255',
            'access'       => 'required|string|max:255',
            'description'  => 'nullable|string|max:500',
        ]);

        $module = Module::findOrFail($id);
        $module->name = $request->module_name;
        $module->save();

        $permission = Permission::findOrFail($id);
        $permission->name = $request->access;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('permissions.index')
            ->with('success', 'Module and Permission updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $module = Module::findOrFail($id);

        $module->permissions()->delete();

        $module->delete();

        return redirect()->route('permissions.index')
            ->with('success', 'Module and its permissions deleted successfully.');
    }
}
