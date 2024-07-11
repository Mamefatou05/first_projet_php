<?php

include "../models/fonction_app.php";
include "../models/model.php";
include_once "../models/fonction_Pro.php";


$filename = '../DATA/apprenant.csv';

$Apprenants = readFromCsv($filename);


$active_promotion = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] :"Promotion 1";


// var_dump($active_promotion);


$Allstudent = filterByActivePromotion($Apprenants, $active_promotion);
// Gestion des filtres

// Initialisation de $selectedReferentiels avec un tableau vide
$selectedReferentiels = [];

// Si 'referentiel' est défini dans l'URL, récupérer les valeurs sélectionnées
if (isset($_GET['referentiel'])) {
    // Si une seule valeur est sélectionnée, la convertir en tableau
    $selectedReferentiels = is_array($_GET['referentiel']) ? $_GET['referentiel'] : [$_GET['referentiel']];
    
    // Stocker les valeurs sélectionnées dans la session
    $_SESSION['selected_referentiel'] = $selectedReferentiels;
} elseif (isset($_SESSION['selected_referentiel'])) {
    // Si aucune valeur n'est sélectionnée dans l'URL mais qu'il y a des valeurs stockées dans la session
    $selectedReferentiels = $_SESSION['selected_referentiel'];
}

// Récupérer tous les référentiels
$referentiels = getAllReferentiels($Allstudent);

// Filtrer les référentiels
$filteredReferentiel = [];
foreach ($Allstudent as $AppItem) {
    if (empty($selectedReferentiels) || in_array($AppItem['referentiel'], $selectedReferentiels)) {
        $filteredReferentiel[] = $AppItem;
    }
}


// $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
// $globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
// $valeurFiltre = ($searchTerm !== '') ? $searchTerm : $globalSearch;

// if (!empty($valeurFiltre)) {
//     $Allstudent = array_filter($Allstudent, function($student) use ($valeurFiltre) {
//         return stripos($student['nom'], $valeurFiltre) !== false || stripos($student['prenom'], $valeurFiltre) !== false;
//     });
// }

// var_dump($Apprenants) ;
// die ();



$perPage = 10;

// Page actuelle
$page = isset($_POST['page']) ? $_POST['page'] : 1;

// Pagination des données filtrées
$paginationData = paginate($filteredReferentiel, $perPage, $page);

// Récupérer les éléments paginés
// $Allstudent = $paginationData['items'];

// Nombre total de pages
$totalPages = $paginationData['totalPages'];

// Page actuelle
$currentpage = $paginationData['currentPage'];

// Nombre total d'éléments
$totalItems = $paginationData['totalItems'];

var_dump($totalItems);

include "../template/utilisateur.html.php";



?>
