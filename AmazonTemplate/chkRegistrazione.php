<?php
    if($_POST["register-password"] == $_POST["register-password-2"])
    {
        include("connection.php");
        $user = $_POST['register-user'];
        $pass = MD5($_POST['register-password']);

        $sql = "INSERT INTO utenti (Username, Password)
        VALUES ('$user', '$pass')";

        if ($conn->query($sql) === TRUE) {
            header("location:login.php");
        } else {
        echo "Errore: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    else {
        header("location:Registrazione.php?msg=Password non corrispondenti");
    }
?>