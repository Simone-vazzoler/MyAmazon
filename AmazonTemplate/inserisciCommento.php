<?php
    session_start();
    include("connection.php");

    //prendo le caratteristiche del commento che vuole inserire
    $titolo = $_GET["titolo"];
    $testo = $_GET["testo"];
    $stelle = $_GET["stelle"];
    $idArticolo = $_GET["idArticolo"];
    $idUtente = $_SESSION["idUtente"];

    $sql = "INSERT INTO commenti (Recensione, Testo, Stelline, ID_Articolo, ID_Utente)
    VALUES ('$titolo', '$testo', '$stelle', '$idArticolo', '$idUtente')";
    
    $conn->query($sql);
    $conn->close();
    header("location:index.php");
?>