<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["vemail"]==""||$_POST["msg"]==""){
echo "Por favor, preencha seu e-mail e mensagem para que possamos retornar o contato.";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['vemail'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email){
echo "E-mail inválido!";
}
else{
$subject = $_POST['sub'];
$message = $_POST['msg'];
$headers = 'From:'. $email2 . "rn"; // Sender's Email
$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender
// Message lines should not exceed 70 characters (PHP rule), so wrap it
$message = wordwrap($message, 70);
// Send Mail By PHP Mail Function
mail("daay.msousa@gmail.com", $subject, $message, $headers);
Print '<script>alert("Seu feeedback foi recebido com sucesso!");</script>'; // Prompts the user
		Print '<script>window.location.assign("../platnomads/index.php");</script>'; // redirects to register.php
}
}
}
?>