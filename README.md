# claviers-et-souris
site sur les claviers et les souris ergonomiques

Le projet complet est disponible sur GitHub : [OsKaR31415/claviers-et-souris](https://OsKaR31415/claviers-et-souris)



## Plan du site
Voici le plan du site :

```
├── 1-accueil
├── 2-chercher un clavier
├── 3-chercher une souris
├── 4-ajouter un clavier
└── 5-articles
    ├── clavier ergonomiques
    ├── informations sur la base de données
    └── souris ergonomiques
```

## Organisation des fichiers

Tout les fichiers de pages du site (php, html et css) sont à la racine du projet.

Le style de toutes les pages est dans le fichier `style.css`

Le dossier `DB` contient tout ce qui est lié à la base de données, à savoir :
 - `Create_database_struct.sql` le code SQL pour créer la base de données
 - `Create_database_contents.sql` le code SQL pour remplir la base de données
 - `Exemple_de_requetes.sql` quelques requêtes intéressantes sur la base de données
 - Le dossier `images` contient les images de claviers et souris
     - Le dossier `images/clavier` contient toutes les images de clavier
         - chaque image à le même nom que l'attribut `nom` du clavier qui lui correspond dans la BDD
     - Le dossier `images/souris` contient toutes les images de souris
         - chaque image à le même nom que l'attribut `nom` de la souris qui lui correspond dans la BDD



### Fichers de pages

#### Accueil
L'accueil est le fichier `index.php`.

#### Claviers et Souris
Les deux pages pour rechercher des claviers ou des souris sont chacunes séparées en deux parties : un fichier contenant uniquement le formulaire et une partie contenant la structure de la page ainsi que le le code php pour récupérer les informations de la base de données et les afficher.
On a donc les 4 fichiers suivants :
 - `claviers.php` structure et code php pour la recherche de claviers
 - `form_claviers.inc.php` formulaire de recherche des claviers
 - `souris.php` structure et code php pour la recherche de souris
 - `form_souris.inc.php` formulaire de recherche des souris

#### Ajouter un clavier
Le processus pour ajouter un clavier contient 3 étapes pour le site :
 1. afficher le formulaire d'ajout d'un clavier
 2. montrer à l'utilisateur les données entrées formattées, et demander une confirmation
 3. effectuer la requête SQL `INSERT` qui ajoute le bon tuple dans la base de données
Pour cela, 3 fichiers sont utilisés, mais ils ne correspondent pas tout à fait à ces trois étapes :
 - `ajouter.php` uniquement la structure de la page de formulaire
 - `ajouter_clavier.inc.php` le formulaire pour entrer un nouveau clavier
 - `insert_clavier.php` qui contient à la fois le code pour afficher la confirmation, et pour insérer les données dans la BDD

##### Fonctionnement de l'insertion d'un clavier
Lorsque l'utilisateur envoie le formulaire d'ajout d'un clavier, les données sont envoyées à la page `insert_clavier.php`.
Cette page à deux modes : demander une confimation ou bien effectivement insérer les données.
Pour avoir la confirmation des données, la page contient un autre formulaire.
Pour garder en mémoire les données du formulaire précédent lorsque l'utilisateur confirme son ajout, les variables de session sont utilisées.
Ensuite, la même page est rechargêé dans le mode d'insertion des données.


#### Articles

Les deux articles sur les claviers et les souris ergonomiques sont respectivement dans les fichiers `article_claviers.php` et `article_souris.php`

Le fichier `article_bdd.php` contient un article simple qui donne quelques informations sur la base de données, notamment avec une requête SQL contenant une clause `GROUP BY`.


### Entête

L'entête du site est stocké dans le fichier `header.inc.php`, et son style dans la section "navbar" du fichier `style.css`.



