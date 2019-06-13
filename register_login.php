<?php
session_start();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Iniciar sessão</title>
	
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
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">

<!--cabeçalho-->
<center>
	<div class="header-div"><img src="images/platnomads.jpg" alt="Platnomads logo"></div></center>

 <!--conteúdo--> 
<div class="middle-div-register">
	
	<div class="middle-div-register-left">
	  <form action="forum/checklogin.php" method="POST">
		  Se você já se registrou <br>
		   <input type="text" size="33" name="user_name" id="user_name" required="required" placeholder="Usuário ou E-mail"/><br/>
<!--colocar email também-->
           <input type="password" size="33" name="password" required="required" placeholder="*********" /> <br/>
		   <button type="submit" name="submit">Iniciar sessão</button>
        </form>
	 </div>
	<div class="middle-div-register-right">
	  <form action="forum/register.php" method="POST">
		  Se você não está registrado <br>
        	<input type="text" size="29" name="user_name" id="user_name" required="required" placeholder="Usuário (sem espaços)"/> usuário* <br/>
		  	<input type="text" size="29" name="email" id="email" 
				   required="required" placeholder="exemplo@seuemail.com.br"/> e-mail* <br/>
		  	<input type="text" size="29" name="occupation" id="occupation"/> ocupação <br/>
           <input type="password" size="29" name="password" id="password" required="required" placeholder="*********" /> senha*<br/>
           <button type="submit" name="register" formmethod="post">Registrar</button>
        </form>
	</div>
</div>

	

<!--rodapé-->
<div class="footer-div3">
	<div class="footer-column1"><a href="help.html"><img src="images/ajuda_110x160.png" width="55px" title="ajuda" align="left"></a></div>
	<div class="footer-column2"><a href="index.php"><img src="images/inicio_110x160.png" width="55px" title="retornar ao início" align="left"></a></div>
	<div class="footer-column3"></div>
	<div class="footer-column4"></div>

</div>

</html>
</body>