<?php
session_start();
	if(isset($_SESSION['loggedin']))
{
   echo '<a href="account.php"><img src="images/minha_conta_110x160.png" width="55px" align="right"></a>';
    }
?>