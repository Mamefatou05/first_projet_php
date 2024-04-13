<?php

include "../models/fonction_Pro.php";
include "../models/model.php";

$Allpromotions = findPromotion() ;

session_start();




// Récupérer les promotions
$promotions = findPromotion();

$selected_promotion_libelle = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] : "Promotion 1";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['promotion_libelle'])) {
    // Récupérer l'ID de la promotion cochée
    $selected_promotion_libelle = $_POST['promotion_libelle'];

    // Mettre à jour la session avec la promotion cochée
    $_SESSION['selected_promotion'] = $selected_promotion_libelle;
}

 


$perPage = 3 ;

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$totalPages = $paginationData['totalPages'];
$currentpage = $paginationData['currentPage'];
$paginationData = paginate($Allpromotions, $perPage, $page);
// var_dump($paginationData);
// die;



include "../template/promotion.html.php";


?>