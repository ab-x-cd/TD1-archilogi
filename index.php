<?php

session_start();

require_once 'model.php';
require_once 'controllers.php';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// route la requête en interne
// i.e. lance le bon contrôleur en focntion de la requête effectuée
if ( '/annonces/' == $uri || '/annonces/index.php' == $uri || '/' == $uri) {
    loginAction();
}
elseif ( '/annonces/index.php/annonces' == $uri ) {
    if( isset($_POST['login']) && isset($_POST['password']) ){
        // Connexion via formulaire POST
        annoncesAction($_POST['login'], $_POST['password']);
    }
    elseif( isset($_SESSION['login']) && $_SESSION['login'] != '' ){
        // Accès aux annonces via session (après redirection ou retour)
        $login = $_SESSION['login'];
        $annonces = getAllAnnonces();
        require 'view/annonces.php';
    }
    else {
        // Pas connecté, retour à la page de login
        header("Location: /annonces/index.php");
        exit;
    }
}
elseif ( '/annonces/index.php/post' == $uri
            && isset($_GET['id'])) {

    postAction($_GET['id']);
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}

?>
