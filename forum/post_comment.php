<?php
  session_start();
$project_id = $_SESSION['project_id'];
$user = $_SESSION['loggedin'];
$discussion = $_POST['discussion'];
$tag_version = $_SESSION['version'];
$relation = $_SESSION['relation'];
$bool = true;

mysql_connect("localhost","platnomads","@bimserver") or die(mysql_error()); //Connect to server
mysql_select_db("platnomads") or die("Não foi possível se conectar à base de dados"); //Connect to database 

mysql_query("INSERT INTO discussion (user_name,discussion,date_time,tag_version,project_id,relation) VALUES ('$user','$discussion',now(),'$tag_version','$project_id','$relation')");

unset($GLOBALS['discussion']);

 Print '<script>alert("Comentário inserido com sucesso!");</script>'; // Prompts the user
 Print '<script>window.location.assign("../main'.$tag_version.'.php");</script>'; // redirects to versions.php
 ?>