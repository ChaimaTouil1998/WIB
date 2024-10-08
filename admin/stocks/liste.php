<?php
session_start();


include "../../inc/functions.php";

$categories = getAllCategories();
$stocksN = getStocksNouveautés();
$stocksP = getStocksPromotions();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace : Profile</title>
    <link href="../style.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

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
    <title>WIB - Stocks</title>
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
<?php

include "../template/navigation.php";

?>

    <section class="home">
        <div class="text" style="color: red;">Stocks des nouveaux produits

            
        </div>

        <hr>

        <div class="text" style="font-weight: 100;">



            
            <?php if (isset($_GET['modifN']) && $_GET['modifN'] == "ok") {
                print '<div class="alert alert-primary">
                Produit en promotion a été modifié avec succées
            </div>';
            } ?>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du produit</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($stocksN as $SN) {
                        $i++;
                        print '<tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $SN['nom'] . '</td>
                                <td>' . $SN['quantite'] . '</td>
                                <td>
                                    <a data-toggle="modal" data-target="#editModal1'.$SN['id'].'" class="btn btn-success">Modifier</a>
                                </td>
                            </tr>';
                    }
                    ?>


                </tbody>
            </table>




        </div>



<hr>
        <div class="text" style="color: red;">Stocks des produits en promotions

            
           
        </div>

        <hr>

        <div class="text" style="font-weight: 100;">



           
            <?php if (isset($_GET['modifP']) && $_GET['modifP'] == "ok") {
                print '<div class="alert alert-primary">Nouveau Produit a été modifié avec succées
            </div>';
            } ?>


            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom du produit</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($stocksP as $SP) {
                        $i++;
                        print '<tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $SP['nom'] . '</td>
                                <td>' . $SP['quantite'] . '</td>
                                <td>
                                    <a data-toggle="modal" data-target="#editModal2'.$SP['id'].'" class="btn btn-success">Modifier</a>
                                </td>
                            </tr>';
                    }
                    ?>


                </tbody>
            </table>

        </div>
        <!-- Button trigger modal -->


    


        <?php
            foreach($stocksN as $index => $SN){?>

   <!-- Modal Modifier-->
   <div class="modal fade" id="editModal1<?php echo $SN['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modifier stock DU <span class="text-primary"><?php echo $SN['nom']; ?></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="modifierN.php" method="post">
                            <input type="hidden" value="<?php echo $SN['id']; ?>" name="idSN" />
                            <div class="form-group">
                                <input type="text" name="quantite" class="form-control" value="<?php echo $SN['quantite']; ?>" placeholder="nom de la catégories...">
                            </div>
                            

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    <?php
    }


    ?>
<?php
            foreach($stocksP as $index => $SP){?>

   <!-- Modal Modifier-->
   <div class="modal fade" id="editModal2<?php echo $SP['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modifier stock du <span class="text-primary"><?php echo $SP['nom']; ?></span> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="modifierP.php" method="post">
                            <input type="hidden" value="<?php echo $SP['id']; ?>" name="idSP" />
                            <div class="form-group">
                                <input type="number" step="1" name="quantite" class="form-control" value="<?php echo $SP['quantite']; ?>" placeholder="quantité du produit">
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    <?php
    }


    ?>

    </section>








    <script src="../style.js"></script>


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