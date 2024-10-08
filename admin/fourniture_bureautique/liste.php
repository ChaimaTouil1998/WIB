<?php
session_start();


include "../../inc/functions.php";

$categories = getAllCategories();
$produitsfourbureau = getAllProductsfourbureau();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace : fourbureau</title>
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
        <div class="text">Liste des fourniture bureautique

            <div>
                <a href="ajouter.php" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">Ajouter</a>

                
            </div>
            <hr>
        </div>

        <hr>

        <div class="text" style="font-weight: 100;">



            <?php if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                print '<div class="alert alert-success">
                Produit a été ajouté avec succées
            </div>';
            } ?>
            <?php if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
                print '<div class="alert alert-danger">
                Produit a été supprimé avec succées
            </div>';
            } ?>
            <?php if (isset($_GET['modif']) && $_GET['modif'] == "ok") {
                print '<div class="alert alert-primary">
                Produit a été modifié avec succées
            </div>';
            } ?>

<?php if (isset($_GET['erreur']) && $_GET['erreur'] == "duplicate") {
                print '<div class="alert alert-warning">
                nom Produit existe déjà
            </div>';
            } ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Ancien Prix</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                     foreach ($produitsfourbureau as $i=> $PN) {
                        $i++;
                        print '<tr>
                                <th scope="row">' . $i . '</th>
                  
                                <td>' . $PN['nom'] . '</td>
                                <td>' . $PN['description'] . '</td>
                                <td>' . $PN['prix'] . ' DT</td>
                                <td>' . $PN['ancien_prix'] . ' DT</td>
                                <td>' . $PN['categorie'] .' </td>
                                <td>
                                    <a data-toggle="modal" data-target="#editModal'.$PN['id'].'" class="btn btn-success">Modifier</a>
                                    <a onClick="return popUpDeleteCategorie()" href="supprimer.php?idp=' . $PN['id'] . '" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>';
                    }
                    ?>


                </tbody>
            </table>




        </div>
        <!-- Button trigger modal -->


        <!-- Modal Ajout -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau Produits</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="ajout.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" required name="nom" class="form-control" placeholder="Nom produit">
                            </div>
                            <div class="form-group">
                                <input  type="number" step="0.001" required name="prix" class="form-control" placeholder="Prix produit">
                            </div>
                            <div class="form-group">
                                <input  type="number" step="0.001" required name="ancien_prix" class="form-control" placeholder="Ancien Produit">
                            </div>
                            <div class="form-group">
                                <input  type="text"   name="couleur" class="form-control" placeholder="Couleur">
                            </div>
                            <div class="form-group">
                                <input  type="file" step="0.01" required name="image" class="form-control" placeholder="Prix produit">
                            </div>
                            <div class="form-group">
                                <select name="categorie" class="form-control">
                                    <option value="">Catégorie</option>
                                    <?php 
                                    foreach ($categories as $index => $c)
                                    print '<option value="'.$c['id'].'">'.$c['nom'].'</option>';
                                     ?>
                                </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="quantite" class="form-control" placeholder="Tapez la quantité du produit ">
                                </div> 
                           
                            <div class="form-group">
                                <textarea name="description" required class="form-control" placeholder="Description produit"></textarea>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



        <?php
            foreach($produitsfourbureau as $index => $PN){?>

   <!-- Modal Modifier-->
   <div class="modal fade" id="editModal<?php echo $PN['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modifier un nouveau produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="modifier.php" method="post">
                            <input type="hidden" value="<?php echo $PN['id']; ?>" name="idp" />
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" value="<?php echo $PN['nom']; ?>" placeholder="nom du nouveau produit">
                            </div>
                            <div class="form-group">
                                <input type="number" name="prix" class="form-control" value="<?php echo $PN['prix']; ?>" placeholder="prix du nouveau produit">
                            </div>
                            <div class="form-group">
                                <input type="number" name="ancien_prix" class="form-control" value="<?php echo $PN['ancien_prix']; ?>" placeholder="prix du nouveau produit">
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" value="<?php echo $PN['image']; ?>" placeholder="image du produit...">
                            </div>

                            <div class="form-group">
                                <textarea type="text" name="description" class="form-control" placeholder="nouvelle description"><?php echo $PN['description']; ?> </textarea>
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