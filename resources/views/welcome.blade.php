<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Stock Application</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--

    TemplateMo 562 Space Dynamic

    https://templatemo.com/tm-562-space-dynamic

    -->
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <h4>G<span>S</span></h4>
                    </a>
                    <!-- ***** Menu Start ***** -->
                    @include('nav')
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                            <h6>Bienvenue dans L'application de Stock</h6>
                            <h2>Nous<span> facilitons </span> la <em> calcul </em></h2>
                            <p>Un espace dynamique qui vous aide à calculer et fabriquer facilement et rapidement.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                            <img src="assets/images/banner-right-image.png" alt="team meeting">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="about" class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <img src="assets/images/about-left-image.png" alt="person graphic">
                </div>
            </div>
            <div class="col-lg-8 align-self-center">
                <div class="services">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                <div class="icon">
                                    <img src="assets/images/service-icon-01.png" alt="reporting">
                                </div>
                                <div class="right-text">
                                    <h4>PF</h4>
                                    <p>Produit fini</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                <div class="icon">
                                    <img src="assets/images/service-icon-02.png" alt="">
                                </div>
                                <div class="right-text">
                                    <h4>RM</h4>
                                    <p>Matière Première</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                <div class="icon">
                                    <img src="assets/images/service-icon-03.png" alt="">
                                </div>
                                <div class="right-text">
                                    <h4>PP</h4>
                                    <p>Produit principal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                <div class="icon">
                                    <img src="assets/images/service-icon-04.png" alt="">
                                </div>
                                <div class="right-text">
                                    <h4>SP</h4>
                                    <p>Produit secondaire</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="portfolio" class="our-portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <h2>Découvrez ce que notre   <em>application</em>  <span>fournit</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <a href="#">
                    <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="hidden-content">
                            <h4>Prevision PF</h4>
                            <p>Prevision de vente des produits fini.</p>
                        </div>
                        <div class="showed-content">
                            <img src="assets/images/portfolio-image.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="#">
                    <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="hidden-content">
                            <h4>Gestion de stock</h4>
                            <p>Facilite la gestion de stock des produits disponible.</p>
                        </div>
                        <div class="showed-content">
                            <img src="assets/images/portfolio-image.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="#">
                    <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="hidden-content">
                            <h4>Gestion des commandes</h4>
                            <p>Commander les produits manquante.</p>
                        </div>
                        <div class="showed-content">
                            <img src="assets/images/portfolio-image.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-sm-6">
                <a href="#">
                    <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                        <div class="hidden-content">
                            <h4>Facilite la calcule</h4>
                            <p>Calculer facilement les Produits fini.</p>
                        </div>
                        <div class="showed-content">
                            <img src="assets/images/portfolio-image.png" alt="">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<div id="contact" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <div class="section-heading">
                    <h2>Passer vos commande</h2>
                    <p>Vous pouvez passer vos commande facilement</p>
                    <div class="phone-info">
                        <h4>Pour toute demande, appelez: <span><i class="fa fa-phone"></i> <a href="#">000-000-000</a></span></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                <form id="contact" action="" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="name" name="name" id="name" placeholder="Code produit" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="surname" name="surname" id="surname" placeholder="Quantité" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button ">Commander</button>
                            </fieldset>
                        </div>
                    </div>
                    <div class="contact-dec">
                        <img src="assets/images/contact-decoration.png" alt="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© Copyright 2022. All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/templatemo-custom.js"></script>

</body>
</html>
