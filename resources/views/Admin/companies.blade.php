@extends('gabarit_lamatch')
@section('contenu')
    @php
        $position = "Lamatch - Admin - Gérer les Employeurs";
    @endphp
    <div id="page-companies" class="simple-page">
   
        <main>
            <div class="container">
                <h1>Gérer les Employeurs</h1>
            </div>
    
            <section id="companies" class="container">
                <div class="row">
                    <div class="col-12">
                        @foreach ($tab_entreprises as $item)
                        <form action="detail_entre" method="post" >
                            @csrf
                            <input type="hidden" name="id_entre" value={{ $item["entreprise"]->id_entre }} />
                            <div class="card company p-0"> 
                                <div class="row">
                                    <div class="col-2">
                                        <div class="image-wrapper">
                                            <img src="/uploads/avatars/{{ $item["entreprise"]->logo_entre }}" alt="Logo entreprise">
                                        </div>
                                    </div>
        
                                    <div class="col-7 company-infos-wrapper">
                                        <h3 class="card-title">
                                            {{ $item["entreprise"]->nom_entre }}
                                        </h3>
        
                                        <div class="company-infos">
                                            <ul>
                                                <li class="workforce">
                                                    👨‍👩‍👧‍👦 {{  $item["entreprise"]->effectifs }} salariés
                                                </li>
                
                                                <li class="domain">
                                                    💼  {{ $item["entreprise"]->domaine_metier }}
                                                </li>
        
                                                <li class="regions-targeted">
                                                    🚩 Recherche en : @foreach ($item["regions_entre"] as $item2)
                                                        {{ "-".$item2->nom_region." " }}
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </div>
            
                                    </div>
        
                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                        <button type="submit" class="button show-company" title="Me rendre sur la fiche de l'employeur">
                                            Voir l'employeur >
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
       matching.classList.remove("active");
       profil.classList.remove("active");
       AdEntre.classList.add("active");
       AdCandi.classList.remove("active");
   </script>
@endsection
