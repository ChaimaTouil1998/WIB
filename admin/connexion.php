<?php 

session_start();

//Vérifier si l'utilisateur est faux => redirection vers la page de connexion 

if (isset($_SESSION['nom'])) {
	header('location:profile.php');
}


include "../inc/functions.php";
$user = true;
if (!empty($_POST)) {   //click sur le bouton sauvegarder 

	$user = ConnectAdmin($_POST);
	if (is_array($user) && count($user) > 0) { // si l'admin connecter, 
		session_start();
		$_SESSION['id'] = $user['id'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['nom'] = $user['nom'];
		$_SESSION['mp'] = $user['mp'];
 

		header('location:profile.php'); // redirection vers le profile de user 


	}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Espace  - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
 
<?php

include "../inc/header.php";

?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Accueil</a>
                    <span class="breadcrumb-item active">Se Connecter</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Se Connecter</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-32 ">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form class="form" method="post" action="connexion.php">
                        
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Votre Email" required="required" data-validation-required-message="Entrer votre email" name="email" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <input type="password" class="form-control" id="mp" placeholder="Votre Mot de Passe" required="required" data-validation-required-message="Entrer votre mot de passe" name="mp" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>

                        </div>
                        <div style="text-align: right;">
                            <button class="btn  py-2 px-4" type="submit" style="background-color: #000098; color:#FFFFFF">Se connecter</button>
                            <a href="register.php"><input class="btn  py-2 px-4" value="S'inscrire" type="button" style="background-color: #000098; color:#FFFFFF"></a>

                        </div>


                    </form>
                </div>
            </div> 

        </div>
    </div>
    <!-- Contact End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; ">
                    <h1 class="fa fa-check  m-0 mr-3" style="color: #000098;"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast " style="color: #000098;"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt " style="color: #000098;"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume" style="color: #000098;"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
    <?php
include "../inc/footer.php";
    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


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
?>