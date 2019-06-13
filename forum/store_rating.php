<?php
session_start();
if(isset($_POST['post_like_discussion']))
{
  $host="localhost";
  $username="platnomads";
  $password="@bimserver";
  $databasename="platnomads";
  $user_id = $_SESSION['loggedin'];
  $id_discussion = $_POST['id'];

  $connect=mysql_connect($host,$username,$password);
  $db=mysql_select_db($databasename);
  $likes=0;

 
  mysql_query("INSERT INTO reactions (id_discussion,user_name,reaction) VALUES ('$id_discussion','$user_id','like')");

}


if(isset($_POST['post_dislike_discussion']))
{
  $host="localhost";
  $username="platnomads";
  $password="@bimserver";
  $databasename="platnomads";
  $user_id = $_SESSION['loggedin'];
  $id_discussion = $_POST['id'];

  $connect=mysql_connect($host,$username,$password);
  $db=mysql_select_db($databasename);
  $dislikes=0;

  
  mysql_query("INSERT INTO reactions (id_discussion,user_name,reaction) VALUES ('$id_discussion','$user_id','dislike')");
  
  }

if(isset($_POST['post_unlike_discussion']))
{
  $host="localhost";
  $username="platnomads";
  $password="@bimserver";
  $databasename="platnomads";
  $user_id = $_SESSION['loggedin'];
  $id_discussion = $_POST['id'];

  $connect=mysql_connect($host,$username,$password);
  $db=mysql_select_db($databasename);
  $likes=0;

  
  mysql_query("DELETE FROM reactions WHERE id_discussion = '$id_discussion' AND user_name = '$user_id' AND reaction = 'like'");
  
  }

if(isset($_POST['post_undislike_discussion']))
{
  $host="localhost";
  $username="platnomads";
  $password="@bimserver";
  $databasename="platnomads";
  $user_id = $_SESSION['loggedin'];
  $id_discussion = $_POST['id'];

  $connect=mysql_connect($host,$username,$password);
  $db=mysql_select_db($databasename);
  $dislikes=0;

  
  mysql_query("DELETE FROM reactions WHERE id_discussion = '$id_discussion' AND user_name = '$user_id' AND reaction = 'dislike'");
  
  }


?>