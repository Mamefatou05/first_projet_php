<?php

include "../models/fonction_app.php";
include "../models/model.php";
include_once "../models/fonction_Pro.php";

session_start();

$filename = '../DATA/apprenant.csv';

$Apprenants = readFromCsv($filename);


$active_promotion = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] :"Promotion 1";


// var_dump($active_promotion);


$Allstudent = filterByActivePromotion($Apprenants, $active_promotion);
    



$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = ($searchTerm !== '') ? $searchTerm : $globalSearch;

if (!empty($valeurFiltre)) {
    $Allstudent = array_filter($Allstudent , function($student) use ($valeurFiltre) {
        return stripos($student['nom'], $valeurFiltre) !== false || stripos($student['prenom'], $valeurFiltre) !== false;
    });
}

// var_dump($Apprenants) ;
// die ();



$perPage = 3 ;

// Page actuelle
$page = isset($_POST['page']) ? $_POST['page'] : 1;

// Pagination des données filtrées
$paginationData = paginate($Allstudent, $perPage, $page);

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
