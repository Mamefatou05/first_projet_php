<?php

include "../models/fonction_ref.php";
include_once "../models/fonction_Pro.php";





$activePromotion = getActivePromotion();


$promotions = findPromotion() ;

$AllReferentiels = findAllReference();




 if ($activePromotion !== null) {

    $AllReferentiels= array_filter($AllReferentiels, function($referentiel) use ($activePromotion) {
        return $referentiel['promotion'] === $activePromotion['libelle'];
     });
 }    

$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = $globalSearch;

if (!empty($valeurFiltre)) {
    $AllReferentiels = array_filter($AllReferentiels, function($referentiel) use ($valeurFiltre) {
        return stripos($referentiel['nom'], $valeurFiltre) !== false ;
    });
}



include "../template/referentiel.html.php";

?>