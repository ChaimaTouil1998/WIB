<?php
session_start();
include "inc/functions.php";
$categories = getAllCategories();




$produitCategorie = getProductByCategorie();
$produits = getAllProducts();
$poductsNouveautés = getAllProductsNouveautés();
$produitsPromo = getAllProductsPromotions();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Accueil - WIB </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


<?php include "inc/header.php"; ?>


    <!-- Carousel Start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/liv.jpeg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"  src="img/ss.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"  src="img/slide gamer.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; ">
                    <h1 class="fa fa-check  m-0 mr-3" style="color: #000098;"></h1>
                    <h5 class="font-weight-semi-bold m-0"> Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast " style="color: #000098;"></h1>
                    <h5 class="font-weight-semi-bold m-0"> Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt " style="color: #000098;"></h1>
                    <h5 class="font-weight-semi-bold m-0"> 14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume" style="color: #000098;"></h1>
                    <h5 class="font-weight-semi-bold m-0"> 24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


   <!-- Categories Start -->
   
   <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <a href="fourniture_bureautique.php"><img style="max-width: 100%;
  height: auto;" class="img-fluid" src="img/slide-categorie.jpg" alt=""></a>
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                <a href="fourniture_scolaire.php"><img  style="max-width: 100%;
  height: auto;" class="img-fluid" src="img/traçage-et-ciseaux.jpg" alt=""></a>

                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                <a href="fourniture_scolaire.php"><img style="max-width: 100%;
  height: auto;" class="img-fluid" src="img/categorie-colle-et-adhesifs.jpg" alt=""></a>

                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                                        <a href="fourniture_bureautique.php"><img style="max-width: 100%;
  height: auto;" class="img-fluid" src="img/CAHIERS,-BLOC-NOTE.jpg" alt=""></a>

                </div>
            </div>
        </div>
    </div>
    
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span style="color: black;" class="bg-secondary pr-3">Nouveaux Produits</span></h2>

        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
        <?php
                foreach ($poductsNouveautés as $PN){
                    print '
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/'.$PN['image'].'" alt="">
                        <div class="product-action">
                                <a class="btn btn-outline-light btn-square" style="border-color: #000098;" href="VenteFlashNouveautés.php?id=' . $PN['id'] . '"><i class="fa fa-shopping-cart" style="color: #000098;"></i></a>
                                <a class="btn btn-outline-dark btn-square" style="border-color: #000098;" href=""><i class="far fa-heart" style="color: #000098;"></i></a>
                                <a class="btn btn-outline-light btn-square" style="border-color: #000098;" href="VenteFlashNouveautés.php?id=' . $PN['id'] . '"><i class="fa fa-search" style="color: #000098;"></i></a>
                            </div>
                        </div>
                        <div class="new text-center ">
                        <a class="h6  text-truncate" href=""> <span>'.$PN['nom'].'</span></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h6 style="color: #000098;">'.$PN['prix'].' DT</h4>
                                <h6 class="text-muted ml-2"><del>'.$PN['ancien_prix'].' DT</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                        </div>
                    </div>
                </div>';
                }
            ?>
           
            
           </div>
    </div>   </div>
    </div></div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/1000x430.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn " style="background-color: #000098; color: #FFFFFF;">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/1000x430.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn" style="background-color: #000098; color: #FFFFFF;">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span style="color: black;" class="bg-secondary pr-3">Produits En</span><span  class="bg-secondary text-danger pr-3">Promos</span></h2>

        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
           <?php
           
    foreach($produitsPromo as $PP){
        print'
        <div class="product-item bg-light mb-4">
            <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" src="img/'.$PP['image'].'" alt="">
            <div class="product-action">
                    <a class="btn btn-outline-light btn-square" style="border-color: #000098;" href="VenteFlashPromotions.php?id=' . $PP['id'] . '"><i class="fa fa-shopping-cart" style="color: #000098;"></i></a>
                    <a class="btn btn-outline-dark btn-square" style="border-color: #000098;" href=""><i class="far fa-heart" style="color: #000098;"></i></a>
                    <a class="btn btn-outline-light btn-square" style="border-color: #000098;" href="VenteFlashPromotions.php?id=' . $PP['id'] . '"><i class="fa fa-search" style="color: #000098;"></i></a>
                    </div>
            </div>
            <div class="new text-center ">
                <a class="h6" href="">'.$PP['nom'].'</a>
                <div class="d-flex align-items-center justify-content-center mt-2">
                <h6 style="color: #000098;">'.$PP['prix'].' DT</h4>
                <h6 class="text-muted ml-2"><del>'.$PP['ancien_prix'].'DT</del></h6>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-1">
                <img src="img/uu.png" style="width:90px;">  

                
            </div>
        </div>
    </div>';
    }
 
?>
            
            </div>
    </div></div>
    </div></div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span style="color: black;" class="bg-secondary pr-3">Nos PArtenaires</span></h2>

        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/purple.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/yamama.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/casio.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/maped.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/sharp.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/officePlast.jpg" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/bic.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/brother.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/epson.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/carioca.png" alt="" style="height: 100px">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/UHU_logo.png" alt="" style="height: 100px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

    <?php

    include "inc/footer.php";
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn back-to-top" style="background-color: #000098; color: #FFFFFF;"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>