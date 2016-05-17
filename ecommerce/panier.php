<?php require 'inc/header.php'; ?>
<?php
    require_once 'inc/db.php';
    require_once 'inc/functions.php';

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

?>
<hr>
<div class="checkout">
<div class="title">
    <div class="wrap">
        <h2 class="first">Mon panier</h2>
        <?php if(isset($_SESSION['auth'])): ?>
            <a href ="#" id="boutonpayer" class="btn btn-primary btn-large">
                Passer � la caisse
            </a>
        <?php else:  ?>
            <a href ="login.php" id="boutonpayer" class="btn btn-primary btn-large">
                Se connecter et payer
            </a>
        <?php endif ?>
    </div>
</div>

<table>
    <div class="wrap">
        <div class="rowtitle">
        <thead>
            <tr>
                <th><span class="images" style="color: gray;"></span></th>
                <th><span class="name" style="color: gray;">Nom du produit</span></th>
                <th><span class="price" style="color: gray;">Prix</span></th>
                <th><span class="subtotal" style="color: gray;">Prix avec TVA</span></th>
                <th><span class="quantite" style="color: gray;">Quantite</span></th>
                <th><span class="action" style="color: gray;">Actions</span></th>
            </tr>
        </thead>
        </div>

        <?php if(isset($_SESSION['panier'])): ?>
            <?php foreach($_SESSION["panier"] as $idProduct => $quantite):
                $requete_01="SELECT * FROM products WHERE id = $idProduct";
                $products = queryp($requete_01);

                $produits = query($requete_01);
                foreach($produits as $product){
                    $name = $product->name;
                    $price = $product->price;
                }
            ?>
                <tbody>
                    <td><img src="Images/<?= $idProduct; ?>.png" width="32" height="32"/></td>
                    <td><span class="name"><?= $name; ?></span></td>
                    <td><span class="price"><?= number_format($price,2,',',' '); ?> &euro;</span></td>
                    <td><span class="subtotal"><?= number_format($price*1.196,2,',',' '); ?> &euro;</span></td>
                    <td><span class="quantite"><?= $quantite; ?></span></td>
                    <td><span class="action">
                    <a href="delpanier.php?retrait=<?= $idProduct; ?>" class="del"><img title="Supprimer" alt="Supprimer" src= "Images/del.png" width="32" height="32"/></a>
                    </span></td>
                </tbody>
            <?php endforeach ?>
        <?php else:
            echo 'Votre panier est vide.';
        ?>
        <?php endif ?>

        <?php
            $total = 0;
            if(montantGlobal() == number_format($total,2,',',' ')){
                echo 'Votre panier est vide.';
            }
        ?>

        <div class="rowtotal">
            <b>Grand total :  </b><span class="subtotal"><?= montantGlobal(); ?> &euro;</span>
        </div>
    </div>
</table>
<?php require 'inc/footer.php'; ?>
