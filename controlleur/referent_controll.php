<?php

include "../models/fonction_ref.php";
include_once "../models/fonction_Pro.php";

$activePromotion = getActivePromotion();

$promotions = findPromotion() ;


$AllReference = findAllReference();




 if ($activePromotion !== null) {

    $AllReference = array_filter($AllReference, function($ref) use ($activePromotion) {

        return $ref['promotion'] === $activePromotion['libelle'];
     });

 }    

$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = $globalSearch;

if (!empty($valeurFiltre)) {
    $AllReference= array_filter($$AllReference, function($ref) use ($valeurFiltre) {
        return stripos($ref['nom'], $valeurFiltre) !== false ;
    });
}



include "../template/referentiel.html.php";

?>