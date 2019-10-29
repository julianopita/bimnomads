<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<?php include 'ganalytics.php' ?>
<?php include 'forum/webgl_test.php' ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registro</title>

	
<link href="style.css" rel="stylesheet" type="text/css" />

<meta name="description" content="Platnomads" />
</head>
<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">

<!--cabeçalho-->
<div class="header-div1">
	<?php include 'header_logo.php' ?>
  	<div class="header-icons-left"><a href="infoproject.php"><img src="images/view-tags.png" width="50" align="left"/></a></div>	
 	<div class="header-icons-left"><a href="calendar.php"><img src="images/calendar-100x100.png"  width="50" align="left"/></a></div>
   	<div class="header-icons-left"> <a href="gallery1.php"><img src="images/proposal.png"  width="48"  align="left" /></a></div>
   	<div class="header-icons-left"> <a href="maps.php"><img src="images/view-locations.png"  width="50"  align="left" /></a></div>
 	<div class="header-icons-left"><a href="versions.php"><img src="images/versoes.PNG"  width="50"  align="left" /></a></div>
 	<div class="header-icons-left"><img src="images/default-user.png"  width="50"  align="left" /></a></div>
 	<div class="header-icons-text"><br>login e registro</div>
 </div>
	
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
		  	
		  	   <select id="relation" name="relation" style="min-width:17.70em;">
               <option value = "responsavel">responsável por aluno</option>
               <option value = "administrativo">administrativo APAE</option>
               <option value = "terceirizado">colaborador terceirizado</option>
               <option value = "professor">professor</option>
               <option value = "aluno">aluno</option>
             </select> <label>relação</label>
           <input type="password" size="29" name="password" id="password" required="required" placeholder="*********" /> senha*<br/>
           <button type="submit" name="register" formmethod="post">Registrar</button>
        </form>
	</div>
</div>



<!--rodapé-->
<?php include 'footer_internal.php' ?>

</html>
</body>