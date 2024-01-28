<?php
  session_start();
  if(!isset($_COOKIE['idCarrello']))
  {
	include("chkCarrello.php");
  }


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
                        <a href="index.html" class="logo">
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
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Carrello<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Prodotto</th>
											<th>Prezzo</th>
											<th>Quantita</th>
											<th>Totale</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
									<?php
									include("connection.php");
									$quantita = 0;
									$articolo = "";
									$artId = -1;
									$img = "";
									$parzSpesa = 0;
									$idCarrello = $_COOKIE["idCarrello"];
								
									$sql = "SELECT articoli.Codice as artId, articoli.ID_Categoria as idCat, articoli.Titolo as nome, Prezzo, Immagine, contiene.Quantita as quantita FROM contiene 
									inner join articoli on contiene.ID_Articolo = articoli.Codice
									inner join categorie on articoli.ID_Categoria = categorie.Codice
									where ID_Carrello = '$idCarrello'";

									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){

											global $artId;
											$artId = $row["artId"];
											global $articolo;
											$articolo = $row["nome"];
											global $prezzo;
											$prezzo = $row["Prezzo"];
											global $img;
											$immagine = $row["Immagine"];
											global $quantita;
											$quantita = $row["quantita"];
									

									?>
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="images/<?php echo $immagine;?>" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href='product.php?idProdotto=<?php echo $artId; ?>'><?php echo $articolo; ?></a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col"><?php echo $prezzo; ?></td>
											<td class="quantity-col">

                                                <div class="cart-product-quantity">
													<?php echo $quantita;?>
                                                    <!-- <input type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required> -->
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<?php
												$tot = $prezzo * $quantita;
											?>

											<td id ="parziale" class="total-col"><?php echo number_format($tot, 2);?></td>
											<td class="remove-col"><button class="btn-remove" onclick="Elimina(' <?php echo $artId ?> ')"><i class="icon-close"></i></button></td>
										</tr>

										<?php
											$parzSpesa += $tot; 
											}
										}
										else
										{
											?>
											<h2 class="title text-center mb-4">Carrello vuoto</h2>
										<?php
										}

										?>
									</tbody>
								</table>

	                			<!-- <div class="cart-bottom">
			            			<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
		            			</div> -->

	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td><?php echo number_format($parzSpesa, 2);?></td>
	                						</tr><!-- End .summary-subtotal -->
	                						<!-- <tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;</td>
	                						</tr> -->

                                            <td>&nbsp;</td>

                                            <td>&nbsp;</td>
	                						<!-- <tr class="summary-shipping-estimate">
	                							<td>&nbsp;</td>
	                						</tr> -->

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td id="totale"><?php echo number_format($parzSpesa, 2);?></td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<button onclick="tot('<?php echo $parzSpesa ?>')"class="btn btn-outline-primary-2 btn-order btn-block">CHECKOUT</button>
	                			</div><!-- End .summary -->

		            			<a href="index.php" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUA AD ACQUISTARE</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->

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


	<script>

	function Elimina(idArticolo)
	{
		location.replace("rimuoviCarrello.php?idArt=" + idArticolo);
	}

	function tot(spesaParz)
	{
		var tot = document.getElementById("totale").textContent;
		location.replace("checkout.php?parziale=" + spesaParz + "&totale=" + tot);
	}  
	</script>



    <!-- Plugins JS File -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.hoverIntent.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/bootstrap-input-spinner.js"></script>
    <!-- Main JS File -->
    <script src="js/main.js"></script>
</body>


</html>