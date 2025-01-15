<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RoleRequest;
use Illuminate\Support\str;


class UserController extends Controller
{
    public function index(Request $request)
    {
        // Pobieranie wyszukiwanej frazy
        $search = $request->input('search');

        // Filtrowanie i paginacja użytkowników
        $users = User::whereIn('role', ['user', 'krytyk'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%");
                });
            })
            ->paginate(10);

        return view('admin.users.index', compact('users', 'search'));
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
    public function destroyStay(User $user)
{
    $deletedUser = User::firstOrCreate(['name' => 'Deleted'], [
        'email' => 'deleted@example.com',
        'password' => bcrypt(Str::random(16))
    ]);

    // Przypisz filmy, aktorów i autorów do użytkownika Deleted
    $user->filmy()->update(['user_id' => $deletedUser->id]);
    $user->autorzy()->update(['user_id' => $deletedUser->id]);
    $user->aktorzy()->update(['user_id' => $deletedUser->id]);

    $user->delete();

    return redirect()->route('admin.users.index')->with('success', 'Użytkownik został usunięty, filmy zachowano!');
}
}
