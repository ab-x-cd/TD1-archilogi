<?php
       session_start();
       require_once 'model.php';

       if( isset($_POST['login']) && isset($_POST['password']) && isUser( $_POST['login'], $_POST['password'] ) ) {
	        $_SESSION['login'] = $_POST['login'];
      	    $annonces = getAllAnnonces();
            // Redirection après connexion réussie pour éviter le problème "document expiré"
            header("Location: annonces.php");
            exit;
       }

       $login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
       
       // Récupérer les annonces si l'utilisateur est connecté
       if( $login != '' ) {
           $annonces = getAllAnnonces();
       }

       // inclut le code de la présentation HTML
       require 'view/annonces.php';
?>
