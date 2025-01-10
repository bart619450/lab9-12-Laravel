<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RoleRequest;


class UserController extends Controller
{
    public function index()
    {
        // Pobieramy tylko użytkowników, którzy nie są adminami
        $users = User::whereIn('role', ['user', 'krytyk'])->get();

    
        // Zwracamy widok z listą użytkowników
        return view('admin.users.index', compact('users'));
    }

    public function dashboard()
    {
        // Pobranie wszystkich oczekujących próśb o rolę "krytyk"
        $roleRequests = RoleRequest::where('status', 'pending')->get();

        // Przekazanie zmiennej do widoku
        return view('admin.dashboard', compact('roleRequests'));
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string',
        ]);
        $user->update($request->only(['name', 'email', 'role']));
        return redirect()->route('admin.users.index')->with('success', 'Użytkownik zaktualizowany!');
    }
    public function destroy(User $user)
    {
        $user->filmy()->delete();

        // Usuwamy autorów powiązanych z użytkownikiem
        $user->autorzy()->delete();
    
        // Usuwamy aktorów powiązanych z użytkownikiem
        $user->aktorzy()->delete();
    
        // Usuwamy typy filmów powiązane z użytkownikiem
        $user->typyfilmow()->delete();
    
        // Na końcu usuwamy samego użytkownika
        $user->delete();
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Użytkownik został usunięty!');
    }
}
