<?php


$nom = $_POST['nom'];

$description = $_POST['description'];

$prix = $_POST['prix'];

$createur = $_POST['createur'];

$categorie = $_POST['categorie'];


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
 $requete = "INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date')";
 
 
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