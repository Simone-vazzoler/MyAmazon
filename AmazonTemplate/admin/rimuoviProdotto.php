<?php
    include("../connection.php");
    $id = $_GET['id']; //id articolo che voglio eliminare

    //elimina record in tabella recita
    $sql = "DELETE FROM articoli WHERE Codice = '$id' ";

    if ($conn->query($sql) === TRUE) {
        header("location:elencoProdotti.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
?>