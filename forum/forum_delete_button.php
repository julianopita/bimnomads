<?php
session_start();
	if ($comments['user_name']) OR ($row['user_name'])==($_SESSION['loggedin'])
{
   echo '<a href="logoff.php">apagar mensagem<img src="images/logoff.png" width="50" align="right"></a>';
    } else {
   echo '<a href="register.html"><img src="images/início.png" width="50" align="right"></a>';
    
}
?>