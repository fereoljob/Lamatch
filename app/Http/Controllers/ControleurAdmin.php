<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControleurAdmin extends Controller
{
    function gestion_company(Request $requete)
    {
        $lesentreprises= DB::table("entreprises")->get();
        $tab_entreprises = [];
        foreach($lesentreprises as $key=>$entreprise)
        {
                
            $valeurs_entre = DB::table("entreprises")
            ->join("valeurs_entre","entreprises.id_entre","=","valeurs_entre.id_entre")
            ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
            $regions_entre = DB::table("entreprises")
            ->join("regions_entre","entreprises.id_entre","=","regions_entre.id_entre")
            ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
            $tab_entreprises[$entreprise->id_entre]["entreprise"]=$entreprise;
            $tab_entreprises[$entreprise->id_entre]["regions_entre"] = $regions_entre;
            $tab_entreprises[$entreprise->id_entre]["valeurs_entre"] = $valeurs_entre;

        }
        $data["tab_entreprises"]=$tab_entreprises;
        //return $data;
        return view('Admin/companies',$data);
    }
    function gestion_candidates(Request $requete)
    {
        $lescandidats= DB::table("candidats")->get();
        $tab_candidats = [];
        foreach($lescandidats as $key=>$candidat)
        {
                
            $formations=DB::table("candidats")
            ->join("formations","candidats.id_candidat","=","formations.candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $regions_candi=DB::table("candidats")
            ->join("regions_candi","candidats.id_candidat","=","regions_candi.id_candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $valeurs_candi = DB::table("candidats")
            ->join("valeurs_candi","candidats.id_candidat","=","valeurs_candi.id_candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $competences = DB::table("candidats")
            ->join("competences","candidats.id_candidat","=","competences.candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $experiences=DB::table("candidats")
            ->join("experiences_pro","candidats.id_candidat","=","experiences_pro.candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $tab_candidats[$candidat->id_candidat]["candidat"]=$candidat;
            $tab_candidats[$candidat->id_candidat]["regions_candi"]=$regions_candi;
            $tab_candidats[$candidat->id_candidat]["valeurs_candi"]=$valeurs_candi;
            $tab_candidats[$candidat->id_candidat]["competences"]=$competences;
            $tab_candidats[$candidat->id_candidat]["formations"]=$formations;
            $tab_candidats[$candidat->id_candidat]["experiences"]=$experiences;

        }
        $data["tab_candidates"]=$tab_candidats;
        return view('Admin/candidates',$data);
    }
}
