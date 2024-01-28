<?php
    session_start();
    if(!isset($_COOKIE['idCarrello']))
	{
		include("chkCarrello.php"); //controllo se il carrello è stato creato
	}
?>
    
<?php
    $idArticolo = $_GET["idProdotto"]; //id articolo che si vuole aggiungere
    $quantita = $_GET["qty"]; //quantita inserita
    $idCarrello = $_COOKIE["idCarrello"]; //id carrello dell'utente


    $quantitaTot = $quantita;

    $prezzoProd = 0.0;
    $prezzoTot = 0.0;
    include("connection.php");
                $sql = "SELECT Prezzo from articoli where Codice = '$idArticolo'"; //prendo il prezzo dell'articolo che si vuole inserire
                $result = $conn->query($sql);;

                if($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()){
                        global $prezzoProd;
                        $prezzoProd = $row["Prezzo"]; //salvo in una variabile il prezzo del prodotto
                    } else
                        echo "Error updating record: " . $conn->error;
                }
                
            

    /*controllo se il prodotto è già stato inserito in precedenza*/
    $sql1 = "SELECT ID_Articolo, ID_Carrello, Quantita from contiene where ID_Articolo = '$idArticolo' AND ID_Carrello = '$idCarrello'";
            $result = $conn->query($sql1);
            
                if($row = $result->fetch_assoc()){ //se ho un record significa che è già presente
                    global $quantitaTot;
                    $quantitaTot += $row["Quantita"]; //aggiungo la quantita inserita
    
                    global $prezzoTot;
                    $prezzoTot = $quantitaTot * $prezzoProd; //calcolo il costo totale
    
                    //aggiorno l'articolo nella tabella contiene
                    $sql2 = "UPDATE contiene set Quantita = '$quantitaTot', Totale = '$prezzoTot' where ID_Articolo = '$idArticolo'";
                    if ($conn->query($sql2) === TRUE) {
                        header("location:cart.php");
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }
                else
                {
                    global $prezzoTot;
                    $prezzoTot = $quantitaTot * $prezzoProd;
    
                    //inserisco l'articolo nel carrello quindi nella tabella contiene
                    $sql3 = "INSERT INTO contiene (ID_Articolo, ID_Carrello, Quantita, Totale)
                    VALUES ('$idArticolo', '$idCarrello', '$quantitaTot', '$prezzoTot')";
    
                    if ($conn->query($sql3) === TRUE) {
                        header("location:cart.php");
                    }
                    else
                        echo "error";
                }
            
?>

    
