<?php
    //je préfere ne pas fermer la balise php au cas où si on a des espaces cela causerait des probs :v
    function debug($variable){
        echo '<pre>' . print_r($variable,true) . '</pre>';
    }
    
    function str_random($length){
        $alphabet= "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
    }
    
    function logged_only(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        
        if(!isset($_SESSION['auth'])){
            $_SESSION['flash']['danger'] = 'Vous n\'avez pas le droit d\'accéder à cette page. Connectez-vous d\'abord!';
            header('Location: login.php');
            exit();
        }
    }
    
    function reconnect(){
        
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        
        if(isset($_COOKIE['remember']) && !isset($_SESSION['auth'])){
            require_once 'db.php';
            if(!isset($pdo)){
                global $pdo;
            }
            $remember_token = $_COOKIE['remember'];
            $parts = explode('==',$remember_token);
            $user_id = $parts[0];
            $req = $pdo->prepare('SELECT * FROM users WHERE id=?')->execute([$user->id]);
            $user = $req->fetch();
            
            if($user){
                $excepected = $user_id.'=='.$user->remember_token.sha1($user_id.'fresh');
                if($excepected == $remember_token){
                   session_start();
                   $_SESSION['auth'] =$user;
                   setcookie('remember',$remember_token, time() + 60 * 60 * 24 * 7);
                }else{
                    setcookie('remember', null, -1);
                }
            }else{
                setcookie('remember', null, -1);
            }
        }
    }
    
    function query($sql, $data=array()){
        $username = 'u875218415_root';
        $pw = 'warzoneprogs';
        $pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u875218415_sio',$username,$pw);
        //ceci va permettre de voir les erreurs :D
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //On crée un attribut pour récupérer les infos en tant qu'objet
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
       $req = $pdo->prepare($sql);
       $req->execute($data);
       return $req->fetchAll(PDO::FETCH_OBJ);
    }
    
    function montantGlobal(){
       $total=0;
       
       if(isset($_SESSION["panier"])){
           foreach($_SESSION["panier"] as $idProduct => $quantite){  
            $requete_01="SELECT * FROM products WHERE id = $idProduct"; 
            $products = queryp($requete_01);
            $produits = query($requete_01);
            
            foreach($produits as $product)
            {
                $price = $product->price;
                $total += $price * $quantite;
            }
           }
           return number_format($total*1.196,2,',',' ');
        }else{
            return number_format($total,2,',',' ');
        }
    }
    
    function queryp($sql){
        $username = 'u875218415_root';
        $pw = 'warzoneprogs';
        $pdo = new PDO('mysql:host=mysql.hostinger.fr;dbname=u875218415_sio',$username,$pw);
        //ceci va permettre de voir les erreurs :D
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //On crée un attribut pour récupérer les infos en tant qu'objet
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $req = $pdo->prepare($sql);
        $req->execute();
    }
    