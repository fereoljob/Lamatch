<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class estClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = DB::table('utilisateurs')->where('id_utilisateur',session("LoggedUser"))->first();
        if($user->statut=="Admin")
        {
           
            return back()->with("Echec","Fonction non disponible pour le role Admin");
        }
        return $next($request);
    }
}
