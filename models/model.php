<?php

function redirect($url)
{
    header('Location:' . $url);
    exit();
}

function getAllReferentiels($presence)
{
    $referentiels = [];
    foreach ($presence as $presenceItem) {
        $referentiel = $presenceItem['referentiel'];
        if (!in_array($referentiel, $referentiels)) {
            $referentiels[] = $referentiel;
        }
    }
    return $referentiels;
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

            $rowData = array_combine($firstline, $row);

            if (isset($rowData['image_base64']) && !empty($rowData['image_base64'])) {

                $image_content = base64_decode($rowData['image_base64']);

                $rowData['image'] = $image_content;
            }

            $data[] = $rowData;
        }

        fclose($fichier);
    }
    return $data;
}

function writeToCsv($filename, $data) {
    if (($fichier = fopen($filename, 'w')) !== false) {

        
        fputcsv($fichier, array_keys($data[0]));
        foreach ($data as $row) {
            fputcsv($fichier, $row);
        }
        fclose($fichier);
        return true;
    }
    return false;
}
function AjoutToCsv($filename, $data) {
    if (($fichier = fopen($filename, 'a')) !== false) {
        // Vérifier si le fichier est vide
        $isEmpty = filesize($filename) === 0;

        // Écrire l'en-tête si le fichier est vide
        if ($isEmpty) {
            fputcsv($fichier, array_keys($data[0]));
        }

        // Ajouter les données au fichier CSV
        foreach ($data as $row) {
            fputcsv($fichier, $row);

            // var_dump($row);
             
        }

        fclose($fichier);
        return true;
    }
    return false;
}





?>