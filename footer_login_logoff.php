<?php
session_start();
	if(isset($_SESSION['loggedin']))
{
   echo '<a href="logoff.php"><img src="images/encerrar_sessão_110x160.png" width="55" align="right"></a>';
    } else {
   echo '<a href="register_login.php"><img src="images/iniciar_sessao_110x160.png" width="55" align="right"></a>';
    
}
?>