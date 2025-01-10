<?php
namespace App\Http\Controllers;
use App\Models\RoleRequest;
use Illuminate\Http\Request;

class RoleRequestController extends Controller
{
    public function store(Request $request)
{
    // Sprawdzamy, czy użytkownik już wysłał prośbę o rolę krytyka i ma status 'pending'
    $existingRequest = RoleRequest::where('user_id', auth()->id())
                                  ->where('status', 'pending')
                                  ->first();

    if ($existingRequest) {
        return redirect()->back()->with('error', 'Już wysłałeś prośbę o rolę krytyka. Czekaj na odpowiedź.');
    }

    // Tworzymy nową prośbę
    RoleRequest::create([
        'user_id' => auth()->id(),
        'reason' => $request->reason,
    ]);

    return redirect()->route('dashboard')->with('success', 'Twoja prośba została wysłana.');
}

    public function index()
    {
        // Pobranie wszystkich oczekujących próśb o rolę "krytyk"
        $roleRequests = RoleRequest::where('status', 'pending')->get();

        return view('admin.request.index', compact('roleRequests'));
    }

    public function approve($id)
    {
        $request = RoleRequest::findOrFail($id);
        $request->status = 'approved';
        $request->save();

        // Przyznaj rolę krytyka użytkownikowi
        $request->user->update(['role' => 'krytyk']);

        return redirect()->route('admin.request.index')->with('success', 'Prośba o rolę krytyka została zatwierdzona!');
    }

    public function reject($id)
    {
        $request = RoleRequest::findOrFail($id);
        $request->status = 'rejected';
        $request->save();

        return redirect()->route('admin.request.index')->with('success', 'Prośba o rolę krytyka została odrzucona!');
    }
}
