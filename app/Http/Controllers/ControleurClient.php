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
            $candidat = DB::table("candidats")->where("email",$user->email)->first();
            $domaines=DB::table("candidats")
            ->join("competences","candidats.id_candidat","=","competences.candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)
            ->select("competences.domaine_metier")->distinct()->get();
            $competences=DB::table("candidats")
            ->join("competences","candidats.id_candidat","=","competences.candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)
            ->get();
            $formations=DB::table("candidats")
            ->join("formations","candidats.id_candidat","=","formations.candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $experiences=DB::table("candidats")
            ->join("experiences_pro","candidats.id_candidat","=","experiences_pro.candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $regions=DB::table("candidats")
            ->join("regions_candi","candidats.id_candidat","=","regions_candi.id_candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $data=["candidat"=>$candidat,"formations"=>$formations,"experiences"=>$experiences,"domaines"=>$domaines,"regions"=>$regions,"competences"=>$competences];
            return view('Profil/profile-candidate',$data);
        }
        else if($user->statut=="Entreprise")
        {

        }
        else
        {

        }
    }
}
