<?php
    include("../connection.php");

    //prendo tutte le caratteristiche del prodotto che si vuole modificare
    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $venditore = $_GET["venditore"];
    $descrizione = $_GET["descrizione"];
    $prezzo = $_GET["prezzo"];
    $quantita = $_GET["quantita"];

    $sql = "UPDATE articoli SET Titolo='$nome', Autore='$venditore', Descrizione = '$descrizione',
            Prezzo = '$prezzo', Quantita = '$quantita' WHERE Codice='$id'";

    if ($conn->query($sql) === TRUE) {
    header("location:elencoProdotti.php");
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>