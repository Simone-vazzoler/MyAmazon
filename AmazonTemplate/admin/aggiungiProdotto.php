<?php
    session_start();
    include("../connection.php");

    $categoria = $_POST["cat"]; //prendo la categoria del prodotto che si vuole inserire
    include("AddImmagineProdotto.php"); //carico l'immagine

    $idCat = 10;

    $sql = "SELECT Codice from categorie where Tipo = '$categoria'"; //prendo l'id della categoria passata

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        global $idCat;
        $idCat = $row["Codice"];															
    }
    
    $nome = $_POST["nome"];
    $venditore = $_POST["venditore"];
    $descrizione = $_POST["descrizione"];
    $prezzo = $_POST["prezzo"];
    $quantita = $_POST["quantita"];
    $img = $uploadfile;

    $sql2 = "INSERT INTO articoli (Titolo, Autore, Descrizione, Prezzo, Quantita, ID_Categoria, Immagine)
    VALUES ('$nome', '$venditore', '$descrizione', '$prezzo', '$quantita', '$idCat', '$img')";

    if ($conn->query($sql2) === TRUE) {
        header("location:elencoProdotti.php");
    } else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
?>