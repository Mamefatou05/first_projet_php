<?php
session_start();

// Fonction pour récupérer les promotions
// function findPromotion()
// {
//     $promotions = [
//         ["id" => 1, "libelle" => "Promotion 1", "date_debut" => "2019-02-01", "date_fin" => "2019-11-01"],
//         ["id" => 2, "libelle" => "Promotion 2", "date_debut" => "2020-02-01", "date_fin" => "2020-11-01"],
//         ["id" => 3, "libelle" => "Promotion 3", "date_debut" => "2021-02-01", "date_fin" => "2021-11-01"],
//         ["id" => 4, "libelle" => "Promotion 4", "date_debut" => "2022-02-01", "date_fin" => "2022-11-01"],
//         ["id" => 5, "libelle" => "Promotion 5", "date_debut" => "2023-02-01", "date_fin" => "2023-11-01"],
//         ["id" => 6, "libelle" => "Promotion 6", "date_debut" => "2024-02-01", "date_fin" => "2024-11-01"],
   
//     ];
    
//     return $promotions;
// }

// Fonction pour vérifier si une promotion est cochée
function PromotionChecked($promotionLibelle, $selected_promotion_libelle) {
    return $promotionLibelle == $selected_promotion_libelle;
}

// Fonction pour vérifier si une promotion est cochée

// function PromotionChecked($promotionLibelle,$selected_promotion_libelle) {
//     return $promotionLibelle === $selected_promotion_libelle;
// }



?>
