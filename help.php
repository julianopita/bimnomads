<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajuda</title>
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


</head>


<body leftmargin="50px" topmargin="50px" marginwidth="50px" marginheight="50px">
  
    <!--cabeçalho-->
    <center>
	<div class="header-div"><img src="images/platnomads.jpg" alt="Platnomads logo"></div></center>

    
    <!--conteúdo-->
<div class="middle-div-register">
    
<form action="#" id="form" method="post" name="form">

<br><input type="text" size="33" name="vname" required="required"  placeholder="Seu nome" type="text" value=""><br/>
    <br><input type="text" size="33" name="vemail" required="required"  placeholder="Seu e-mail" type="text" value=""><br/>
    <br><input type="text" size="33" name="sub" required="required"  placeholder="Assunto" type="text" value=""><br/>

<br>

    <span class="help">
		   <textarea type="text" cols="80" rows="8" data-ls-module="charCounter" maxlength="350" class="input-help" name="msg" id="help" required="help" placeholder="No que podemos ajudar? (máximo de 350 caracteres)"></textarea><br/>
	    </span>
<br>
<input id="send" name="submit" type="submit" value="Enviar Feedback"><br/>
</form>
<h3><?php include "forum/secure_email_code.php"?></h3>
    
<!-- <form action="//submit.form" id="ContactUs100" method="post" onsubmit="return ValidateForm(this);">
<script type="text/javascript">
function ValidateForm(frm) {
if (frm.Name.value == "") { alert('Name is required.'); frm.Name.focus(); return false; }
if (frm.FromEmailAddress.value == "") { alert('Email address is required.'); frm.FromEmailAddress.focus(); return false; }
if (frm.FromEmailAddress.value.indexOf("@") < 1 || frm.FromEmailAddress.value.indexOf(".") < 1) { alert('Please enter a valid email address.'); frm.FromEmailAddress.focus(); return false; }
if (frm.Comments.value == "") { alert('Please enter comments or questions.'); frm.Comments.focus(); return false; }
return true; }
</script>
<table style="width:550px;border:0;" cellpadding="8" cellspacing="0">
<tr> <td>
<label for="Name">Nome *:</label>
</td> <td>
<input name="Name" type="text" maxlength="60" style="width:250px;" />
</td> </tr> <tr> <td>
<label for="PhoneNumber">Telefone (opcional):</label>
</td> <td>
<input name="PhoneNumber" type="text" maxlength="43" style="width:250px;" />
</td> </tr> <tr> <td>
<label for="FromEmailAddress">E-mail *:</label>
</td> <td>
<input name="FromEmailAddress" type="text" maxlength="90" style="width:250px;" />
</td> </tr> <tr> <td>
<label for="Comments">Questão *:</label>
</td> <td>
<textarea name="Comments" rows="7" cols="40" style="width:350px;"></textarea>
</td> </tr> <tr> <td>
* - required fields
</td> <td>

<input name="skip_Submit" type="submit" value="Submit" />
<script src="https://www.100forms.com/js/FORMKEY:8QY4X8877724/SEND:daay.msousa@gmail.com" type="text/javascript"></script>
</td> </tr>
</table>
</form>   -->
    
 </div>   
    
    <!-- rodapé -->
<div class="footer-div4">
<div class="footer-column1"><a href="index.php"><img src="images/inicio_110x160.png" width="55px" title="home" align="left"></a></div>
<div class="footer-column2"><a href="howitworks.php"><img src="images/como_funciona_110x160.png" width="55px" title="como funciona?" align="right"></a></div>
<div class="footer-column3"><a href="about.php"><img src="images/para_que_serve_110x160.png" width="55px" title="para que serve?" align="left"></a></div>
<div class="footer-column4"><?php include ('footer_login_account.php'); ?></div>
<div class="footer-column5"><?php include ('footer_login_logoff.php'); ?></div>
    </div>
</body>
</html>
