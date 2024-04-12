<?php

include '../models/fonction_pre.php';
include '../models/model.php';
include_once "../models/fonction_Pro.php";

$activePromotion = getActivePromotion();

$promotions = findPromotion() ;


$Allpresence = findAllPresence();



 if ($activePromotion !== null) {

    $Allpresence = array_filter($Allpresence, function($presence) use ($activePromotion) {
        return $presence['promotion'] === $activePromotion['libelle'];
     });
 }    

$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = $globalSearch;

// Filtrer la liste des étudiants si une valeur de recherche est fournie
if (!empty($valeurFiltre)) {
    $Allpresence= array_filter($Allpresence, function($presence) use ($valeurFiltre) {
        return stripos($presence['matricule'], $valeurFiltre) !== false ;
    });
}





// Récupération des données de présence

// Gestion des filtres
session_start();
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

// Pagination
$perPage = 5; 
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$paginationData = paginate($filteredPresence, $perPage, $page);
$filteredPresence = $paginationData['items'];
$totalPages = $paginationData['totalPages'];
$currentpage = $paginationData['currentPage'];

// Affichage de la vue
include '../template/presence.html.php';

?>

