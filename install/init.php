<?php

/***********************************************/
/* URL from root projet : /install/init.php    */
/***********************************************/

//active errors
error_reporting(-1);
ini_set('display_errors', 'On');

require('../database.php'); //include for php constants AND second Connexion !!

/********  Functions  **********/
function createDatabase()
{
    //connexion without database !
    try {
        $pdo = new PDO('mysql:host=' . DB_HOST, DB_USER, DB_PASSWORD);
    } catch (Exception $e) {
        // error ? => die the script !!
        die('Erreur : ' . $e->getMessage());
    }
    $requete = "CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

    $result = $pdo->prepare($requete)->execute();
    //var_dump($result);
}
function createPostsTable()
{
    //connexion WITH database specified 
    //No more needed => $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $requete = "CREATE TABLE IF NOT EXISTS `" . DB_TABLE . "`(
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        content VARCHAR(30) NOT NULL)";

    //($db is declared in /database.php !! )
    connectbdd(); //init connexion (allow $db to be set)
    global $db; //needed here because of his global scope !! 

    // on prépare et on exécute la requête
    $result = $db->prepare($requete)->execute();
    //var_dump($result);

    //want to see Globals variables ??
    //var_dump($GLOBALS);
}

/******** HERE ==> YOUR MISSION FOR TODAY ******/
/***********************************************/
function insertExemplePosts()
{
    // TODO : feel it good !
    // Insert 10 random posts in database using the method insertPost in /database.php
}

/********* Actions working stuff  (if a button is clicked)  *******/
if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'database':
            echo '<div class="alert alert-success" role="alert">
                    click for databases ! 
                </div>';
            createDatabase();
            break;
        case 'postsTable':
            echo '<div class="alert alert-success" role="alert">
                    click for posts Table ! 
                </div>';
            createPostsTable();
            break;
        case 'insertPosts':
            echo '<div class="alert alert-success" role="alert">
                        click for insert exemple posts in Posts Table ! 
                    </div>';
            insertExemplePosts();
            break;
        default:
            echo '<div class="alert alert-warning" role="alert">
                    Action do not exist !!
                </div>';
            break;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Init project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- /******** HERE ==> YOUR MISSION FOR TODAY ******/
    /***********************************************/  
    Add the missing <meta>
    -->
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Installation du projet</h1>
            <p class="lead">#BlogFromScratch - Projet RNCP Titre Développeur.se web et web mobile</p>
        </div>
    </div>
    <div class="container">
        <h2>Processus d'installation</h2>
        <div class="row">
            <div class="col-sm">
                <p>I. Créer la Base de données en local<br>
                    ATTENTION : adaptez les paramètres de connexion à la BDD dans fichier database.php</p>
                <a href="?action=database" role="button" class="btn btn-outline-info">Create Database</a>
            </div>
            <div class="col-sm">
                <p>II. Créer la table <?php echo DB_TABLE; ?></p>
                <a href="?action=postsTable" role="button" class="btn btn-outline-info">Create Table</a>
            </div>
            <div class="col-sm">
                <p>III. Importer des données exemples dans la table <?php echo DB_TABLE; ?></p>
                <a href="?action=insertPosts" role="button" class="btn btn-outline-info">Insert Datas</a>
            </div>
        </div>
        <br><br>
        <h2>Rejoindre le projet</h2>
        <div class="row">
            <div class="col-sm">
                <a href="../" target="_blank" class="btn btn-outline-success" role="button">See Project</a>
            </div>

        </div>
    </div>
</body>

</html>