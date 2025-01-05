<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypFilmu;
use App\Models\Film;

class TypFilmuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typyfilmow = TypFilmu::all();
        return view('typfilmu.index', compact('typyfilmow'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filmy = Film::all();
        return view('typfilmu.create', compact('filmy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nazwa' => 'required|string|max:100',  
            'filmy' => 'nullable|array', 
        ]);

        // Tworzenie nowego typu filmu
        $typfilmu = TypFilmu::create([
            'nazwa' => $request->nazwa,
        ]);

        // Jeżeli filmy zostały podane, przypisujemy je do typu filmu
        if ($request->filled('filmy')) {
            $typfilmu->filmy()->sync($request->filmy);  
        }

        return redirect()->route('typfilmu.index')->with('success', 'Typ filmu został dodany');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Pobieramy typ filmu z powiązanymi filmami
        $typfilmu = TypFilmu::with('filmy')->findOrFail($id);
        
        // Wyświetlamy szczegóły typu filmu
        return view('typfilmu.show', compact('typfilmu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Pobieramy typ filmu i wszystkie filmy
        $typfilmu = TypFilmu::findOrFail($id);
        $filmy = Film::all();  // Pobieramy wszystkie filmy
        
        // Wyświetlamy formularz edycji z pobranymi danymi
        return view('typfilmu.edit', compact('typfilmu', 'filmy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'nazwa' => 'required|string|max:100',  // Walidacja nazwy typu filmu
            'filmy' => 'nullable|array',  // Filmy są opcjonalne
        ]);

        // Pobieramy typ filmu
        $typfilmu = TypFilmu::findOrFail($id);

        // Aktualizujemy dane typu filmu
        $typfilmu->update([
            'nazwa' => $request->nazwa,
        ]);

        // Jeżeli filmy zostały podane, synchronizujemy je
        if ($request->filled('filmy')) {
            $typfilmu->filmy()->sync($request->filmy);  // Synchronizacja filmów z typem filmu
        } else {
            $typfilmu->filmy()->detach();  // Odłączamy filmy, jeśli nie zostały podane
        }

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('typfilmu.index')->with('success', 'Typ filmu został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typfilmu = TypFilmu::findOrFail($id);
        
        // Jeśli są przypisane filmy, odłączamy je
        $typfilmu->filmy()->detach();

        $typfilmu->delete();
        return redirect()->route('typfilmu.index')->with('success', 'Typ filmu został usunięty');
    }
}
