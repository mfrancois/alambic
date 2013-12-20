# Installation

- [GIT & Composer](#git)
- [Dépendances](#dep)
- [Vhosts](#vhosts)
 - [hosts](#hosts)
 - [http_vhost](#http_vhost)
 - [Résultat après configuration](#result)


<a name="git"></a>
## GIT & Composer

Dans un premier temps récupérez le projet, faites un checkout avec le nom que vous désirez :


    git@github.com:mfrancois/laravel-markdown-documentation.git projet_test


Une fois fait allez dans le projet et installer les dépendances a l'aide de composer



    composer install

<div class="alert alert-dismissable alert-info">
Si vous n'avez pas composer installez le http://getcomposer.org/
</div>


<a name="dep"></a>
## Dépendances
Il faut savoir que l'outil se sert de divers librairies et aussi de laravel.


    "require": {
        "laravel/framework": "4.1.*",
        "dflydev/markdown": "1.0.*",
        "roumen/sitemap": "dev-master"
    },


Packagist | Utilisation
--------- | ------------
`laravel/framework` | Framework base des traitements de l'outil
`dflydev/markdown` | Parseur markdown, overider pour gérer les différentes classes automatiquements (balise pre, code)
`roumen/sitemap` | Permet la génération d'un google sitemap


<a name="vhosts"></a>
## Vhosts

Une fois le projet installé il vous faut configurer un domaine pour pouvoir y accéder.
Pour ce faire vous devez pointer le `siteroot` de votre host dans le répertoire `public`.

Imaginons que je veuille configurer mon projet avec en domaine `doc.alambic.dev`.

<a name="host"></a>
### host

    127.0.0.1 doc.alambic.dev


<a name="http_vhost"></a>
### http_vhost


    <VirtualHost *:80>
        DocumentRoot "/mfrancois/www/alambic/public"
        ServerName "doc.alambic.dev"
    </VirtualHost>


<a name="result"></a>
### Résultat après configuration
![liste](/markdown/alambic/_images/readme/liste_proj.png)

<div class="alert alert-dismissable alert-info">
Si tous c'est bien passé vous devriez voir une page s'afficher lorsque vous allez sur le domaine configuré.
</div>