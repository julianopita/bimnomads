<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
$id = $_SESSION['loggedin'];

$link = mysql_connect("localhost","platnomads","@bimserver");
	if ($link === false){
	die("Não foi possível concetar ao servidor.". mysql_error()); //Connect to server
	}

  mysql_select_db("platnomads") or die("Não foi possível conectar à base de dados"); //Connect to database
$query= mysql_query("SELECT * FROM users WHERE user_name = '".$_SESSION['loggedin']."' ")or die(mysql_error());
$arr = mysql_fetch_array($query);
$num = mysql_numrows($query); //this will count the rows (if exists) 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Minha conta</title>
<link href="style.css" rel="stylesheet" type="text/css" />

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
	
<meta name="description" content="Platnomads" />
<!-- Add icon library -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<meta name="description" content="Platnomads" />
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">

<!--cabeçalho-->
<center>
	<div class="header-div"><img src="images/platnomads.jpg" alt="Platnomads logo"></div></center>

 <!--conteúdo--> 
    <div class="middle-div-register">
        
     
<?php 
        if($num > 0){ ?>
<table border="1" cellpadding="3" font-size="14">
<tr><td colspan="2" font-size="14" align="left">Seu perfil</td></tr>
<tr>
 <td>Nome de usuário: <?php echo $arr['user_name']; ?></td>
</tr>

<tr>
 <td>Ocupação: <?php echo $arr['occupation']; ?></td>
</tr>

<tr>
 <td>CPF: <?php echo $arr['cpf']; ?></td>
</tr>
    
<tr>
 <td>CEP: <?php echo $arr['cep']; ?></td>
</tr>

<tr>
 <td>Email: <?php echo $arr['email']; ?></td>
</tr>

    
</table>

<?php } ?>
         

    </div>
    
    
    
<!--rodapé-->
<div class="footer-div3">
<div class="footer-column1"><a href="help.php"><img src="images/ajuda.png" width="50px" title="ajuda" align="left"></a></div>
<div class="footer-column2"><a href="index.php"><img src="images/iniciar.png" width="50px" title="para que serve?" align="left"></a></div>
<div class="footer-column4"><?php include ('footer_login_logoff.php'); ?></div>

</html>
</body>