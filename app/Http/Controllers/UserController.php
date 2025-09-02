<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::paginate(10);
        return view('UserManagement.User.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = Role::all();
        return view('UserManagement.User.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'roles'    => 'nullable|array',
            
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();



          if (!empty($validated['roles'])) {
        $roleIds = Role::whereIn('name', $validated['roles'])->pluck('id')->toArray();
        $user->roles()->sync($roleIds);
    }

        return redirect()->route('users.index')->with('success', 'User created and role assigned successfully!');
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
        $data['user'] = User::findOrFail($id); 
        $data['roles'] = Role::all();
        return view('UserManagement.User.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'string|required',
            'email' => 'required',
            'roles' => 'required|array'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $roleIds = Role::whereIn('name', $request->roles)->pluck('id')->toArray();
        $user->roles()->sync($roleIds);

        return redirect()->route('users.index')->with('success', 'User created and role assigned successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
         return redirect()->route('users.index')->with('success', 'User delteted successfully!');
    }
}
