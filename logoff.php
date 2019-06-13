<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
	if(isset($_SESSION['loggedin']))
{
	Print '<script>alert("ATENÇÃO. Você está saindo da sua conta.");</script>'; // Prompts the user
    unset($_SESSION["loggedin"]); /*session deleted. if you try using this you've got an error*/
    Print '<script>alert("Deslogado com sucesso!");</script>'; // Prompts the user
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sua experiência</title>
	
	<link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/manifest.json">
<meta name="msapplication-TileColor" content="#ff0000">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#ff0000">
	
<link href="style.css" rel="stylesheet" type="text/css" />

<meta name="description" content="Platnomads" />
<!-- Add icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<meta name="description" content="Platnomads" />
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">

<!--cabeçalho-->
<center>
	<div class="header-div"><img src="images/platnomads.jpg" alt="Platnomads logo"></div></center>
    <div class="push"></div>

 <!--conteúdo--> 
    <div class="middle-div-index">
    <div class="arrow-left"></div>
	<form action="publish_logoff.php" method="POST">
		<span class="comment">
		   <textarea data-ls-module="charCounter" maxlength="3000" class="input-comment" name="feedback" id="feedback" required="required" placeholder="Conte um pouco sobre sua experiência no site! (máximo de 3000 caracteres)"></textarea><br/>
        </span>
        <div class="arrow-right-button">	<button class="button" type="submit" name="give" id="give"></button></div>
    </div>
    
    
    
<!--rodapé-->
<div class="footer-div3">
<div class="footer-column1"><a href="help.html"><img src="images/ajuda.png" width="50px" title="ajuda" align="left"></a></div>
<div class="footer-column2"><a href="index.php"><img src="images/iniciar.png" width="50px" title="para que serve?" align="left"></a></div>
<div class="footer-column3"><?php include ('footer_login_account.php'); ?></div>
<div class="footer-column4"><?php include ('footer_login_logoff.php'); ?></div>

</html>
</body>