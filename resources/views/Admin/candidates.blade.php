@extends('gabarit_lamatch')
@section('contenu')
    @php
        $position = "Lamatch - Admin - Gérer les Candidats";
    @endphp
    <div id="page-candidates" class="simple-page">
  
        <main>
            <div class="container">
                <h1>Gérer les Candidats</h1>
            </div>
    
            <section id="candidates" class="container">
                <div class="row">
                    @foreach ($tab_candidates as $item)
                    <div class="col-4">
                        <div class="card candidate p-0">
                            <div class="image-wrapper">
                                <img src="/uploads/avatars/{{ $item['candidat']->photo_de_profil }}" width="200"  class="img-thumbnail rounded" alt="Image utilisateur">
                            </div>
        
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{
                                         $item['candidat']->prenom
                                    }}
                                </h3>
        
                                <div class="candidate-infos">
                                    <ul>
                                        <li class="status">
                                            @if ($item['candidat']->recherche==1)
                                            {{ "✔ En recherche d'opportunités"}}
                                        @else
                                            {{ " Pas en recherche d'opportunités" }}
                                        @endif
                                        </li>
        
                                        <li class="age">
                                            @if ($item['candidat']->date_naissance)
                                            👶 {{ ((new DateTime(date('Y-m-d')))->diff(new DateTime($item['candidat']->date_naissance)))->y }} ans
                                        @else
                                            👶 {{ "Non renseigné "}}
                                        @endif
                                        </li>
        
                                        <li class="level-of-study">
                                            🎓 {{ $item['candidat']->niv_etude }}
                                        </li>
        
                                        <li class="regions-targeted">
                                            🚩 Recherche en:@foreach ($item['regions_candi'] as $item2)
                                            {{ "-".$item2->nom_region." " }}
                                        @endforeach
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="show-candidate-wrapper">
                                    <a href="" class="button show-candidate" title="Me rendre sur la fiche du candidat">
                                        Voir le candidat >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                   
    
                <div class="row">
                    <div class="col-12 text-center show-more-wrapper">
                        <a href="" class="button success" title="Charger plus de candidats">En voir plus +</a>
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
       matching.classList.remove("active");
       profil.classList.remove("active");
       AdEntre.classList.remove("active");
       AdCandi.classList.add("active");
   </script>
@endsection
