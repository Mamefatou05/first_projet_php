<?php

include "../models/fonction_app.php";
include "../models/model.php";
include_once "../models/fonction_Pro.php";




$Apprenants = findAllapprenant();



 if ($activePromotion !== null) {

     $Allstudent = array_filter($Apprenants, function($apprenant) use ($activePromotion) {
        return $apprenant['promotion'] === $activePromotion['libelle'];

        var_dump( $activePromotion['libelle'] ) ;
         die ();
     });
 }    

$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = ($searchTerm !== '') ? $searchTerm : $globalSearch;

if (!empty($valeurFiltre)) {
    $Allstudent = array_filter($Allstudent, function($student) use ($valeurFiltre) {
        return stripos($student['nom'], $valeurFiltre) !== false || stripos($student['prenom'], $valeurFiltre) !== false;
    });
}

$totalItems = count($Allstudent);


// $perPage = isset($_SESSION['perPage']) ? $_SESSION['perPage'] : 1;

// if(isset($_POST['perPage'])) {
//     $_SESSION['perPage'] = (int)$_POST['perPage'];
//     $perPage = $_SESSION['perPage'];
// }
$perPage = 4 ;

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$totalPages = $paginationData['totalPages'];
$currentpage = $paginationData['currentPage'];
$paginationData = paginate($Allstudent, $perPage, $page);


include "../template/utilisateur.html.php";

?>
