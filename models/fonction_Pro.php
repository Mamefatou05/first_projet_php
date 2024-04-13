<?php


function findPromotion()
{
    $promotions = [
        ["libelle" => "Promotion 1", "date_debut" => "2019-02-01", "date_fin" => "2019-11-01","active" => "false"],
        ["libelle" => "Promotion 2", "date_debut" => "2020-02-01", "date_fin" => "2020-11-01","active" => "false"],
        ["libelle" => "Promotion 3", "date_debut" => "2021-02-01", "date_fin" => "2021-11-01","active" => "false"],
        ["libelle" => "Promotion 4", "date_debut" => "2022-02-01", "date_fin" => "2022-11-01","active" => "false"],
        ["libelle" => "Promotion 5", "date_debut" => "2023-02-01", "date_fin" => "2023-11-01","active" => "false" ],
        ["libelle" => "Promotion 6", "date_debut" => "2024-02-01", "date_fin" => "2024-11-01","active" => "true"],

    ];

    

    return  $promotions;
}

function getActivePromotion() {
    $Allpromotions = findPromotion();
    foreach ($Allpromotions as $promotion) {
        if ($promotion['active'] === "true") {
            return $promotion;
        }
    }
    return null; // Aucune promotion active trouvée
}


?>