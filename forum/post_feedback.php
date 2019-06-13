<?php
  session_start();
$feedback = $_SESSION['feedback'];
$bool = true;

mysql_connect("localhost","platnomads","@bimserver") or die(mysql_error()); //Connect to server
mysql_select_db("platnomads") or die("Não foi possível se conectar à base de dados"); //Connect to database 


mysql_query("INSERT INTO feedback (feedback_text) VALUES ('$feedback')") or die (mysql_error());


 Print '<script>alert("Feedback recebido com sucesso!");</script>'; // Prompts the user
 Print '<script>window.location.assign("../index.php");</script>'; // redirects to index.php
 ?>