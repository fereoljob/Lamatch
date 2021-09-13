<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class table_entreprises extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entreprises')->insert([
            [
                "nom_entre"=>"Lamacompta",
                "site_web"=>"https://lamacompta.co",
                "email"=>"rh@lamacompta.co",
                "presentation"=>"Startup nantaise créée en 2020,
                 nous sommes animés par l'épanouissement au travail 🤗

                Toute notre équipe œuvre pour offrir aux cabinets d'expertise comptable une
                 nouvelle manière d'aborder le recrutement et aux candidats une plus grande
                  transparence sur leurs opportunités de carrière.
                
                Face à la forte demande des candidats pour plus de transparence et

                 d'authenticité dans les offres d'emploi, Lamacompta est devenue LA 
                 plateforme de recrutement 100% dédiée aux cabinets d'expertise comptable
                  qui permet aux cabinets et aux candidats de se projeter ensemble, grâce
                   à la mise en place d'une marque employeur forte, tournée vers le candidat.
                
                La bonne humeur et le fun sont de rigueur chez nous, car plus nous
                 réalisons nos missions dans un environnement sain et bienveillant,
                  plus nous prenons du plaisir à atteindre nos objectifs, et plus nos
                   collaborateurs et nos clients sont heureux 🥰",
                "domaine_metier"=>"Recrutement"
            ],
            [
                "nom_entre"=>"TGS France",
                "site_web"=>"https://www.tgs-france.fr/",
                "email"=>"recrutement@tgs-france.fr",
                "presentation"=>"Rejoindre TGS France, c'est saisir l'opportunité de grandir
                et envisager plusieurs vies professionnelles.

                Chez nous, chacun·e trouve sa place que vous préfériez produire, conseiller,
                 vendre et/ou manager, vous pourrez vous appuyer sur nos 110 agences et la richesse de nos métiers. De plus, nos écoles et formations internes vous aideront à développer vos compétences.
                
                Parce que nous pouvons booster votre parcours, vous trouverez surtout un 
                groupe qui bouge, qui vit, qui grandit : 50% de nos recrutements sont liés à des créations de poste ! Autrement dit, vous bénéficierez de tous les avantages d’un groupe solide qui souhaite conserver l’autonomie de ses agences et un management de proximité.
                
                Conscients que nous devons avancer avec nos 1400 collaborateurs, nous 
                recrutons des professionnels qui partagent nos valeurs et nos ambitions. 
                Et si c’était vous ?",
                "domaine_metier"=>"Expertise-comptable"
            ],
            [
                "nom_entre"=>"iAdvize",
                "site_web"=>"https://www.iadvize.com/fr/",
                "email"=>"join-us@iadvize.com",
                "presentation"=>"The only conversational platform which combines the best 
                of human and AI to optimize customer experience.

                They humanize the digital experience at scale and make it profitable.
                
                iAdvize is a conversational platform which allows over 2,000 brands in 100
                 countries to humanize digital experiences. By combining the best of human 
                 and artificial intelligence, they help our customers to deploy an authentic 
                 and profitable online conversational strategy at scale.
                  They connect customers with experts who can advise them and are available
                   24/7 via messaging. iAdvize is a ‘Gartner Cool Vendor’ certified platform
                    that generates value for brands such as Disney, TUI, L’Oréal, Nespresso.
                     In 2019, a Forrester study proved that a 64% ROI can be achieved.",
                "domaine_metier"=>"Tech"
            ],
            [
                "nom_entre"=>"Rubato",
                "site_web"=>"https://rubato.fr/",
                "email"=>"rh@rubato.fr",
                "presentation"=>"Une application au service des avocats
                Rubato est une application qui permet la gestion intelligente des échéances
                 pour cabinet d’avocats.
                Comment ?
                –  En traduisant les dossiers des avocats en une Séquence de tâches et de
                 rendez-vous enchaînés
                –  En centralisant toutes les fonctionnalités de la gestion de cabinet
                 : agenda intelligent, tchat par dossier, to do quotidienne …",
                "domaine_metier"=>" Avocat"
            ],
            [
                "nom_entre"=>"kiss my",
                "site_web"=>"https://www.kissmy.co/fr",
                "email"=>"kiss@kissmy.co",
                "presentation"=>"kiss my est une agence web implantée à Nantes.
                 Nous apportons une expertise web complète : UX / UI",
                "domaine_metier"=>"Tech"
            ],
            [
                "nom_entre"=>"Lengow",
                "site_web"=>"https://www.lengow.com/fr/",
                "email"=>"recruit@lengow.com",
                "presentation"=>"Une entreprise technologique dotée d’une forte ambition
                Notre volonté : être une source d’inspiration et de décision pour les
                 marques, distributeurs et agences.
                
                Un outil technique, mais une histoire profondément humaine
                
                Équipes e-commerce & marketing, marques, agences : nous travaillons
                 ensemble à la gestion des données produits, l’automatisation
                  de l’activité sur les marketplaces et l’optimisation des performances 
                  sur les canaux marketing.",
                "domaine_metier"=>"Commerce"
            ],
            [
                "nom_entre"=>"Microsoft",
                "site_web"=>"https://www.microsoft.com/fr-fr/",
                "email"=>"career@microsoft.com",
                "presentation"=>"Microsoft Corporation est une multinationale 
                informatique et micro-informatique américaine, fondée en 1975 par
                 Bill Gates et Paul Allen. Microsoft fait partie des principales 
                 capitalisations boursières du NASDAQ, aux côtés d'Apple et d'Amazon.
                  En 2018, le chiffre d'affaires s’élevait à 110,36 milliards de dollars.
                   Elle est dirigée, depuis le 4 février 2014, par Satya Nadella qui 
                   succède à Steve Ballmer et Bill Gates en qualité de directeur général.
                    En 2020 l'entreprise emploie 148 000 personnes dans 120 pays.",
                "domaine_metier"=>"Tech"
            ],
            [
                "nom_entre"=>"SensioLabs",
                "site_web"=>"https://sensiolabs.com/fr/",
                "email"=>"join@sensiolabs.com",
                "presentation"=>"Pour nous, avancer signifie s'entourer des meilleurs
                 talents en restant ouvert aux nouvelles idées et à l'écoute de ceux qui
                  nous entourent. Notre objectif est de sortir des sentiers battus, de créer,
                   d'innover et de regarder toujours plus loin. Depuis de nombreuses
                    années, les équipes de SensioLabs ont mis tout leur talent, leur cœur, 
                    leur temps et leur énergie au profit de milliers de clients et de projets 
                    web de toutes tailles. C'est le fruit de cette expérience qui a permis 
                    à SensioLabs de créer des outils et produits parmi les plus innovants 
                    du marché",
                "domaine_metier"=>"Tech"
            ],
            [
                "nom_entre"=>"Crisp",
                "site_web"=>"https://crisp.chat/fr/",
                "email"=>"rh@crisp.chat",
                "presentation"=>"En mission pour rendre l’expérience client plus agréable, 
                Crisp c'est 200 000 utilisateurs, créé en France en 2015 et 100% auto-financé",
                "domaine_metier"=>"Tech"
            ]
            
        ]);
    }
}
