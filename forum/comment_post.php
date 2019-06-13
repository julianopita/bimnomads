<?php 
session_start();
$id_discussion = $_POST['id_discussion'];
$user = $_SESSION['loggedin'];
$commentary = $_POST['commentary'];
$tag_version = $_SESSION['version'];

			
			$bool = true;

			mysql_connect("localhost","platnomads","@bimserver") or die(mysql_error()); //Connect to server
			mysql_select_db("platnomads") or die("Não foi possível se conectar à base de dados"); //Connect to database 

			mysql_query("INSERT INTO comments (discussion,user_name,commentary,date_time) VALUES ('$id_discussion','$user','$commentary',now())");

			unset($GLOBALS['id_discussion']);
			//unset($GLOBALS['commentary']);

			 Print '<script>alert("Comentário inserido com sucesso!");</script>'; // Prompts the user
			 Print '<script>window.location.assign("../main'.$tag_version.'.php");</script>'; // redirects to versions.php
			 ?>