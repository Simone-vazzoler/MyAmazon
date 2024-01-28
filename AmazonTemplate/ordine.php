<?php
    include("connection.php");
    $idCarrello = $_COOKIE["idCarrello"];
    $totale = $_GET["totale"];

    //creo l'ordine
    $sql = "INSERT INTO ordini (Totale, ID_Carrello)
            VALUES ('$totale', '$idCarrello')";
    $conn->query($sql);

    $sql2 = "SELECT articoli.Quantita as artQty, contiene.Quantita as contQty, articoli.Titolo as articolo from contiene inner join articoli on contiene.ID_Articolo = articoli.Codice
             where ID_Carrello = '$idCarrello'";


    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $nome = $row["articolo"];
            $quantita = $row["artQty"] - $row["contQty"]; //sottraggo dalla quantita disponibile del prodotto quella acquistata

            $sql3 = "UPDATE articoli SET Quantita = '$quantita' where articoli.Titolo = '$nome'";
            $conn->query($sql3);
        }
    }

    unset($_COOKIE['idCarrello']);
    //setcookie('idCarrello', '', time() - 3600, '/'); // empty value and old <timestamp></timestamp>
    include("chkCarrello.php");
    header("location:index.php");
?>