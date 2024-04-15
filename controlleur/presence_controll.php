<?php

include '../models/fonction_pre.php';
include '../models/model.php';

session_start();



$filename = '../DATA/presence.csv';

$Presence = readFromCsv($filename);

$active_promotion = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] :"Promotion 1" ;

// var_dump($active_promotion);


     $Allpresence = filterByActivePromotion($Presence , $active_promotion);
    
// var_dump($Allpresence);


$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = $globalSearch;

if (!empty($valeurFiltre)) {

    $Allpresence= array_filter($Allpresence, function($presence) use ($valeurFiltre) {

        return stripos($presence['matricule'], $valeurFiltre) !== false ;


    });
    // var_dump($Allpresence);

}



// Récupération des données de présence

// Gestion des filtres
if (isset($_POST['filter_submit'])) {
    $_SESSION['selected_referentiel'] = $_POST['referentiel'] ?? '';
    $_SESSION['selected_statut'] = $_POST['statut'] ?? '';
    $_SESSION['selected_date'] = $_POST['date'] ?? '';

} else {
    // Utilise les filtres précédemment sélectionnés (s'ils existent)
    $_POST['referentiel'] = $_SESSION['selected_referentiel'] ?? '';
    $_POST['statut'] = $_SESSION['selected_statut'] ?? '';
    $_POST['date'] = $_SESSION['selected_date'] ?? '';

}

// Récupération des référentiels et des statuts
$referentiels = getAllReferentiels($Allpresence);
$statuts = getAllStatuts($Allpresence);
$dates = getAllDates($Allpresence);


$selectedReferentiel = $_POST['referentiel'] ?? '';
$selectedStatut = $_POST['statut'] ?? '';
$selectedDate = $_POST['date'] ?? ''; 




$filteredPresence = [];
foreach ($Allpresence as $presenceItem) {
    if (($selectedReferentiel === '' || $presenceItem['referentiel'] === $selectedReferentiel) &&
        ($selectedStatut === '' || $presenceItem['status'] === $selectedStatut)&&
        ($selectedDate === '' || $presenceItem['date'] === $selectedDate)) {
        $filteredPresence[] = $presenceItem;
    }
}
// var_dump($filteredPresence);



// Pagination
// Nombre d'éléments par page
$perPage = 4;

// Page actuelle
$page = isset($_POST['page']) ? $_POST['page'] : 1;

// Pagination des données filtrées
$paginationData = paginate($filteredPresence, $perPage, $page);

// Récupérer les éléments paginés
$filteredPresence = $paginationData['items'];

// Nombre total de pages
$totalPages = $paginationData['totalPages'];

// Page actuelle
$currentpage = $paginationData['currentPage'];

// Nombre total d'éléments
$totalItems = $paginationData['totalItems'];



include '../template/presence.html.php';



?>