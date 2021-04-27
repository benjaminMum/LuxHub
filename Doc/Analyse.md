# Analyse

## Introduction

Ce site web aura pour but de gérer les commandes de billets pour un cinéma.

## Objectifs

### Cas d'utilisation

Il y'aura plusieurs type de comptes tels que:

* Administrateur
* Personnel(employé du cinéma)
* Client
* Client fidèle

Les utilisateurs anonyme pourront:

* Voir les différents films disponible. 
* Voir les séances par jour
* S'inscrire/se connecter

Tous les comptes instrit sur le site hormis les administrateurs pourront:

* Sélectionner une scéance
* Sélectionner un nombre de billets
* Voir les places disponibles dans les salle
* Sélectionner une/des place(s) (par rapport au nombre de billets)
* Passer une commande avec un retour par email
* Gérer son compte
* Utiliser un code de rabais
* Contacter le cinéma par email
* Voir les différents films disponible
* Voir les séances par jour
* Se déconnecter

Les comptes Clients fidèles et personnel pourront:

* Avoir un rabais constant

Les administrateurs pourront:

* Gérer les salles
* Gérer les films
* Gérer les scéances
* Gérer les membres
* Se déconnecter


## Tableau de possibilité
|                                              | anonyme | client | client fidèle | personel | administrateur |
| -------------------------------------------- | ------- | ------ | ------------- | -------- | -------------- |
| Voir les films disponibles                   | X       | X      | X             | X        | X              |
| Se connecter                                 |         | X      | X             | X        | X              |
| S'inscrire                                   | X       |        |               |          |                |
| Voir les scéances par jour                   | X       | X      | X             | X        | X              |
| Sélectionner une scéance                     |         | X      | X             | X        |                |
| Sélectionner un nombre de billets            |         | X      | X             | X        |                |
| Voir les places disponibles dans les salle   |         | X      | X             | X        | X              |
| Sélectionner une/des place(s)                |         | X      | X             | X        |                |
| Passer une commande avec un retour par email |         | X      | X             | X        |                |
| Gérer son compte                             |         | X      | X             | X        | X              |
| Utiliser un code de rabais                   |         | X      | X             | X        |                |
| Avoir un rabais constant                     |         |        | X             | X        |                |
| Gérer les salles                             |         |        |               |          | X              |
| Gérer les films                              |         |        |               |          | X              |
| Gérer les scéances                           |         |        |               |          | X              |
| Gérer les membres                            |         |        |               |          | X              |
| Contacter le cinéma par email                |         | X      | X             | X        | X              |
| Se déconnecter                               |         | X      | X             | X        | X              |