<?php
session_start();


//1_Récupération des données de la formulaire
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date("Y-m-d");

//2_ la chaîne de connexion
include "../../inc/functions.php";
$conn = connect();




try {
   //3_Creation de la requête
$requete = "INSERT INTO categories(nom,description,createur,date_creation) VALUES ('$nom','$description','$createur','$date_creation')";


//4_Exécution de la requête
$resultat = $conn -> query($requete);

if($resultat){
    header('location:liste.php?ajout=ok');
}

  } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
    if( $e -> getCode() == 23000){
        header('location:liste.php?erreur=duplicate');
    }
  }
  return $conn;
  //php end
  
?>