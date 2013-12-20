# Thème

- [Pésentation](#pres)
- [Configuration du layout de homepage](#layout)

<a name="pres"></a>
## Présentation

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


### Exemple thème yetti

![liste](/markdown/alambic/_images/readme/liste_proj.png)

### Exemple thème journal
![liste](/markdown/alambic/_images/readme/theme.png)


<a name="layout"></a>
## Configuration du layout de homepage

Il est possible de modifier la variable `template` pour y associé un nouveau layout pour le rendu liste (`default` ou `grid`).

### Layout en liste
![liste](/markdown/alambic/_images/readme/liste_proj.png)

### Layout en grille

![grille](/markdown/alambic/_images/readme/grid.png)