<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControleurClient extends Controller
{
    function profil(Request $requete)
    {
        $user = DB::table('utilisateurs')->where('id_utilisateur',session('LoggedUser'))->first();
        if($user->statut=="Candidat")
        {
            $candidat = DB::table("candidats")->where("email",$user->email);
            $data=["candidat"=>$candidat];
            return view('Profil/profil-candidate',$data);
        }
        else if($user->statut=="Entreprise")
        {

        }
        else
        {

        }
    }
}
