<?php

function redirect($url)
{
    header('Location:' . $url);
    exit();
}
function paginate($items, $perPage, $page)
{
    $totalItems = count($items); // Nombre total d'éléments
    $totalPages = ceil($totalItems / $perPage); // Nombre total de pages
    $page = max(min($page, $totalPages), 1); // Assurer que la page est dans les limites

    $start = ($page - 1) * $perPage;

    return [
        'items' => array_slice($items, $start, $perPage),
        'totalItems' => $totalItems, // Retourner le nombre total d'éléments
        'totalPages' => $totalPages,
        'currentPage' => $page,
    ];
}

function filterByActivePromotion($data, $active_promotion)
{
    $filtered_data = [];
    foreach ($data as $item) {
        if ($item['promotion'] === $active_promotion) {
            $filtered_data[] = $item; // Ajouter l'élément entier
        }
    }
    return $filtered_data;
}

function readFromCsv($filename) {
    $data = [];
    if (($fichier= fopen($filename, 'r')) !== false) {
        $firstline = fgetcsv($fichier);
       
        while (($row = fgetcsv($fichier)) !== false) {
            $data[] = array_combine($firstline, $row);
        }
        fclose($fichier);
    }
    return $data;
}



?>