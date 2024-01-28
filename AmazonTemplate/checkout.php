<?php
	session_start();
    include("chkSession.php");
    
    
    
	
?>
<!DOCTYPE html>
<html>


<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.html">
    <link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="images/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <div class="page-wrapper">
        <header class="header">

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <a href="index.php" class="logo">
                            <img src="images/logo.png" alt="Molla Logo" width="105" height="25">
                        </a>

                        
                    </div><!-- End .header-left -->

					<div class="header-right">
						<div class="wishlist">
                            <a href="login.php" title="Login/Registrati">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                    <!-- <span class="wishlist-count badge">3</span> -->
                                </div>
                                <!-- <p>Login/Registrati</p> -->
                            </a>
                        </div><!-- End .compare-dropdown -->

					</div>

					

                    
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            <div class="page-header text-center" style="background-image: url('images/page-header-bg.jpg')">
                    <div class="container">
                        <h1 class="page-title">Checkout</h1>
                    </div><!-- End .container -->
                </div><!-- End .page-header -->
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->

                <div class="page-content">
            	    <div class="checkout">
	                    <div class="container">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <h2 class="checkout-title">Dettagli d'acquisto</h2><!-- End .checkout-title -->
                                            <div class="row">
                                            <?php

                                                include("connection.php");

                                                $idUtente = $_SESSION["idUtente"];

                                                $sql = "SELECT Nome, Cognome, Email, Telefono, Indirizzo, NumeroCivico, Citta, Stato from utenti
														where ID = '$idUtente'";

                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()){
                                                
                                                

                                            ?>
                                                <div class="col-sm-6">
                                                    <label>Nome *</label>
                                                    <input type="text" value ="<?php echo $row['Nome'];?>" class="form-control" readonly="true" required>
                                                </div><!-- End .col-sm-6 -->

                                                <div class="col-sm-6">
                                                    <label>Cognome *</label>
                                                    <input type="text" value ="<?php echo $row['Cognome'];?>" class="form-control" readonly="true" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <label>Città *</label>
                                            <input type="text" value ="<?php echo $row['Citta'];?>" class="form-control" readonly="true" required>

                                            <label>Via *</label>
                                            <input type="text" value ="<?php echo $row['Indirizzo'];?>" class="form-control" readonly="true" placeholder="Indirizzo..." required>
                                            <label>Numero civico *</label>
                                            <input type="number" value ="<?php echo $row['NumeroCivico'];?>" class="form-control" readonly="true"  placeholder="Numero civico ..." required>

                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <label>Stato *</label>
                                                    <input type="text" value ="<?php echo $row['Stato'];?>" class="form-control" readonly="true" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <div class="row">
                                                <!-- <div class="col-sm-6">
                                                    <label>Codice postale *</label>
                                                    <input type="text" value ="" class="form-control" readonly="true" required>
                                                </div> -->

                                                <div class="col-sm-6">
                                                    <label>Telefono *</label>
                                                    <input type="tel" value ="<?php echo $row['Telefono'];?>" class="form-control" readonly="true" required>
                                                </div><!-- End .col-sm-6 -->
                                            </div><!-- End .row -->

                                            <label>Email *</label>
                                            <input type="email" value ="<?php echo $row['Email'];?>" class="form-control" readonly="true" required>

                                    </div><!-- End .col-lg-9 -->

                                    <?php 
                                        }   
                                    }

                                    
                                    ?>
                                    <aside class="col-lg-3">
                                        <div class="summary">

                                            <h3 class="summary-title">Il tuo ordine:</h3><!-- End .summary-title -->

                                            
                                                <table class="table table-summary">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    
                                                        <?php
                                                            $idCarrello = $_COOKIE["idCarrello"];

                                                            //prendo dalla tabella contiene del relativo carrello il nome del prodotto e il totale
                                                            $sql2 = "SELECT Titolo, Codice, Totale from articoli inner join contiene on articoli.Codice = contiene.ID_Articolo
                                                                    where ID_Carrello = '$idCarrello'";

                                                        $result2 = $conn->query($sql2);
                                                        if ($result2->num_rows > 0) {
                                                            while($row = $result2->fetch_assoc()){
    
                                                        ?>

                                                        <tr>
                                                            <td><a href='product.php?idProdotto=<?php echo $row['Codice']?>'><?php echo $row['Titolo'];?></a></td>
                                                            <td><?php echo $row['Totale']?></td>
                                                        </tr>


                                                        <?php
                                                            
                                                            }
                                                            }
                                                            $totAcquisto = $_GET["totale"];
                                                             
                                                        ?>
                                                        <tr class="summary-subtotal">
                                                            <td>Parziale:</td>
                                                            <td><?php echo $_GET["parziale"] . "€"  ?></td>
                        
                                                        </tr><!-- End .summary-subtotal -->
                                                        <!-- <tr>
                                                            <td>Shipping:</td>
                                                            <td></td>
                                                        </tr> -->
                                                        <tr class="summary-total">
                                                            <td>Totale:</td>
                                                            <td><?php echo $_GET["totale"] . "€"  ?></td>
                                                            
                                                        </tr><!-- End .summary-total -->
                                                    </tbody>
                                                </table><!-- End .table table-summary -->

                                            
                                                <a href='ordine.php?totale=<?php echo $totAcquisto?>' class="btn btn-outline-primary-2 btn-order btn-block"><span>Procedi all'ordine</span></a>
                                                
                                            
                                        </div><!-- End .summary -->
                                    </aside><!-- End .col-lg-3 -->
                                </div><!-- End .row -->
                            </form>

                        <div>

                    <div>

                <div>

        </main>

        <footer class="footer">
        	<div class="footer-middle">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget widget-about">
	            				<img src="images/logo.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
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
	        			<img src="images/payments.png" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->


    <div>

    <script>
        function tot(totAcquisto)
        {
            location.replace("ordine.php?totale=" + totAcquisto);
        }  
	</script>
    <!-- Plugins JS File -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.hoverIntent.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="js/main.js"></script>

</body>


</html>