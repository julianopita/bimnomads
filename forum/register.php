<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $user = $_POST['user_name'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $relacao = $_POST['relation'];
  $cpf = $_POST['cpf'];
  $cep = $_POST['cep'];
  	$bool = true;
  $link = mysql_connect("localhost","platnomads","@bimserver");
	if ($link === false){
	die("Não foi possível conectar-se ao servidor.". mysql_error()); //Connect to server
	}

  mysql_select_db("platnomads") or die("Não foi possível conectar-se à base de dados"); //Connect to database
  $query = mysql_query("SELECT * FROM users_apae"); //Query the users table
  while($row = mysql_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['user_name']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($user == $table_users) // checks if there are any matching fields
    {
      $bool = FALSE; // sets bool to false
      Print '<script>alert("Nome de usuário já em uso.");</script>'; //Prompts the user
      Print '<script>window.location.assign("../register.html");</script>'; // redirects to register.html
    }
    $table_users = $row['cpf']; // the first cpf row is passed on to $table_users, and so on until the query is finished
    if($cpf == $table_users) // checks if there are any matching fields
    {
      $bool = FALSE; // sets bool to false
      Print '<script>alert("CPF já em uso.");</script>'; //Prompts the user
      Print '<script>window.location.assign("../register.html");</script>'; // redirects to register.html
    }
    $table_users = $row['email']; // the first email row is passed on to $table_users, and so on until the query is finished
    if($email == $table_users) // checks if there are any matching fields
    {
      $bool = FALSE; // sets bool to false
      Print '<script>alert("E-mail já em uso.");</script>'; //Prompts the user
      Print '<script>window.location.assign("../register.html");</script>'; // redirects to register.html
    }
  }
    
   
if($bool) // checks if bool is true
{
$sql = mysql_query( "INSERT INTO users_apae (user_name, password, email, relacao, cpf, cep) VALUES ('$user','$password','$email','$relacao','$cpf','$cep')"); 
//or die (mysql_error());
echo "<pre>Debug: $sql</pre>\m";
$result = mysqli_query($link, $sql);
    
//!PARA FUNCIONAR POR HORA.
        Print '<script>alert("Parabéns! Você está cadastrado! Agora é só iniciar sua sessão.");</script>'; // Prompts the user
        Print '<script>window.location.assign("../register_login.php");</script>'; // redirects to register_login.php

//!MENSAGEM DE ERRO DE CONEXÃO NÃO FUNCIONANDO!
/*    if ($result)
{
        Print '<script>alert("Registro efetuado com sucesso");</script>'; // Prompts the user
        Print '<script>window.location.assign("../register_login.php");</script>'; // redirects to register_login.php
    }
    else {
        Print '<script>alert("ERRO: Não foi possível executar a ação.");</script>'; // Prompts the user

        Print '<script>window.location.assign("../register_login.php");</script>'; // redirects to register_login.php
        
    }*/

    mysqli_close($link);
  }
    
  }

     
?>