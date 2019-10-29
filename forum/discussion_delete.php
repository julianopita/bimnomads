<?php 
session_start();
$id_discussion = $_POST['id_discussion'];
$user = $_SESSION['loggedin'];
$tag_version = $_SESSION['version'];
$project_id = $_SESSION['project_id'];

			
			$bool = true;

			mysql_connect("localhost","platnomads","@bimserver") or die(mysql_error()); //Connect to server
			mysql_select_db("platnomads") or die("Não foi possível se conectar à base de dados"); //Connect to database 

			$query=mysql_query("SELECT * FROM discussion WHERE id_discussion=$id_discussion");
			while($row = mysql_fetch_assoc($query)) //display all rows from query
    			{$discussion = $row['discussion'];}

			$sql=mysql_query("UPDATE discussion SET discussion='Mensagem excluída pelo moderador.', mod_text='$discussion' WHERE id_discussion=$id_discussion");
				while($row2 = mysql_fetch_assoc($sql)) //display all rows from query
    			

			unset($GLOBALS['id_discussion']);
			//unset($GLOBALS['commentary']);



			 Print '<script>alert("Comentário excluído");</script>'; // Prompts the user
			Print '<script>window.location.assign("../moderation.php");</script>'; // redirects to moderation.php
			 ?>