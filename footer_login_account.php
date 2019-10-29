<?php
session_start();
	if(isset($_SESSION['loggedin']))
		{
   		echo '<a href="account.php"><img src="images/minha_conta_110x160.png" width="55px" align="right"></a>';
   		 }
   
	if ($_SESSION['technical'] == 2)
    	{
    	echo '<a href="technical.php"><img src="images/tech.png" width="55px" align="center"></a>';
		}
	 if ($_SESSION['moderator'] == 2)
    	{
    	echo '<a href="moderation.php"><img src="images/mod.png" width="55px" align="center"></a>';
	}
	if ($_SESSION['admin'] == 2)
    	{
    	echo '<a href="admin.php"><img src="images/admin.png" width="55px" align="center"></a>';
		}
?>