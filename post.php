<?php
    $link = mysqli_connect(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
    
    $result = mysqli_query($link, 'SELECT * FROM Post WHERE id='.$_GET['id'] );
    $post = mysqli_fetch_assoc($result);



    mysqli_close( $link );

    require "view/post.php";
    
?>