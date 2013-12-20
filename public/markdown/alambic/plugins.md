# Plugins

- [Internationalisation](#language)
- [Sitemap](#sitemap)
- [Recherche](#search)
- [Recherche par tags](#search_by_tag)
- [Impression](#print)

<a name="language"></a>
## Internationalisation
Pour configurer les chaines de l'application (titre,lire la suite...), il suffit que vous alliez dans le fichier `/app/lang/en/project.php`.



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


<a name="sitemap"></a>
## Sitemap

Vous pouvez donner le sitemap pour faciliter le référencement de votre site.
Ce dernier est généré par rapport à ce que vous avez crée comme pages.
Pour le voir il suffit d'utiliser l'uri `/sitemap`

### Exemple de sitemap


        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
            <url>
                <loc>http://doc.distillerie.dev/alambic/allimentation</loc>
                <priority>0.9</priority>
                <lastmod>2013-12-20T00:00:00+00:00</lastmod>
                <changefreq>monthly</changefreq>
            </url>
            <url>
                <loc>http://doc.distillerie.dev/alambic/index</loc>
                <priority>0.9</priority>
                <lastmod>2013-12-20T00:00:00+00:00</lastmod>
                <changefreq>monthly</changefreq>
            </url>
            <url>
                <loc>http://doc.distillerie.dev/alambic/installation</loc>
                <priority>0.9</priority>
                <lastmod>2013-12-20T00:00:00+00:00</lastmod>
                <changefreq>monthly</changefreq>
            </url>
            <url>
                <loc>http://doc.distillerie.dev/alambic/order</loc>
                <priority>0.9</priority>
                <lastmod>2013-12-20T00:00:00+00:00</lastmod>
                <changefreq>monthly</changefreq>
            </url>
            <url>
                <loc>http://doc.distillerie.dev/alambic/plugins</loc>
                <priority>0.9</priority>
                <lastmod>2013-12-20T00:00:00+00:00</lastmod>
                <changefreq>monthly</changefreq>
            </url>
            <url>
            <loc>http://doc.distillerie.dev/alambic/theme</loc>
                <priority>0.9</priority>
                <lastmod>2013-12-20T00:00:00+00:00</lastmod>
                <changefreq>monthly</changefreq>
            </url>
        </urlset>


<a name="search"></a>
## Recherche

La recherche est basé sur le référencement de l'application.
Pour avoir des résultats il faut dabord que votre application soit référencé.
Pour faciliter le référencement vous pouvez utiliser le google sitemap généré par l'application à l'uri `/sitemap`.

<a name="search_by_tag"></a>
## Recherche par tags

La liste des projets peut êtres trié par tags.
Pour cella il suffit d'utiliser l'url qui se trouve sur chaques tags (`/tags/markdown`,`/tags/laravel`,`/tags/jquery`...).
Celle permettra de rechercher par thèmes.

<a name="print"></a>
## Impression

Dans le menu vous avez un menu d'action. Dans ce dernier vous pouvez voir la version imprimable.
Cella affichera l'intégralité de votre projet pour l'imprimé, voir même le convertir en pdf.