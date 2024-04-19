<?php

include "../models/fonction_ref.php";
include '../models/model.php';

$filename = '../DATA/referent.csv'; // Remplacez 'votre_fichier.csv' par le chemin de votre fichier CSV


$active_promotion = isset($_SESSION['selected_promotion']) ? $_SESSION['selected_promotion'] : "Promotion 1";

// Variables pour stocker les valeurs valides
$libelle = "";
$description = "";
$image = "";

$errors = [];
// var_dump($_FILES);

if(isset($_POST['submit'])){



    // Récupérer les données du formulaire
    $libelle = $_POST['libelle'] ?? '';
    $description = $_POST['description'] ?? '';
    

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
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION); // Obtenir l'extension du fichier

        $img_info = getimagesize($file_tmp);
        if(!$img_info || !in_array($img_info['mime'], ['image/jpeg', 'image/png', 'image/gif'])) {
            $errors['image'] = "Le fichier doit être une image au format JPEG, PNG ou GIF.";
        }else {
            $image = $libelle . '.' . $ext;

            $destination = '../public/image/referentiel/' . $image;
            move_uploaded_file($image_tmp, $destination);

            

        }
    } else {
        // Utiliser une image par défaut si aucune n'a été téléchargée
        $image = 'default.jpg';
    }

    // Si aucune erreur n'a été détectée, procéder au traitement
    if(empty($errors)) {
        // Traitement des données
        // Ajouter les données au fichier CSV
        AjoutToCsv($filename, [
            [
                'image' => $image,
                'libelle' => $libelle,
                'etat' => 'Active',
                'promotion' => $active_promotion, // Assurez-vous que $active_promotion est défini
                'description' => $description
            ]
        ]);

        // Redirection vers une autre page après l'ajout
        header('Location: ../public/index.php?m=4');
        exit();
    }
}


$Referent = readFromCsv($filename);



$AllReferentiel = filterByActivePromotion($Referent, $active_promotion);



$globalSearch = isset($_POST['Search']) ? $_POST['Search'] : '';
$valeurFiltre = $globalSearch;

if (!empty($valeurFiltre)) {

    $AllReferentiel= array_filter($AllReference, function($presence) use ($valeurFiltre) {
        return stripos($presence['matricule'], $valeurFiltre) !== false ;
    });

}

include "../template/referentiel.html.php";
