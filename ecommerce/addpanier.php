<?php require 'inc/header.php'; ?>
<?php
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }   
    
//stocker les ajouts dans la session
if (isset($_GET["id"]))
{
  if (!isset($_SESSION["panier"]))
  {
    $_SESSION["panier"] = array();
  }

  $ref = $_GET['id'];   
  if (isset($_SESSION["panier"][$ref]))
  {
    $_SESSION["panier"][$ref]++;
  }else{
    $_SESSION["panier"][$ref] = 1;
  }
  // array_push($_SESSION["panier"], $_GET["id"]);
  $_SESSION['flash']['success'] = 'Votre produit a bien ete ajoute au panier.';

}

    header('Location: panier.php');
    exit();
?>
    
