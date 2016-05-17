<?php require 'inc/header.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome on Smart Store's site</title>
    <link href = "css\style.css" rel = "stylesheet" type = "text/css" />
    <link href="css\app.css" rel="stylesheet">
    <link rel="icon" href="Images\favicon.ico" />
    <!-- Add the script to the HEAD of your document -->
    <SCRIPT LANGUAGE="JavaScript">
    <!-- Begin
    var scrl = "Welcome on Smart Store's site";
    function scrlsts() 
    {
        scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
        document.title = scrl;
        setTimeout("scrlsts()", 350);
    }
    //  End -->
    </script>
</head>
    <body> 
    
        <br>
        <br>
        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <center><h3>Derni&egrave;res nouveaut&eacute;s</h3></center>
                <div id="promo" class="introtext">
                    <p>Cr&eacute;ez-vous un compte ou connectez-vous pour profiter de ces offres exceptionnelles !</p>
                </div>
            </div>
        </div>
        
        <ul class="news">
            <li>	
                <a href="smartphone.php"> <img src="Images/AcerJadeS.png" alt="Telephone AcerJadeS" width="100" height="100" style="height:100px;width:100px;"> </a>
                Acer Jade S
                <a class="prix">
                    229,00 &euro;
                </a>
            </li>
            <li>
                <a href="smartphone.php"> <img src="Images/AlcatelOneTouchIdol.png" alt="Telephone AlcatelOneTouchIdol" width="200" height="200" style="height:100px;width:100px;"> </a>
                 Alcatel Idol
                 <a class="prix">
                    199,00 &euro;
                </a>
            </li>
            <li>
                <a href="smartphone.php"> <img src="Images/Iphone6Plus.png" alt="Telephone Iphone6Plus" width="200" height="200" style="height:100px;width:100px;"> </a>
                 Iphone 6 Plus
                 <a class="prix">
                    749,00 &euro;
                </a>
            </li>
            <li>
                <a href="smartphone.php"> <img src="Images/SamsungS6.png" alt="Telephone SamsungS6" width="200" height="200" style="height:100px;width:100px;"> </a>
                 Samsung S6
                 <a class="prix">
                    669,00 &euro;
                </a>
            </li>
            <li>
                <a href="smartphone.php"> <img src="Images/SonyXperiaZl.png" alt="Telephone SonyXperiaZl" width="200" height="200" style="height:100px;width:100px;"> </a>
                 Sony Xperia
                 <a class="prix">
                    263,00 &euro;
                </a>
            </li>
        </ul>
    </body>
</html>