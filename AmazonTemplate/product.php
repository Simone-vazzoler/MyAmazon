<?php
  session_start();
  
?>
<!DOCTYPE html>
<html>


<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->
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
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nouislider.css">
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

                    
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                    </ol>

                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <?php
                        include("connection.php");
                        $id = $_GET["idProdotto"];
                        $sql = "SELECT * FROM articoli inner join commenti on articoli.Codice = commenti.ID_Articolo WHERE articoli.Codice = '$id'";
                        $stelle = 0;
                        $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    global $stelle;
                                    $stelle += $row['Stelline'];
                            ?>

                        <div class="product-details-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-gallery product-gallery-vertical">
                                        <div class="row">
                                            <!-- data-zoom-image="images/1-big.jpg" immagine ingrandita-->
                                            <figure class="product-main-image">
                                                <img id="product-zoom" src="images/<?php echo $row['Immagine'];?>" alt="product image">    

                                            </figure><!-- End .product-main-image -->

                                            
                                        </div><!-- End .row -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details">
                                        <h1 class="product-title"><?php echo $row['Titolo'];?></h1><!-- End .product-title -->

                                        <?php 
                                            }
                                        }
                                        $numero = mysqli_num_rows( $result );
                                        //echo $numero;
                                        $stelle /= $numero;
                                        $stelle /= 5;
                                        $stelle *= 100;
                                        ?>
                                       
                                        <!-- stelle e commento -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style='width:"<?php echo $stelle?>"%"<?php ;?>"'></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->


                                        <?php 

                                            include("connection.php");
                                            $id = $_GET["idProdotto"];
                                            $sql = "SELECT * FROM articoli WHERE Codice = '$id'";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    
                                            ?>

                                        <div class="product-price">
                                            <?php echo $row['Prezzo'];?>
                                        </div><!-- End .product-price -->


                                        
                                        <form action="addProdotto.php" method="get">

                                            <div class="details-filter-row details-row-size">
                                                <label for="qty">Quantità:</label>
                                                
                                                <div class="product-details-quantity">
                                                    <input type="number" name ="qty" class="form-control" value="1" min="1" max="<?php echo $row['Quantita'];?>" step="1" data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->
                                            </div><!-- End .details-filter-row -->

                                            
                                            <div class="product-details-action">
                                                <button type="submit" name="idProdotto" value="<?php echo $row['Codice']?>" class="btn-product btn-cart"><span>Aggiungi al carrello</span></a>

                                            </div><!-- End .product-details-action -->

                                                <?php
                                                    $idCarrello = $_COOKIE["idCarrello"];
                                                ?>
                                        <form>

                                        <?php
                                            }
                                        }
                                        ?>

                                        <?php 
                                            $sql = "SELECT categorie.Codice as codCat, Tipo, articoli.Codice FROM categorie inner join articoli on 
                                            categorie.Codice = articoli.ID_Categoria WHERE articoli.Codice = '$id' AND categorie.Codice = articoli.ID_Categoria";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                if($row = $result->fetch_assoc()) {

                                                    $idCat = $row['codCat'];
                                        ?>

                                        <div class="product-details-footer">
                                            <div class="product-cat">
                                                <span>Categoria:</span>
                                                <a href='category.php?idCat=<?php echo $idCat;?>'><?php echo $row['Tipo']?></a>
                                            </div>
                                        </div>

                                        <?php 
                                                }
                                            }
                                        ?>

                                        <?php

                                        if(isset($_SESSION["username"]))
                                        {
                                            $idUtente = $_SESSION["idUtente"];
                                        
                                            //controllo se l'utente ha acquistato il prodotto (se si, può aggiungere il commento)
                                            $sql = "SELECT ID_Articolo, ordini.ID from ordini inner join carrelli on ordini.ID_Carrello = carrelli.ID
                                                    inner join contiene on carrelli.ID = contiene.ID_Carrello where ID_Articolo = '$id' AND ID_Utente = '$idUtente'";
                                            
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0)
                                            {
                                                ?>
                                                <form action="inserisciCommento.php" method ="get">
                                                    <div class='form-group'>
                                                    <label for='titolo'>Titolo:</label>
                                                    <input type='text' class='form-control' name='titolo'>

                                                    <label for='testo'>Inserisci un commento:</label>
                                                    <textarea class='form-control' name='testo' rows='4'></textarea>

                                                    <label for='stelle'>Stelle:</label>
                                                    <input type='number' value='0' min = '0' max = '5' class='form-control' name='stelle'><br>
                                                    <button type='submit' name='idArticolo' value='<?php echo $id?>' class='btn btn-lg btn-block btn-primary'>Invia</button> 
                                                    </div>
                                                </form>

                                            <?php
                                            }


                                        }


                                        ?>

                                        
                                    </div><!-- End .product-details -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div>


                        <div class="product-details-tab">
                            <ul class="nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Descrizione</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Recensioni</a>
                                </li>
                            </ul>

                            <?php
                                $sql = "SELECT Descrizione FROM articoli WHERE Codice = '$id'";

                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        
                                ?> 

                           

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                    <div class="product-desc-content">
                                        <h3>Informazioni del prodotto:</h3>

                                        <?php echo $row['Descrizione']?>
                                        
                                    </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                                
                                <?php
                                    }
                                }
                                ?>

                                <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                    <div class="reviews">
                                        <h3>Recensioni:</h3>

                                        <?php
                                            $sql = "SELECT Username, Recensione, Testo, Stelline from articoli inner join commenti on articoli.Codice = commenti.ID_Articolo
                                            inner join utenti on commenti.ID_Utente = utenti.ID where articoli.Codice = '$id'";
                                            $result = $conn->query($sql);
                                            while($row = $result->fetch_assoc()){

                                        ?>

                                        <div class="review">
                                            <div class="row no-gutters">
                                                <div class="col-auto">

                                                    <h4><?php echo $row['Username']?></h4>

                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                        <?php 
                                                            $stelle = $row['Stelline'] / 5 * 100;
                                                        ?>
                                                            <div class="ratings-val" style='width:"<?php echo $stelle?>"%"<?php ;?>"'></div><!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    </div><!-- End .rating-container -->

                                                </div><!-- End .col -->
                                                <div class="col">
                                                    <h4><?php echo $row['Recensione']?></h4>

                                                    <div class="review-content">
                                                        <?php echo $row['Testo']?>
                                                    </div><!-- End .review-content -->
                                                </div><!-- End .col-auto -->
                                            </div><!-- End .row -->
                                        </div><!-- End .review -->

                                    </div><!-- End .reviews -->
                                </div><!-- .End .tab-pane -->
                                <?php
                                    }
                                ?>
                            </div><!-- End .tab-content -->
                        </div><!-- End .product-details-tab -->
                </div>
            </div>

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


    </div>

    <!-- Plugins JS File -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.hoverIntent.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap-input-spinner.js"></script>
    <script src="js/jquery.elevateZoom.min.js"></script>
    <script src="js/bootstrap-input-spinner.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="js/main.js"></script>

</body>

</html>