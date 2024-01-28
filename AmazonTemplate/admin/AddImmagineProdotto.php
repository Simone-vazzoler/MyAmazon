<?php
    //caricamento immagine prodotto 

    if(isset($_FILES["foto"]) && $_FILES["foto"]["name"] != "")
    {
        //Costruisco il path completo di destinazione
        $uploaddir = '../images';
        $uploadfile = $uploaddir . basename($_FILES['foto']['name']);

        //$_FILES['userfile']['tmp_name']: Il nome del file temporaneo in cui il file caricato � salvato sul server.
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
            //
        } else {
            die("impossibile caricare l'immagine");
        }
    }
?>