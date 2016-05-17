<?php
    header('Content-type: text/html; charset=iso-8859-1');
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Images\favicon.ico" />

    <title>Smart Store</title>

    <!-- Bootstrap core CSS -->
    <link href="css/app.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost/E4/JEAN-CHARLES/smartstore/smartstore/ecommerce/"><b>Smart Store</b></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if(isset($_SESSION['auth'])): ?>
                <li><a href="logout.php">Se d&eacute;connecter</a></li>
                <li><a href="smartphone.php">Catalogue</a></li>
                <li><a href="contact.php">Nous contacter</a></li>
            <?php else: ?>
                <li><a href="register.php">S'inscrire</a></li>
                <li><a href="login.php">Se connecter</a></li>
                <li><a href="smartphone.php">Catalogue</a></li>
                <li><a href="contact.php">Nous contacter</a></li>
            <?php endif; ?>
          </ul>

          <ul id="panier" class="panier">
            <a href="panier.php" style="text-decoration:none"><img title="Panier" alt="Panier" width="40px" height="40px" src="Images/panier.png" /><span style="color:gold">Mon panier</span></a>
            <li class="items">
                <b>ITEMS</b>
                 <?php

                //compter elements dans panier
                $panier_count = 0;
                if (isset($_SESSION["panier"]))
                {
                  $panier_count = sizeof($_SESSION["panier"]);
                }
                ?>
                <span style="color:gold"><?= $panier_count ?></span>
            </li>
            <li class="total">
                <b>TOTAL</b>
                <span style="color:gold"><?= montantGlobal(); ?> &euro;</span>
            </li>
           </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

    <?php if(isset($_SESSION['flash'])): ?>
        <?php foreach($_SESSION['flash'] as $type => $message): ?>
            <div class="alert alert-<?= $type; ?>">
                <?= $message; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
