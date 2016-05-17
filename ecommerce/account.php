<?php 
header('Content-type: text/html; charset=UTF-8');
session_start();
require 'inc/functions.php'; 
logged_only();
?>
<?php require 'inc/header.php'; ?>

    <h1>Votre compte</h1>
<?php require 'inc/footer.php'; ?>