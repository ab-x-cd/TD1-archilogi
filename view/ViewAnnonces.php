<?php
include_once "View.php";

class ViewAnnonces extends View
{
    public function __construct($layout, $login, $annonces)
    {
        parent::__construct($layout);

        if( $login =='' ){
            header( "refresh:5;url=/annonces/index.php" );
            echo 'Erreur de login et/ou de mot de passe (redirection automatique dans 5 sec.)';
            exit;
        }

        $this->title= 'Exemple Annonces Basic PHP: Annonces';

        $this->content = "<p> Hello $login </p>";
        $this->content.= '<h1>List of Posts</h1>  <ul>';

        foreach( $annonces as $post ) {
            $this->content .= ' <li>';
            $this->content .= '<a href="/annonces/index.php/post?id=' . $post['id'] . '">' . $post['title'] . '</a>';
            $this->content .= ' </li>';

        }

        $this->content.= '</ul>';
    }
}