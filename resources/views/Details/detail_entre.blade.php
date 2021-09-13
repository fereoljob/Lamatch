@extends('gabarit_lamatch')
@section('contenu')
    @php
        $position = "Lamatch - Détail de l'employeur";
    @endphp
    <div id="page-company" class="simple-page">
        <main>
            <div class="container">
                <h1>Détail Employeur</h1>
            </div>
    
            <section id="intro" class="container">
                <div class="row">
                    <div class="col-5 logo d-flex align-items-center justify-content-center">
                        <img src="/uploads/avatars/{{ $entreprise->logo_entre }}"  width="200"  class="img-thumbnail rounded" alt="Image entreprise">
                    </div>
    
                    <div class="col-7 company-infos d-flex align-items-center">
                        <ul>
                            <li class="name">
                                {{ $entreprise->nom_entre }}
                            </li>
    
                            <li class="workforce">
                                👨‍👩‍👧‍👦 {{ $entreprise->effectifs }} salariés
                            </li>
    
                            <li class="domain">
                                💼 {{ $entreprise->domaine_metier }}
                            </li>
    
                            <li class="regions-targeted">
                                🚩 Recherche en: @foreach ($regions as $item2)
                                {{ "-".$item2->nom_region }}
                            @endforeach
                            </li>
    
                            <li class="creation-year">
                                👶 {{ $entreprise->date_crea}}
                            </li>
    
                            <li class="email">
                                📧
                                <a href="mailto:{{ $entreprise->email }}" title="Contacter  par mail">
                                    {{ $entreprise->email }}
                                </a>
                            </li>
    
                            <li class="website">
                                🌍
                                <a href="{{ $entreprise->site_web }}" title="Se rendre sur le site web de Rubato">
                                   {{ $entreprise->site_web }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
    
            <section id="values" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Valeurs et avantages de {{ $entreprise->nom_entre }}</h2>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12">
                        <ul>
                            @foreach ($valeurs_entre as $item)
                            <li>{{ $item->valeur }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section>
    
            <section id="company-description" class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <h2 class="section-title">Description de {{ $entreprise->nom_entre }} </h2>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12">
                        <p>
                           {{ $entreprise->presentation}} <br>
                        </p>
                    </div>
                </div>
            </section>
    
        </main><!-- #main -->
    
    </div>
@endsection
   
   