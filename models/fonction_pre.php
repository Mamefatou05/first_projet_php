<?php

// function findAllPresence()
// {
//     $presence = [

//         [
//             "matricule" => 'P6_2024_129',
//             "nom" => 'Diop',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '06:00',
//             "status" => 'present',
//             "promotion" => 'Promotion 6',
//             "date" => '2021-01-01',


//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbsow',
//             "prenom" => 'Modou',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement DATA',
//             "heure-arriver" => '07:00',
//             "status" => 'present',
//             "promotion" => 'Promotion 6',

//             "date" => '2021-01-01',

//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '-',
//             "status" => 'absent',
//             "promotion" => 'Promotion 6',

//             "date" => '2021-01-01',

//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Référent Digital',
//             "heure-arriver" => '08:00',
//             "status" => 'present',
//             "promotion" => 'Promotion 6',

//             "date" => '2021-01-01',

//         ],
//         [
//             "matricule" => 'P6_DEVWEB_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '07:00',
//             "status" => 'present',
//             "promotion" => 'Promotion 6',
//             "date" => '2021-01-01',


//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'AWS',
//             "heure-arriver" => '-',
//             "status" => 'absent',
//             "date" => '2021-01-01',
//             "promotion" => 'Promotion 6',

//         ],
//         [
//             "matricule" => 'P6_HAQUEUSE_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '07:40',
//             "status" => 'present',
//             "date" => '2021-01-01',
//             "promotion" => 'Promotion 6',

//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Référent Digital',
//             "heure-arriver" => '-',
//             "status" => 'present',
//             "date" => '2021-01-01',
//             "promotion" => 'Promotion 6',

//         ],
//         [
//             "matricule" => 'P6_DEVDATA_2024_129',
//             "nom" => 'Fall',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '-',
//             "status" => 'present',
//             "date" => '2021-01-01',
//             "promotion" => 'Promotion 6',

//         ],
//         [
//             "matricule" => 'P6_REFDIG_2024_139',
//             "nom" => 'Mbow',
//             "prenom" => 'Penda',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '07:00',
//             "status" => 'present',
//             "date" => '2021-02-01',
//             "promotion" => 'Promotion 4',
//         ],
       
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Diop',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '06:00',
//             "status" => 'present',
//             "date" => '2021-02-01',
//             "promotion" => 'Promotion 3',


//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbsow',
//             "prenom" => 'Modou',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement DATA',
//             "heure-arriver" => '07:00',
//             "status" => 'present',
//             "date" => '2021-02-01',
//             "promotion" => 'Promotion 3',

//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '-',
//             "status" => 'absent',
//             "date" => '2021-02-01',
//             "promotion" => 'Promotion 3',

//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Référent Digital',
//             "heure-arriver" => '08:00',
//             "status" => 'present',
//             "date" => '2021-02-01',
//             "promotion" => 'Promotion 2',

//         ],
//         [
//             "matricule" => 'DEVWEB_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '07:00',
//             "status" => 'present',
//             "date" => '2021-02-01',
//             "promotion" => 'Promotion 2',

//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'AWS',
//             "heure-arriver" => '-',
//             "status" => 'absent',
//             "date" => '2021-02-01',
//             "promotion" => 'Promotion 2',

//         ],
//         [
//             "matricule" => '_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '07:40',
//             "status" => 'present',
//             "date" => '2021-02-01',
//             "promotion" => 'Promotion 1',

//         ],
//         [
//             "matricule" => 'P6_DEVWEB_2024_129',
//             "nom" => 'Mbow',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Référent Digital',
//             "heure-arriver" => '-',
//             "status" => 'absent',
//             "date" => '2021-01-01',
//             "promotion" => 'Promotion 1',

//         ],
//         [
//             "matricule" => 'P6_DEVttDATA_2024_129',
//             "nom" => 'Fall',
//             "prenom" => 'Baye Saer',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '-',
//             "status" => 'absent',
//             "date" => '2021-01-01',
//             "promotion" => 'Promotion 1',

//         ],
//         [
//             "matricule" => 'P6_REFDIG_2024_139',
//             "nom" => 'Mbow',
//             "prenom" => 'Penda',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '07:00',
//             "status" => 'present',
//             "date" => '2021/01/01',
//             "promotion" => 'Promotion 5',
//         ],
//         [
//             "matricule" => 'P6_REFDIG_2024_139',
//             "nom" => 'Mbow',
//             "prenom" => 'Penda',
//             "telephone" => '777220308',
//             "referentiel" => 'Developpement Web',
//             "heure-arriver" => '07:00',
//             "status" => 'present',
//             "date" => '2021/01/01',
//             "promotion" => 'Promotion 6',
//         ],
       
//     ];

//     return $presence;
// }

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

function getAllStatuts($presence)
{
    $statuts = [];
    foreach ($presence as $presenceItem) {
        $statut = $presenceItem['status'];
        if (!in_array($statut, $statuts)) {
            $statuts[] = $statut;
        }
    }
    return $statuts;
}

function getAllDates($presence)
{
    $dates = [];
    foreach ($presence as $presenceItem) {
        $date = $presenceItem['date'];
        if (!in_array($date, $dates)) {
            $dates[] = $date;
        }
    }
    return $dates;
}

?>
