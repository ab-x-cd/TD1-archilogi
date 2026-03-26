<!DOCTYPE html>
<html lang="fr">
 <head>
  <title>Exemple Blog Basic PHP</title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
 </head>
 <body>

    <h1><?php echo $post['title']; ?></h1>

    <div class="date"> <?php echo $post['date']; ?> </div>
    <div class="body"> <?php echo $post['body']; ?> </div>

 </body>
</html>