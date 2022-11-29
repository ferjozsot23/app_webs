<?php

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    $url.= dirname($_SERVER['REQUEST_URI']);    
      
    $url_index = $url . "/index.php"; 




// Va en la cabecera
session_start();

if (isset($_COOKIE["c_recordar"])) {
    setcookie("c_recordar", $_COOKIE["c_recordar"], time() + (24 * 3600));
    setcookie("c_username", $_COOKIE["c_username"], time() + (24 * 3600)); // 3600 = 1 hora Experición
    setcookie("c_password", $_COOKIE["c_password"], time() + (24 * 3600)); // 3600 = 1 hora Experición
} 

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $_SESSION["s_username"] = $_POST["username"];
    $_SESSION["s_password"] = $_POST["password"];
}

if (isset($_COOKIE["c_username"]) && isset($_COOKIE["c_password"])) {
    $_SESSION["s_username"] = $_COOKIE["c_username"];
    $_SESSION["s_password"] = $_COOKIE["c_password"];
}

if ($_SERVER["HTTP_REFERER"] == $url_index) {
    if (!empty($_POST["recordar"])) {
        setcookie("c_username", $_POST["username"], time() + (24 * 3600)); // 3600 = 1 hora Experición
        setcookie("c_password", $_POST["password"], time() + (24 * 3600)); // 3600 = 1 hora Experición
        setcookie("c_recordar", $_POST["recordar"], time() + (24 * 3600));
    }else {
        setcookie("c_recordar", "", time() - 3600);
        setcookie("c_username", "", time() - 3600);
        setcookie("c_password", "", time() - 3600);
    }
}

// Para cuando quieras entrar a la página directo pero sin login CONTROL
if (!isset($_SESSION["s_username"]) && !isset($_SESSION["s_password"])) {
    header("Location: index.php");
}

// si cookie lang es diferente al de inglés, entonces seteamos al inglés
if (!isset($_COOKIE["c_lang"]) ||  $_COOKIE["c_lang"] != "en") {
    setcookie("c_lang", "en", time() + (24 * 3600));
}




?>


<html>

<head></head>

<body>
    <h1><b>PANLEL PRINCIPAL</b></h1>
    <h2>Bienvenido,
        <?php echo $_SESSION["s_username"] ?>
    </h2>


    <a href="principal_es.php">Español (ES)</a>
    <a href="principal_en.php">English (EN)</a> <br>

    <a href="cerrarsesion.php">Cerrar sesión</a><br>


    <h2>Products List</h2>
    <?php
    // Abrir archivo
    $products_en = fopen("categorias_en.txt", "r") or die("No se puede abrir el archivo!");

    // Leer archivo
    while (!feof($products_en)) {
        echo fgets($products_en), "<br>";
    }
    // Cerrar archivo
    fclose($products_en);





    ?>

</body>


</html>