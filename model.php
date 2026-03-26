<?php
    // Load environment configuration
    require_once 'config.php';
    
    // Ouvre la connexion à la base de données
    function openConnection()
    {
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$link) {
            die('Connection failed: ' . mysqli_connect_error());
        }
        return $link;
    }

    // Ferme la connexion à la base de données
    function closeConnection($link) 
    {
        mysqli_close($link);
    }

    // Vérifie si l'utilisateur existe
    function isUser( $login, $password )
    {
        $isuser = False ;
        $link = openConnection();
    
        $query= 'SELECT login FROM Users WHERE login="'.$login.'" and password="'.$password.'"';
        $result = mysqli_query($link, $query );
    
        if( mysqli_num_rows( $result) )
            $isuser = True;
    
        mysqli_free_result( $result );
        closeConnection($link);
    
        return $isuser;
    }


    // Récupère toutes les annonces
    function getAllAnnonces()
    {
        $link = openConnection();
    
        $result = mysqli_query($link,'SELECT id, title FROM Post');
        $annonces = array();
    
        while ($row = mysqli_fetch_assoc($result)) {
            $annonces[] = $row;
        }
    
        mysqli_free_result( $result);
        closeConnection($link);
    
        return $annonces;
    }


    // Récupère un post
     function getPost( $id )
    {
        $link = openConnection();
    
        $id = intval($id);
        $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$id );
        $post = mysqli_fetch_assoc($result);
    
        mysqli_free_result( $result);
        closeConnection($link);
        return $post;
    }   

?>
