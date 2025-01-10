<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\Film;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autorzy = Autor::with('filmy')->paginate(10); 
        return view('autor.index', compact('autorzy')); 
    }

    public function user_index(Request $request)
{
    $autorzy = Autor::where('user_id', auth()->id())  
                ->when($request->search, function ($query) use ($request) {
                    return $query->where('imie', 'like', '%' . $request->search . '%')
                                 ->orWhere('nazwisko', 'like', '%' . $request->search . '%');
                })
                ->paginate(10);  // Paginacja
    
    return view('autor.user_index', compact('autorzy'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filmy = Film::all(); // Pobieranie wszystkich filmów
        $autor = null; // Pusty autor
        return view('autor.create', compact('filmy', 'autor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'imie' => 'required|string|max:100',
            'nazwisko' => 'required|string|max:100',
            'filmy' => 'nullable|array',
        ]);
        
        $autor = new Autor();
        $autor->imie = $request->imie;
        $autor->nazwisko = $request->nazwisko;
        $autor->user_id = auth()->user()->id; // Przypisanie twórcy filmu
        $autor->save();
        if ($request->filled('filmy')) {
            foreach ($request->filmy as $filmId) {
                $film = Film::find($filmId);
                if ($film) {
                    $film->autor_id = $autor->id; // Przypisz autora do filmu
                    $film->save();
                }
            }
        }
    // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('autor.index')->with('success', 'Autor został dodany');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autor = Autor::with('filmy')->findOrFail($id); 
        return view('autor.show', compact('autor')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $autor = Autor::with('filmy')->findOrFail($id); 
        $filmy = Film::all();
        return view('autor.edit', compact('autor', 'filmy')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = Autor::findOrFail($id);

        $request->validate([
            'imie' => 'required|string|max:100',
            'nazwisko' => 'required|string|max:100',
            'filmy' => 'nullable|array',
        ]);

        // Aktualizuj dane autora
        $autor->update([
            'imie' => $request->imie,
            'nazwisko' => $request->nazwisko,
        ]);

        // Przypisanie filmów do autora (jeśli podano)
        if ($request->filled('filmy')) {
            foreach ($request->filmy as $filmId) {
                $film = Film::find($filmId);
                if ($film) {
                    $film->autor_id = $autor->id; // Przypisz autora do filmu
                    $film->save();
                }
            }
        }

        return redirect()->route('autor.index')->with('success', 'Autor został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = Autor::findOrFail($id);

        // Jeśli autor ma filmy, należy je usunąć lub rozdzielić (przypisać innemu autorowi)
        $autor->filmy()->update(['autor_id' => null]);

        $autor->delete();
        return redirect()->route('autor.index')->with('success', 'Autor został usunięty');
    }
}
