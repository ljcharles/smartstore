<?php 
session_start();
setcookie('remember', NULL, -1);
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = 'Vous �tes maintenant d�connect�';
header('Location: login.php');