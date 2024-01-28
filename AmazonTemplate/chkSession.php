<?php
    if(!isset($_SESSION['username']))
        header("location:login.php");
    else
    {
        include("connection.php");
        $idUtente = $_SESSION["idUtente"];
        $idCarrello = $_COOKIE["idCarrello"];
        $sql = "UPDATE carrelli SET ID_utente = '$idUtente' WHERE ID = '$idCarrello'"; //setto l'idUtente al carrello attuale
        $result = $conn->query($sql);
    }
?>