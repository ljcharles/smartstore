<?php 
    header('Content-type: text/html; charset=iso-8859-1');
?>
<?php 
    require_once 'inc/functions.php';
    reconnect();
    if(isset($_SESSION['auth'])){
        header('Location: account.php');
        exit();
    }
    
   if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
       require_once 'inc/db.php';
       require_once 'inc/functions.php';
       $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email= :username) AND confirmed_at IS NOT NULL');
       $req->execute(['username'=>$_POST['username']]);
       $user = $req->fetch();
       if(password_verify($_POST['password'],$user->password)){
           session_start();
           $_SESSION['auth'] =$user;
           $_SESSION['flash']['success'] = 'Bonjour, '.$_POST['username'].' vous �tes maintenant connect�';
           if($_POST['remember']){
               $remember_token=str_random(250);
               $pdo->prepare('UPDATE users SET remember_token=? WHERE id=?')->execute([$remember_token,$user->id]);
               
               setcookie('remember',$user->id.'=='.$remember_token.sha1($user->id.'fresh'),time() + 60 * 60 * 24 * 7);
           }
           header('Location: account.php');
           exit();
       }else{
           $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
       }
   }
?>
<?php require 'inc/header.php'; ?>
    
    <h1>Se connecter</h1>

    <form action="" method="POST">
        <div class=form-group>
            <label>Pseudo ou email <a href="register.php">(Je n'ai pas de compte)</a></label>
            <input type="text" name="username" class="form-control" required/>
        </div>
        
        <div class=form-group>
            <label>Mot de passe <a href="forget.php">(J'ai oubli� mon mot de passe)</a></label>
            <input type="password" name="password" class="form-control" required/>
            
        </div>
        
        <div class=form-group>
            <label>
                <input type="checkbox" name="remember" value="1"/>Se souvenir de moi
            </label>
        </div>
     
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

<?php require 'inc/footer.php'; ?>