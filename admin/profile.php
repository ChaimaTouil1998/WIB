<?php
session_start();


include "../inc/functions.php";
if(isset($_POST['btnEdit'])){
  if(EditAdmin($_POST)){
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['email'] = $_POST['email'];

  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <link href="style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <style>
        /* Style pour mettre en évidence l'élément actif */
        .active {
            background-color: #1707c4;
            border-radius: 5px;
        }

        li {
            color: blue;
            /* Couleur initiale du texte */
        }

        /* Style pour changer la couleur du texte des éléments li lorsque survolés */
        li:hover {
            color: red;
            /* Couleur du texte lorsqu'ils sont survolés */
        }
    </style>
    <meta charset="utf-8">
    <title>wib - Online Shop Website Template</title>
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
    <link href="style.css" rel="stylesheet">
</head>

<body>

  <?php

  include "template/navigation.php";

  ?>





  <section class="home">
    <div class="text">Profile</div>
    <hr>
    <div class="text" style="font-weight: 100;">
      
      <div class="container">
        <h1>Nom : <span class="text-primary"> <?php echo $_SESSION['nom'];?></span></h1>
        <h1>Email : <span class="text-primary"> <?php echo $_SESSION['email'];?></span></h1>
        <a data-toggle="modal" data-target="#profileEdit" class="btn btn-primary">Modifier</a>
      </div>
    </div>


  </section>




 


            <!-- Modal Traiter-->
            <div class="modal fade" id="profileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php  $_SERVER['PHP_SELF'];?>" method="post">
                              <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="id_admin"> 
                              <div class="form-group">
                              <input type="text" name="nom" value="<?php echo $_SESSION['nom'];?>" class="form-control">

                              </div>
                              <div class="form-group">
                              <input type="email" name="email" value="<?php echo $_SESSION['email'];?>" class="form-control">

                              </div>
                              <div class="form-group">
                              <input type="password" name="mp" value="" class="form-control" placeholder="Tapez votre mot de passe">

                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="btnEdit" class="btn btn-primary">Modifier</button>
                              </div>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>

                    </div>
                </div>
            </div>



            <script src="style.js"></script>


<script>
    // JavaScript pour changer la couleur du texte des éléments li
    const liste = document.getElementById('maListe');
    const elementsLi = liste.getElementsByTagName('li');

    for (let i = 0; i < elementsLi.length; i++) {
        elementsLi[i].addEventListener('click', function() {
            this.style.color = 'blue'; // Changer la couleur du texte en vert
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>