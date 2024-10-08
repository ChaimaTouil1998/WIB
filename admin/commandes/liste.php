<?php
session_start();



include "../../inc/functions.php";
if(isset($_POST['btnSubmit'])){//changer etat de panier
    changerEtatPanier($_POST);
}
$commandes = getAllCommandes();

$paniers = getAllPaniers();

if(isset($_POST['btnSearch'])){
    //echo $_POST['etat'];
    if($_POST['etat'] == "tout"){
        $paniers = getAllPaniers();
    }else{
        $paniers = getPaniersByEtat($paniers,$_POST['etat']);
    }
    
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes - Admin</title>
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
        <div class="text">Liste des Paniers
        
            <hr>
        </div>

        <div>
            
        </div>
        <hr>

        <div class="text" style="font-weight: 100;">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group d-flex">

                        <select name="etat" class="form-control">
                            <option value="">-- Choisir l'état --</option>
                            <option value="tout">Tout</option>
                            <option value="en cours">En cours</option>
                            <option value="en livraison">En livraison</option>
                            <option value="livraison terminée">Livraison terminée</option>

                        </select>
                        <input class="btn btn-primary ml-2" type="submit" name="btnSearch" value="Chercher"/>
                    </div>
                    
                </form>


            <?php if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                print '<div class="alert alert-success">
                Catégorie a été ajouté avec succées
            </div>';
            } ?>
            <?php if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
                print '<div class="alert alert-danger">
                Catégorie a été supprimé avec succées
            </div>';
            } ?>
            <?php if (isset($_GET['modif']) && $_GET['modif'] == "ok") {
                print '<div class="alert alert-primary">
                Catégorie a été modifié avec succées
            </div>';
            } ?>

            <?php if (isset($_GET['erreur']) && $_GET['erreur'] == "duplicate") {
                print '<div class="alert alert-warning">
                nom catégorie existe déjà
            </div>';
            } ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client</th>
                        <th scope="col">Téléphone Client</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($paniers as $p) {
                        $i++;
                        print '<tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $p['nom'] . ' ' . $p['prenom'] . '</td>
                                <td>' . $p['telephone'] . '</td>
                                <td>' . $p['total'] . ' DT</td>
                                <td>' . $p['date_creation'] . '</td>
                                <td>' . $p['etat'] . '</td>


                                <td>
                                    <a data-toggle="modal" data-target="#Commandes' . $p['id'] . '" class="btn btn-success">Afficher</a>

                                    <a data-toggle="modal" data-target="#Traiter' . $p['id'] . '" class="btn btn-primary">Traiter</a>
                                </td>
                            </tr>';
                    }
                    ?>


                </tbody>
            </table>




        </div>
        <!-- Button trigger modal -->





        <?php
        foreach ($paniers as $index => $p) { ?>

            <!-- Modal Modifier-->
            <div class="modal fade" id="Commandes<?php echo $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Liste des commandes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Nom produit </th>
                                        <th> Image </th>
                                        <th> Quantité </th>
                                        <th> Total </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($commandes as $index => $c) {

                                        if ($c['panier'] == $p['id']) { //si commande appartient (panier ouvert) 
                                            print ' <tr>
    
                                        <td>' . $c['nom'] . '</td>
                                        <td><img src="../../img/' . $c['image'] . '" width="100"/></td>
                                        <td>' . $c['quantite'] . '</td>
                                        <td>' . $c['total'] . ' DT</td>

                                            </tr>';
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        <?php
        }


        ?>


        <?php
        foreach ($paniers as $index => $p) { ?>


            <!-- Modal Traiter-->
            <div class="modal fade" id="Traiter<?php echo $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Traiter la commande</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" value="<?php echo $p['id']; ?>" name="panier_id">
                                <div class="form-group">
                                    <select name="etat" class="form-control">
                                        <option value="En livraison">En livraison</option>
                                        <option value="Livraison termine">Livraison Terminée</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="btnSubmit" class="btn btn-primary">Sauvegarder</button>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>

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