<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = [
            User::ROLE_USER => 'User',
            User::ROLE_ADMIN => 'Admin',
            User::ROLE_COMPANY => 'Company',
            User::ROLE_COMPANYUSER => 'Company User',
        ];
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|integer',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}