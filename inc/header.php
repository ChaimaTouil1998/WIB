<?php

//include "functions.php";

$categories = getAllCategories();



$produitCategorie = getProductByCategorie();
$produits = getAllProducts();
$poductsNouveautés = getAllProductsNouveautés();
$produitsPromo = getAllProductsPromotions();

$produitcat = getProductByCategorie();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Wib </title>
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
    <!-- Topbar Start -->
    <div class="container-fluid">
        
         <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <img src="img/Wib_Logo_Min.jpg" alt="">
            </div>
            
          
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid  " style="background-color: #000098;">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between  w-100" data-toggle="collapse"
                    href="#navbar-vertical" style="height: 65px; padding: 0 30px; background-color: #000098;">
                    <h6 style="color: #FFFFFF;"><i style="color: #FFFFFF;" class="fa fa-bars mr-2"></i>Catégories</h6>
                    <i style="color: #FFFFFF;" class="fa fa-angle-down "></i>
                </a>
               
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">


                 
           <a href="fourniture_scolaire.php" class="nav-link dropdown-toggle" >Fourniture Scolaire
           
            </a>
            <a href="fourniture_bureautique.php" class="nav-link dropdown-toggle" >Fourniture Bureautique
           
           </a>
        
   
                     

                        
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-dark py-3 py-lg-0 px-0" style="background-color: #000098;">
                
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Accueil</a>
                            <a href="produits.php" class="nav-item nav-link">Nos Produits </a>

                            <a href="nouveauté.php" class="nav-item nav-link">Nouveautés</a>
                            <a href="promotions.php" class="nav-item nav-link">Promotions </a>

                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <div class="btn-group">
                        <button type="button" class="btn btn-sm dropdown-toggle" style="background-color: #000098; color:#FFFFFF ;" data-toggle="dropdown">
                            Compte WIB <i style="color: #FFFFFF;" class="fa fa-angle-down "></i></button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <?php if (isset($_SESSION['nom'])){
                                print '<a href="profile.php" class="dropdown-item">Mon Profil</a>';
                            } else{
                                print '<a href="connexion.php" class="dropdown-item">Se connecter</a>
                                <a href="register.php" class="dropdown-item">Créer votre Compte</a>
                               ';
                            }?>
                            
                            
                        </div>
                    </div>
                </div>
                <?php if(isset($_SESSION['panier']) && is_array($_SESSION['panier'][3])){
                    print '<a href="panier.php" class="btn px-0" style="color: #FFFFFF;">
                    <i class="fas fa-heart " ></i>
                    <span class="badge text-secondary border border-secondary rounded-circle"
                        style="padding-bottom: 2px;">'.count($_SESSION['panier'][3]).'</span>
                </a>';
                } else{
                    print'<a href="panier.php" class="btn px-0" style="color: #FFFFFF;">
                    <i class="fas fa-shopping-cart " ></i>
                    <span class="badge text-secondary border border-secondary rounded-circle"
                        style="padding-bottom: 2px;">0</span>
                </a>';
                } ?>
                            
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
</body>
</html>