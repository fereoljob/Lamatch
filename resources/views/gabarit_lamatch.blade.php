<!DOCTYPE html>
<html lang="fr-FR" itemscope="itemscope" itemtype="https://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @if (isset($position))
        {{ $position }}
    @endif - Lamatch</title>

    <link rel="icon" href="https://lamacompta.co/wp-content/themes/oceanwp_child/assets/images/logo-lamacompta-icono.svg" sizes="32x32">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/header.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/pages/home.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/pages/profile-candidate.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/pages/matching-candidate.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/circle-progress.css" type="text/css" media="all" >
    <link rel="stylesheet" href="css/pages/company.css" type="text/css" media = "all" >
    <script type="text/javascript" src="js/fonctions.js"></script>
</head>

<body class="simple-page">
    @if (Session::get('Echec'))
    <div class="alert alert-danger text-center">
        {{ Session::get('Echec') }}
    </div>
    @endif
    <header id="site-header" class="container pt-5">
        <div class="row">
            <div class="col-3">
                <div id="site-logo" class="">
                    <a href="/">
                        🚀 Lamatch
                    </a>
                </div>
            </div>

            <div class="col-9 d-flex justify-content-end">
                <nav id="navbar" class="navbar me-5">
                    <ul class="navbar-items d-flex">
                        <li>
                            <a title="Accueil" href="Accueil" id="accueil" class="menu-link button">
                                🏠 Accueil
                            </a>
                        </li>

                        <li>
                            <a title="Accéder au Matching !" href="matching" id="matching" class="menu-link button">
                                ⚡ Matching !
                            </a>
                        </li>

                        <li>
                            <a title="Mon Profil" href="profil" id="profil" class="menu-link button">
                                ⚙ Mon Profil
                            </a>
                        </li>

                        <li>
                            <a title="Me déconnecter" href="deconnecter" class="menu-link button logout">
                                <span></span>
                            </a>
                        </li>
                    </ul>
                </nav>

                
                <nav id="navbar-admin" class="navbar">
                    <span class="title">Admin</span>

                    <ul class="navbar-items d-flex">
                        <li>
                            <a title="Gérer les employeurs" href="gestion_company" id="AdEntre" class="menu-link admin button black">
                                Gérer les employeurs
                            </a>
                        </li>

                        <li>
                            <a title="Gérer les candidats" href="gestion_candidates" id="AdCandi" class="menu-link admin button black">
                                Gérer les candidats
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    @yield('contenu')
    <footer id="site-footer" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div class="copyright" role="contentinfo">
                        © Copyright 2021 – Lamatch tous droits réservés
                    </div>
                </div>
            </div>
        </div>
    </footer>
   
</body>
</html>