### Modelisation des données ###
Pour avoir une vue globale des données que j'aurai à manipulé je commence par la modélisation.
#### Entité candidat
Pour les champs formations, experiences professionnelles et compétences je fais le choix de les retirer et en faire des entités a part entière car un candidat pourrait renseigner plusieurs formations, experience pro...( un champs id_candidat dans ces tables pour chacuns de leurs enregistrements garderait le rapport entre un candidat et ses formations.....)
#### Entité entreprise
Creation des entités regions  et valeurs

#### Entité Utilisateur
Afin de pouvoir identifier la categorie d'utilisateur se connectant à la plateforme je rajoute un champs rôle dans cette table.
Cela me permettrait de restrainte l'acces a un utilisateur pas Administrateur par exemple d'acceder aux pages ou fonctionnalité lié au rôle admin

****
	En ce qui concerne la modélisation je préfère en général passer plus de temps dessus et remettre en question mes propres choix au point d'aboutir a une modélisation vraiment robuste . Tout de même j'y ai quand même passé un peu de temps, donc c'est une première version qui fera l'affaire (autrement je serai pas passer à l'étape suivante :p) ).

****
Pour la page profil du candidat j'ai préferé faire 3 differents formulaire que l'unique qui etait dans le template, pour mieux gerer par groupe les informations a modifier plutot qu'une seule fonction pour toutes les modifs


##Question lors du projet
Comment

###### Ce que j'aurais voulu faire avec plus de temps
Un bouton mot de passe oublié pour la page de connexion
trigger pour la bd en cas d'insertion d'un compte utilisateur pour la creation d'un compte minimaliste candidat ou entreprise editable apres connexion pour completer les informations par l'interessé
chargement photo profil( possibiliter de juste retirer une image charger deja avant de faire enregistrer afin de modifier les autres champs mais pas l'image, un bouton supprimer juste a coté de celui de selection de l'image
la possibilité de pouvoir renseigner email ou nom d'utilisateur lors de la connexion( actuellement que le nom d'utilisateur est reconnu)

La responsivité, les liens du menu qui se chevauchent lors d'un redimensionnement de la fenetre ou des boutons plus fonctionnels au click quand la console est affiché( bouton page login)


La modification d'une formation ou d'une experience genere un ensemble de champs modifiable en bas du bloc comme dans le cas de l'ajout d'une nouvelle formation ou experience (pas tres interessant quand il y a beaucoup de formation car la generation du bloc de modif apres clique du bouton modifier d'une formation apparait totalement en bas du bloc, et l'utilisateur doit defiler avant de le remarquer, mais je l'ai remarqué tardivement) l'idée serait un bloc modifiable generer exactement ou le bouton modifier a été appuyer ou une ancre dans la page pour

Pour l'algo de matching utilisation d'une api pour determiner la distance entre les villes et mieux jauger la correspondance entreprise candidat (si villes voisines par exemple)

Les filtres sur la page de matching afin de fournir un resultat different a chaque click du bouton "je relance la recherche": (en fonction des filtres)
******
Un reel resenti, je suis pas sur d'avoir fait le bon choix dans pas mal d'aspect du test. L'idée etait a chaque fois d'avancer donc je prenais la premiere solution qui me venait  et qui resolvait le probleme. Donc s'il s'avere que lors de votre correction vous pensiez que "non ca aurait été plus simple de faire ci ou ca comme ca" merci quelque soit l'issue de ce test de me laisser ces suggestions (de quoi m'ameliorer,.. deja que avec le test j'ai découvert de nouvelles choses).

Eh oui les fonctionnalités des pages d'administration ne sont pas terminés (fonctionnalités ajout,suppression et modification), ces pages auraient pu etre gérées avec les autres pages et fonctionnalités de base dans la limite du temps qui a été donné mais due a des contraintes de temps (job etudiant) elles font donc parties de ce que j'aurais faire avec plus de temps.

J'ai pas specialenment ressenti un blocage par rapport une fonctionnalité( parmis celles de base) à gérer dans la globalité du test.



