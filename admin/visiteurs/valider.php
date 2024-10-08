<?php 

$idvisiteur = $_GET['id'];


//2- la chaîne de connexion
include "../../inc/functions.php";
$conn = connect();

$requete= "UPDATE visiteurs SET etat=1 WHERE id = '$idvisiteur'";

$result = $conn -> query($requete);

if( $result){
    header('location:liste.php?valider=ok');
}else{
    echo "Erreur de validation";
}
?>