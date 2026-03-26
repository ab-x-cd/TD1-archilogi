<?php
    if( !isset( $login) or $login == '' ){
        header( "refresh:5;url=index.php" );
        echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
        exit;
    }
?>



<!DOCTYPE html>
<html lang="fr">
 <head>
  <title>Exemple Blog Basic PHP</title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
 </head>
 <body>
     <p> Hello <?php echo $login; ?> </p>
    <h1>List of Posts</h1>
    <ul>
    <?php foreach( $annonces as $post ) : ?>
        <li>
            <a href="post.php?id=<?php echo $post['id']; ?>">
              <?php echo $post['title']; ?>
            </a>
        </li>
    <?php endforeach ?>


    </ul>

 </body>
</html>