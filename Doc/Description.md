# But
Ce site web aura pour but de gérer les commandes de billets pour un cinéma. 
# Cas d'utilisation

Il y'aura plusieurs type de comptes tels que:

* Administrateur
* Personnel(employé du cinéma)
* Client
* Client fidèle

Les utilisateurs anonyme pourront:

* Voir les différents films disponible. 
* Voir les séances par jour
* S'inscrire/se connecter

Les clients pourront:

* Sélectionner une scéance
* Sélectionner un nombre de billets
* Voir les places disponibles dans les salle
* Sélectionner une/des place(s) (par rapport au nombre de billets)
* Passer la commande avec un retour par email
* Gérer son compte
* Utiliser un rabais par code

Les Clients fidèles pourront:

* avoir un rabais constant

Les comptes du personnel pourront:

* avoir un rabais constant

Les administrateurs pourront:

* gérer les salles
* gérer les films
* gérer les scéances
* gérer les membres

## Tableau de "permission"
|                                             | anonyme | client | client fidèle | personel | administrateur |
| ------------------------------------------- | ------- | ------ | ------------- | -------- | -------------- |
| Voir les films disponibles                  | X       | X      | X             | X        | X              |
| se connecter                                |         | X      | X             | X        | X              |
| s'inscrire                                  | X       |        |               |          |                |
| voir les scéances par jour                  | X       | X      | X             | X        | X              |
| Sélectionner une scéance                    |         | X      | X             | X        |                |
| Sélectionner un nombre de billets           |         | X      | X             | X        |                |
| Voir les places disponibles dans les salle  |         | X      | X             | X        | X              |
| Sélectionner une/des place(s)               |         | X      | X             | X        |                |
| Passer la commande avec un retour par email |         | X      | X             | X        |                |
| Gérer son compte                            |         | X      | X             | X        | X              |
| Utiliser un rabais par code                 |         | X      | X             | X        |                |
| Avoir un rabais constant                    |         |        | X             | X        |                |
| gérer les salles                            |         |        |               |          | X              |
| gérer les films                             |         |        |               |          | X              |
| gérer les scéances                          |         |        |               |          | X              |
| gérer les membres                           |         |        |               |          | X              |

