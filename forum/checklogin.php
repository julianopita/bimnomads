<?php
  session_start();
  session_unset();
  session_destroy();
  session_start();
  //$user = mysql_real_escape_string($_POST['user_name']); <-- Preferred method. Incompatible with PHP 5.2!
  $user = $_REQUEST['user_name'];
  $password = $_REQUEST['password'];
  mysql_connect("localhost","platnomads","@bimserver") or die(mysql_error()); //Connect to server
  mysql_select_db("platnomads") or die("Não foi possível se conectar à base de dados"); //Connect to database
  $query = mysql_query("SELECT * FROM users_apae WHERE user_name='$user' OR email='$user'"); //Query the users table if there are matching rows equal to $username
  $exists = mysql_num_rows($query); //Checks if username exists
  $table_email = "";
  $table_user = "";
  $table_password = "";
  if($exists > 0) //IF there are no returning rows or no existing username
  {
    while($row = mysql_fetch_assoc($query)) //display all rows from query
    {
      $table_user = $row['user_name']; // the first username row is passed on to $table_users, and so on until the query is finished
      $table_email = $row['email']; // the first email row is passed on to $table_users, and so on until the query is finished
      $table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
      $table_mod_attribution = $row['mod_attribution'];// verify if the user has mod attribution.
      $table_tech_attribution = $row['tech_attribution'];// verify if the user has tech attribution.
      $table_adm_attribution = $row['adm_attribution'];// verify if the user has adm attribution.

    }
      if(($user == $table_user or $user == $table_email) && ($password == $table_password) && ($table_mod_attribution == 1)) // checks if user has moderator attributes. 
      {$_SESSION['moderator'] = 2;}//set the moderator flag to 1. This serves as a global variable.
      
      if(($user == $table_user or $user == $table_email) && ($password == $table_password) && ($table_tech_attribution == 1)) // checks if user has moderator attributes. 
      {$_SESSION['technical'] = 2;}//set the technical flag to 1. This serves as a global variable.

      if(($user == $table_user or $user == $table_email) && ($password == $table_password) && ($table_adm_attribution == 1)) // checks if user has moderator attributes. 
      {$_SESSION['admin'] = 2;}//set the administrator flag to 1. This serves as a global variable.
      

    if(($user == $table_user or $user == $table_email) && ($password == $table_password)) // checks if there are any matching fields
    {
        if($password == $table_password)
        {
          $_SESSION['loggedin'] = $user;//set the logged in flag to true. This serves as a global variable
          $query = mysql_query("SELECT relacao FROM users_apae WHERE user_name='$user' OR email='$user'");
          while($row = mysql_fetch_assoc($query)) //display all rows from query
           {$_SESSION['relation'] = $row['relacao'];
         }
          header("location: ../versions.php"); // redirects the user to the authenticated home page

        }


    }
    else
    {
      Print '<script>alert("Senha incorreta!");</script>'; //Prompts the user
      Print '<script>window.location.assign("../register_login.php");</script>'; // redirects to register.html
    }
  }
  else
  {
    Print '<script>alert("Nome de usuário incorreto!");</script>'; //Prompts the user
    Print '<script>window.location.assign("../register_login.php");</script>'; // redirects to register.html
  }
?>
