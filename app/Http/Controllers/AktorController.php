<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aktor;
use App\Models\Film;

class AktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aktorzy = Aktor::with('filmy')->paginate(10);
        return view('aktor.index', compact('aktorzy'));
    }

    public function user_index(Request $request)
{
    $aktorzy = Aktor::where('user_id', auth()->id())  // Filtruj aktorów po user_id
                ->when($request->search, function ($query) use ($request) {
                    return $query->where('imie', 'like', '%' . $request->search . '%')
                                 ->orWhere('nazwisko', 'like', '%' . $request->search . '%');
                })
                ->paginate(10);  // Paginacja
    
    return view('aktor.user_index', compact('aktorzy'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filmy = Film::all(); // Pobieranie wszystkich filmów
        $aktor = null; // Pusty aktor
        return view('aktor.create', compact('filmy', 'aktor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imie' => 'required|string|max:100',
            'nazwisko' => 'required|string|max:100',
            'filmy' => 'nullable|array', // Filmy są opcjonalne
        ]);
        $aktor = new Aktor();
        $aktor->imie = $request->imie;
        $aktor->nazwisko = $request->nazwisko;
        $aktor->user_id = auth()->user()->id; // Przypisanie twórcy filmu
        $aktor->save();

    // Przypisanie typów filmów
        $aktor->filmy()->sync($request->filmy);

    // Przypisanie aktorów

    // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('aktor.index')->with('success', 'Aktor został dodany');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aktor = Aktor::with('filmy')->findOrFail($id);
        return view('aktor.show', compact('aktor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aktor = Aktor::with('filmy')->findOrFail($id);
        $filmy = Film::all();
        return view('aktor.edit', compact('aktor', 'filmy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aktor = Aktor::findOrFail($id);

        $request->validate([
            'imie' => 'required|string|max:100',
            'nazwisko' => 'required|string|max:100',
            'filmy' => 'nullable|array',
        ]);

        $aktor->update([
            'imie' => $request->imie,
            'nazwisko' => $request->nazwisko,
        ]);

        // Przypisanie filmów do aktora (jeśli podano)
        if ($request->filled('filmy')) {
            $aktor->filmy()->sync($request->filmy);
        } else {
            // Jeśli brak filmów, odłącz aktora od filmów
            $aktor->filmy()->detach();
        }

        return redirect()->route('aktor.index')->with('success', 'Aktor został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aktor = Aktor::findOrFail($id);

        // Jeśli aktor jest przypisany do jakichkolwiek filmów, należy je rozłączyć
        $aktor->filmy()->detach();

        $aktor->delete();
        return redirect()->route('aktor.index')->with('success', 'Aktor został usunięty');
    }
}
