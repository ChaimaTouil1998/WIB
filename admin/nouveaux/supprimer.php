<?php

//echo "Id de categories ".$_GET['idp'];
$idproduit = $_GET['idp'];

include "../../inc/functions.php";

$conn = connect();

$requete = "DELETE FROM nouveautés WHERE id ='$idproduit'";

$resultat= $conn-> query($requete);
 
if ($resultat){
    //echo "catégories a été supprimé avec succés.";
    header('location:liste.php?delete=ok');
}

?>
