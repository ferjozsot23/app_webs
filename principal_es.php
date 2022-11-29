<?php

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



if ($_SERVER["HTTP_REFERER"] == "http://localhost/t1_fernando_soto/index.php") {
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






// Si no existe la cookie lang o si esa cookie es diferente al de español, entonces seteamos para español
if (!isset($_COOKIE["c_lang"]) || $_COOKIE["c_lang"] != "es") {
    setcookie("c_lang", "es", time() + (24 * 3600));
}




// Para cuando quieras entrar a la página directo pero sin login CONTROL
if (!isset($_SESSION["s_username"]) && !isset($_SESSION["s_password"])) {
    header("Location: index.php");
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


    <h2>Lista de Productos</h2>
    <?php
    // Abrir archivo
    $products_es = fopen("categorias_es.txt", "r") or die("No se puede abrir el archivo!");

    // Leer archivo
    while (!feof($products_es)) {
        echo fgets($products_es), "<br>";
    }
    // Cerrar archivo
    fclose($products_es);





    ?>

</body>


</html>