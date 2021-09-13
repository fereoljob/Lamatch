@extends('gabarit_lamatch')
@section('contenu')
    @php
        $position = "Lamatch - Détail du candidat";
    @endphp
    <div id="page-candidate" class="simple-page">

        <main>
            <div class="container">
                <h1>Détail Candidat</h1>
            </div>
    
            <section id="intro" class="container">
                <div class="row">
                    <div class="col-5 photo">
                        <div class="img-wrapper card p-0">
                            <img src="/uploads/avatars/{{ $candidat->photo_de_profil }}" width="200"  class="img-thumbnail rounded" alt="Image utilisateur">
                        </div>
                    </div>
    
                    <div class="col-7 candidate-infos d-flex align-items-center">
                        <ul>
                            <li class="name">
                                {{ $candidat->prenom }}
                            </li>
    
                            <li class="status">
                                @if ($candidat->recherche==1)
                                    {{ "✔ En recherche d'opportunités"}}
                                @else
                                    {{ " Pas en recherche d'opportunités" }}
                                @endif
                                
                            </li>
    
                            <li class="age">
                                @if ($candidat->date_naissance)
                                    👶 {{ ((new DateTime(date('Y-m-d')))->diff(new DateTime($candidat->date_naissance)))->y }} ans
                                @else
                                    {{👶 "Non renseigné "}}
                                @endif
                                
                            </li>
    
                            <li class="level-of-study">
                                🎓 {{ $candidat->niv_etude }}
                            </li>
    
                            <li class="linkedin">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                </svg>
    
                                <a href="{{ $candidat->LinkedIn}}" target="_blank">
                                    Profil LinkedIn
                                </a>
                            </li>
    
                            <li class="email">
                                📧
                                <a href="mailto:{{ $candidat->email }}">
                                    {{ $candidat->email }}
                                </a>
                            </li>
    
                            <li class="regions-targeted">
                                🚩 Recherche en :@foreach ($regions as $item2)
                                {{ "-".$item2->nom_region." " }}
                            @endforeach
                            </li>
    
                            <li class="skills">
                                💪 Compétences : @foreach ($competences as $item2)
                                {{ "-".$item2->intitule_compe."(".$item2->domaine_metier.") " }}
                            @endforeach 
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
    
            <section id="studies" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Formations</h2>
                    </div>
                </div>
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
                    </div>
                </div>
                @endforeach
            </section>
    
            <section id="experiences" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Expériences professionnelles</h2>
                    </div>
                </div>
    
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
                            </div>
                        </div>
                    @endforeach
            </section>
    
            <section id="contact" class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="mailto:{{ $candidat->email }}" class="button">
                            📧 Contacter {{ $candidat->prenom }}
                        </a>
                    </div>
                </div>
            </section>
    
        </main><!-- #main -->
    </div>
@endsection