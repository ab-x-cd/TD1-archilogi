<?php

class Controllers
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function loginAction()
    {
        require 'view/login.php';
    }

    public function annoncesAction( $login, $password)
    {
        if( $this->data->isUser( $login, $password ) ) {
            $_SESSION['login'] = $login;
            // // Redirection après connexion réussie pour éviter le problème "document expiré"
            // header("Location: /annonces/index.php/annonces");
        
        }
        else {
            $login='';
        }
        // Récupérer le login depuis la session et les annonces
        $login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
        $annonces = $this->data->getAllAnnonces();
        require 'view/annonces.php';
    }

    public function postAction($id)
    {
        $login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
        $post = $this->data->getPost($id);
        require 'view/post.php';
    }

}

?>
