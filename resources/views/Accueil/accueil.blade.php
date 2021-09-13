@extends('gabarit_lamatch')
@section('contenu')
<div id="page-home">
    @php
        $position="🏠 Accueil";
    @endphp
    <main >
        <section id="intro" class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Bienvenue sur Lamatch !</h1>
                </div>
            </div>
        </section>
    
        <section id="stats" class="container">
            <div class="row">
                <div class="col-12 stats-wrapper">
                    <div class="row">
                        <div class="col-3"></div>
    
                        <div class="col-3">
                            <div class="card stat">
                                <p class="stat-figure">{{ $entreprises }}</p>
    
                                <p class="stat-text">
                                    Employeurs
                                </p>
                            </div>
                        </div>
    
                        <div class="col-3">
                            <div class="card stat">
                                <p class="stat-figure color-blue1"> {{ $candidats }}</p>
    
                                <p class="stat-text">
                                    Candidats
                                </p>
                            </div>
                        </div>
    
                        <div class="col-3"></div>
                    </div>
    
                    <div class="row">
                        <div class="col-3"></div>
    
                        <div class="col-3">
                            <div class="card stat">
                                <p class="stat-figure color-danger">{{ $statistiques->matchings }}</p>
    
                                <p class="stat-text">
                                    Matching lancés 🎉
                                </p>
                            </div>
                        </div>
    
                        <div class="col-3">
                            <div class="card stat">
                                <p class="stat-figure color-success">{{ $statistiques->recrutements }}</p>
    
                                <p class="stat-text">
                                    Recrutements bouclés 💪
                                </p>
                            </div>
                        </div>
    
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </section>
    
        <section id="actions" class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="matching" class="button success">
                        Je lance le Matching ! ⚡
                    </a>
                </div>
            </div>
        </section>
        <script>
            let accueil = document.querySelector("#accueil");
            let matching = document.querySelector("#matching");
            let profil = document.querySelector("#profil");
            let AdEntre = document.querySelector("#AdEntre");
            let AdCandi = document.querySelector("#AdCandi");
            accueil.classList.add("active");
            matching.classList.remove("active");
            profil.classList.remove("active");
            AdEntre.classList.remove("active");
            AdCandi.classList.remove("active");
        </script>
    
    </main><!-- #main -->
</div>
@endsection

