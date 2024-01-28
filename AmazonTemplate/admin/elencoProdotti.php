<?php
	session_start();
	include("../chkSession.php");
?>

<!DOCTYPE html>
<html lang="en">


<!-- molla/checkout.html  22 Nov 2019 09:55:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
    <link rel="manifest" href="../images/site.html">
    <link rel="mask-icon" href="../images/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="../images/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/skin-demo-4.css">
    <link rel="stylesheet" href="../css/demo-4.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
   
        <header class="header">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <a href="../index.php" class="logo">
                            <img src="../images/logo.png" alt="Molla Logo" width="105" height="25">
                        </a>

                        
                    </div><!-- End .header-left -->

                    
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
    <main class="main">
        	<div class="page-header text-center" style="background-image: url('../images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Elenco prodotti</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

    <!-- creo la tabella con i prodotti -->
    <div class="global-container-film">
        <div class="card-body">
            <h1 class="card-title text-center"></h1>
            <table class="table table-bordered table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Venditore</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Quantita</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT Codice, Titolo, Autore, Descrizione, Prezzo, Quantita FROM articoli";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";

                            //scheda prodotto conterra i dettagli del prodotto
                            echo "<td><a href = '../product.php?idProdotto=".$row['Codice']. "'>" .$row['Titolo']. "</a></td>";
                            echo "<td>" .$row['Autore']. "</td>";
                            echo "<td>" .$row['Descrizione']. "</td>";
                            echo "<td>" .$row['Prezzo']. "</td>";
                            echo "<td>" .$row['Quantita']. "</td>";

                            //bottone per eliminare il prodotto
                            echo "<td><button type='button' data-toggle='modal' data-target='#popup".$row['Codice']."' class='btn-lg btn-danger'>ELIMINA</button></td>";
                            
                            echo "<div class='modal fade' id='popup".$row['Codice']. "' tabindex='-1' role='dialog' aria-labelledby='popup' aria-hidden='true'>";
                            echo "<div class='modal-dialog' role='document'>";
                            echo    "<div class='modal-content'>";
                            echo    "<div class='modal-header'>";
                            echo        "<h5 class='modal-title' id='popup'>Cancellare?</h5>";
                            echo        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo        "<span aria-hidden='true'>&times;</span>";
                            echo        "</button>";
                            echo    "</div>";
                            echo    "<div class='modal-body'>";
                            echo        "<p>Cancellare il prodotto selezionato?</p>";
                            echo    "</div>";
                            echo    "<div class='modal-footer'>";
                            echo        "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Chiudi</button>";
                            echo        "<button type='button' class='btn btn-primary' onclick='Elimina(" .$row['Codice']. ")'>Conferma</button>";
                            echo    "</div>";
                            echo    "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "<button type='button' class='btn-lg btn-success' onclick='New()'>Aggiungi prodotto</button>";
                    }
                ?>
        </div>
   </div>
   <main>

   <footer class="footer">
        	<div class="footer-middle">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget widget-about">
	            				<img src="../images/logo.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
	            				<p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="about.html">About Molla</a></li>
	            					<li><a href="#">How to shop on Molla</a></li>
	            					<li><a href="#">FAQ</a></li>
	            					<li><a href="contact.html">Contact us</a></li>
	            					<li><a href="login.html">Log in</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="#">Payment Methods</a></li>
	            					<li><a href="#">Money-back guarantee!</a></li>
	            					<li><a href="#">Returns</a></li>
	            					<li><a href="#">Shipping</a></li>
	            					<li><a href="#">Terms and conditions</a></li>
	            					<li><a href="#">Privacy Policy</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">My Account</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="#">Sign In</a></li>
	            					<li><a href="cart.html">View Cart</a></li>
	            					<li><a href="#">My Wishlist</a></li>
	            					<li><a href="#">Track My Order</a></li>
	            					<li><a href="#">Help</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
	        		<figure class="footer-payments">
	        			<img src="../images/payments.png" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
   



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<script>
    //eliminazione prodotto passato
    function Elimina(idProd)
    {
        location.replace("rimuoviProdotto.php?id=" + idProd);
    }
</script>

<script>
    //inserimento nuovo prodotto
    function New() 
    {
        location.replace("InsertProdotto.php");
    }
</script>