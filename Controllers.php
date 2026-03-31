<?php
include_once "view/ViewLogin.php";
include_once "view/ViewAnnonces.php";
include_once "view/ViewPost.php";
include_once "AnnoncesChecking.php";

class Controllers
{
    public function loginAction()
    {
        $layout = new Layout("view/layout.html" );
        $vueLogin = new ViewLogin( $layout );

        $vueLogin->display();
    }

    public function annoncesAction($login, $password, $data)
    {
        $annoncesTxt = null;
        if ( AnnoncesChecking::authenticate($login, $password, $data) )
            $annoncesTxt = AnnoncesChecking::getAllAnnonces($data);
        else
            $login = '';

        $layout = new Layout("view/layout.html" );
        $vueAnnonces= new ViewAnnonces( $layout, $login, $annoncesTxt );

        $vueAnnonces->display();
    }

    public function postAction($id, $data)
    {
        $postTxt = AnnoncesChecking::getPost($id, $data);

        $layout = new Layout("view/layout.html" );
        $vuePost= new ViewPost( $layout, $postTxt );

        $vuePost->display();
    }
}
