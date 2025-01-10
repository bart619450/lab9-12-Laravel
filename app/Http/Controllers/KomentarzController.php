<?php
namespace App\Http\Controllers;

use App\Models\Komentarz;
use Illuminate\Http\Request;

class KomentarzController extends Controller
{
    // Inne metody...

    public function destroy($id)
{
    $komentarz = Komentarz::findOrFail($id);

    // Sprawdź, czy użytkownik jest właścicielem komentarza lub adminem
    if (auth()->user()->id !== $komentarz->user_id && auth()->user()->role !== 'admin') {
        return redirect()->route('film.show', $komentarz->film_id)->with('error', 'Nie masz uprawnień do usunięcia tego komentarza');
    }

    $komentarz->delete();

    return back()->with('success', 'Komentarz został usunięty');
}
}
