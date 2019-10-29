<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
	if(isset($_SESSION['loggedin']))
{
	Print '<script>alert("ATENÇÃO. Você está saindo da sua conta.");</script>'; // Prompts the user
	session_unset();
    session_destroy(); /*session deleted. if you try using this you've got an error*/
    Print '<script>alert("Deslogado com sucesso!");</script>'; // Prompts the user
    
    header("location: ./index.php"); // redirects the user to the authenticated home page
}
?>
