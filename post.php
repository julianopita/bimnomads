<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
	if(!isset($_SESSION['loggedin']))
{
	Print '<script>alert("Você precisa estar registrado para postar comentários. Clique OK para ser redirecionado para a página de registro");</script>'; // Prompts the user
	Print '<script>window.location.assign("./register_login.php");</script>'; // redirects to register.html
} 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Iniciar conversa</title>
	
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
<!-- Add icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<meta name="description" content="Platnomads" />
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">


<!--cabeçalho-->
	
<div class="header-versions">
  
<!--<div class="versions_left"><img src="images/versao-1.jpg" width="50px" title="como funciona?" align="left"></a></div>
	<div class="versions_left">VERSÃO1<br>versão com praça externa, maior área verde e espaços de convivência</div>
<div class="versions_right"><a href="main2.html"><img src="images/versao-2-100x100.png" width="50px" title="para que serve?" align="right"></a></div>
<div class="versions_right"><a href="main3.html"><img src="images/versao-3.1-100x100.png" width="50" align="right"></a></div>-->

</div>
	
	
	
	<!--conteúdo-->
<div class="middle-div-index">
	<div class="arrow-left">
	<a href="main<?php echo $_SESSION['version'] ?>.php"><img src="images/arrow_left.png" align="left"/></a>
	</div>
	
	<form action="publish.php" method="POST">
		<span class="comment">
		   <textarea data-ls-module="charCounter" maxlength="200" class="input-comment" name="discussion" id="discussion" required="required" placeholder="inicie aqui sua conversa (máximo de 200 caracteres)"></textarea><br/>
	    </span>
      <div class="arrow-right-button">
		<button class="button" type="submit" name="submit" id="submit"></button> 
					
		
	</div>
    </form>
</div>


<!--rodapé-->
<?php include 'footer_internal.php' ?>

</html>
</body>