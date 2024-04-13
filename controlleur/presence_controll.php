<?php

include '../models/fonction_pre.php';
include '../models/model.php';

session_start();


$Presence = findAllPresence();


$active_promotion = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] : null;



     $Allpresence = filterByActivePromotion($Presence , $active_promotion, 'promotion');
    
// var_dump($Allpresence);


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


// var_dump($selectedReferentiel);

// var_dump($selectedStatut);
// var_dump($selectedDate);





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



// $globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
// $valeurFiltre = $globalSearch;

// if (!empty($valeurFiltre)) {

//     $Allpresence= array_filter($Allpresence, function($presence) use ($valeurFiltre) {

//         return stripos($presence['matricule'], $valeurFiltre) !== false ;


//     });
//     var_dump($Allpresence);

// }

var_dump($Allpresence);




include '../template/presence.html.php';

?>

