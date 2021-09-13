<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

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
            $valeurs_candi = DB::table("candidats")
            ->join("valeurs_candi","candidats.id_candidat","=","valeurs_candi.id_candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $data=["candidat"=>$candidat,"valeurs_candi"=>$valeurs_candi,"formations"=>$formations,"experiences"=>$experiences,"regions"=>$regions,"competences"=>$competences];
            return view('Profil/profile-candidate',$data);
        }
        else if($user->statut=="Entreprise")
        {
            $entreprise = DB::table("entreprises")->where("email","=",$user->email)->first();
            $valeurs_entre = DB::table("entreprises")
            ->join("valeurs_entre","entreprises.id_entre","=","valeurs_entre.id_entre")
            ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
            $regions = DB::table("entreprises")
            ->join("regions_entre","entreprises.id_entre","=","regions_entre.id_entre")
            ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
            $data = ["entreprise"=>$entreprise,"valeurs_entre"=>$valeurs_entre,"regions"=>$regions];
            return view('Profil/profil-company',$data);
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
        $lecandi = DB::table('candidats')->where('id_candidat','=',$requete->id_candidat)->first();
        if($requete->hasFile('fic_profil'))
        {
            $avatar = $requete->file('fic_profil');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename ) );
            $resu = DB::table("candidats")->where("id_candidat","=",$lecandi->id_candidat)->update(["photo_de_profil"=>$filename]);
        }
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
        DB::table("competences")->where("candidat","=",$requete->id_candidat)->delete();
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
        DB::table("regions_candi")->where("id_candidat","=",$requete->id_candidat)->delete();
        if(isset($requete->newReg))
        {
           foreach($requete->newReg as $key=>$val)
            {
                $region  = trim($val);
                $candi = $requete->id_candidat;
                DB::table("regions_candi")->insert(["nom_region"=>$region,"id_candidat"=>$candi]);
            }
        }
        DB::table("valeurs_candi")->where("id_candidat","=",$requete->id_candidat)->delete();
        if(isset($requete->newValeurs))
        {
            foreach($requete->newValeurs as $key=>$val)
            {
                $valeur = trim($val);
                $candidat = $requete->id_candidat;
                DB::table("valeurs_candi")->insert(["valeur"=>$valeur,"id_candidat"=>$candidat]);

            }
        }
        return redirect("profil");
    }
    function MajInfosPersosEntre(Request $requete)
    {
         //validation requete

         $requete->validate([
            "Nom"=>"Required",
            "date_creation"=>"Required",
            "email"=>"Required|Email",
            "effectif"=>"Required"
        ]);
        //traitement de la requete
        $lentre = DB::table('entreprises')->where('id_entre','=',$requete->id_entreprise)->first();
        if($requete->hasFile('fic_profil'))
        {
            $avatar = $requete->file('fic_profil');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/uploads/avatars/' . $filename ) );
            $resu = DB::table("entreprises")->where("id_entre","=",$lentre->id_entre)->update(["logo_entre"=>$filename]);
        }
        $nom = $requete->Nom;
        $domaine_meter = isset($requete->domaine_metier)?$requete->domaine_metier:"";
        $date_crea = $requete->date_creation;
        $site_web = isset($requete->site)?$requete->site:"";
        $email = $requete->email;
        $presentation = isset($requete->presentation)?$requete->presentation:"";
        $effectif = isset($requete->effectif)?$requete->effectif:"";
        
        DB::table("entreprises")->where("id_entre",$requete->id_entreprise)->update(["nom_entre"=>
        $nom,"domaine_metier"=>$domaine_meter,"site_web"=>$site_web,"date_crea"=>$date_crea,"presentation"=>$presentation,
        "email"=>$email,"effectifs"=>$effectif]);
        DB::table("valeurs_entre")->where("id_entre","=",$requete->id_entreprise)->delete();
        if(isset($requete->newValeurs))
        {
            foreach($requete->newValeurs as $key=>$val)
            {
                $valeur = trim($val);
                $entreprise = $requete->id_entreprise;
                DB::table("valeurs_entre")->insert(["valeur"=>$valeur,"id_entre"=>$entreprise]);

            }
        }
        DB::table("regions_entre")->where("id_entre","=",$requete->id_entreprise)->delete();
        if(isset($requete->newReg))
        {
           foreach($requete->newReg as $key=>$val)
            {
                $region  = trim($val);
                $entreprise = $requete->id_entreprise;
                DB::table("regions_entre")->insert(["nom_region"=>$region,"id_entre"=>$entreprise]);
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
                if($value!="" && $value!="{}")
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
                    $valeur_niveau = explode(" ",$niv);
                    $leniveau=$niv;
                    if((count($valeur_niveau)==4) && ($valeur_niveau[0]=="Bac"))
                    {
                        $leniveau = trim($valeur_niveau[0])." + ".trim($valeur_niveau[3]);
                    }
                    $descri = $Modobj->description;
                    $successMod = DB::table("formations")->insert(["intitule_forma"=>$int_form,'description_forma'=>$descri,
                    'domaine'=>$dom,'niv_etude'=>$leniveau,'ville_forma'=>$ville,'pays_forma'=>$pays,'date_deb_forma'=>$date_deb
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
    function ValiderModif(Request $requete)
    {
        if(!empty($requete->forma))
        {
            $modif = trim($requete->forma);
            $succesModtab = "";
            if($modif)
            {
                    $Modobj = json_decode($modif);
                    $idcandidat = $Modobj->candidat;
                    $int_form = $Modobj->intitule_forma;
                    $date_deb = $Modobj->date_debut;
                    $date_fin = $Modobj->date_fin;
                    $ville = $Modobj->ville;
                    $pays = $Modobj->pays;
                    $dom = $Modobj->domain;
                    $niv = $Modobj->level;
                    $valeur_niveau = explode(" ",$niv);
                    $leniveau=$niv;
                    if((count($valeur_niveau)==4) && ($valeur_niveau[0]=="Bac"))
                    {
                        $leniveau = trim($valeur_niveau[0])." + ".trim($valeur_niveau[3]);
                    }
                    $descri = $Modobj->description;
                    $successMod = DB::table("formations")->where("id_forma","=",$Modobj->id_format)->update(["intitule_forma"=>$int_form,'description_forma'=>$descri,
                    'domaine'=>$dom,'niv_etude'=>$leniveau,'ville_forma'=>$ville,'pays_forma'=>$pays,'date_deb_forma'=>$date_deb
                    ,'date_fin_forma'=>$date_fin,'candidat'=>$idcandidat]);
                    $succesModtab=$successMod;
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
    function EnregistrerExpe(Request $requete)
    {
        if(!empty($requete->tabmodifer2))
        {
            $modif = $requete->tabmodifer2;
            $infoforma = explode("~-",$modif);
            $succesModtab = [];
            foreach($infoforma as $value)
            {
                if($value!="" && $value!="{}")
                {
                   
                    $Modobj = json_decode($value);

                    $idcandidat = $Modobj->candidat;
                    $int_exp = $Modobj->intitule_expe;
                    $date_deb = $Modobj->date_debut;
                    $date_fin = $Modobj->date_fin;
                    $ville = $Modobj->ville;
                    $pays = $Modobj->pays;
                    $dom = $Modobj->domain;
                    $contrat = $Modobj->contrat;
                    $descri = $Modobj->description;
                    $entreprise = $Modobj->entre;
                    $successMod = DB::table("experiences_pro")->insert(["intitule_expe"=>$int_exp,'description_expe'=>$descri,
                    'domaine'=>$dom,'type_contrat'=>$contrat,'ville_expe'=>$ville,'pays_expe'=>$pays,'date_deb_expe'=>$date_deb
                    ,'date_fin_expe'=>$date_fin,'candidat'=>$idcandidat,"entreprise"=>$entreprise]);
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
    function ValiderModifExpe(Request $requete)
    {
        if(!empty($requete->expe))
        {
            $modif = trim($requete->expe);
            $succesModtab = "";
            if($modif)
            {
                    $Modobj = json_decode($modif);
                    $idcandidat = $Modobj->candidat;
                    $int_exp = $Modobj->intitule_expe;
                    $date_deb = $Modobj->date_debut;
                    $date_fin = $Modobj->date_fin;
                    $ville = $Modobj->ville;
                    $pays = $Modobj->pays;
                    $dom = $Modobj->domain;
                    $contrat = $Modobj->contrat;
                    $descri = $Modobj->description;
                    $entreprise = $Modobj->entre;
                    $successMod = DB::table("experiences_pro")->where("id_experience_pro","=",$Modobj->id_expe)->update(["intitule_expe"=>$int_exp,'description_expe'=>$descri,
                    'domaine'=>$dom,'type_contrat'=>$contrat,'ville_expe'=>$ville,'pays_expe'=>$pays,'date_deb_expe'=>$date_deb
                    ,'date_fin_expe'=>$date_fin,'candidat'=>$idcandidat,"entreprise"=>$entreprise]);
                    $succesModtab=$successMod;
            }
            return response()->json($succesModtab);
        }
        else
        {
            $succesModtab = ["reponse"=>true];
            return response()->json($succesModtab);
        }
    }
    function SupprimerExpe(Request $requete)
    {
        if($requete->idexpe)
        {  
            $result = DB::table("experiences_pro")->where("id_experience_pro","=",$requete->idexpe)->delete();
            return response()->json($result);
        }
    }
    static function appartient($tableau,$valR,$variable)
    {
        $trouve = false;
        if($variable==null)
        {
            foreach($tableau as $value)
            {
                if(strtolower($value)==strtolower($valR))
                {
                    $trouve = true;
                    break;
                }
            }
        }
        else
        {
            foreach($tableau as $value)
            {
                if(strtolower($value->$variable)==strtolower($valR))
                {
                    $trouve = true;
                    break;
                }
            }
        }
        
        return $trouve;
    }
    function matching(Request $requete)
    {
        $user = DB::table('utilisateurs')->where('id_utilisateur',session('LoggedUser'))->first();
        if($user->statut=="Candidat")
        {
            $candidat = DB::table("candidats")->where("email",$user->email)->first();
            $formations=DB::table("candidats")
            ->join("formations","candidats.id_candidat","=","formations.candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $regions_candi=DB::table("candidats")
            ->join("regions_candi","candidats.id_candidat","=","regions_candi.id_candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $valeurs_candi = DB::table("candidats")
            ->join("valeurs_candi","candidats.id_candidat","=","valeurs_candi.id_candidat")
            ->where("candidats.id_candidat","=",$candidat->id_candidat)->get();
            $lesentreprises = DB::table("entreprises")->get();
            //critere (domaine:40 points maxi, valeurs:30point maxi region:30points maxi en fonction du dégré de correspondance)
            $tab_domaine = [];
            $tab_correspondance = [];
            foreach ($formations as $key=>$value)
            {
                if(!(ControleurClient::appartient($tab_domaine,$formations[$key]->domaine,null)))
                {
                    array_push($tab_domaine,$value->domaine);
                }
            }
            foreach($lesentreprises as $key=>$entreprise)
            {
                // en supposant que une entreprise n'opere que dans un seul type de domaine
                if(ControleurClient::appartient($tab_domaine,$entreprise->domaine_metier,null))
                {
                    $tab_correspondance[$entreprise->id_entre]["domaine"]=40;
                }
                else
                {
                    $tab_correspondance[$entreprise->id_entre]["domaine"]=0;
                }
                $valeurs_entre = DB::table("entreprises")
                ->join("valeurs_entre","entreprises.id_entre","=","valeurs_entre.id_entre")
                ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
                $regions_entre = DB::table("entreprises")
                ->join("regions_entre","entreprises.id_entre","=","regions_entre.id_entre")
                ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
                $tab_correspondance[$entreprise->id_entre]["valeur"]=0;
                if(count($valeurs_candi)>=1)
                {
                    $pointValmatch=30/count($valeurs_candi);
                    foreach($valeurs_entre as $key=>$value)
                    {
                        if(ControleurClient::appartient($valeurs_candi,$value->valeur,"valeur"))
                        {
                            $tab_correspondance[$entreprise->id_entre]["valeur"]+=$pointValmatch;
                        }
                    }
                }
                $tab_correspondance[$entreprise->id_entre]["region"]=0;
                
                if(count($regions_candi)>=1)
                {
                    $pointRegmatch = 30/count($regions_candi);
                    foreach($regions_entre as $key=>$value)
                    {
                        if(ControleurClient::appartient($regions_candi,$value->nom_region,"nom_region"))
                        {
                            $tab_correspondance[$entreprise->id_entre]["region"]+=$pointRegmatch;
                        }
                    }
                }
                $tab_correspondance[$entreprise->id_entre]["entreprise"]=$entreprise;
                $tab_correspondance[$entreprise->id_entre]["regions_entre"] = $regions_entre;
            }
            $data["tab_entreprises_match"]=$tab_correspondance;
           
            return view("Matching/matching-candidate",$data);

        }

        else if($user->statut=="Entreprise")
        {
            $entreprise = DB::table("entreprise")->where("email",$user->email)->first();
            $valeurs_entre = DB::table("entreprises")
                ->join("valeurs_entre","entreprises.id_entre","=","valeurs_entre.id_entre")
                ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
                $regions_entre = DB::table("entreprises")
                ->join("regions_entre","entreprises.id_entre","=","regions_entre.id_entre")
                ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
            $lescandidats = DB::table("candidats")->get();
            //critere (domaine:40 points maxi, valeurs:30point maxi region:30points maxi en fonction du dégré de correspondance)
            
            $tab_correspondance = [];
            foreach($lescandidats as $key=>$candidat)
            {
                $tab_domaine = [];
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
                foreach ($formations as $key=>$value)
                {      
                    if(!(ControleurClient::appartient($tab_domaine,$formations[$key]->domaine,null)))
                    {
                        array_push($tab_domaine,$value->domaine);
                    }
                }
                // en supposant que une entreprise n'opere que dans un seul type de domaine
                if(ControleurClient::appartient($tab_domaine,$entreprise->domaine_metier,null))
                {
                    $tab_correspondance[$candidat->id_candidat]["domaine"]=40;
                }
                else
                {
                    $tab_correspondance[$candidat->id_candidat]["domaine"]=0;
                }
                $tab_correspondance[$candidat->id_candidat]["valeur"]=0;
                if(count($valeurs_entre)>=1)
                {
                    $pointValmatch=30/count($valeurs_entre);
                    foreach($valeurs_candi as $key=>$value)
                    {
                        if(ControleurClient::appartient($valeurs_entre,$value->valeur,"valeur"))
                        {
                            $tab_correspondance[$candidat->id_candidat]["valeur"]+=$pointValmatch;
                        }
                    }
                }
                $tab_correspondance[$candidat->id_candidat]["region"]=0;
                
                if(count($regions_entre)>=1)
                {
                    $pointRegmatch = 30/count($regions_entre);
                    foreach($regions_candi as $key=>$value)
                    {
                        if(ControleurClient::appartient($regions_entre,$value->nom_region,"nom_region"))
                        {
                            $tab_correspondance[$candidat->id_candidat]["region"]+=$pointRegmatch;
                        }
                    }
                }
                $tab_correspondance[$candidat->id_candidat]["candidat"]=$candidat;
                $tab_correspondance[$candidat->id_candidat]["regions_candi"] = $regions_candi;
                $tab_correspondance[$candidat->id_candidat]["competences"]=$competences;
            }
            $data["tab_entreprises_match"]=$tab_correspondance;
           
            return view("Matching/matching-company",$data);
        }
        else
        {

        }
    }
    function details_entre(Request $requete)
    {
        if($requete->id_entre)
        {
            $entreprise = DB::table("entreprises")->where("id_entre","=",$requete->id_entre)->first();
            $valeurs_entre = DB::table("entreprises")
            ->join("valeurs_entre","entreprises.id_entre","=","valeurs_entre.id_entre")
            ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
            $regions = DB::table("entreprises")
            ->join("regions_entre","entreprises.id_entre","=","regions_entre.id_entre")
            ->where("entreprises.id_entre","=",$entreprise->id_entre)->get();
            $data = ["entreprise"=>$entreprise,"valeurs_entre"=>$valeurs_entre,"regions"=>$regions];
            return view('Details/detail_entre',$data);
        }
    }
}
