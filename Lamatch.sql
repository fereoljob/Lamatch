-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 15 Septembre 2021 à 15:14
-- Version du serveur :  5.7.35-0ubuntu0.18.04.1
-- Version de PHP :  7.3.30-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Lamatch`
--

-- --------------------------------------------------------

--

--
-- Contenu de la table `candidats`
--

INSERT INTO `candidats` (`id_candidat`, `nom`, `prenom`, `recherche`, `email`, `date_naissance`, `photo_de_profil`, `niv_etude`, `LinkedIn`) VALUES
(1, 'ROGER', 'Jean-Eudes', 0, 'jean-eudes@gmail.com', NULL, NULL, NULL, NULL),
(2, 'BICHON', 'Zakaria', 0, 'zakariadu44@gmail.com', NULL, NULL, NULL, NULL),
(3, 'LA BRANCHE', 'Marie-Ange', 0, 'marie-ange@free.fr', NULL, NULL, NULL, NULL),
(4, 'DE MONACO', 'Géraldine', 0, 'geraldine@monaco.com', NULL, NULL, NULL, NULL),
(5, 'CHARO', 'Matuidi', 0, 'charo.matuidi@gmail.com', NULL, NULL, NULL, NULL),
(6, 'GUOGE', 'Matéo', 0, 'matguoge@gmail.com', NULL, NULL, NULL, NULL),
(7, 'RAMTAH', 'Mohamed', 0, 'mohamed@gmail.com', NULL, NULL, NULL, NULL),
(8, 'LEROUX', 'Leslie', 0, 'leslie@gmail.com', '2021-09-30', NULL, '< Bac', ''),
(9, 'ADJAMAGBO', 'salma', 0, 'salma@gmail.com', NULL, NULL, NULL, NULL),
(10, 'BRULLON', 'Audrey', 0, 'audreybrullon@gmail.com', NULL, NULL, NULL, NULL),
(11, 'FOUASSON', 'Jason', 0, 'jasonfouasson@gmail.com', NULL, NULL, NULL, NULL),
(12, 'LEROUX', 'Killian', 0, 'killian@lamacompta.co', '2021-09-16', NULL, '< Bac', ''),
(13, 'POTENCIER', 'Fabien', 0, 'fabienyear@symfony.com', NULL, NULL, NULL, NULL),
(14, 'YOU', 'Evan', 0, 'evant.you@vue.js', NULL, NULL, NULL, NULL),
(15, 'LERDORF', 'Rasmus', 0, 'lesdorf@msn.com', NULL, NULL, NULL, NULL),
(16, 'DUNGLAS', 'Kevin', 0, 'dunglas@gmail.com', NULL, NULL, NULL, NULL),
(17, 'EICH', 'Brendan', 0, 'brendan-eich@outlook.com', NULL, NULL, NULL, NULL),
(18, 'GATES', 'Bill', 0, 'biil@gates.com', NULL, NULL, NULL, NULL),
(19, 'MUSK', 'Elon', 0, 'elon.mush@yahoo.com', NULL, NULL, NULL, NULL),
(20, 'JOB', 'Fereol', 0, 'job.fereol@email.com', '2021-06-21', '1631644165.jpg', '< Bac', '');

-- --------------------------------------------------------

--

-- Contenu de la table `competences`
--

INSERT INTO `competences` (`id_compe`, `intitule_compe`, `domaine_metier`, `sous_dom_cat`, `candidat`) VALUES
(4, 'php', 'Informatique', NULL, 20),
(5, 'Droit des affaires', 'Droit', NULL, 20),
(6, 'Droit juridique', 'Droit', NULL, 20),
(7, 'competence_test', 'Recrutement', NULL, 20);

-- --------------------------------------------------------

--
-
--
-- Contenu de la table `entreprises`
--

INSERT INTO `entreprises` (`id_entre`, `nom_entre`, `logo_entre`, `date_crea`, `site_web`, `email`, `presentation`, `effectifs`, `domaine_metier`) VALUES
(1, 'Lamacompta', NULL, '2021-09-06', 'https://lamacompta.co', 'rh@lamacompta.co', 'Startup nantaise créée en 2020,\r\n                 nous sommes animés par l\'épanouissement au travail 🤗\r\n\r\n                Toute notre équipe œuvre pour offrir aux cabinets d\'expertise comptable une\r\n                 nouvelle manière d\'aborder le recrutement et aux candidats une plus grande\r\n                  transparence sur leurs opportunités de carrière.\r\n                \r\n                Face à la forte demande des candidats pour plus de transparence et\r\n\r\n                 d\'authenticité dans les offres d\'emploi, Lamacompta est devenue LA \r\n                 plateforme de recrutement 100% dédiée aux cabinets d\'expertise comptable\r\n                  qui permet aux cabinets et aux candidats de se projeter ensemble, grâce\r\n                   à la mise en place d\'une marque employeur forte, tournée vers le candidat.\r\n                \r\n                La bonne humeur et le fun sont de rigueur chez nous, car plus nous\r\n                 réalisons nos missions dans un environnement sain et bienveillant,\r\n                  plus nous prenons du plaisir à atteindre nos objectifs, et plus nos\r\n                   collaborateurs et nos clients sont heureux 🥰', 24, 'Recrutement'),
(2, 'TGS France', NULL, '2021-09-01', 'https://www.tgs-france.fr/', 'recrutement@tgs-france.fr', 'Rejoindre TGS France, c\'est saisir l\'opportunité de grandir\r\n                et envisager plusieurs vies professionnelles.\r\n\r\n                Chez nous, chacun·e trouve sa place que vous préfériez produire, conseiller,\r\n                 vendre et/ou manager, vous pourrez vous appuyer sur nos 110 agences et la richesse de nos métiers. De plus, nos écoles et formations internes vous aideront à développer vos compétences.\r\n                \r\n                Parce que nous pouvons booster votre parcours, vous trouverez surtout un \r\n                groupe qui bouge, qui vit, qui grandit : 50% de nos recrutements sont liés à des créations de poste ! Autrement dit, vous bénéficierez de tous les avantages d’un groupe solide qui souhaite conserver l’autonomie de ses agences et un management de proximité.\r\n                \r\n                Conscients que nous devons avancer avec nos 1400 collaborateurs, nous \r\n                recrutons des professionnels qui partagent nos valeurs et nos ambitions. \r\n                Et si c’était vous ?', 20, 'Expertise-comptable'),
(3, 'iAdvize', NULL, '2021-10-02', 'https://www.iadvize.com/fr/', 'join-us@iadvize.com', 'The only conversational platform which combines the best \r\n                of human and AI to optimize customer experience.\r\n\r\n                They humanize the digital experience at scale and make it profitable.\r\n                \r\n                iAdvize is a conversational platform which allows over 2,000 brands in 100\r\n                 countries to humanize digital experiences. By combining the best of human \r\n                 and artificial intelligence, they help our customers to deploy an authentic \r\n                 and profitable online conversational strategy at scale.\r\n                  They connect customers with experts who can advise them and are available\r\n                   24/7 via messaging. iAdvize is a ‘Gartner Cool Vendor’ certified platform\r\n                    that generates value for brands such as Disney, TUI, L’Oréal, Nespresso.\r\n                     In 2019, a Forrester study proved that a 64% ROI can be achieved.', 16, 'Tech'),
(4, 'Rubato', NULL, NULL, 'https://rubato.fr/', 'rh@rubato.fr', 'Une application au service des avocats\n                Rubato est une application qui permet la gestion intelligente des échéances\n                 pour cabinet d’avocats.\n                Comment ?\n                –  En traduisant les dossiers des avocats en une Séquence de tâches et de\n                 rendez-vous enchaînés\n                –  En centralisant toutes les fonctionnalités de la gestion de cabinet\n                 : agenda intelligent, tchat par dossier, to do quotidienne …', NULL, ' Avocat'),
(5, 'kiss my', NULL, NULL, 'https://www.kissmy.co/fr', 'kiss@kissmy.co', 'kiss my est une agence web implantée à Nantes.\n                 Nous apportons une expertise web complète : UX / UI', NULL, 'Tech'),
(6, 'Lengow', NULL, NULL, 'https://www.lengow.com/fr/', 'recruit@lengow.com', 'Une entreprise technologique dotée d’une forte ambition\n                Notre volonté : être une source d’inspiration et de décision pour les\n                 marques, distributeurs et agences.\n                \n                Un outil technique, mais une histoire profondément humaine\n                \n                Équipes e-commerce & marketing, marques, agences : nous travaillons\n                 ensemble à la gestion des données produits, l’automatisation\n                  de l’activité sur les marketplaces et l’optimisation des performances \n                  sur les canaux marketing.', NULL, 'Commerce'),
(7, 'Microsoft', NULL, NULL, 'https://www.microsoft.com/fr-fr/', 'career@microsoft.com', 'Microsoft Corporation est une multinationale \n                informatique et micro-informatique américaine, fondée en 1975 par\n                 Bill Gates et Paul Allen. Microsoft fait partie des principales \n                 capitalisations boursières du NASDAQ, aux côtés d\'Apple et d\'Amazon.\n                  En 2018, le chiffre d\'affaires s’élevait à 110,36 milliards de dollars.\n                   Elle est dirigée, depuis le 4 février 2014, par Satya Nadella qui \n                   succède à Steve Ballmer et Bill Gates en qualité de directeur général.\n                    En 2020 l\'entreprise emploie 148 000 personnes dans 120 pays.', NULL, 'Tech'),
(8, 'SensioLabs', NULL, NULL, 'https://sensiolabs.com/fr/', 'join@sensiolabs.com', 'Pour nous, avancer signifie s\'entourer des meilleurs\n                 talents en restant ouvert aux nouvelles idées et à l\'écoute de ceux qui\n                  nous entourent. Notre objectif est de sortir des sentiers battus, de créer,\n                   d\'innover et de regarder toujours plus loin. Depuis de nombreuses\n                    années, les équipes de SensioLabs ont mis tout leur talent, leur cœur, \n                    leur temps et leur énergie au profit de milliers de clients et de projets \n                    web de toutes tailles. C\'est le fruit de cette expérience qui a permis \n                    à SensioLabs de créer des outils et produits parmi les plus innovants \n                    du marché', NULL, 'Tech'),
(9, 'Crisp', NULL, NULL, 'https://crisp.chat/fr/', 'rh@crisp.chat', 'En mission pour rendre l’expérience client plus agréable, \n                Crisp c\'est 200 000 utilisateurs, créé en France en 2015 et 100% auto-financé', NULL, 'Tech');

-- --------------------------------------------------------

--

-- --------------------------------------------------------

--



--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id_forma`, `intitule_forma`, `description_forma`, `domaine`, `sous_dom_cat`, `niv_etude`, `ville_forma`, `pays_forma`, `date_deb_forma`, `date_fin_forma`, `candidat`) VALUES
(1, 'Licence TéléInformatique', 'Licence generaliste', 'Tech', NULL, 'Bac + 3', 'Angers', 'France', '2021-09-01', '2021-10-10', 20),
(2, 'Finance', 'Etude des finances', 'Commerce', NULL, 'Bac + 3', 'Angers', 'France', '2021-09-07', '2021-09-23', 12),
(3, 'Licence 3 comptabilité', 'Une formation généraliste dans la comptabilité', 'Expertise-Comptable', NULL, 'Bac + 3', 'Cotonou', 'Bénin', '2021-09-02', '2021-09-22', 8);

-- --------------------------------------------------------

--


--



--

-- Contenu de la table `regions_candi`
--

INSERT INTO `regions_candi` (`id_region`, `nom_region`, `id_candidat`) VALUES
(20, 'Bretagne', 20),
(21, 'Lorraine', 20),
(22, 'Ile de France', 20),
(23, 'Aquitaine', 20),
(24, 'Basse-Normandie', 12);

-- --------------------------------------------------------

--


--
-- Contenu de la table `regions_entre`
--

INSERT INTO `regions_entre` (`id_region`, `nom_region`, `id_entre`) VALUES
(14, 'Ile de France', 1),
(15, 'Auvergne', 1),
(16, 'Rennes', 1),
(17, 'Basse-Normandie', 3),
(18, 'Bretagne', 3),
(20, 'Aquitaine', 2);

-- --------------------------------------------------------

--

-- Contenu de la table `stats`
--

INSERT INTO `stats` (`id_stat`, `info_stats`, `matchings`, `recrutements`) VALUES
(1, 'informations_stat', 21.00, 0.00);

-- --------------------------------------------------------

--


-- --------------------------------------------------------

--

-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `username`, `email`, `password`, `statut`) VALUES
(1, 'lamacompta', 'rh@lamacompta.co', 'Motdepasse', 'Entreprise'),
(2, 'tgs', 'recrutement@tgs-france.fr', 'Motdepasse', 'Entreprise'),
(3, 'iadvize', 'join-us@iadvize.com', 'Motdepasse', 'Entreprise'),
(4, 'rubato', 'rh@rubato.fr', 'Motdepasse', 'Entreprise'),
(5, 'kissmy', 'kiss@kissmy.co', 'Motdepasse', 'Entreprise'),
(6, 'lengow', 'recruit@lengow.com', 'Motdepasse', 'Entreprise'),
(7, 'microsoft', 'career@microsoft.com', 'Motdepasse', 'Entreprise'),
(8, 'sensiolabs', 'join@sensiolabs.com', 'Motdepasse', 'Entreprise'),
(9, 'crisp', 'rh@crisp.chat', 'Motdepasse', 'Entreprise'),
(10, 'jean-eudesroger', 'jean-eudes@gmail.com', 'Motdepasse', 'Candidat'),
(11, 'zakariabichon', 'zakariadu44gmail.com', 'Motdepasse', 'Candidat'),
(12, 'marieangelabranche', 'marie-ange@free.fr', 'Motdepasse', 'Candidat'),
(13, 'geraldinedemonaco', 'geraldine@monaco.com', 'Motdepasse', 'Candidat'),
(14, 'matuidicharo', 'charo.matuidi@gmail.com', 'Motdepasse', 'Candidat'),
(15, 'mateoguoge', 'matguoge@gmail.com', 'Motdepasse', 'Candidat'),
(16, 'mohamedramtah', 'mohamed@gmail.com', 'Motdepasse', 'Candidat'),
(17, 'leslieleroux', 'leslie@gmail.com', 'Motdepasse', 'Candidat'),
(18, 'salmaadjamagbo', 'salma@gmail.com', 'Motdepasse', 'Candidat'),
(19, 'audreybrullon', 'audreybrullon@gmail.com', 'Motdepasse', 'Candidat'),
(20, 'jasonfouasson', 'jasonfouasson@gmail;COM', 'Motdepasse', 'Candidat'),
(21, 'killianleroux', 'killian@lamacompta.co', 'Motdepasse', 'Candidat'),
(22, 'fabienpotencier', 'fabienyear@symfony.com', 'Motdepasse', 'Candidat'),
(23, 'rasmuslerdord', 'lesdorf@msn.com', 'Motdepasse', 'Candidat'),
(24, 'evanyou', 'evant.you@vue.js', 'Motdepasse', 'Candidat'),
(25, 'kevindunglas', 'dunglas@gmail.com', 'Motdepasse', 'Candidat'),
(26, 'brendaneich', 'brendan-eich@outlook.com', 'Motdepasse', 'Candidat'),
(27, 'billgates', 'bill@gates.com', 'Motdepasse', 'Candidat'),
(28, 'elonmush', 'elon.mush@yahoo.com', 'Motdepasse', 'Candidat'),
(29, 'fereoljob', 'job.fereol@email.com', 'Motdepasse', 'Candidat'),
(30, 'Admin', 'admin@email.com', 'admin', 'Admin');

-- --------------------------------------------------------

--

--
-- Contenu de la table `valeurs_candi`
--

INSERT INTO `valeurs_candi` (`id_valeur`, `valeur`, `id_candidat`) VALUES
(32, 'Respect de l\'environnement', 20),
(33, 'Bienveillance', 20),
(34, 'Bien-être au travail', 20);

-- --------------------------------------------------------

--

--
-- Contenu de la table `valeurs_entre`
--

INSERT INTO `valeurs_entre` (`id_valeur`, `valeur`, `id_entre`) VALUES
(13, 'Respect de l\'environnement', 1),
(14, 'Bienveillance', 1),
(15, 'Bien-être au travail', 3),
(16, 'Bienveillance', 3),
(17, 'Bienveillance', 2),
(18, 'Accompagnement', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
