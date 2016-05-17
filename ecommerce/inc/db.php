<?php
    //Se connecter à la base de donnée en ligne avec PDO (PHP DATA OBJECT) pour mysql 3.x, 4.x, 5.x
    //faut faire gaffe aux espaces 
    $username = 'u875218415_root';
    $pw = 'warzoneprogs';
    $pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u875218415_sio',$username,$pw);
    //ceci va permettre de voir les erreurs :D
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //On crée un attribut pour récupérer les infos en tant qu'objet
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);