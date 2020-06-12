# Projet Laravel - Médiathèque

> ### Vous devez créer une interface d'une gestion de médiathèque
___
### Instructions

- L'interface permet la consultation de différents types de ressources comme livres, cds, bande dessinée si l'utilisateur est connecté comme **INSCRIT** à la médiathèque
- L'interface doit permettre à n'importe qui de s'inscrire pour aller "réserver" une référence si elle est disponible
- L'interface doit disposer d'un backoffice (dont seul l'admin a les accès) permettant les actions suivantes:

--> ajouter un nouveau `TYPE de support` e.g: dvd, revue

--> ajouter une nouvelle `catégorie`

--> pouvoir enregistrer une nouvelle référence qui pourrait appartenir à une ou plusieurs catégories en même temps

--> libre à vous d'associer des éléments aux références (comme date création, auteur etc.)

--> pouvoir mettre à jour et supprimer une référence

--> pouvoir indiquer le nombre d'unités disponibles pour cette même référence

--> pouvoir indiquer si une référence est **disponible** en fonction du nombre d'unité lié à la référence et les emprunts en cours par les inscrits à la médiathèque

___
:warning: Instructions supplémentaires :warning: 

- Prenez le temps de bien conceptualiser la bdd et ses relations avant de vous lancer directement dans le code
- Le projet final doit Être accessible en ligne.
Il est conseillé d'utiliser [heroku](https://www.heroku.com) associé avec un répo github pour l'hébergement Php (et MySQL avec clearDB) qui sont gratuits et ne nécessitent pas d'~~enregistrer une carte de crédit~~

--> La personne qui "dirige" le groupe doit suivre [ces instructions détaillées](https://github.com/EdenSchoolFrance/training-exercises/blob/master/laravel-courses/10-laravel-heroku.md)

- Ne **PAS** publier/uploader le dossier `vendor/` sur Github
