<?php

class AnnoncesChecking
{

    public static function authenticate($login, $password, $data)
    {
        return ( $data->getUser($login, $password) != null );
    }

    public static function getAllAnnonces($data)
    {
        $annonces = $data->getAllAnnonces();

        $annoncesTxt = array();
        foreach ($annonces as $post){
            $annoncesTxt[] = [ 'id' => $post->getId(), 'title' => $post->getTitle(), 'body' => $post->getBody(), 'date' => $post->getDate() ];
        }

        return $annoncesTxt;
    }

    public static function getPost($id, $data)
    {
        $post = $data->getPost($id);

        return array( 'id' => $post->getId(), 'title' => $post->getTitle(), 'body' => $post->getBody(), 'date' => $post->getDate() );
    }
}
