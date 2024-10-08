<?php
session_start();

$nom = $_POST['nom'];

$description = $_POST['description'];

$prix = $_POST['prix'];
$ancien = $_POST['ancien_prix'];
$createur = $_POST['createur'];

$categorie = $_POST['categorie'];
$quantite = $_POST['quantite'];

$date_creation = date("Y-m-d");
//upload image
$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);


if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
  }
$date = date('Y-m-d');


//2_ la chaîne de connexion
include "../../inc/functions.php";
$conn = connect();



try {
    //3_Creation de la requête
 $requete = "INSERT INTO promotions(nom,description,prix,image,createur,categorie,date_creation,ancien_prix) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date','$ancien')";
 
 //4_Exécution de la requête
 $resultat = $conn -> query($requete);


 if($resultat){
  $produit_id = $conn->lastInsertId();

  $requete1 = "INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date')";


 $requete2 = "INSERT INTO stocksP(promotion,quantite,createur,date_creation) VALUES('$produit_id','$quantite','$createur','$date_creation')";
 if($conn -> query($requete2)){
  header('location:liste.php?ajout=ok');

 }else{
  echo"Impossible d'ajouter le stock du produit";
 }
}

if($resultat){
  $produit_id = $conn->lastInsertId();

 $requete1 = "INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date')";
 if($conn -> query($requete1)){
  header('location:liste.php?ajout=ok');

 }else{
  echo"Impossible d'ajouter le stock du produit";
 }
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