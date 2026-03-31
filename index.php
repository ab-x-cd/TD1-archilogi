<?php
    // Charger les variables d'environnement (.env dans le même répertoire)
    $envPath = __DIR__ . '/.env';
    $env = parse_ini_file($envPath);
    
    if (!$env) {
        die("Impossible de charger le fichier .env depuis: " . $envPath);
    }
    
    include "Model.php";
    include "Controllers.php";
    include "Post.php";
    include "User.php";
try {
    // construction du modèle avec les identifiants du .env
    $dsn = 'mysql:host=' . $env['DB_HOST'] . ';dbname=' . $env['DB_NAME'];
    $pdo = new PDO($dsn, $env['DB_USER'], $env['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $data = new Model($pdo);

    // initialisation du controller
    $controller = new Controllers($data);

} catch (PDOException $e) {
    print "Erreur de connexion !: " . $e->getMessage() . "<br/>";
    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// echo $uri;
// echo '/annonces/index.php/annonces' === $uri;

if ('/annonces/' === $uri || '/annonces/index.php' === $uri) {
    $controller->loginAction();
}

elseif ( '/annonces/index.php/annonces' === $uri && isset($_POST['password'])) {
    $controller->annoncesAction($_POST['login'], $_POST['password'], $data);
}

elseif ( '/annonces/index.php/annonces' === $uri && isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $annonces = $data->getAllAnnonces();
    require 'view/annonces.php';
}

elseif ( '/annonces/index.php/post' == $uri && isset($_GET['id'])) {
    $controller->postAction($_GET['id'], $data);
}
