<?php

session_start(); // Ouverture de session 
session_unset(); // supprimer les variable 
session_destroy();

header('location:index.php');
