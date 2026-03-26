<?php
session_start();
require_once 'model.php';

$post = getPost( $_GET['id'] );

$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';

// inclut le code de la présentation HTML
require 'view/post.php';
?>
