<?php
session_start();
//1- recupération des données de la formulaire
$id = $_POST['idSN'];
$quantite = $_POST['quantite'];


//2- la chaîne de connexion
include "../../inc/functions.php";
$conn = connect();

//3- Creation de la requête d'exécution
$requete = "UPDATE  stocksN SET quantite = '$quantite' WHERE id='$id' ";


//4- Execution de la requête
$resultat = $conn -> query($requete);

if($resultat){
    header('location:liste.php?modifN=ok');
}







?>