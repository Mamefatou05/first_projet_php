<?php

include "../models/fonction_Pro.php";
include "../models/model.php";

$Allpromotions = findPromotion() ;


$perPage = 1 ;

$page = isset($_POST['page']) ? $_POST['page'] : 1;
$totalPages = $paginationData['totalPages'];
$currentpage = $paginationData['currentPage'];
$paginationData = paginate($Allpromotions, $perPage, $page);
// var_dump($paginationData);
// die;



include "../template/promotion.html.php";


?>