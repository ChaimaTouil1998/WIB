<?php
session_start();

$nom = $_POST['nom'];

$description = $_POST['description'];

$prix = $_POST['prix'];
$ancien = $_POST['ancien_prix'];

$couleur = $_POST['couleur'];

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
 $requete = "INSERT INTO fourbureau(nom,description,prix,image,createur,categorie,date_creation,ancien_prix,couleur) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date','$ancien','$couleur')";
 
 //4_Exécution de la requête
 $resultat = $conn -> query($requete);


 if($resultat){
  $produit_id = $conn->lastInsertId();
  $requete1 = "INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation,couleur) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date','$couleur')";

 $requete2 = "INSERT INTO stock(produit,quantite,createur,date_creation) VALUES('$produit_id','$quantite','$createur','$date_creation')";
 if($conn -> query($requete2)){
  header('location:liste.php?ajout=ok');

 }else{
  echo"Impossible d'ajouter le stock du produit";
 }
}
if($resultat){
  $produit_id = $conn->lastInsertId();

  $requete1 = "INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation,couleur) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date','$couleur')";
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