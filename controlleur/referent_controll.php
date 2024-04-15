<?php

include "../models/fonction_ref.php";
include '../models/model.php';

session_start();



$filename = '../DATA/referent.csv'; // Remplacez 'votre_fichier.csv' par le chemin de votre fichier CSV

$Referent = readFromCSV($filename);



$active_promotion = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] : null;



$AllReference = filterByActivePromotion($Referent , $active_promotion);
    


$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = $globalSearch;

if (!empty($valeurFiltre)) {
    $AllReference= array_filter($$AllReference, function($ref) use ($valeurFiltre) {
        return stripos($ref['nom'], $valeurFiltre) !== false ;
    });
}



include "../template/referentiel.html.php";

?>