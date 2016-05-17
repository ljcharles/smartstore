<?php require 'inc/header.php'; ?>
<?php 
    header('Content-type: text/html; charset=iso-8859-1');
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Products Catalog</title>
    <link href="css\app.css" rel="stylesheet">
    <link rel="icon" href="Images\favicon.ico" />
</head>
    <body> 
       <div class="container">

           <div style="position:absolute;z-index:1">
                <img class="paper" src="Images/paper.png" alt="" width="1140" height="95">
            </div>
            <div class="introtext">
               <h1>Bienvenue sur Smart Store!</h1>
               <p>Soyez plus Smart dans vos achats.</p>
            </div> 
            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer">
            </header>

            <hr>

            <!-- Title -->
            <div class="row">
                <div class="col-lg-12">
                    <h3>Produits disponible</h3>
                </div>
            </div>
            <!-- /.row -->

            <!-- Page Features -->
            <div class="row text-center">

                <?php $products = query('SELECT * FROM products'); ?>
                <?php foreach($products as $product): ?>
                    <div class="col-md-3 col-sm-6 hero-feature">
                        <div class="thumbnail">
                            <img src="Images/<?= $product->id; ?>.png" alt="">
                            <div class="caption">
                                <h3><?= $product->name; ?></h3>
                                <b><p><?= number_format($product->price,2,',',' '); ?> &euro;</p></b>
                                <p>
                                    <a href="addpanier.php?id=<?= $product->id; ?>" class="btn btn-primary">Ajouter au panier!</a> <a href="#" class="btn btn-default">Plus d'infos</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
  <?php require 'inc/footer.php'; ?>