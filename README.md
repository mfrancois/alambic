Alambic [![GH version](https://badge-me.herokuapp.com/api/gh/mfrancois/alambic.png)](http://badges.enytc.com/for/gh/mfrancois/alambic)
==============================

## Description
Alambic est un outis de création de site sans base de données ni administrations.
Basé sur laravel, et des thèmes bootstrap 3, vous pourrez créer différents sites.

Pour l'utiliser rien de plus simple il vous suffit de crée vos projets dans le répertoire `public/markdown`.

## Demo

Vous pourrez retrouver la documentation du projet alambic sur le site de la [distilleri.es](http://distilleri.es/alambic).



## Installation

Dans un premier temps récupérez le projet, faites un checkout avec le nom que vous désirez :

```sh

    git@github.com:mfrancois/alambic.git projet_test

```

Une fois fait allez dans le projet et installer les dépendances a l'aide de composer


```sh

    composer install

```

Si vous n'avez pas composer installez le [http://getcomposer.org/](http://getcomposer.org/)


#### Dépendances

```json

    "require": {
        "laravel/framework": "4.1.*",
        "dflydev/markdown": "1.0.*",
        "roumen/sitemap": "dev-master"
    },

```


#### Vhosts

Une fois le projet installé il vous faut configurer un domaine pour pouvoir y accéder.
Pour ce faire vous devez pointer le `siteroot` de votre host dans le répertoire `public`.

Imaginons que je veuille configurer mon projet avec en domaine `doc.alambic.dev`.

##### host

```

    127.0.0.1 doc.alambic.dev

```

##### http_vhost

```

    <VirtualHost *:80>
        DocumentRoot "/mfrancois/www/alambic/public"
        ServerName "doc.alambic.dev"
    </VirtualHost>

```

Si tous c'est bien passé vous devriez voir une page s'afficher lorsque vous allez sur le domaine configuré.

![liste](http://distilleri.es/markdown/alambic/_images/readme/liste_proj.png)


## Options



Cléf | Description | Valeurs
----- | ----- | -----------
`template` | Disposition des éléments sur la page d'accueil | `default` ou `grid`
`file_configration` | Nom du fichier de configuration pour chaque projet | `configuration.json`
`use_social` | Activer l'affichage de la barre social sharethis. Si activé il faut configurer le `publisher` | `true` ou `false`
`publisher` | Cléfs de suivit pour sharethis | `b430fc22-****-****-****-********`
`use_comment` | Activer l'affichage des commentaires discus. Si activé il faut configurer le `disqus_shortname` | `true` ou `false`
`disqus_shortname` | Identifiant pour l'utilisation de disqus | `test123454545454`
`theme` | Thème à utiliser pour l'affichage du site | `amedia`, `cerulean`, `cosmo`, `cyborg`, `default`, `flatly`, `journal`, `readable`, `simplex`, `slate`, `spacelab`, `united`, `yeti`
`max_item_in_menu_top` | Nombres de projets à afficher dans le menu haut avant qu'ils se regroupe en dropdown menu | 5
`default_file_in_folder` | Fichier chargé par défaut lors de l'accés à un répertoir | `index`
`color_of_tags` | Tableau des class pour les tags | `array('bootstrap' => 'success')`
`use_analytics` | Activation de l'utilisation de google analytics | `false` ou `true`
`analytics_uid` | Tag analytics pour identifier le site | `UA-*****`


### Choix du thème
Actuellement le projet intègre les thèmes de [bootswatch](http://bootswatch.com/).
Pour intialiser le thème il suffit de vous rendre dans le fichier  `/app/config/project.php`

* amedia
* cerulean
* cosmo
* cyborg
* default
* flatly
* journal
* readable
* simplex
* slate
* spacelab
* united
* yeti

Vous pouvez créer votre propre thème. Pour ce faire créez un répertoire dans le dossier `/public/theme/`.
Dans ce dernier vous pourrez changer ou ajouter tous les styles que vous voulez.
Parté du theme default pour avoir l'intégralité des fichiérs incluts dans le projet.

#### Exemple thème yetti

![liste](http://distilleri.es/markdown/alambic/_images/readme/liste_proj.png)

#### Exemple thème journal
![liste](http://distilleri.es/markdown/alambic/_images/readme/theme.png)

### Configuration du layout de homepage

Il est possible de modifier la variable `template` pour y associé un nouveau layout pour le rendu liste (`default` ou `grid`).

#### Layout en liste
![liste](http://distilleri.es/markdown/alambic/_images/readme/liste_proj.png)

#### Layout en grille

![grille](http://distilleri.es/markdown/alambic/_images/readme/grid.png)


### Internationalisation
Pour configurer le titre de l'application et les diférentes chaines, il suffit que vous alliez dans le fichier `/app/lang/en/project.php`.

```php

    return array(

        /*
        |--------------------------------------------------------------------------
        | Password Reminder Language Lines
        |--------------------------------------------------------------------------
        |
        | The following language lines are the default lines which match reasons
        | that are given by the password broker for a password update attempt
        | has failed, such as for an invalid token or invalid new password.
        |
        */

        "readmore"          => "Lire la suite",
        "title"             => 'Documentation',
        "description"       => "",
        "keyword"           => "",
        'menu_toogle'       => "Toggle navigation",
        'liste'             => "Liste des projets",
        'title_no_result'   => "Pas de résultat",
        'content_no_result' => "Pas de résultat pour le tag demandé.",
        'menu_group'        => "Projets",
        'actions'           => 'Actions',
        'print'             => 'Vue impression',
        'search'             => 'Rechercher'

    );

```


### Recherche
La recherche est basé sur le référencement de l'application.
Pour avoir des résultats il faut dabord que votre application soit référencé.
Pour faciliter le référencement vous pouvez utiliser le google sitemap généré par l'application à l'uri `/sitemap`.


### Allimentation

#### Création d'un projet

Pour crée une nouvelle entrée placez vous dans le répertoire `/public/markdown`.
Créez un répertoir avec le nom que vous voulez (ex:`start`).
Dans ce dernier créez un fichier `configuration.json`, il nous permetra de configurer l'application.

```json

    {
        "name": "Présentation de l'outil",
        "description": "Outil de création de site internet, sans base de données.<br />Uniquement basé sur l'utilisation de fichiers markdown.",
        "keywords": ["markdown", "laravel","bootstrap"],
        "logo": "_images/logo.png"
    }

```


Cléf | Description
----- | ----- | -----------
`name` | Nom du porjet
`description` | Déscription du projet
`keywords` | Mot cléfs
`logo` | Logo affiché


![tree](http://distilleri.es/markdown/alambic/_images/readme/tree.jpg)

#### Gestion du menu

Créez un fichier `index.md` puis un répertoir `folder1` et dedans un fichier `file.md`.
Vous devriez voir un menu comme cella :

![menu non ordonnée](http://distilleri.es/markdown/alambic/_images/readme/menu_no_order.png)



Ajouter un fichier `order.txt` à la racine qui contient :

```

    index | Présentation
    folder1 | Répertoir de test

```

Ajouter un fichier `order.txt` dans le répertoir `folder1` :

```

    file | Fichier

```

Vous devriez voir un menu ordonné.

![menu ordonnée](http://distilleri.es/markdown/alambic/_images/readme/menu_order.png)



License
-------
MIT: http://kezho.mit-license.org/


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/mfrancois/alambic/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

