<?php
session_start();
 if(!isset($_SESSION['loggedin']))
{
function RandomString($length) {
    $keys = array_merge(range('a', 'z'), range('A', 'Z'));
    for($i=0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key;
}

$_SESSION['loggedin']=RandomString(6);} 
?>