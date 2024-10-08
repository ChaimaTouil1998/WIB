<?php

$idcategorie = $_GET['idc'];

include "../../inc/functions.php";

$conn = connect();



$requete = "DELETE FROM categories WHERE id = '$idcategorie'";


$resultat = $conn -> query($requete);

if ($resultat) {
    header('location:liste.php?delete=ok');
}
?>