<?php
    include("connection.php");
    $last_id = "";
    
    if(!isset($_SESSION["username"])) //se non è loggato creo un carrello senza settare l'idUtente
    {
        $sql = "INSERT INTO carrelli ()
        VALUES ()";

        if ($conn->query($sql) === TRUE) {
            global $last_id;
            $last_id = $conn->insert_id;
        }
        else
            echo "error1";
    }
    else //altrimenti lo prendo dalla sessione e lo setto
    {
        $idUtente = $_SESSION["idUtente"];

            $sql2 = "INSERT INTO carrelli (ID_utente)
            VALUES ('$idUtente')";

            if ($conn->query($sql2) === TRUE) {
                global $last_id;
                $last_id = $conn->insert_id;
            }
            else
                echo "error";
        $conn->close();
    }
    $cookie_name = "idCarrello";
    $cookie_value = $last_id;
    setcookie($cookie_name, $cookie_value, time() + 3600, "/"); // 86400 = 1 day
?>