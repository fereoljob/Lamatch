@extends('gabarit_lamatch')
@section('contenu')
    @php
        $position = "⚡ Matching - Lamatch";
    @endphp
    <div id="page-matching-candidate" class="simple-page">

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h1>Matching</h1>
                    </div>
    
                    <div class="col-6 d-flex justify-content-end">
                        <div class="launch-wrapper">
                            <a href="" class="button success launch">Lancer un nouveau Matching 🚀</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <section id="intro" class="container">
                <div class="row">
                    <div class="col-12">
                        <p>Voici les candidats qui correspondent à votre profil (d'après notre algorithme ultra sophistiqué 🧐) :</p>
                        <p>Le pourcentage affiché correspond au taux de correspondance calculé entre votre profil et le candidat.</p>
                    </div>
                </div>
            </section>
    
            <section id="companies" class="container">
                <div class="row">
                    <div class="col-12">
                        @foreach ($tab_candidats_match as $item)
                        <form action="detail_candi" method="post" >
                            @csrf
                            <input type="hidden" name="id_candidat" value={{ $item["candidat"]->id_candidat }} />
                            <div class="card company p-0"> 
                                <div class="row">
                                    <div class="col-2">
                                        <div class="image-wrapper">
                                            <img src="/uploads/avatars/{{ $item["candidat"]->photo_de_profil }}" alt="photo de profil candidat">
                                        </div>
                                    </div>
        
                                    <div class="col-7 company-infos-wrapper">
                                        <h3 class="card-title">
                                            {{ $item["candidat"]->nom." ".$item["candidat"]->prenom }}
                                        </h3>
        
                                        <div class="company-infos">
                                            <ul>
                                                <li class="workforce">
                                                    💪 : @foreach ($item["competences"] as $item2)
                                                    {{ "-".$item2->intitule_compe."(".$item2->domaine_metier.") " }}
                                                @endforeach 
                                                </li>
                
                                                <li class="domain">
                                                    💼 :  @foreach ($item["domaine_candi"] as $item2)
                                                    {{ "-".$item2." " }}
                                                @endforeach
                                                </li>
        
                                                <li class="regions-targeted">
                                                    🚩 Recherche en : @foreach ($item["regions_candi"] as $item2)
                                                        {{ "-".$item2->nom_region." " }}
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
            
                                    </div>
        
                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                        <div class="score-wrapper">
                                            <div class="circle-progress p60">
                                                <span class="progress-left">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <span class="progress-right">
                                                    <span class="progress-bar"></span>
                                                </span>
                                                <div class="progress-value">{{ $item["domaine"]+$item["region"]+$item["valeur"]."%" }}</div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-1 show-company-wrapper">
                                        <button type="submit" class="button show-company" title="Me rendre sur la fiche du candidat">
                                            >
                                        </button>
                                    </div>
        
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
    
                </div>
    
                <div class="row">
                    <div class="col-12 text-center show-more-wrapper">
                        <a href="" class="button success" title="Charger plus d'employeurs">En voir plus +</a>
                    </div>
                </div>
            </section>
    
        </main><!-- #main -->
    
       
    </div>
    <script>
         let accueil = document.querySelector("#accueil");
        let matching = document.querySelector("#matching");
        let profil = document.querySelector("#profil");
        let AdEntre = document.querySelector("#AdEntre");
        let AdCandi = document.querySelector("#AdCandi");
        accueil.classList.remove("active");
        matching.classList.add("active");
        profil.classList.remove("active");
        AdEntre.classList.remove("active");
        AdCandi.classList.remove("active");
    </script>
@endsection