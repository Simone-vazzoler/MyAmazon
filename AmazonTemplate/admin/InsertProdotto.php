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
    <link rel="stylesheet" href="../css/skin-demo-13.css">
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
        			<h1 class="page-title">Inserisci prodotto</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form enctype="multipart/form-data" action="aggiungiProdotto.php" method="POST">
		                	<div class="row">
		                		<div class="col-lg-12"><br><br><br><br>
		                			<h2 class="checkout-title ">Dettagli prodotto</h2><!-- End .checkout-title -->
		                				<div class="row">	
											<div class="col-sm-6" >
											<label>Nome</label>
											<input type="text" name="nome" class="form-control" style="background-color: #666362; color:white">
											</div><!-- End .col-sm-6 -->

											<div class="col-sm-6">
												<label>Venditore</label>
												<input type="text" name="venditore" class="form-control" style="background-color: #666362; color:white">
											</div><!-- End .col-sm-6 -->
										</div><!-- End .row -->

										<label>Descrizione</label>
										<textarea class="form-control" name="descrizione" style="background-color: #666362; color:white"></textarea>

										<label>Prezzo</label>
										<input type="number" name="prezzo" min="1" value="1" class="form-control" style="background-color: #666362; color:white">

										<div class="row">
											<div class="col-sm-6">
											<label for="cat">Categoria</label><br>
												<select name="cat" id="cat">
												<?php
													include("../connection.php");
													$sql = "SELECT Codice, Tipo from categorie"; //idSup > 6 perchè le terze categorie partono dal settimo id
													$result = $conn->query($sql);

													//creo il combo con le categorie
													while($row = $result->fetch_assoc()) {
														echo '<option name=' .$row["Codice"]. '>' .$row["Tipo"]. '</option>';																
													}
												?>
												</select>
											</div><!-- End .col-sm-6 -->

											<div class="col-sm-6">
												<label>Quantità</label>
												<input type="number" name="quantita" class="form-control" style="background-color: #666362; color:white;">
											</div><!-- End .col-sm-6 -->

											<div class="col-sm-6">
												<label>Immagine</label>
												<input type='file' name='foto'><br>
											</div><!-- End .col-sm-6 -->

										</div><!-- End .row -->
										<div class="cart-bottom">
										
										<!-- bottone per aggiungere il prodotto -->
										<input type="submit" value="Aggiungi" class="btn btn-outline-dark-2 btn-block mb-3" style="background-color: #666362; color:white;">
										</div><!-- End .col-lg-9 -->
										<aside class="col-lg-3"><br><br><br<br><br><br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

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
    </div>