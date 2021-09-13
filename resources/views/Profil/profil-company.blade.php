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
    
        <form action="MajInfosPersosEntre" method="post" enctype="multipart/form-data">
            @csrf
            <section id="intro" class="container">
                <div class="row">
                    <div class="col-5 photo">
                        <div class="img-wrapper  card mb-2 p-0">
                            <img src="/uploads/avatars/{{ $entreprise->logo_entre }}" width="200"  class="img-thumbnail rounded" alt="Image entreprise">
                        </div> 
                        <input type="file" name="fic_profil" id="profile-photo" placeholder="Modifier" class="form-control button">
    
                        <label for="newValeurs[]" class="mt-5"> <h3> Valeurs :</h3></label>
                        <select name="newValeurs[]" data-toggle="tooltip" id="vals" class="form-control"  data-placement="top" title="Cliquez pour retirer" multiple="multiple" >
                            <option value="infos_valeurs" disabled>--- Valeurs ---</option>
                                @foreach ($valeurs_entre as $valeur)
                                        <option value="{{ $valeur->valeur }}"  >{{ $valeur->valeur }}</option>
                                @endforeach
                        </select>
                        <label for="AjoutValeurs"><h3>Nouvelle valeur ?</h3></label>
                        <br/>
                        <span class="EchecVal text-danger" style="display:none">Renseignez ce champs !!!</span>
                        <div class="row mt-2 mb-2">
                            <input type="text" name="AjoutValeurs" class="form-control col ms-3 mt-2 w-75" placeholder="Entrez la valeur ...">
                            <button class=" ms-3 fs-5 col ajVl fw-bold btn btn-primary">Ajouter</button>    
                        </div>
                        <label for="newReg[]"> <h3>🚩 Régions recherchées :</h3></label>
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
                            <button class="ms-3 fs-5 ajRe col fw-bold btn btn-primary">Ajouter</button>
                        </div>
                    </div>
    
                    <div class="col-7 candidate-infos">
                        <ul>
                            <li class="Nom">
                                <label for="Nom"><h3>Nom :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('Nom')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" class="form-control" name="Nom" id="Nom" value="{{ $entreprise->nom_entre }}">
                            </li>
                           
                            <li class="domaine_metier">
                                <label for="domaine_metier"><h3>Domaine métier :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('domaine_metier')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" class="form-control" name="domaine_metier" id="domaine_metier" value="{{ $entreprise->domaine_metier }}">
                            </li>
                            
                           
                            <li class="birthdate">
                                <label for="date_creation"><h3>Date de création :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('date_creation')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="date"  class="form-control" name="date_creation" id="birthdate" value="{{ $entreprise->date_crea  }}">
                            </li>
                           

                          
                            <li class="site_web">
                                <label for="site"><h3>Site web :</h3></label>
                                <span class="text-danger fs-4">
                                    @error('site')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <input type="text" class="form-control" name="site" id="site_web" value="{{ $entreprise->site_web }}">
                            </li>
                           
                            <li class="email">
                                <span class="text-danger fs-4">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <label for="email"><h3>📧 Email RH :</h3></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $entreprise->email }}">
                            </li>
                            <li class="presentation">
                                <span class="text-danger fs-4">
                                    @error('presentation')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <label for="presentation"><h3>📧 Présentation :</h3></label>
                                <textarea name="presentation" id="presentation" cols="60" rows="3">{{ $entreprise->presentation }}</textarea>
                            </li>
                            <li class="effectif">
                                <span class="text-danger fs-4">
                                    @error('effectif')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <label for="effectif"><h3>📧 Effectif :</h3></label>
                                <input type="number" class="form-control" name="effectif" id="effectif" value="{{ $entreprise->effectifs }}">
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </section>
            <input type="hidden" name="id_entreprise" value="{{ $entreprise->id_entre }}">
            <div>   
                <div class="validation">
                    <input type="submit" value="💾 Enregistrer" title="Enregistrer mes modifs !" class="infs_pers me-5 button success">
                </div>
            </div>
        </form>
    <script>
        editionValeur();
        editionRegion();

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
        for(let sel of document.querySelector("select[name='newValeurs[]']").options)
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
    });
        
    </script>
</div>
@endsection