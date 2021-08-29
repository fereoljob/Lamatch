<!DOCTYPE html>
<html lang="fr-FR" itemscope="itemscope" itemtype="https://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>🏠 Accueil - Lamatch</title>

    <link rel="icon" href="https://lamacompta.co/wp-content/themes/oceanwp_child/assets/images/logo-lamacompta-icono.svg" sizes="32x32">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/header.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/pages/home.css" type="text/css" media="all">
</head>

<body id="page-home" class="simple-page">
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
                            <a title="Accueil" href="Accueil" class="menu-link button active">
                                🏠 Accueil
                            </a>
                        </li>

                        <li>
                            <a title="Accéder au Matching !" href="matching-candidate.html" class="menu-link button">
                                ⚡ Matching !
                            </a>
                        </li>

                        <li>
                            <a title="Mon Profil" href="profil" class="menu-link button">
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
                            <a title="Gérer les employeurs" href="admin/companies.html" class="menu-link admin button black">
                                Gérer les employeurs
                            </a>
                        </li>

                        <li>
                            <a title="Gérer les candidats" href="admin/candidates.html" class="menu-link admin button black">
                                Gérer les candidats
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
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
                    <a href="matching-candidate.html" class="button success">
                        Je lance le Matching ! ⚡
                    </a>
                </div>
            </div>
        </section>


    </main><!-- #main -->

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