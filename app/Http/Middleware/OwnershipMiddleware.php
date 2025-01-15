<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;
use App\Models\Autor;
use App\Models\Aktor;
use App\Models\TypFilmu;

class OwnershipMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        //$record = $request->route()->parameter('film') 
                  //?? $request->route()->parameter('aktor')
                  //?? $request->route()->parameter('autor')
                  //?? $request->route()->parameter('typfilmu');
                  $record = null;
                  if ($filmId = $request->route()->parameter('film')) {
                      $record = Film::find($filmId);
                  } elseif ($aktorId = $request->route()->parameter('aktor')) {
                      $record = Aktor::find($aktorId);
                  } elseif ($autorId = $request->route()->parameter('autor')) {
                      $record = Autor::find($autorId);
                  } elseif ($typfilmuId = $request->route()->parameter('typfilmu')) {
                      $record = TypFilmu::find($typfilmuId);
                  }   

        if ($user && ($user->id === $record->user_id || $user->hasRole('admin'))) {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'Nie masz uprawnień do edycji/usunięcia tego rekordu.');
    }
}

