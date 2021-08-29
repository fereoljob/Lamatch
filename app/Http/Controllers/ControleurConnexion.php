<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControleurConnexion extends Controller
{
    function login(){
        return view('Connexion/login');
    }
    function verifUser(Request $requete)
    {
        //validation de la requete
        $requete->validate([
            "username"=>"Required",
            "mdp"=>"Required"
        ]);
        //traitement post validation
        $user = DB::table("utilisateurs")->where("username",$requete->username)->first();
        if($user)
        {
            if($requete->mdp==$user->password)
            {
                $requete->session()->put('LoggedUser',$user->id_utilisateur);
                return redirect("Accueil");
            }
            else
            {
                return back()->with('Echec',"Mot de passe invalide");
            }
        }
        else
        {
            return back()->with('Echec',"Pas d'utilisateur avec ces identifiants");
        }
    }
    function Accueil(Request $requete)
    {
        if(session()->has('LoggedUser'))
        {
            $candidats = DB::table("candidats")->get()->count();
            $entreprises = DB::table("entreprises")->get()->count();
            $statistiques = DB::table("stats")->first();
            $user = DB::table('utilisateurs')->where('id_utilisateur',session('LoggedUser'))->first();
            $data = ["candidats"=>$candidats,"entreprises"=>$entreprises,"statistiques"=>$statistiques,"user"=>$user];
            return view("Accueil/accueil",$data);
        }
        else
        {
            return redirect("/");
        }
    }
    function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('/');
        }
        else
        {
            return redirect('/');
        }
    }
}
