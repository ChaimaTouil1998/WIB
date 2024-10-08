<?php
session_start();
// // connexion bd
include "../inc/functions.php";
$conn = connect();

//id visiteur
$visiteur = $_SESSION['id'];

$total = $_SESSION['panier'][1];

$date = date('Y-m-d');
//creation du panier
$requete_panier ="INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";

//exécution de la requete_panier

$resultat = $conn ->query($requete_panier);

$panier_id = $conn ->lastInsertId();

$commandes = $_SESSION['panier'][3];


foreach($commandes as $commande){
    //Ajouter une commande
    //requete

    $quantite = $commande[0];
    $total = $commande[1];
    $id_produit = $commande[4];


    $requete = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite','$total','$panier_id','$date','$date','$id_produit')" ;
    //exécution de la requete

    $resultat = $conn ->query($requete);
}
//supprimer panier 
$_SESSION['panier']= null;
//redirection vers la page index
header('location:../validationPanier.php');



?>