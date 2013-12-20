# Allimentation

- [Création d'un projet](#projet)
- [Gestion du menu](#menu)
- [Syntaxe](#syntaxe)


<a name="projet"></a>

## Création d'un projet

Pour crée une nouvelle entrée placez vous dans le répertoire `/public/markdown`.
Créez un répertoir avec le nom que vous voulez (ex:`start`).
Dans ce dernier créez un fichier `configuration.json`, il nous permetra de configurer l'application.

### Contenu du fichier configuration.json

    {
        "name": "Présentation de l'outil",
        "description": "Outil de création de site internet, sans base de données.<br />Uniquement basé sur l'utilisation de fichiers markdown.",
        "keywords": ["markdown", "laravel","bootstrap"],
        "logo": "_images/logo.png"
    }



Cléf | Description
----- | ----- | -----------
`name` | Nom du porjet
`description` | Déscription du projet
`keywords` | Mot cléfs
`logo` | Logo affiché


![liste](/markdown/alambic/_images/readme/liste_proj.png)

<div class="alert alert-dismissable alert-info">
Toutes ces informations sont utilisé pour l'affichage dans la liste est pour les métas données pour le référencement. <strong>Les keywords permettent un filtre sur la liste des projets.</strong>
</div>



<a name="menu"></a>
## Gestion du menu

Créez un fichier `index.md` puis un répertoir `folder1` et dedans un fichier `file.md`.
Vous devriez voir un menu comme cella :

![menu non ordonnée](/markdown/alambic/_images/readme/menu_no_order.png)



Ajouter un fichier `order.txt` à la racine qui contient :


    index | Présentation
    folder1 | Répertoir de test


Ajouter un fichier `order.txt` dans le répertoir `folder1` :


    file | Fichier


Vous devriez voir un menu ordonné.

![menu ordonnée](/markdown/alambic/_images/readme/menu_order.png)



<div class="alert alert-dismissable alert-info">
Les fochiers <strong>order.txt</strong> ne sont pas obligatoire mais sont pratique pour gérer l'affichage et l'ordre dans le menu.
</div>


<a name="syntaxe"></a>
## Syntaxe
Basé sur la syntax markdown vous pouvez aussi utilise des balises html pour créer différents styles.
Comme alambic est basé sur bootstrap vous avez aussi tous les composant qui lui sont associés.

### Exemle d'élément de bootstrap

<div class="alert alert-info">
Test.
</div>


<div class="alert alert-danger">
Test.
</div>


<div class="alert alert-warning">
Test.
</div>


<div class="bs-example" style="margin-bottom: 40px;">
  <span class="label label-default">Default</span>
  <span class="label label-primary">Primary</span>
  <span class="label label-success">Success</span>
  <span class="label label-warning">Warning</span>
  <span class="label label-danger">Danger</span>
  <span class="label label-info">Info</span>
</div>



### Exemple de syntaxe

        ### Basics

        *italic* or _italic_  /  **bold** or __bold__

        An inline link: [example](http://dayoneapp.com/markdown).
        An id link [example][id].
        An auto-linked URL: http://dayoneapp.com/markdown

           [id]: http://dayoneapp.com/markdown


        ### Headers

        # Header 1
        ## Header 2
        ### Header 3
        #### Header 4
        ##### Header 5
        ###### Header 6


        ### Lists

        1. Numbered
        2. List

        - Bulleted
        - List


        ### Images

        ![Alt Text](http://bit.ly/do-image)


        ### Blockquotes

        > Angle brackets are used for blockquotes.


        ### Tables

        One | Two | Three
        --- | --- | ---
        Blue | White | Gray
        Green | Yellow | Red


        ### Horizontal Rules

        Three or more dashes or asterisks

        ---


        ### Code & Preformatted Text

        `<code>` spans are delimited by backticks. You can include literal backticks like `` `this` ``.

            Preformatted text block using a tab.


### Basics

*italic* or _italic_  /  **bold** or __bold__

An inline link: [example](http://dayoneapp.com/markdown).
An id link [example][id].
An auto-linked URL: http://dayoneapp.com/markdown

   [id]: http://dayoneapp.com/markdown


### Headers

# Header 1
## Header 2
### Header 3
#### Header 4
##### Header 5
###### Header 6


### Lists

1. Numbered
2. List

- Bulleted
- List


### Images

![Alt Text](http://bit.ly/do-image)


### Blockquotes

> Angle brackets are used for blockquotes.


### Tables

One | Two | Three
--- | --- | ---
Blue | White | Gray
Green | Yellow | Red


### Horizontal Rules

Three or more dashes or asterisks

---


### Code & Preformatted Text

`<code>` spans are delimited by backticks. You can include literal backticks like `` `this` ``.

    Preformatted text block using a tab.