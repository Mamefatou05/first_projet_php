<?php

include "../models/fonction_ref.php";
include '../models/model.php';

session_start();



$filename = '../DATA/referent.csv'; // Remplacez 'votre_fichier.csv' par le chemin de votre fichier CSV

$Referent = readFromCSV($filename);



$active_promotion = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] : "Promotion 1";

// var_dump($active_promotion);


$AllReferentiel = filterByActivePromotion($Referent , $active_promotion);
    


// $globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
// $valeurFiltre = $globalSearch;

// if (!empty($valeurFiltre)) {

//     $AllReferentiel= array_filter($AllReference, function($presence) use ($valeurFiltre) {

//         return stripos($presence['matricule'], $valeurFiltre) !== false ;


//     });
//     // var_dump($AllReference);

// }



include "../template/referentiel.html.php";

?>