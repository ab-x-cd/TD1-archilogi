<?php

function loginAction()
{
    require 'view/login.php';
}

function annoncesAction( $login, $password)
{
    if( isUser( $login, $password ) ) {
        $_SESSION['login'] = $login;
        // Redirection après connexion réussie pour éviter le problème "document expiré"
        header("Location: /annonces/index.php/annonces");
        exit;
    }
    else {
        $login='';
    }

    require 'view/annonces.php';
}

function postAction($id)
{
    $login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
    $post = getPost($id);
    require 'view/post.php';
}

?>
