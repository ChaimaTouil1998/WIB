<?php
session_start();


include "../../inc/functions.php";

$visiteurs = getAllUsers();
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
    <title>MultiShop - Online Shop Website Template</title>
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
        <div class="text">Liste des visiteurs

            <div>
                <a href="ajouter.php" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">Ajouter</a>

                
            </div>
            <hr>
        </div>

        <hr>

        <div class="text" style="font-weight: 100;">



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
                        <th scope="col">Nom et Prénom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   
                    foreach ($visiteurs as $i => $visiteur) {
                        $i++;
                        print '<tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $visiteur['nom'] . ' ' . $visiteur['prenom'] . '</td>
                                <td>' . $visiteur['email'] . '</td>
                                <td>
                                <a  href="valider.php?id='.$visiteur['id'].'" class="btn btn-success">Valider</a>
                                </td>
                            </tr>';
                    }
                    ?>


                </tbody>
            </table>




        </div>
        <!-- Button trigger modal -->




      


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