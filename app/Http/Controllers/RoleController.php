<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

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
        return view('UserManagement.Roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $roles = Role::findOrFail($id);
        $roles->name = $request->name;
        $roles->description = $request->description;
        $roles->save();
        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
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
