<?php
session_start();
	 if ($_SESSION['moderator'] == 2)
    	{
    	echo '<a href="moderation.php"><img src="images/mod.png" width="55px" align="center"></a>';
		}
?>