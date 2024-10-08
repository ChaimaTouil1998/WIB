<?php

//echo "Id de categories ".$_GET['idp'];
$idproduit = $_GET['idpp'];

include "../../inc/functions.php";

$conn = connect();

$requete = "DELETE FROM promotions WHERE id ='$idproduit'";

$resultat= $conn-> query($requete);
 
if ($resultat){
    //echo "catégories a été supprimé avec succés.";
    header('location:liste.php?delete=ok');
}

?>
