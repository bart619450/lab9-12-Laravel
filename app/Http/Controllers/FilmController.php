<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\TypFilmu;
use App\Models\Autor;
use App\Models\Aktor;
use App\Models\Komentarz;  
use App\Models\OcenaKrytyka; 
use App\Models\OcenaUzytkownika;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filmy = Film::with(['typyfilmow', 'aktorzy', 'autorzy'])->get();
        return view('film.index', compact('filmy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autorzy = Autor::all();
        $typyfilmow = TypFilmu::all();
        $aktorzy = Aktor::all();
        $film = new Film();
        return view('film.create', compact('autorzy', 'aktorzy', 'typyfilmow'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'tytul' => 'required|string|max:255',
        'data_premiery' => 'required|date',
        'opis' => 'nullable|string',
        'typyfilmow' => 'required|array',
        'aktorzy' => 'array',
        'autor_id' => 'required|exists:autorzy,id',
    ]);

    // Tworzenie nowego filmu
    $film = new Film();
    $film->tytul = $request->tytul;
    $film->data_premiery = $request->data_premiery;
    $film->opis = $request->opis;
    $film->autor_id = (int) $request->autor_id;
    $film->user_id = auth()->user()->id; // Przypisanie twórcy filmu
    $film->save();

    // Przypisanie typów filmów
    $film->typyfilmow()->sync($request->typyfilmow);

    // Przypisanie aktorów
    $film->aktorzy()->sync($request->aktorzy);

    // Przekierowanie z komunikatem o sukcesie
    return redirect()->route('film.index')->with('success', 'Film został dodany');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $film = Film::with(['komentarze', 'ocenyKrytykow', 'ocenyUzytkownikow'])->findOrFail($id);
    $sredniaOcenaKrytykow = $film->sredniaOcenaKrytykow();
    $sredniaOcenaUzytkownikow = $film->sredniaOcenaUzytkownikow();
    return view('film.show', compact('film', 'sredniaOcenaKrytykow', 'sredniaOcenaUzytkownikow'));
}

    // Metoda dodająca komentarz
    public function addComment(Request $request, string $id)
    {
        $request->validate([
            'komentarz' => 'required|string|max:500',
        ]);

        $film = Film::findOrFail($id);
        $film->komentarze()->create([
            'uzytkownik_id' => auth()->id(),
            'komentarz' => $request->komentarz,
        ]);

        return redirect()->route('film.show', ['id' => $id])->with('success', 'Komentarz został dodany.');
    }
    public function storeComment(Request $request, $filmId)
{
    $request->validate([
        'tresc' => 'required|string|max:1000',
    ]);

    // Znajdź film
    $film = Film::findOrFail($filmId);

    // Tworzenie nowego komentarza
    $komentarz = new Komentarz();
    $komentarz->tresc = $request->tresc;
    $komentarz->film_id = $film->id;
    $komentarz->user_id = auth()->user()->id; // przypisanie zalogowanego użytkownika
    $komentarz->save();

    // Przekierowanie z komunikatem o sukcesie
    return redirect()->route('film.show', $film->id)->with('success', 'Komentarz został dodany');
}


    // Metoda dodająca ocenę
    public function storeRating(Request $request, $filmId)
{
    $film = Film::findOrFail($filmId);
    
    $ocena = $request->input('ocena');
    $typOceny = $request->input('typ_oceny'); // 'krytyk' lub 'uzytkownik'

    // Sprawdzenie, czy użytkownik już ocenił ten film
    if ($typOceny == 'krytyk') {
        $existingRating = OcenaKrytyka::where('film_id', $film->id)
                                      ->where('user_id', Auth::id())
                                      ->first();
    } else {
        $existingRating = OcenaUzytkownika::where('film_id', $film->id)
                                          ->where('user_id', Auth::id())
                                          ->first();
    }

    if ($existingRating) {
        return redirect()->route('film.show', $film->id)
                         ->withErrors(['error' => 'Już oceniłeś ten film.']);
    }

    // Sprawdzenie roli użytkownika i zapisanie oceny
    if ($typOceny == 'krytyk' && (Auth::user()->role == 'Krytyk' || Auth::user()->role == 'admin')) {
        // Zapisz ocenę krytyka
        OcenaKrytyka::create([
            'ocena' => $ocena,
            'film_id' => $film->id,
            'user_id' => Auth::id(),
        ]);
    } elseif ($typOceny == 'uzytkownik' && Auth::user()->role != 'Krytyk') {
        // Zapisz ocenę użytkownika z przypisanym user_id
        OcenaUzytkownika::create([
            'ocena' => $ocena,
            'film_id' => $film->id,
            'user_id' => Auth::id(),  // Dodajemy identyfikator użytkownika
        ]);
    } else {
        return redirect()->route('film.show', $film->id)->withErrors(['error' => 'Nie masz uprawnień do dodania tej oceny']);
    }

    return redirect()->route('film.show', $film->id)->with('success', 'Ocena została dodana');
}



    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Pobierz dane potrzebne do formularza
        $film = Film::findOrFail($id);
        $typyfilmow = TypFilmu::all();
        $aktorzy = Aktor::all();
        $autorzy = Autor::all();

        // Przekaż dane do widoku
        return view('film.edit', compact('film', 'typyfilmow', 'aktorzy', 'autorzy'));
    }

    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'tytul' => 'required|string|max:255',
            'data_premiery' => 'nullable|date',
            'opis' => 'nullable|string',
            'typyfilmow' => 'nullable|array',
            'aktorzy' => 'nullable|array',
            'autor_id' => 'required|exists:autorzy,id',
        ]);

        // Aktualizacja filmu
        $film->update([
            'tytul' => $validated['tytul'],
            'data_premiery' => $validated['data_premiery'],
            'opis' => $validated['opis'],
            'autor_id' => $validated['autor_id'],
        ]);

        // Przypisz typy filmów i aktorów
        $film->typyfilmow()->sync($validated['typyfilmow']);
        $film->aktorzy()->sync($validated['aktorzy']);

        return redirect()->route('film.show', $film)->with('success', 'Film został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return redirect()->route('film.index')->with('success', 'Film został usunięty');
    }
}
