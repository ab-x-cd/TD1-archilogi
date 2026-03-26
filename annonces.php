<?php
    $link = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
    
    $query= 'SELECT login FROM Users WHERE login="'.$_POST['login'].'" and password="'.$_POST['password'].'"';
    $resultlogin = mysqli_query($link, $query );
    
    if( mysqli_num_rows( $resultlogin) ){

        $login = $_POST['login'];

        mysqli_free_result( $resultlogin );
        $resultall = mysqli_query($link, 'SELECT id, title FROM Post');

        $annonces = array();
        while ($row = mysqli_fetch_assoc($resultall)) {
            $annonces[] = $row;
        }
    }

    mysqli_close( $link );


require "view/annonces.php";
?>