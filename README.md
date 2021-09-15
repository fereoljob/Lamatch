# Lamatch
* Nécessite PHP 7.3, mysql  Ver 14.14 Distrib 5.7.35, Composer 1.6.3
* git clone https://github.com/fereoljob/Lamatch.git
* Se rendre a la racine du projet
* Entrer composer install
* Entrer ensuite composer require intervention/image
* Renommer le fichier .env.example en .env
* Aller dans le fichier .env et mettez pour la valeur de DB_DATABASE : BD_Lamatch
* Puis renseigner juste en dessous les login de connexion que vous avez renseignez lors de
* l'installation du serveur mysql (DB_USERNAME ET DB_PASSWORD)
* Ensuite revenir a la racine et entrer php artisan key:generate
* Connectez vous au serveur mysql et taper create database BD_Lamatch
* Revenir a la racine puis entrer php artisan migrate
* une fois la base de données et les tables créees
* Entrer a la racine du projet php artisan db:seed
* Entrez ensuite a la racine du projet php artisan serve pour démarrer le serveur
* Dans le navigateur localhost:8000
* Se connecter avec un compte Candidat: identifiant: fereoljob, Password: Motdepasse
* Se connecter avec un compte Entreprise: identifiant: lamacompta, Password: Motdepasse
* Se connecter en tant qu'admin: identifiant: Admin, password:Admin
 


