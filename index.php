<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- /******** HERE ==> YOUR MISSION FOR TODAY ******/
    /***********************************************/  
    Add the missing <meta>
    -->
</head>

<body>
    <div class="sizing" style="width:33%;margin:0 auto;">
        <form method="post" action="blog_post.php">
            <div class="form-group">
                <label>Titre de l'article</label>
                <input type="text" class="form-control" placeholder="Titre" name="titre">
            </div>
            <div class="form-group">
                <label>Description de l'article</label>
                <input type="text" class="form-control" placeholder="Description" name="description">
                <button type="submit" class="btn btn-primary mb-2" name="envoyer">Creer un article</button>
            </div>
        </form>
    </div>

    <?php
    require('database.php'); //include for getAllPosts method in database.php !!

    $posts = getAllPosts();
    var_dump($posts);

    if ($posts) {
        /*while ($donnees = $repostsponse->fetch()) {
            echo '<br><strong>' . htmlspecialchars($donnees['titre']) . '</strong>';
            echo ' : ' . htmlspecialchars($donnees['description']) . '<br>';
        }
        $reponse->closeCursor();*/

        /************* HERE ==> YOUR MISSION FOR TODAY **********/
        /* Add a table to display each post fetched from database */
        /* We could delete from here the selected post */
        /********************************************************/

    } else {
        echo '<div class="alert alert-warning" role="alert">
                Pas encore de post en database !
                </div>';
    }

    ?>

</body>

</html>