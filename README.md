# LuxHub

C'est un site web de réservation pour "un petit cinéma" avec base de données inclue

# Installation du site web

## besoin en tant que développer

- Windows 10
- [php 8+](https://www.php.net/downloads)
  - extenstions
    - curl
    - fileinfo
    - gd(ou gd2. Si vous rencontrez des problèmes avec gd2 essayer d'utiliser gd)
    - mbstring
    - pdo_mysql
  - SMTP
    - Pour envoyer des mail, la fonction mail() de php est utilisée donc il faut configurer php.ini avec un serveur de mail
- [MySql community server 8+](https://dev.mysql.com/downloads/mysql/)
- [Node JS](https://nodejs.org/en/)
- Un outil sql qui vous permette de créer et gérer une base de données sql comme [Heidisql](https://www.heidisql.com/download.php)

## Comment installer le serveur

1. Récuperer les fichier sources
2. Utiliser npm pour installer les dépendences directement dans le [dossier source](https://github.com/benjaminMum/LuxHub/tree/main/src)

    ```npm
    npm i
    ```

3. Dézipper l'archive thumnails.zip dans le dossier [thumbnail](https://github.com/benjaminMum/LuxHub/tree/main/src/view/content/img/thumbnail)
4. Executer les deux scriptes sql du [dossier sql](https://github.com/benjaminMum/LuxHub/tree/main/src/sql), [createDataBase.sql](https://github.com/benjaminMum/LuxHub/blob/main/src/sql/createDataBase.sql) puis [createTestData.sql](https://github.com/benjaminMum/LuxHub/blob/main/src/sql/createTestData.sql)
5. Ouvrir le fichier [dbConnector.php](https://github.com/benjaminMum/LuxHub/blob/main/src/model/dbConnector.php) et entrer vos credentials dans la fonction openDBConnexion.
6. Lancer un serveur php dans le répertoire src (Une méthode basique qui permet d'héberger un serveur local est d'utiliser le [serveur web intern de php](https://www.php.net/manual/fr/features.commandline.webserver.php))

   ```php
    php -S localhost:8000
    ```

7. Ouvrer votre navigateur et tapez dans la barre de recherche localhost:8000

# Librairies (NPM dependencies)

- Jquerry
- bootstrap
