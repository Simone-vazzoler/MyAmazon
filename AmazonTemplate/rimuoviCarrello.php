<?php
    include("connection.php");
    $idArticolo = $_GET["idArt"];
    $idCarrello = $_COOKIE["idCarrello"];

    $sql = "DELETE FROM contiene WHERE ID_Articolo='$idArticolo' AND ID_Carrello = '$idCarrello'";

    $conn->query($sql);
    $conn->close();
    header("location:cart.php");
?>