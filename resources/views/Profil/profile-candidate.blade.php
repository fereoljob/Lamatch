@extends('gabarit_lamatch');
@section('contenu')
@php
    $position="⚙ Mon Profil";
@endphp
<div id="page-candidate">
    <main>
        <div class="container">
            <h1>Mon Profil</h1>
        </div>
    
        <form action="MajInfosPersos" method="post" enctype="multipart/form-data">
            @csrf
            <section id="intro" class="container">
                <div class="row">
                    <div class="col-5 photo">
                        <div class="img-wrapper  card mb-2 p-0">
                            <img src="/uploads/avatars/{{ $candidat->photo_de_profil }}" width="200"  class="img-thumbnail rounded" alt="Image utilisateur">
                        </div> 
                        <input type="file" name="fic_profil" id="profile-photo" placeholder="Modifier" class="form-control button">
    
                        <label for="newCompe[]" class="mt-5"> <h3>💪Compétences :</h3></label>
                        <select name="newCompe[]" data-toggle="tooltip" id="comps" class="form-control"  data-placement="top" title="Cliquez pour retirer" multiple="multiple" >
                            <option value="infos_compet" disabled>--- Domaine - Compétence ---</option>
                                @foreach ($competences as $competence)
                                        <option value="{{ $competence->domaine_metier."-".$competence->intitule_compe }}"  >{{ $competence->domaine_metier." - ".$competence->intitule_compe }}</option>
                                @endforeach
                        </select>
                        <label for="DomCompe"><h3>Nouvelle compétence ?</h3></label>
                        <br/>
                        <span class="EchecDom text-danger" style="display:none">Renseignez ce champs !!!</span>
                        <input type="text" name="DomCompe"  class="form-control mt-1 w-75" placeholder="Entrez le domaine de compétence" />
                        <div class="row mt-2 mb-2">
                            <span class="EchecCompe text-danger" style="display:none">Renseignez ce champs !!!</span>
                            <input type="text" name="int_compe" class="form-control col ms-3 mt-2 w-75" placeholder="Intitulé compétence...">
                            <button class="button ms-3 fs-5 col ajCp fw-bold ">Ajouter</button>    
                        </div>
                        <label for="newReg[]"> <h3>🚩Régions recherchées :</h3></label>
                        <select name="newReg[]"  data-toggle="tooltip" class="form-control" data-placement="top" title="Cliquez pour retirer" id="regs" multiple="multiple">
                            <option value="infos_regions" disabled>--- Région ---</option>
                            @foreach ($regions as $region)
                               <option value="{{ $region->nom_region }}"  >{{ $region->nom_region }}</option>
                           @endforeach
                        </select>
                        <label for="ajoutRegion"><h3>Nouvelle région ?</h3></label>
                        <br>
                        <span class="EchecReg text-danger" style="display:none">Renseignez ce champs !!!</span>
                        <div class="row mb-2">
                            <input type="text" name="ajoutRegion" class="col form-control mt-2 w-75" placeholder="Entrez la région..." />
                            <button class="ms-3 fs-5 ajRe col fw-bold button">Ajouter</button>
                        </div>
                    </div>
    
                    <div class="col-7 candidate-infos">
                        <ul>
                            <li class="firstname">
                                <label for="prenom"><h3>Prénom :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('prenom')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" class="form-control" name="prenom" id="firstname" value="{{ $candidat->prenom }}">
                            </li>
                           
                            <li class="lastname">
                                <label for="nom"><h3>Nom :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('nom')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" class="form-control" name="nom" id="lastname" value="{{ $candidat->nom }}">
                            </li>
                            
                            <li class="status">
                                <label for="status"><h3>Statut :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" @if ($candidat->recherche==1)
                                        {{ "selected" }}
                                    @endif>En recherche d'opportunités</option>
                                    <option value="0" @if ($candidat->recherche==0)
                                        {{ "selected" }}
                                    @endif>Ne recherche pas en ce moment</option>
                                </select>
                            </li>
                           
                            <li class="birthdate">
                                <label for="date_naissance"><h3>Date de naissance :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('date_naissance')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="date"  class="form-control" name="date_naissance" id="birthdate" value="{{ $candidat->date_naissance  }}">
                            </li>
                           
                            <li class="level-of-study">
                                <label for="niveau_etude"><h3>Niveau d'études :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('niveau_etude')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <select name="niveau_etude" id="level-of-study" class="form-control">
                                    <option value="" disabled @if (!empty($candidat->niv_etude))
                                        {{ "selected" }}
                                    @endif>--- Choisir niveau etude ---</option>
                                    <option value="< Bac" @if ($candidat->niv_etude=="< Bac")
                                        {{ "selected" }}
                                    @endif>< Bac</option>
                                    <option value="Bac" @if ($candidat->niv_etude=="Bac")
                                        {{ "selected" }}
                                    @endif>Bac</option>
                                    <option value="Bac + 2" @if ($candidat->niv_etude=="Bac + 2")
                                        {{ "selected" }}
                                    @endif>Bac + 2</option>
                                    <option value="Bac + 3" @if ($candidat->niv_etude=="Bac + 3")
                                        {{ "selected" }}
                                    @endif>Bac + 3</option>
                                    <option value="Bac + 5" @if ($candidat->niv_etude=="Bac + 5")
                                        {{ "selected" }}
                                    @endif>Bac + 5</option>
                                    <option value="Bac + 8" @if ($candidat->niv_etude=="Bac + 8")
                                        {{ "selected" }}
                                    @endif>Bac + 8</option>
                                </select>
                            </li>
                          
                            <li class="linkedin">
                                <label for="linkedin"><h3>LinkedIn :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('linkedin')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $candidat->LinkedIn}}">
                            </li>
                           
                            <li class="email">
                                <span class="text-danger fs-4">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <label for="email"><h3>📧 Email :</h3></label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $candidat->email }}">
                            </li>
                           
                        </ul>
                        <div class="ms-4">
                            <label for="newValeurs[]" class="mt-5"> <h3> Valeurs :</h3></label>
                            <select name="newValeurs[]" data-toggle="tooltip" id="vals" class="form-control"  data-placement="top" title="Cliquez pour retirer" multiple="multiple" >
                                <option value="infos_valeurs" disabled>--- Valeurs ---</option>
                                    @foreach ($valeurs_candi as $valeur)
                                            <option value="{{ $valeur->valeur }}"  >{{ $valeur->valeur }}</option>
                                    @endforeach
                            </select>
                            <label for="AjoutValeurs"><h3>Nouvelle valeur ?</h3></label>
                            <br/>
                            <span class="EchecVal text-danger" style="display:none">Renseignez ce champs !!!</span>
                            <div class="row mt-2 mb-2">
                                <input type="text" name="AjoutValeurs" class="form-control col ms-3 mt-2 w-75" placeholder="Entrez la valeur ...">
                                <button class=" ms-3 fs-5 col ajVl fw-bold button">Ajouter</button>    
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>
            <input type="hidden" name="id_candidat" value="{{ $candidat->id_candidat }}">
            <div>   
                <div class="validation">
                    <input type="submit" value="💾 Enregistrer" title="Enregistrer mes modifs !" class="infs_pers me-5 button success">
                </div>
            </div>
        </form>
        <form action="" method="">
            <section id="studies" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Formations</h2>
                    </div>
                </div>


                <div class="les_formations mb-2">
                    <p></p>
                    @foreach ($formations as $formation)
                    <div class="row divforma">
                        <div class="col-12 card study">
                            <p class="card-title">
                                {{$formation->intitule_forma}}
                            </p>
        
                            <div class="study-infos infos-inline">
                                <span class="date"> 📅 @php
                                    echo date_format(date_create($formation->date_deb_forma),"d/m/Y")." - ".date_format(date_create($formation->date_fin_forma),"d/m/Y");
                                @endphp</span>
                                <span class="level">👨‍🎓 {{$formation->niv_etude }}</span>
                                <span class="city">🚩 {{ $formation->ville_forma." - ".$formation->pays_forma }}</span>
                                <span class="domain">💼 {{ $formation->domaine }}</span>
                            </div>
        
                            <p class="description mt-5">
                                {{ $formation->description_forma }}
                            </p>
        
                            <div class="row">
                                <div class="col-12 actions" id={{ $formation->id_forma }} >
                                    <a href="" class="button AjoutFormaBut blue1" id="mod" >✏ Modifier</a>
                                    <a href="" class="button danger supforma">🚽 Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="formation_nouvelle">
                    <p></p>
                </div>
               
    
                <div class="row">
                    <div class="col-12 add">
                        <button class="button AjoutFormaBut success">+ Ajouter une formation</button>
                    </div>
                </div>
            </section>
            <div>   
                <div class="validation">
                    <input type="submit" value="💾 Enregistrer" title="Enregistrer mes modifs !" class=" formation_candi me-5 button success">
                </div>
            </div>
        </form>
            
        <form action="" method="">
            
            <section id="experiences" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Expériences professionnelles</h2>
                    </div>
                </div>
    
                <div class="les_experiences mb-2">
                    <p></p>
                    @foreach ($experiences as $experience)
                        <div class="row divExpe">
                            <div class="col-12 card study">
                                <p class="card-title">
                                    {{
                                        $experience->intitule_expe
                                    }}
                                </p>
                                <div class="study-infos infos-inline">
                                    <span class="date"> 📅 @php
                                        echo date_format(date_create($experience->date_deb_expe),"d/m/Y")." - ".date_format(date_create($experience->date_fin_expe),"d/m/Y");
                                    @endphp</span>
                                    <span class="type_contrat">👨‍🎓 {{$experience->type_contrat }}</span>
                                    <span class="city">🚩 {{ $experience->ville_expe." - ".$experience->pays_expe }}</span>
                                    <span class="domain">💼 {{ $experience->domaine }}</span>
                                    <span class="entreprise"> 🏢 {{ $experience->entreprise}}</span>
                                </div>
            
                                <p class="description mt-5">
                                    {{ $experience->description_expe }}
                                </p>
            
                                <div class="row">
                                    <div class="col-12 actions" id={{ $experience->id_experience_pro }} >
                                        <a href="" class="button AjoutExpeBut blue1" id="mod" >✏ Modifier</a>
                                        <a href="" class="button danger supExpe">🚽 Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="experience_nouvelle">
                    <p></p>
                </div>
               
    
                <div class="row">
                    <div class="col-12 add">
                        <button class="button AjoutExpeBut success">+ Ajouter une experience</button>
                    </div>
                </div>
            </section>
            <div>   
                <div class="validation">
                    <input type="submit" value="💾 Enregistrer" title="Enregistrer mes modifs !" class=" experience_candi me-5 button success">
                </div>
            </div>
        </form>
    
    </main><!-- #main -->
    @php
        echo "<script>";
        echo "let le_candi=";
        echo json_encode($candidat->id_candidat);
        echo ";";
        echo "let les_forma=";
        echo json_encode($formations);
        echo ";";
        echo "let les_expe=";
        echo json_encode($experiences);
        echo ";";
        echo "</script>";
    @endphp
    <script>
        $(document).ready(function()
        {
        editionCompe();
        editionRegion();
        editionValeur();

        let tabmodifer = [];
        let tabmodifer2 = [];
        //focus page active
        let accueil = document.querySelector("#accueil");
        let matching = document.querySelector("#matching");
        let profil = document.querySelector("#profil");
        let AdEntre = document.querySelector("#AdEntre");
        let AdCandi = document.querySelector("#AdCandi");
        accueil.classList.remove("active");
        matching.classList.remove("active");
        profil.classList.add("active");
        AdEntre.classList.remove("active");
        AdCandi.classList.remove("active");
        //gestion infos personelles
        let CompeAddBut = document.querySelector(".ajCp");
    CompeAddBut.addEventListener('click',function(e){
        e.preventDefault();
        let champDom = document.querySelector("input[name='DomCompe']");
        let champCompe = document.querySelector("input[name='int_compe']");
        if(champDom.value=="")
        {
            document.querySelector(".EchecDom").style.display ="inline";

        }
        else if(champCompe.value=="")
        {
            document.querySelector(".EchecDom").style.display ="none";
            document.querySelector(".EchecCompe").style.display ="inline";
        }
        else
        {
            let selectCompe = document.querySelector("select[name='newCompe[]']");
            let verif_doublon = false;
            for(let selOption of selectCompe.options)
            {
                if(selOption.value.toLowerCase()==(champDom.value+"-"+champCompe.value).toLowerCase())
                {
                    verif_doublon = true;
                    document.querySelector(".EchecVal").innerHTML = "Valeur déja présente";
                    document.querySelector(".EchecVal").style.display = "inline";
                    break;
                }
            }
            if(!verif_doublon)
            {
                let op = document.createElement("option");
                op.value=champDom.value+"-"+champCompe.value;
                op.innerHTML = champDom.value+" - "+champCompe.value;
                selectCompe.add(op);
                editionCompe();
                champDom.value="";
                champCompe.value="";
                document.querySelector(".EchecDom").style.display ="none";
                document.querySelector(".EchecCompe").style.display ="none";
            }
        }
    });
    let ValeursAddBut = document.querySelector(".ajVl");
        ValeursAddBut.addEventListener('click',function(e){
        e.preventDefault();
        let ChampVal = document.querySelector("input[name='AjoutValeurs']");
        if(ChampVal.value=="")
        {
            document.querySelector(".EchecVal").style.display = "inline";
        }
        else
        {
            let selectVal = document.querySelector("select[name='newValeurs[]']");
            let verif_doublon = false;
            for(let selOption of selectVal.options)
            {
                if(selOption.value.toLowerCase()==ChampVal.value.toLowerCase())
                {
                    verif_doublon = true;
                    document.querySelector(".EchecVal").innerHTML = "Valeur déja présente";
                    document.querySelector(".EchecVal").style.display = "inline";
                    break;
                }
            }
            if(!verif_doublon)
            {
                let op = document.createElement("option");
                op.value = ChampVal.value;
                op.innerHTML = ChampVal.value
                selectVal.add(op);
                ChampVal.value="";
                editionValeur();
                document.querySelector(".EchecVal").style.display = "none";
            }
        }
    });
        traitementInfosPersos();
        let valider_info_per = document.querySelector(".infs_pers")
    valider_info_per.addEventListener('click',function(e){
        for(let sel of document.querySelector("select[name='newCompe[]']").options)
        {
            if(sel.disabled==false)
            {
                sel.selected = "selected";
            }
        }
        for(let sel of document.querySelector("select[name='newReg[]']").options)
        {
            if(sel.disabled==false)
            {
                sel.selected = "selected";
            }
        }
        for(let sel of document.querySelector("select[name='newValeurs[]']").options)
        {
            if(sel.disabled==false)
            {
                sel.selected = "selected";
            }
        }
    });
        //enregistrement experiences modifiées
        traitementAjouExpe(tabmodifer2,les_expe);
        $(".experience_candi").click(function(e){
            e.preventDefault();
            let chaine = "";
            for(let tab in tabmodifer2)
            {
                chaine+=JSON.stringify(tabmodifer2[tab])+"~-";
            }
            $.ajax({
                type:"GET",
                url:"/EnregistrerExpe/?tabmodifer2="+chaine,
                success: function(res){
                    if(res)
                    {
                        console.log(res);
                        tabmodifer = [];
                        window.location.reload();
                    }
                    else
                    {
                        alert("Echec de l'enregistrement");
                    }
                }
            });
        });
        let suppriboutonExpe = $(".supExpe");
       $.each(suppriboutonExpe,function(key,value){
        value.addEventListener('click',function(e){
            e.preventDefault();
            let id_experience = e.target.parentNode.attributes["id"].nodeValue;
            $.ajax({
                type:"GET",
                url:"/SupprimerExpe/?idexpe="+id_experience,
                success:function(res){
                    if(res)
                    {
                        window.location.reload();
                    }
                }
            });
        });
       });
        //formation
        traitementAjouForma(tabmodifer,les_forma);
        $(".formation_candi").click(function(e){
            e.preventDefault();
            let chaine = "";
            for(let tab in tabmodifer)
            {
                chaine+=JSON.stringify(tabmodifer[tab])+"~-";
            }
            $.ajax({
                type:"GET",
                url:"/Enregistrerforma/?tabmodifer="+chaine,
                success: function(res){
                    if(res)
                    {
                        console.log(res);
                        tabmodifer = [];
                        window.location.reload();
                    }
                    else
                    {
                        alert("Echec de l'enregistrement");
                    }
                }
            });
        });
        let suppriboutonsForma = $(".supforma");
       $.each(suppriboutonsForma,function(key,value){
        value.addEventListener('click',function(e){
            e.preventDefault();
            let id_formation = e.target.parentNode.attributes["id"].nodeValue;
            $.ajax({
                type:"GET",
                url:"/SupprimerForma/?idforma="+id_formation,
                success:function(res){
                    if(res)
                    {
                        window.location.reload();
                    }
                }
            });
        });
       });
    });
    </script>
</div>
@endsection