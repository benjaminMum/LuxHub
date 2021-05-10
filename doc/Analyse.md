# Analyse

## Introduction

Ce projet a pour but de créer un site internet pour "un petit cinéma". Il sera utilisé pour réserver des billets dans les différentes salles du cinéma. Il proposera aux visiteurs les films disponibles.  

## Contexte

Ce site web est l'oeuvre principale de notre groupe de projet web avec base de données de 2èmes années du 4ème trimestre du CPNV. Nous devrons affirmer nos compétences développée au cours des dérniers modules étudié tels que: MA-08, MA-10, ICT-101, ICT-104, ICT-105, ICT-120, ICT-306, ICT-431.

## Organisation

|                      | ProductOwner | ScrumMaster | Dévelopeurs |
| :------------------- | :----------: | :---------: | :---------: |
| Carrel    Xavier     |      X       |             |             |
| Fontana    Benjamin  |              |      X      |      X      |
| Muminovic  Benjamin  |              |             |      X      |
| Collaud    Nathanaël |              |             |      X      |

## Objectifs

### Cas d'utilisation

Il y'aura plusieurs types de comptes tels que:

* Administrateur
* Personnel(employé du cinéma)
* Client
* Client fidèle

Les utilisateurs anonymes pourront:

* Voir les différents films disponibles. 
* Voir les séances par jour
* S'inscrire/se connecter

Tous les comptes instrits sur le site hormis les administrateurs pourront:

* Sélectionner une scéance
* Sélectionner un nombre de billets
* Voir les places disponibles dans les salle
* Sélectionner une/des place(s) (par rapport au nombre de billets)
* Passer une commande avec un retour par email
* Gérer son compte
* Utiliser un code de rabais
* Contacter le cinéma par email
* Voir les différents films disponibles
* Voir les séances par jour
* Se déconnecter

Les comptes Clients fidèles et personnels pourront:

* Avoir un rabais constant

Les administrateurs pourront:

* Gérer les salles
* Gérer les films
* Gérer les scéances
* Gérer les membres
* Se déconnecter

## Tableau de possibilité

|                                              | anonyme | client | client fidèle | personnel | administrateur |
| -------------------------------------------- | :-----: | :----: | :-----------: | :-------: | :------------: |
| Voir les films disponibles                   |    X    |   X    |       X       |     X     |       X        |
| Se connecter                                 |         |   X    |       X       |     X     |       X        |
| S'inscrire                                   |    X    |        |               |           |                |
| Voir les scéances par jour                   |    X    |   X    |       X       |     X     |       X        |
| Sélectionner une scéance                     |         |   X    |       X       |     X     |                |
| Sélectionner un nombre de billets            |         |   X    |       X       |     X     |                |
| Voir les places disponibles dans les salles  |         |   X    |       X       |     X     |       X        |
| Sélectionner une/des place(s)                |         |   X    |       X       |     X     |                |
| Passer une commande avec un retour par email |         |   X    |       X       |     X     |                |
| Gérer son compte                             |         |   X    |       X       |     X     |       X        |
| Utiliser un code de rabais                   |         |   X    |       X       |     X     |                |
| Avoir un rabais constant                     |         |        |       X       |     X     |                |
| Gérer les salles                             |         |        |               |           |       X        |
| Gérer les films                              |         |        |               |           |       X        |
| Gérer les scéances                           |         |        |               |           |       X        |
| Gérer les membres                            |         |        |               |           |       X        |
| Contacter le cinéma par email                |         |   X    |       X       |     X     |       X        |
| Se déconnecter                               |         |   X    |       X       |     X     |       X        |

## Planification initiale

Le projet sera réalisé en 5 sprints

### Sprint 1

Le premier sprint aura pour but de lancer le projet donc ne contiendra pas beaucoup de code.

### Sprint 2

Le deuxième sprint sera dédié à la création de la base de données et des données tests.

### Sprint 3

Le troisième sprint visera à mettre en place le front-end et lancera aussi le travail avec la base de données.

### Sprint 4

Le quatrième sprint sera dédié à la finalisation du site.

### Sprint 5

Le dernier sprint aura pour unique but de faire du testing et du bug fixing.

## Stratégie de tests

### Qui ?

Les premier testeurs seront les membres de l'équipe. Puis nous demanderons un accès au server SwissCenter du CPNV pour pouvoir héberger le site "foncionnel". Nous essayerons de faire tester le site a un maximum de personnes en commençant par nos camarades de classes.

### Comment ?

Les testeurs qui seront dans la classe utiliseront des PC dell avec google chrome. Pour les testeurs externes le site sera hébergé sur SwissCenter et utiliseront leurs matériels. Le but étant que les testeurs puissent essayer le site de fond en comble avec du matériel différent comme un téléphone ou avec un navigateur tel que safari ou firefox.

## Analyse des risques

### Risques techniques

Les risques techniques de types pertes de données sont faibles car nous hébergons tout en local sur trois machines différentes puis sur un cloud synchronisé. En cas de perte d'un ordinateur nous avons la possibilité d'avoir un laptop de remplacement.

### Risques humains

En cas d'absence qui ne nécessite pas d'alitement, les tâches pourront être effectuées en télétravail. Dans le cas contraire, les tâches devront être réparties par le binôme restant. Les cas les moins probables traitant de plus d'une absence devrons être discuter rapidement afin d'accumuler le moins de retard possible.

### Risques juridiques

Au niveau du CPNV, les risques d'une fermeture définitive de l'entreprise sont infinitésimaux. En ce qui concerne une fermeture temporaire (par exemple une période de confinement), les tâches pourront être effectuées en télétravail.
Au niveau de l'hébergement, les risques que SwissCenter ne soit pas en mesure d'héberger notre site sont peu probables mais doivent être pris en compte. Le cas échéant, nous hébergerons temporairement en local.

### Risques sur les délais

En suivant une méthode agile, nous pourrons adapter la charge de travail d'un sprint en fonction de notre avancée et de la proximité du délai.

### Risques intrinsèques à la gestion de projet

Étant donné que nous utilisons la plateforme [IceScrum](https://icescrum.cpnv.ch/p/LUXHUB/#/project) pour gérer l'avancée de notre projet, il est peu probable qu'une tâche soit effectuée par deux personnes en même temps. Si celà devait arriver, la plateforme Github, que nous utilisons pour la gestion de nos documents, permettra de régler les conflits.

## Analyse concurrentielle

Nos plus gros concurents dans ce domaine en suisse sont [pathé](pathe.ch) et leurs différents cinémas puis [cineman](www.cineman.ch). En obsérvant leurs sites pathé ont des films mis en avant, une fonctionalité intéréssante. Et cineman mettent toutes les bandes-annonces au même endroit.

## Journal de bord

![journa de bord de l'équipe FOMUCO](./Journal/journal_de_bord/JDB.png)

## Bilan des objectifs

### Atteints

### Non-atteints

## Bilan des points

### Positif

### Négatif

### Difficultés

### Suites possibles
