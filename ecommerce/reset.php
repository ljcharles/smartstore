<?php 
    header('Content-type: text/html; charset=iso-8859-1');
?>
<?php 
    if(isset($_GET['id']) && isset($_GET['token'])){
        require 'inc/db.php';
        $req = $pdo->prepare('SELECT * FROM users WHERE id=? AND reset_token=? AND reset_token IS NOT NULL AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
        $req->execute([$_GET['id'], $_GET['token']]);
        $user= $req->fetch();
        
        if($user){
            if(!empty($_POST)){
                if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
                    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
                    $pdo->prepare('UPDATE users SET password=?, reset_at=NULL, reset_token=NULL')->execute([$password]);
                    session_start();
                    $_SESSION['flash']['success'] = 'Votre mot de passe a bien �t� modifi�';
                    $_SESSION['auth']=$user;
                    header('Location: account.php');
                    exit();
                }
            }
        }else{
           session_start();
           $_SESSION['flash']['danger'] = 'Ce lien n\'est plus valide!';
           header('Location: login.php');
           exit();
        }
        
    }else{
        header('Location: login.php');
        exit();
    }
?>
<?php require 'inc/header.php'; ?>
    
    <h1>R�initialiser mon mot de passe</h1>

    <form action="" method="POST">
        <div class=form-group>
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" />
        </div>
        
        <div class=form-group>
            <label>Confirmation du mot de passe</label>
            <input type="password" name="password_confirm" class="form-control" />
        </div>
        
        <button type="submit" class="btn btn-primary">R�initialiser mon mot de passe</button>
    </form>

<?php require 'inc/footer.php'; ?>