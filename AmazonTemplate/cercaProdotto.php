<?php
    session_start();
    include("connection.php");

    $cerca = $_POST["q"];

    if(isset($cerca)){
        $sql="SELECT * FROM articoli WHERE Titolo LIKE '%".$cerca."%'";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            $idProdotto = $row["Codice"];
        }

        header("location:product.php?idProdotto=$idProdotto");
    }
    

?>