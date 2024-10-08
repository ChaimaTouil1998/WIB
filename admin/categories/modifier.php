<?php
session_start();


//1_Récupération des données de la formulaire
$id =$_POST['idc'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$date_modification = date("Y-m-d");

//2_ la chaîne de connexion
include "../../inc/functions.php";
$conn = connect();


//3_Creation de la requête
$requete = "UPDATE categories SET nom='$nom', description='$description' , date_modification='$date_modification' WHERE id ='$id'";


//4_Exécution de la requête
$resultat = $conn -> query($requete);

if($resultat){
    header('location:liste.php?modif=ok');
}
?>