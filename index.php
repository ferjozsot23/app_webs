<?php



?>


<html>

<head>
    <title>Tarea 1</title>
</head>

<body>
    <h1>LOGIN</h1>
    <form method="POST" action="<?php
        if (isset($_COOKIE["c_lang"])) {
           if ($_COOKIE["c_lang"] == "en") {
               echo "principal_en.php";
           } else {
               echo "principal_es.php";
           }
        } else {
            echo "principal_es.php";
        }

         ?>">
        <fieldset>
            Usuario: <input type="text" name="username" required value="<?php

            if (isset($_COOKIE["c_username"])) {
                echo $_COOKIE["c_username"]; // Toma de la cookie el valor del username y lo escribe en el espacio
            }

            ?>" /><br />
            Clave: <input type="password" name="password" minlength="8" required value="<?php

            if (isset($_COOKIE["c_password"])) {
                echo $_COOKIE["c_password"]; // Toma de la cookie el valor de la clave y lo escribe en el espacio
            }

            ?>" /><br />


            <input type="checkbox" name="recordar" value="recordar" <?php echo isset($_COOKIE["c_recordar"]) ?
                "checked":"" ?> /> Recordar usuario y clave<br />

            <input type="submit" value="Enviar" />
        </fieldset>
    </form>
</body>
</html>