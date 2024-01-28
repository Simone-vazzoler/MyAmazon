<?php
    include("connection.php");
    session_start();

    $user = $_POST['singin-user'];
    $pass = MD5($_POST['singin-password']);

    $sql = "SELECT ID, Username, Admin, Password FROM utenti where Password = '$pass' AND Username = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()) {
            $_SESSION["username"] = $row["Username"];

            // $_SESSION["logged"] = true;
            $_SESSION["idUtente"] = $row["ID"];
            $_SESSION["admin"] = $row["Admin"];
            
            $cookie_name = "username";
            $cookie_value = "$idUtente";
            setcookie($cookie_name, $cookie_value, time() + 3600, "/"); // 86400 = 1 day
        }
        header("location:index.php");
    } else {
        //$_SESSION['logged']=false;
        header("location:login.php?msg=login errato");
    }
    $conn->close();
?>