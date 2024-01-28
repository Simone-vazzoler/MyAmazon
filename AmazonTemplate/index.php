<?php
    session_start();
    if(!isset($_COOKIE['idCarrello']))
        include("chkCarrello.php");
?>

<!DOCTYPE html>
<html>

    <head>

    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TemplateAmazon</title>


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
        <link rel="stylesheet" href="css/line-awesome.min.css">

        <!-- Plugins CSS File -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery.countdown.css">

        <!-- Main CSS File -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/skin-demo-4.css">
        <link rel="stylesheet" href="css/demo-4.css">
    </head>

    <body>

        <div class="page-wrapper">

            <header class="header header-intro-clearance header-4">


                <div class="header-middle">

                    <div class="container">

                        <div class="header-left">
                            <!-- <button class="mobile-menu-toggler">
                                <span class="sr-only">Toggle mobile menu</span>
                                <i class="icon-bars"></i>
                            </button> -->

                            <a href="index.html" class="logo">
                                <img src="images/logo.png" alt="Molla Logo" width="105" height="25">
                            </a>

                        </div>

                        <div class="header-center">
                            <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                                <form action="cercaProdotto.php" method="post">

                                    <div class="header-search-wrapper search-wrapper-wide">
                                        <label for="q" class="sr-only">Cerca</label>
                                        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                        <input type="search" class="form-control" name="q" id="q" placeholder="Cerca un prodotto ..." required>
                                    </div><!-- End .header-search-wrapper -->
                                </form>
                            </div><!-- End .header-search -->
                        </div>

                        <div class="header-right">
                            <!-- icona login -->

                            <div class="wishlist"> 
                                <?php 
                                    include("connection.php");
                                    
                                if(isset($_SESSION['username'])){

                                        if($_SESSION["admin"] == "1"){
                                            ?> 
                                            <button class="btn btn-primary btn-lg" onclick= prodotti(); >Gestisci prodotti</button>
                                            <?php

                                        }else{
                                        ?>
                                            <a href="logout.php" title="Logout">
                                    
                                            <div class="icon">
                                                <i class="icon-user"></i>
                                                <!-- <span class="wishlist-count badge">3</span> -->
                                            </div>
                                            <p><?php echo $_SESSION["username"];?></p>
                                            </a>  
                                <?php
                                        
                                    }

                                ?>

                                <?php
                                    }else{
                                ?>
                                    <a href="login.php" title="Login">
                                    
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                        <p>Login/Registrati</p>
                                        
                                    </div>
                                    </a>
                                <?php 
                                }
                                
                                ?>
                                
                            </div>
                            
                            <div class="wishlist">

                                <a href="cart.php" title="Carrello" >
                                    <div class="icon">
                                        <i class="icon-shopping-cart"></i>
                                        <!-- <span class="cart-count">2</span> -->
                                    </div>
                                    <p>Carrello</p>
                                </a>

                            
                            </div>


                        </div>



                    </div>

                </div>

                <div class="header-bottom sticky-header">
                    <div class="container">

                        <div class="header-left">
                            <div class="dropdown category-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Tutte le categorie">
                                    Tutte le categorie <i class="icon-angle-down"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <nav class="side-nav">
                                        <ul class="menu-vertical sf-arrows">
                                            <!-- <li class="item-lead"><a href="#">Offerte del giorno</a></li>
                                            <li class="item-lead"><a href="#">Gift Ideas</a></li> -->
                                            <li><a href="category.php?idCat=1">Computer&Laptop</a></li>
                                            <li><a href="category.php?idCat=2">Abbigliamento</a></li>
                                            <li><a href="category.php?idCat=3">Videogiochi</a></li>
                                            <li><a href="category.php?idCat=4">Arredamento</a></li>
                                            <li><a href="category.php?idCat=5">Cancelleria</a></li>
                                            <li><a href="category.php?idCat=6">Bellezza</a></li>
                                        </ul><!-- End .menu-vertical -->
                                    </nav><!-- End .side-nav -->
                                </div><!-- End .dropdown-menu -->

                            </div>

                        </div>



                    </div>

                </div>



            </header>

            <main class="main">

                <div class="intro-slider-container mb-5">

                    <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl"
                        data-owl-options='{
                            "dots": true,
                            "nav": false, 
                            "responsive": {
                                "1200": {
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        <div class="intro-slide" style="background-image: url(images/slide-1.png);">
                            <div class="container intro-content">
                                <div class="row justify-content-end">
                                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                        <h3 class="intro-subtitle text-third">Le nostre promozioni</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">Beats by</h1>
                                        <h1 class="intro-title">Dre Studio 3</h1><!-- End .intro-title -->

                                        <div class="intro-price">
                                            <sup class="intro-old-price">$349,95</sup>
                                            <span class="text-third">
                                                $279<sup>.99</sup>
                                            </span>
                                        </div><!-- End .intro-price -->

                                        <!-- <a href="category.html" class="btn btn-primary btn-round">
                                            <span>Shop More</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a> -->
                                    </div><!-- End .col-lg-11 offset-lg-1 -->
                                </div><!-- End .row -->
                            </div><!-- End .intro-content -->

                        </div>

                        <div class="intro-slide" style="background-image: url(images/slide-2.png);">
                            <div class="container intro-content">
                                <div class="row justify-content-end">
                                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                        <h3 class="intro-subtitle text-primary">Nuovi arrivi</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">Apple iPad Pro <br>12.9 Inch, 64GB </h1><!-- End .intro-title -->

                                        <div class="intro-price">
                                            <sup>Today:</sup>
                                            <span class="text-primary">
                                                $999<sup>.99</sup>
                                            </span>
                                        </div><!-- End .intro-price -->

                                        <!-- <a href="category.html" class="btn btn-primary btn-round">
                                            <span>Shop More</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a> -->
                                    </div><!-- End .col-md-6 offset-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .intro-content -->
                        </div><!-- End .intro-slide -->

                    </div>

                    <span class="slider-loader"></span><!-- End .slider-loader -->

                </div>

                <div class="container">

                    <h2 class="title text-center mb-4">Le categorie più popolari</h2><!-- End .title text-center -->

                    <div class="cat-blocks-container">
                        <div class="row">
                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="category.php?idCat=1" class="cat-block">
                                    <figure>
                                        <span>
                                            <img src="images/1.png" alt="Category image">
                                        </span>
                                    </figure>

                                    <h3 class="cat-block-title">Computer & Laptop</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->

                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="category.php?idCat=2" class="cat-block">
                                    <figure>
                                        <span>
                                            <img src="images/2.png" alt="Category image">
                                        </span>
                                    </figure>

                                    <h3 class="cat-block-title">Abbigliamento</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->

                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="category.php?idCat=3" class="cat-block">
                                    <figure>
                                        <span>
                                            <img src="images/3.png" alt="Category image">
                                        </span>
                                    </figure>

                                    <h3 class="cat-block-title">Videogiochi</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->

                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="category.php?idCat=4" class="cat-block">
                                    <figure>
                                        <span>
                                            <img src="images/4.png" alt="Category image">
                                        </span>
                                    </figure>

                                    <h3 class="cat-block-title">Arredamento</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->

                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="category.php?idCat=5" class="cat-block">
                                    <figure>
                                        <span>
                                            <img src="images/5.png" alt="Category image">
                                        </span>
                                    </figure>

                                    <h3 class="cat-block-title">Cancelleria</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->

                            <div class="col-6 col-sm-4 col-lg-2">
                                <a href="category.php?idCat=6" class="cat-block">
                                    <figure>
                                        <span>
                                            <img src="images/6.png" alt="Category image">
                                        </span>
                                    </figure>

                                    <h3 class="cat-block-title">Bellezza</h3><!-- End .cat-block-title -->
                                </a>
                            </div><!-- End .col-sm-4 col-lg-2 -->

                        </div>

                    </div>

                </div>

                <div class="mb-4"></div><!-- End .mb-4 -->

                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-md-6 col-lg-4">
                            <div class="banner banner-overlay banner-overlay-light">
                                <a href="#">
                                    <img src="images/banner-1.png" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle"><a href="#">Smart Offer</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title"><a href="#">Save $150 <strong>on Samsung <br>Galaxy Note9</strong></a></h3><!-- End .banner-title -->
                                    <!-- <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a> -->
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-6 col-lg-4">
                            <div class="banner banner-overlay banner-overlay-light">
                                <a href="#">
                                    <img src="images/banner-2.jpg" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle"><a href="#">Time Deals</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title"><a href="#"><strong>Bose SoundSport</strong> <br>Time Deal -30%</a></h3><!-- End .banner-title -->
                                    <!-- <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a> -->
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-6 col-lg-4">
                            <div class="banner banner-overlay banner-overlay-light">
                                <a href="#">
                                    <img src="images/banner-3.png" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle"><a href="#">Clearance</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title"><a href="#"><strong>GoPro - Fusion 360</strong> <br>Save $70</a></h3><!-- End .banner-title -->
                                    <!-- <a href="#" class="banner-link">Shop Now<i class="icon-long-arrow-right"></i></a> -->
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->

                    </div>

                </div>

                <div class="mb-3"></div><!-- End .mb-5 -->

                <div class="container new-arrivals">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title">Nuovi arrivi</h2><!-- End .title -->
                        </div><!-- End .heading-left -->
                    </div>

                    <div class="tab-content tab-content-carousel just-action-icons-sm">
                        <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link"> 
                            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                                data-owl-options='{
                                        "nav": true, 
                                        "dots": true,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":2
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            },
                                            "992": {
                                                "items":4
                                            },
                                            "1200": {
                                                "items":5
                                            }
                                        }
                                }'> 

                                <?php
                                    $sql = "SELECT * FROM articoli WHERE ID_Categoria = 7";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                ?>
                                
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <!-- <span class="product-label label-circle label-top">Top</span> -->
                                        
                                        <img src="images/<?php echo $row['Immagine'];?>" name ="immagine" alt="Product image" class="product-image">
                                        
                                        
                                        <form action="addProdotto.php" method="get">
                                            <input type="hidden" name ="qty" class="form-control" value="1" min="1" max="<?php echo $row['Quantita'];?>" step="1" data-decimals="0" required>
                                            
                                            <div class="product-action">

                                                <button type="submit" name= "idProdotto" value="<?php echo $row['Codice']?>" class="btn-product btn-cart"  title="Aggiungi al carrello"></a>

                                            </div><!-- End .product-action -->
   
                                        </form>
                                        <?php
                                            $idCarrello = $_COOKIE["idCarrello"];
                                        ?>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?php echo $row['Autore'];?></a>
                                        </div><!-- End .product-cat -->

                                        <h3 class="product-title" ><a href='product.php?idProdotto=<?php echo $row['Codice']?>' name ="nome"><?php echo $row['Titolo'];?></a></h3><!-- End .product-title -->
                                        <div class="product-price" name="prezzo">
                                            <?php echo $row['Prezzo'];?>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                               
                                <?php   
                                        }
                                    }
                                
                                ?>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="container">
                    <hr class="mb-0">
                    <div class="owl-carousel mt-5 mb-5 owl-simple" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                        <a href="#" class="brand">
                            <img src="images/brands/1.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="images/brands/2.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="images/brands/3.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="images/brands/4.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="images/brands/5.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="images/brands/6.png" alt="Brand Name">
                        </a>
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
                
                <div class="container for-you">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title">Consigliati per te</h2><!-- End .title -->
                        </div><!-- End .heading-left -->
                    </div><!-- End .heading-left -->

                        

                    <div class="products">
                        <div class="row justify-content-center">
                            <div class="col-6 col-md-4 col-lg-3">

                                <?php
                                    $sql = "SELECT * FROM articoli WHERE ID_Categoria = 8";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {

                                ?>
                                <div class="product product-2">

                                    <figure class="product-media">
                                        <!-- <span class="product-label label-circle label-sale">Sale</span> -->
                                        <a href="product.html">
                                            <img src="images\<?php echo $row['Immagine'];?>" alt="Product image" class="product-image">
                                        </a>

                                        <!-- <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                        </div> -->

                                        <div class="product-action">
                                            <button type="submit" name= "idProdotto" value="<?php echo $row['Codice']?>" class="btn-product btn-cart"  title="Aggiungi al carrello"></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#"><?php echo $row['Autore'];?></a>
                                        </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href='product.php?idProdotto=<?php echo $row['Codice']?>'><?php echo $row['Titolo'];?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price"><?php echo $row['Prezzo'];?></span>
                                            <span class="old-price">Was $349.99</span>
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                <?php
                                    }
                                }   
                                ?>
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                            
                                            

                        </div>

                          

                    </div>
                            

                        

                    

                </div>

                <div class="mb-4"></div><!-- End .mb-4 -->

                <div class="container">
                    <hr class="mb-0">
                </div><!-- End .container -->

                <div class="icon-boxes-container bg-transparent">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-rocket"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                        <p>Orders $50 or more</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-rotate-left"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                        <p>Within 30 days</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-info-circle"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                        <p>when you sign up</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="icon-life-ring"></i>
                                    </span>

                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                        <p>24/7 amazing services</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-sm-6 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .icon-boxes-container -->



            </main>

            <footer class="footer">
                <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(images/bg-5.jpg);">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-sm-10 col-md-8 col-lg-6">
                                <div class="cta-heading text-center">
                                    <h3 class="cta-title text-white">Get The Latest Deals</h3><!-- End .cta-title -->
                                    <p class="cta-desc text-white">and receive <span class="font-weight-normal">$20 coupon</span> for first shopping</p><!-- End .cta-desc -->
                                </div><!-- End .text-center -->
                            
                                

                            </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cta -->

                <div class="footer-middle">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="widget widget-about">
                                    <img src="images/logo.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
                                    <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                                    <!-- <div class="widget-call">
                                        <i class="icon-phone"></i>
                                        Got Question? Call us 24/7
                                        <a href="tel:#">+0123 456 789</a>         
                                    </div> -->
                                </div><!-- End .widget about-widget -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                        </div>

                    </div>

                </div>

                <div class="footer-bottom">
                    <div class="container">
                        <p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
                        <figure class="footer-payments">
                            <img src="images/payments.png" alt="Payment methods" width="272" height="20">
                        </figure><!-- End .footer-payments -->
                    </div><!-- End .container -->
                </div><!-- End .footer-bottom -->

            </footer>

            
        </div>
        <script>
        function prodotti() {
            location.replace("admin/elencoProdotti.php");
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
        <script src="js/jquery.plugin.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <!-- Main JS File -->
        <script src="js/main.js"></script>
        <script src="js/demo-4.js"></script>



    </body>

</html>