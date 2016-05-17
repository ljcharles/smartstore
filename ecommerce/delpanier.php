<?php
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }   
    
    $ref = $_GET['retrait'];
    if (isset($_SESSION["panier"][$ref]) && ($_SESSION["panier"][$ref] > 0))
    {
        $_SESSION["panier"][$ref]--;
    }else{
        unset($_SESSION['panier'][$ref]); 
    }
    
    foreach($_SESSION["panier"] as $idProduct => $quantite){
        $requete_01="SELECT * FROM products WHERE id = $idProduct"; 
        $products = queryp($requete_01);
        if($quantite == 0){
            unset($_SESSION['panier'][$idProduct]); 
        }
    }
    
    $_SESSION['flash']['success'] = 'Le produit a bien ete enleve de votre panier';
    header('Location: panier.php'); 
?>