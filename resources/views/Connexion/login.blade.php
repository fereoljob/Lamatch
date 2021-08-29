<!DOCTYPE html>
<html lang="fr-FR" itemscope="itemscope" itemtype="https://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Lamatch</title>

    <link rel="icon" href="https://lamacompta.co/wp-content/themes/oceanwp_child/assets/images/logo-lamacompta-icono.svg" sizes="32x32">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/header.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/pages/login.css" type="text/css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<body id="page-login">
    <main>
        <div class="container">
            <div class="login-wrapper card">
                <h1 class="color-primary">Lamatch</h1>

                <form action="connecter" method="post">
                    @csrf
                    <div>
                        @if (Session::get("Echec"))
                            <div class="alert alert-danger fs-5">
                                {{ Session::get("Echec") }}
                            </div>
                        @endif
                    </div>
                    <span class="text-danger fs-5">@error('username')
                        {{ $message }}
                    @enderror</span>
                    <input type="text" placeholder="Nom d'utilisateur" name="username" class="form-control">
                    <span class="text-danger fs-5">
                        @error('mdp')
                            {{ $message }}
                        @enderror
                    </span>
                    <input type="password" placeholder="Mot de passe" name="mdp" class="mt-1 form-control">
                    <input type="submit" value="Me connecter" class="mt-1 button">
                </form>
            </div>
        </div>
    </main>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>