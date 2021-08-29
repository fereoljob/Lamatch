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
    
            <section id="intro" class="container">
                <div class="row">
                    <div class="col-5 photo">
                        <div class="img-wrapper card p-0">
                            <img src="https://burst.shopifycdn.com/photos/portrait-young-man-smiling.jpg?width=1000&format=pjpg&exif=0&iptc=0" class="img-fluid" alt="">
                        </div>
                        <input type="file" name="profile-photo" id="profile-photo" placeholder="Modifier" class="form-control button">
    
                        <label for="skills" class="mt-5">💪 Compétences :</label>
                        <select name="skills" id="skills" class="form-control" multiple="multiple">
                           @foreach ($domaines as $domaine)
                               <option value="" disabled>{{ $domaine->domaine_metier}}</option>
                                @foreach ($competences as $competence)
                                    @if ($competence->domaine_metier==$domaine->domaine_metier)
                                        <option value="">{{ $competence->intitule_compe }}</option>
                                    @endif
                                @endforeach
                           @endforeach
                        </select>
                        <label for="DomCompe">Nouvelle compétence ?</label>
                        <br/>
                        <span class="EchecDom text-danger" style="display:none">Renseignez ce champs !!!</span>
                        <input type="text" name="DomCompe"  class="form-control mt-1 w-75" placeholder="Entrez le domaine de compétence" />
                        <div class="row mt-2 mb-2">
                            <span class="EchecCompe text-danger" style="display:none">Renseignez ce champs !!!</span>
                            <input type="text" name="int_compe" class="form-control col ms-3 mt-2 w-75" placeholder="Intitulé compétence...">
                            <button class=" ms-3 fs-5 col ajCp fw-bold btn btn-primary">Ajouter</button>    
                        </div>
                        <div class="mb-2 new-compe" style="display: none">
                            <select name="newCompe" data-toggle="tooltip" id="comps" class="form-control"  data-placement="top" title="Cliquez pour retirer" multiple>
                                <option value="" disabled>--- Domaine - Compétence ---</option>
                            </select>
                        </div>
                        <label for="regions-targeted">🚩 Régions recherchées :</label>
                        <select name="regions-targeted" id="regions-targeted" class="form-control" multiple="multiple">
                           @foreach ($regions as $region)
                               <option value="">{{ $region }}</option>
                           @endforeach
                        </select>
                        <label for="ajoutRegion">Nouvelle région ?</label>
                        <br>
                        <span class="EchecReg text-danger" style="display:none">Renseignez ce champs !!!</span>
                        <div class="row mb-2">
                            <input type="text" name="ajoutRegion" class="col form-control mt-2 w-75" placeholder="Entrez la région..." />
                            <button class="ms-3 fs-5 ajRe col fw-bold btn btn-primary">Ajouter</button>
                        </div>
                        <div class="mt-1 mb-1 new-reg" style="display: none">
                            <select name="newReg"  data-toggle="tooltip" class="form-control" data-placement="top" title="Cliquez pour retirer" id="regs" multiple></select>
                        </div>
                    </div>
    
                    <div class="col-7 candidate-infos">
                        <ul>
                            <li class="firstname">
                                <label for="prenom">Prénom :</label>
                                <input type="text" class="form-control" name="prenom" id="firstname" value="{{ $candidat->prenom }}">
                            </li>
    
                            <li class="lastname">
                                <label for="nom">Nom :</label>
                                <input type="text" class="form-control" name="prenom" id="lastname" value="{{ $candidat->nom }}">
                            </li>
    
                            <li class="status">
                                <label for="status">Statut :</label>
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
                                <label for="date_naissance">Date de naissance :</label>
                                <input type="date"  class="form-control" name="date_naissance" id="birthdate" value="{{ $candidat->date_naissance  }}">
                            </li>
    
                            <li class="level-of-study">
                                <label for="level-of-study">Niveau d'études :</label>
                                <select name="level-of-study" id="level-of-study" class="form-control">
                                    <option value="" disabled @if ($candidat->niv_etude=="")
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
                                <label for="linkedin">LinkedIn :</label>
                                <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $candidat->LinkedIn}}">
                            </li>
    
                            <li class="email">
                                <label for="email">📧 Email :</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $candidat->email }}">
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </form>
        <form action="Majformations" method="post">
            <section id="studies" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Formations</h2>
                    </div>
                </div>


                <div class="les_formations mb-2">

                    @foreach ($formations as $formation)
                    <div class="row">
                        <div class="col-12 card study">
                            <p class="card-title">
                                {{$formation->intitule_forma}}
                            </p>
        
                            <div class="study-infos infos-inline">
                                <span class="date">📅 {{ $formation->date_deb_forma." - ".$formation->date_fin_forma}}</span>
                                <span class="level">👨‍🎓 {{$formation->niv_etude }}</span>
                                <span class="city">🚩 {{ $formation->ville_forma." - ".$formation->pays_forma }}</span>
                                <span class="domain">💼 {{ $formation->domaine }}</span>
                            </div>
        
                            <p class="description mt-5">
                                {{ $formation->description }}
                            </p>
        
                            <div class="row">
                                <div class="col-12 actions">
                                    <a href="" class="button blue1">✏ Modifier</a>
                                    <a href="" class="button danger">🚽 Supprimer</a>
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
        </form>
            
        <form action="MajExpe" method="post">
            <section id="experiences" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Expériences professionnelles</h2>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12 card study">
                        <p class="card-title">
                            Vendeur polyvalent
                        </p>
    
                        <div class="study-infos infos-inline">
                            <span class="date">📅 06/2018 - 08/2018</span>
                            <span class="contract-type">📝 Intérim</span>
                            <span class="city">🚩 Morlaix (29) - France</span>
                            <span class="domain">💼 Commerce - Vente au détail</span>
                            <span class="company">🏢 Chez Dédé</span>
                        </div>
    
                        <p class="description mt-5">
                            J'ai vendu des oranges, des avocats, des goyaves bio...
                        </p>
    
                        <div class="row">
                            <div class="col-12 actions">
                                <a href="" class="button blue1">✏ Modifier</a>
                                <a href="" class="button danger">🚽 Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12 add">
                        <a href="" class="button success">+ Ajouter une expérience</a>
                    </div>
                </div>
            </section>
        </form>
            <section id="experiences" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Expériences professionnelles</h2>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12 card study">
                        <p class="card-title">
                            Vendeur polyvalent
                        </p>
    
                        <div class="study-infos infos-inline">
                            <span class="date">📅 06/2018 - 08/2018</span>
                            <span class="contract-type">📝 Intérim</span>
                            <span class="city">🚩 Morlaix (29) - France</span>
                            <span class="domain">💼 Commerce - Vente au détail</span>
                            <span class="company">🏢 Chez Dédé</span>
                        </div>
    
                        <p class="description mt-5">
                            J'ai vendu des oranges, des avocats, des goyaves bio...
                        </p>
    
                        <div class="row">
                            <div class="col-12 actions">
                                <a href="" class="button blue1">✏ Modifier</a>
                                <a href="" class="button danger">🚽 Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12 add">
                        <a href="" class="button success">+ Ajouter une expérience</a>
                    </div>
                </div>
            </section>
    
            <section id="actions">
                <input type="submit" value="💾 Enregistrer" title="Enregistrer mes modifs !" class="button success">
            </section>
    
    </main><!-- #main -->
    <script>
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
                let selectCompe = document.querySelector("select[name='newCompe']");
                let op = document.createElement("option");
                op.value=champDom.value+"-"+champCompe.value;
                op.innerHTML = champDom.value+" - "+champCompe.value;
                op.addEventListener('click',function(e){
                    selectCompe.removeChild(op);
                    if(selectCompe.options.length==1)
                    {
                        let divHide = document.querySelector(".new-compe");
                        divHide.style.display ="none";
                    }
                })
                selectCompe.add(op);
                let divHide = document.querySelector(".new-compe");
                divHide.style.display ="inline";
                document.querySelector(".EchecDom").style.display ="none";
                document.querySelector(".EchecCompe").style.display ="none";
            }
        });
        let RegionAddBut = document.querySelector(".ajRe");
        RegionAddBut.addEventListener('click',function(e){
            e.preventDefault();
            let ChampReg = document.querySelector("input[name='ajoutRegion']");
            if(ChampReg.value=="")
            {
                document.querySelector(".EchecReg").style.display = "inline";
            }
            else
            {
                let selectReg = document.querySelector("select[name='newReg']");
                let op = document.createElement("option");
                op.value = ChampReg.value;
                op.innerHTML = ChampReg.value
                op.addEventListener('click',function(e){
                    selectReg.remove(op);
                    if(selectReg.options.length==0)
                    {
                        let divhide = document.querySelector(".new-reg");
                        divhide.style.display="none";
                    }
                });
                selectReg.add(op);
                let divhide = document.querySelector(".new-reg");
                divhide.style.display ="inline";
                document.querySelector(".EchecReg").style.display = "none";
            }
        });
        let ajoutformaBut = document.querySelector(".AjoutFormaBut");
        ajoutformaBut.addEventListener('click',function(e)
        {
            e.preventDefault();
            let divgene = document.createElement("div");
            let ErrorSpan = document.querySelector("span");
            ErrorSpan.innerHTML="Renseigner tous les champs svp !!!";
            ErrorSpan.classList.add("text-danger","error_displaying");
            ErrorSpan.style.display="none";
            divgene.classList.add("row");
            let divcard = document.createElement("div");
            divcard.classList.add("col-12","card","study");
            let pcardtitle = document.createElement("p");
            pcardtitle.classList.add("card-title");
            let inputOfp = document.createElement("input");
            inputOfp.type="text";
            inputOfp.classList.add("form-control","w-25");
            inputOfp.placeholder = "Intitulé formation...";
            inputOfp.name="intitule_forma";
            let divinfoforma = document.createElement("div");
            divinfoforma.classList.add("study-infos","infos-inline","row");
            let span_date = document.createElement("span");
            let span_level = document.createElement("span");
            let span_city = document.createElement("span");
            let span_domaine = document.createElement("span");
            let input_date_deb_forma = document.createElement("input");
            input_date_deb_forma.type = "date";
            input_date_deb_forma.name= "date_debut";
            input_date_deb_forma.dataToggle ="tooltip";
            input_date_deb_forma.dataPlacement ="top"
            input_date_deb_forma.classList.add("form-control");
            input_date_deb_forma.title="Date début formation";
            let input_date_fin_forma = document.createElement("input");
            input_date_fin_forma.type = "date";
            input_date_fin_forma.name= "date_fin";
            input_date_fin_forma.dataToggle ="tooltip";
            input_date_fin_forma.classList.add("ms-4","form-control")
            input_date_fin_forma.dataPlacement ="top";
            input_date_fin_forma.title="Date fin formation";
            let input_level = document.createElement("select");
            input_level.classList.add("form-control");
            let op1 = document.createElement("option");
            op1.innerHTML="--- Choisir niveau d'étude ---";
            op1.disabled="disabled";
            let op2 = document.createElement("option");
            op2.innerHTML = "Bac";
            op2.value="Bac";
            let op3 = document.createElement("option");
            op3.innerHTML = "Bac + 2";
            op3.value="Bac + 2";
            let op4 = document.createElement("option");
            op4.innerHTML = "Bac + 3";
            op4.value="Bac + 3";
            let op5 = document.createElement("option");
            op5.innerHTML = "Bac + 5";
            op5.value="Bac + 5";
            let op6 = document.createElement("option");
            op6.innerHTML = "Bac + 8";
            op6.value="Bac + 8";
            input_level.add(op1);
            let ops = document.createElement("option");
            ops.innerHTML = "< Bac";
            ops.value="< Bac";
            input_level.add(ops);
            input_level.add(op2);
            input_level.add(op3);
            input_level.add(op4);
            input_level.add(op5);
            input_level.add(op6);
            input_level.name="niv_etude";
            let input_city = document.createElement("input");
            input_city.type="text";
            input_city.classList.add("form-control");
            input_city.placeholder = "Ville...";
            input_city.name="ville";
            let input_pays = document.createElement("input");
            input_pays.type="text";
            input_pays.classList.add("form-control","ms-3");
            input_pays.placeholder = "Pays...";
            input_pays.name="Pays";
            let input_domain = document.createElement("input");
            input_domain.type="text";
            input_domain.classList.add("form-control");
            input_domain.placeholder = "Domaine...";
            input_domain.name="domaine";
            let pdescription = document.createElement("p");
            pdescription.classList.add("mt-5");
            let input_description = document.createElement("textarea");
            input_description.placeholder="Entrez une description";
            let divAjout = document.createElement("div");
            divAjout.classList.add("row");
            let divcolbou = document.createElement("div");
            divcolbou.classList.add("col-12","actions");
            let boutAjou = document.createElement("button");
            boutAjou.innerHTML="Ajouter Formation";
            boutAjou.classList.add("button","blue1","validForma");
            divgene.appendChild(divcard);
            divcard.appendChild(ErrorSpan);
            ErrorSpan.classList.add("m-3");
            divcard.appendChild(pcardtitle); 
            pcardtitle.appendChild(inputOfp);
            divcard.appendChild(divinfoforma);
            divinfoforma.append(span_date);
            span_date.classList.add("col-md-2","m-2");
            span_date.append(input_date_deb_forma);
            let span_date2 = document.createElement("span");
            divinfoforma.appendChild(span_date2);
            span_date2.classList.add("col-md-2","m-2")
            span_date2.appendChild(input_date_fin_forma);
            divinfoforma.append(span_level);
            span_level.classList.add("col-md-2","m-2");
            span_level.append(input_level)
            divinfoforma.appendChild(span_city)
            span_city.classList.add("col-md-2","m-2");
            span_city.appendChild(input_city);
            
            let span_pays = document.createElement("span");
            divinfoforma.appendChild(span_pays);
            span_pays.classList.add("col-md-2","m-2")
            span_pays.appendChild(input_pays);

            divinfoforma.appendChild(span_domaine);
            span_domaine.classList.add("col-md-2","m-2");
            span_domaine.appendChild(input_domain);
            divcard.appendChild(pdescription);
            pdescription.appendChild(input_description);
            divcard.appendChild(divAjout);
            divAjout.appendChild(divcolbou);
            let boutAnnuler = document.createElement("button");
            boutAnnuler.innerHTML = "Annuler";
            boutAnnuler.classList.add("button","AnnulerAjout","danger","ms-3"); 
            boutAnnuler.addEventListener('click',function(e){
                e.preventDefault();
                let divformu = document.querySelector(".formation_nouvelle");
                divformu.replaceChild(document.createElement("p"),divformu.childNodes[0]);
            });
            divcolbou.appendChild(boutAjou);
            divcolbou.appendChild(boutAnnuler);
            let divformu = document.querySelector(".formation_nouvelle");
            divformu.replaceChild(divgene,divformu.childNodes[0]);
            boutAjou.addEventListener('click',function(e){
                e.preventDefault();
                let champs_ren=true;
                let les_champs_input = document.querySelectorAll("div[class='formation_nouvelle'] input");
                for(let elem of les_champs_input)
                {
                    if(elem.value=="")
                    {
                        let error_champ = document.querySelector(".error_displaying");
                        error_champ.style.display = "inline";
                        champs_ren=false
                        break;
                    }
                }
                if(champs_ren==true)
                {
                    
                }
            });
        });
    </script>
</div>
@endsection