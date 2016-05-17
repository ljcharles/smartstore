<?php 
// récupération des variables
// donné un autre nom au variable pour évité les problèmes avec Register Global à ON
//on crée une session si elle n'est pas déjà crée pour afficher les messages flashes
if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
$formMail = $_POST['email'];
$formNom = $_POST['name'];
$formCommentaire = $_POST['message'];
$email = 'loicjeancharles@gmail.com';
//if(!empty($formMail) && !empty($formPrenom) && !empty($formNom) ){
//ok pas vide //on convertie les caractètres HTML du commentaire
$formCommentaire = htmlentities($formCommentaire);
    
   //si l'email est valide
   if (!filter_var($formMail, FILTER_VALIDATE_EMAIL) === false) 
   {
      //mise en forme du mail
      $message = "$formNom vous contact via votre formulaire à l'adresse $formMail.\n \n message : \n $formCommentaire \n----------------------------------------------\n";
      $subject = "Contact Form: $formNom";
      $headers = 'From:'.$formMail. "\r\n" .
                 'Reply-To: ' . $email . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
                 
        $fp = fopen("mail.txt","a"); // ouverture du fichier en écriture
        fputs($fp, "\n"); // on va a la ligne on peut use fwrite aussi a la place de fputs
        fputs($fp, "$message"); // on écrit le nom et email dans le fichier
        fclose($fp);
    
      if( mail($email, $subject, $message, $headers) ){
        $_SESSION['flash']['success'] = 'Les informations ont été envoyés.';
      }
      else{
        $_SESSION['flash']['danger'] = 'ERREUR : une erreur est survenu lors de l\'envoi du message.';
      }
    }
?>
<?php require 'inc/header.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Nous contacter</title>
    <link href="css\app.css" rel="stylesheet">
    <link rel="icon" href="Images\favicon.ico" />
</head>
    <body> 
    <div class="container">
       
    <form action="" method="POST">
        <div class=form-group>
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required/>
        </div>
        
        <div class=form-group>
            <label>Email</label>
            <input type="email" name="email" class="form-control" required/>
            
        </div>
        
        <div class=form-group>
             <label>Message</label>
            <textarea rows="5" cols="140" class="toxt" name="message" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

  <?php require 'inc/footer.php'; ?>