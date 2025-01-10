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

class DashboardController extends Controller
{
public function index()
{
    $user = auth()->user();

    return view('dashboard', [
        'filmy' => $user->filmy()->latest()->take(10)->get(),
        'autorzy' => $user->autorzy()->latest()->take(10)->get(),
        'aktorzy' => $user->aktorzy()->latest()->take(10)->get(),
        'typyfilmow' => $user->typyfilmow()->latest()->take(10)->get(),
    ]);
}
}