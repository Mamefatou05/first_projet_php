<?php
include "../models/fonction_ref.php";
include '../models/model.php';

$filename = '../DATA/referentiel.csv';

$active_promotion = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] : "Promotion 1";

$referentiels = readFromCsv($filename);

$add_to_promotion = isset($_POST['add_to_promotion']) && $_POST['add_to_promotion'] === '1';

// Variables pour stocker les valeurs valides
$libelle = "";
$description = "";
$image = "";

$errors = [];


if(isset($_POST['submit'])){

    // Récupérer les données du formulaire
    $libelle = $_POST['libelle'] ?? '';
    $description = $_POST['description'] ?? '';


$libelle = trim(strtolower( $libelle));
$description = trim(strtolower( $description));


// Vérification du libellé unique
$existing_referentiels = array_map('strtolower', array_column($referentiels, 'libelle')); // Convertir les libellés existants en minuscules
if(in_array($libelle, $existing_referentiels)) {
    $errors['libelle'] = "Le libellé existe déjà.";
}

    // Vérifier si le libellé est vide
    if(empty($libelle)){
        $errors['libelle'] = "Le champ 'Libellé' est requis.";
    }

    // Vérifier si la description est vide
    if(empty($description)) {
        $errors['description'] = "Le champ 'Description' est requis.";
    }

    // Vérifier si une image a été téléchargée
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name']; // Obtenir le nom du fichier téléchargé
        $ext = pathinfo($file_name, PATHINFO_EXTENSION); // Obtenir l'extension du fichier
    
        $img_info = getimagesize($file_tmp);
    
        if (!$img_info || !in_array($img_info['mime'], ['image/jpeg', 'image/png', 'image/gif'])) {
            $errors['image'] = "Le fichier doit être une image au format JPEG, PNG ou GIF.";
        } else {
            $image = $libelle . '.' . $ext;
            $destination = '../public/image/referentiel/' . $image;
            move_uploaded_file($file_tmp, $destination);
        }
    } else {
        // Utiliser une image par défaut si aucune n'a été téléchargée
        $image = 'default.jpg';
    }
    
    // Si aucune erreur n'a été détectée, procéder au traitement
    if(empty($errors)) {
        // Préparer les données à ajouter au fichier CSV
        $data = [
            'image' => $image,
            'libelle' => $libelle,
            'etat' => 'Active',
            'description' => $description
        ];
    
        // Si le bouton add_to_promotion est activé, ajouter le référentiel à la promotion en cours
        if ($add_to_promotion) {
            $data['promotion'] = $active_promotion;
        } else {
            // Si le bouton add_to_promotion est désactivé, ne pas attribuer le référentiel à une promotion spécifique
            $data['promotion'] = ''; // Ou une autre valeur représentant l'absence de promotion
        }
    
        // Ajouter les données au fichier CSV
        AjoutToCsv($filename, [$data]);
    
        // Redirection vers la page appropriée
        header('Location: ../public/index.php?m=4');
        exit();
    }
    
    
}

// Récupérer les valeurs du formulaire
$selected_filters = $_POST['promotion_filter'] ?? [];

// Vérifier si la valeur 'assigned' est présente dans les filtres sélectionnés
$show_assigned = in_array('assigned', $selected_filters);

// Vérifier si la valeur 'unassigned' est présente dans les filtres sélectionnés
$show_unassigned = in_array('unassigned', $selected_filters);

// Si 'assigned' et 'unassigned' ne sont pas sélectionnés, afficher tous les référentiels
if (!$show_assigned && !$show_unassigned) {
    $filteredReferentiels = $referentiels;
} else {
    // Filtrer les référentiels en fonction des options sélectionnées
    $filteredReferentiels = [];
    foreach ($referentiels as $referentiel) {
        if (($show_assigned && $referentiel['promotion'] ===  $active_promotion) || ($show_unassigned && $referentiel['promotion'] !==  $active_promotion)) {
            $filteredReferentiels[] = $referentiel;
        }
    }
}

$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = $globalSearch;

if (!empty($valeurFiltre)) {
    $AllReferentiel = array_filter( $filteredReferentiels, function($presence) use ($valeurFiltre) {
        return stripos($presence['matricule'], $valeurFiltre) !== false;
    });
}

include "../template/referentiel.html.php";


    