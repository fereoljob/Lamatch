<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class estAdmin
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
        if($user->statut!="Admin")
        {
            return back()->with("Echec","Accès restreints aux membres administrateurs");
        }
        return $next($request);
    }
}
