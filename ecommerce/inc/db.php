<?php
    //Se connecter � la base de donn�e en ligne avec PDO (PHP DATA OBJECT) pour mysql 3.x, 4.x, 5.x
    //faut faire gaffe aux espaces
    $username = 'root';
    $pw = '';
    $pdo = new PDO('mysql:host=localhost;dbname=u875218415_sio',$username,$pw);
    //ceci va permettre de voir les erreurs :D
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //On cr�e un attribut pour r�cup�rer les infos en tant qu'objet
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
