<?php
session_start();

session_destroy();

/*
if (!isset($_COOKIE["c_recordar"])) {
    
    setcookie("c_username", "");
    setcookie("c_password", "");
    setcookie("c_recordar", "");
}

*/


header("Location: index.php");


?>