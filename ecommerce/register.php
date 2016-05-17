<?php 
    header('Content-type: text/html; charset=iso-8859-1');
?>
<?php
    require_once 'inc/functions.php';
    session_start();
    
    if(!empty($_POST)){
        
        //on crée un tableau où sera répertorié les différentes erreurs
        $errors = array();
        //on charge le fichier pour se co à la base de donnée
        require_once 'inc/db.php';
        
        //on utilise une regex(expression reguliere) pour savoir si le username est valide
        if(empty($_POST["username"]) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST["username"])){
            $errors["username"] = "Votre pseudo n'est pas valide (alphanuméric)";
        }else{
            $req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
            $req->execute([$_POST["username"]]);
            //fetch permet de recupérer le premier enregistrement
            $user = $req->fetch();
            
            if($user){
                $errors["username"] = "Ce pseudo est déjà pris";
            }
        }  
        
        //pas la peine d'utiliser de regex ici car en php un filtre permet de savoir si un email est valide
        if(empty($_POST['email']) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $errors["email"] = "Votre email n'est pas valide";
        }else{
            $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
            $req->execute([$_POST["email"]]);
            //fetch permet de recupérer le premier enregistrement
            $user = $req->fetch();
            
            if($user){
                $errors["email"] = "Cet email est déjà utilisé pour un autre compte";
            }
        }  
        
        if(empty($_POST['password']) || $_POST["password"] != $_POST["password_confirm"]){
            $errors["password"] = "Vous devez entrer un mot de passe valide";
        }
        
        if(empty($errors)){
            
            //pour chaque param on utilisera une requete préparé pour éviter que cette derniere soit briser par le user
            //Exemple au lieu de $_POST["username"] on met juste un ?
            $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?");
            //on va crypter le mdp pour eviter les mechants pirates
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $token = str_random(60);
            $req->execute([$_POST["username"],$password,$_POST["email"], $token]);
            //recupere le dernier id gÃ©nÃ©rer par PDO
            $user_id = $pdo->lastInsertId();
            mail($_POST["email"],"Confirmation de votre compte", "Afin de valider votre compte merci de cliquer sur ce lien \n\nhttp://smartstoresio.esy.es/confirm.php?id=$user_id&token=$token");
            //La fonction die est un alias de la fonction exit en PHP. 
            //Si une fonction change de nom au cours de l'évolution de PHP, 
            //on conserve l'ancien nom pour que les anciens scripts ne partent pas à la dérive.
            //die("Notre compte a bien été créé.");
            $_SESSION['flash']['success'] = 'Un email de confirmation vous a Ã©tÃ© envoyÃ© pour valider votre compte'; 
            header('Location: login.php');
            exit();
        }
        
        //fonction qui permet de mieux afficher les erreurs
        //debug($errors);
    }
?>

<?php require 'inc/header.php'; ?>

<h1> S'inscrire </h1>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement :</p>
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="POST">
    <div class=form-group>
        <label>Pseudo</label>
        <input type="text" name="username" class="form-control" />
    </div>
    
    <div class=form-group>
        <label>Email</label>
        <input type="email" name="email" class="form-control" />
    </div>
    
    <div class=form-group>
        <label>Mot de passe</label>
        <input type="password" name="password" class="form-control" />
    </div>
    
    <div class=form-group>
        <label>Confirmez votre mot de passe</label>
        <input type="password" name="password_confirm" class="form-control" />
    </div>
    
    <button type="submit" class="btn btn-primary">M'inscrire</button>
</form>
    
<?php require 'inc/footer.php'; ?>

