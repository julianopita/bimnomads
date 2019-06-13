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
<title>Platnomads</title>
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
	<div class="arrow-left">
		<script>document.write('<a href="' + document.referrer + '"><img src="images/arrow_left.png" align="left"/></a>');</script>
	</div>
	<div class="publish-top">
  		
		<div class="publish-bottom">
  		<p>se quiser mudar algo, você pode voltar clicando nas setas.<br>para publicar, clique no botão abaixo:</p>
		</div>
		
		<div class="publish-bottom2">
			<form action="forum/post_feedback.php">
				<button class="button2" type="submit" name="submit" id="submit">Publicar conversa</button>
				<?php session_start(); $_SESSION['feedback'] = $_POST['feedback']; ?>
			</form>

		</div>
	</div>
    </div>
    
    
    
<!--rodapé-->
<div class="footer-div3">
<div class="footer-column1"><a href="help.html"><img src="images/ajuda.png" width="50px" title="ajuda" align="left"></a></div>
<div class="footer-column2"><a href="index.php"><img src="images/iniciar.png" width="50px" title="para que serve?" align="left"></a></div>
<div class="footer-column3"><?php include ('footer_login_account.php'); ?></div>
<div class="footer-column4"><?php include ('footer_login_logoff.php'); ?></div>

</html>
</body>