<?php

include "../models/fonction_Pro.php";
include "../models/model.php";


session_start();


// Récupérer les promotions


$filename = '../DATA/promotion.csv';

$promotions= readFromCsv($filename);




$selected_promotion_libelle = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] : "Promotion 1";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['promotion_libelle'])) {
    // Récupérer l'ID de la promotion cochée
    $selected_promotion_libelle = $_POST['promotion_libelle'];

    // Mettre à jour la session avec la promotion cochée
    $_SESSION['selected_promotion'] = $selected_promotion_libelle;
}
// var_dump($selected_promotion_libelle) ;


$perPage = 3 ;

// Page actuelle
$page = isset($_POST['page']) ? $_POST['page'] : 1;

// Pagination des données filtrées
$paginationData = paginate($promotions, $perPage, $page);

// Récupérer les éléments paginés
// $Allpromotions = $paginationData['items'];

// Nombre total de pages
$totalPages = $paginationData['totalPages'];

// Page actuelle
$currentpage = $paginationData['currentPage'];

// Nombre total d'éléments
$totalItems = $paginationData['totalItems'];

// var_dump($totalItems);


$searchpromo= isset($_POST['cherch']) ? $_POST['cherch'] : '';
$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = ($searchpromo !== '') ? $searchpromo : $globalSearch;

if (!empty($valeurFiltre)) {
     $paginationData['items'] = array_filter( $paginationData['items'], function($promo) use ($valeurFiltre) {
        return stripos($promo['libelle'], $valeurFiltre) !== false || stripos($promo['libelle'], $valeurFiltre) !== false;
    });
}

include "../template/promotion.html.php";

?>