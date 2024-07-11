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
function readFromCsv($filename)
{
    $data = [];
    if (($fichier = fopen($filename, 'r')) !== false) {

        $firstline = fgetcsv($fichier);

        while (($row = fgetcsv($fichier)) !== false) {

            $rowData = array_combine($firstline, $row);

            // // Décoder les données binaires de l'image depuis base64
            // $imageData = base64_decode($rowData['image']);

            // // Décompresser les données binaires de l'image
            // $imageData = gzuncompress($imageData);

            // // Déterminer le type MIME à partir des données binaires de l'image
            // $finfo = new finfo(FILEINFO_MIME_TYPE);
            // $mime_type = $finfo->buffer($imageData);
            // $rowData['mime_type'] = $mime_type;

            // // Stocker les données binaires décompressées dans le tableau
            // $rowData['image'] = $imageData;

            $data[] = $rowData;
        }

        fclose($fichier);
    }
    return $data;
}


function writeToCsv($filename, $data)
{
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
function AjoutToCsv($filename, $data)
{
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


function readFromJSON($chemin) {
    // Lire le contenu du fichier JSON
    $jsonData = file_get_contents($chemin);

    // Décoder le contenu JSON en un tableau associatif
    $donnees = json_decode($jsonData, true);

    // Vérification si la lecture et le décodage se sont bien passés
    if ($donnees === null && json_last_error() !== JSON_ERROR_NONE) {
        // En cas d'erreur, retourner un tableau vide
        return [];
    } else {
        // Si tout s'est bien passé, retourner les données lues depuis le fichier JSON
        return $donnees;
    }
}





// function genererFileUtilisateursJSON($etudiants, $admins) {
//     // Tableau pour stocker toutes les données des utilisateurs
//     $utilisateurs = [];

//     // Ajouter les admins
//     foreach ($admins as $admin) {
//         $motDePasse = password_hash('sonatelAD', PASSWORD_DEFAULT);
//         $utilisateur = [
//             'matricule' => '-',
//             'email' => $admin['email'],
//             'nom' => $admin['nom'],
//             'prenom' => $admin['prenom'],
//             'statut' => 'admin',
//             'etat' => '1',
//             'mot_de_passe' => $motDePasse
//         ];
//         $utilisateurs[] = $utilisateur;
//     }

//     // Ajouter les étudiants
//     foreach ($etudiants as $etudiant) {
//         $motDePasse = password_hash('sonatelET', PASSWORD_DEFAULT);
//         $utilisateur = [
//             'matricule' => $etudiant['matricule'],
//             'email' => $etudiant['email'],
//             'nom' => $etudiant['nom'],
//             'prenom' => $etudiant['prenom'],
//             'statut' => 'etudiant',
//             'etat' => '1',
//             'mot_de_passe' => $motDePasse
//         ];
//         $utilisateurs[] = $utilisateur;
//     }

//     // Convertir le tableau des utilisateurs en JSON
//     $jsonData = json_encode($utilisateurs, JSON_PRETTY_PRINT);

//     // Chemin vers le fichier JSON à générer
//     $cheminFichierJSON = 'datas/users.json';

//     // Enregistrer le JSON dans un fichier
//     file_put_contents($cheminFichierJSON, $jsonData);

//     echo "Le fichier JSON a été généré avec succès.";
// }

// // Appel de la fonction pour générer le fichier JSON des utilisateurs
// genererFileUtilisateursJSON($etudiants, $admins);
