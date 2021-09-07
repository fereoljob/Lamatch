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
            $data=["candidat"=>$candidat,"formations"=>$formations,"experiences"=>$experiences,"regions"=>$regions,"competences"=>$competences];
            return view('Profil/profile-candidate',$data);
        }
        else if($user->statut=="Entreprise")
        {

        }
        else
        {

        }
    }
    function MajInfosPersos(Request $requete)
    {
        //validation requete

        $requete->validate([
            "nom"=>"Required",
            "prenom"=>"Required",
            "status"=>"Required",
            "date_naissance"=>"Required",
            "niveau_etude"=>"Required",
            "email"=>"Required|Email"
        ]);
        //traitement de la requete
        $nom = $requete->nom;
        $prenom = $requete->prenom;
        $statut = $requete->status;
        $date_naiss = $requete->date_naissance;
        $niveau_et = $requete->niveau_etude;
        $email = $requete->email;
        $linkedin = isset($requete->linkedin)?$requete->linkedin:"";
        
        DB::table("candidats")->where("id_candidat",$requete->id_candidat)->update(["nom"=>
        $nom,"prenom"=>$prenom,"recherche"=>$statut,"date_naissance"=>$date_naiss,"niv_etude"=>$niveau_et,
        "email"=>$email,"LinkedIn"=>$linkedin]);
        DB::table("competences")->delete();
        if(isset($requete->newCompe))
        {
            foreach($requete->newCompe as $key=>$val)
            {
                $table_resultante = explode("-",$val);
                $dom = trim($table_resultante[0]);
                $comp = trim($table_resultante[1]);
                $candi = $requete->id_candidat;
                DB::table("competences")->insert(["intitule_compe"=>$comp,"domaine_metier"=>$dom,"candidat"=>$candi]);

            }
        }
        DB::table("regions_candi")->delete();
        if(isset($requete->newReg))
        {
           foreach($requete->newReg as $key=>$val)
            {
                $region  = trim($val);
                $candi = $requete->id_candidat;
                DB::table("regions_candi")->insert(["nom_region"=>$region,"id_candidat"=>$candi]);
            }
        }
        return redirect("profil");
    }
    function Majforma(Request $requete)
    {
        if(!empty($requete->tabmodifer))
        {
            $modif = $requete->tabmodifer;
            $infoforma = explode("~-",$modif);
            $succesModtab = [];
            foreach($infoforma as $value)
            {
                if($value!="")
                {
                    $Modobj = json_decode($value);
                    $idcandidat = $Modobj->candidat;
                    $int_form = $Modobj->intitule_forma;
                    $date_deb = $Modobj->date_debut;
                    $date_fin = $Modobj->date_fin;
                    $ville = $Modobj->ville;
                    $pays = $Modobj->pays;
                    $dom = $Modobj->domain;
                    $niv = $Modobj->level;
                    $descri = $Modobj->description;
                    $successMod = DB::table("formations")->insert(["intitule_forma"=>$int_form,'description_forma'=>$descri,
                    'domaine'=>$dom,'niv_etude'=>$niv,'ville_forma'=>$ville,'pays_forma'=>$pays,'date_deb_forma'=>$date_deb
                    ,'date_fin_forma'=>$date_fin,'candidat'=>$idcandidat]);
                    $succesModtab[]=$successMod;
                }
            } 
            return response()->json($succesModtab);
        }
        else
        {
            $succesModtab = ["reponse"=>true];
            return response()->json($succesModtab);
        }
    }
    function SuppForma(Request $requete)
    {
        if($requete->idforma)
        {  
            $result = DB::table("formations")->where("id_forma","=",$requete->idforma)->delete();
            return response()->json($result);
        }
    }
}
