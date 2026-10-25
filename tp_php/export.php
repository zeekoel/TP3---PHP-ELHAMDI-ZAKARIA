<?php
// Auteur : Zakaria Elhamdi
// Objectif : Export des données en format JSON
// Date : 25/10/2026

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

$fichier_csv = 'data/notes.csv';
$data = [];

if (file_exists($fichier_csv)) {
    $f = fopen($fichier_csv, 'r');
    while (($l = fgetcsv($f, 1000, ';')) !== FALSE) {
        $moy = ($l[1] + $l[2]) / 2;
        $data[] = [
            "nom" => $l[0],
            "info" => (float)$l[1],
            "math" => (float)$l[2],
            "moyenne" => round($moy, 2)
        ];
    }
    fclose($f);
}

// Écriture du fichier JSON
$json_data = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data/notes.json', $json_data);

echo "<h2>Export des données en JSON</h2>";
echo "<p>Le fichier <code>data/notes.json</code> a été mis à jour avec succès.</p>";

// Relecture et affichage du contenu JSON décodé
$contenu_lu = file_get_contents('data/notes.json');
$tableau_decode = json_decode($contenu_lu, true);

echo "<h3>Contenu décodé du fichier JSON :</h3>";
echo "<pre>";
print_r($tableau_decode);
echo "</pre>";

include 'includes/pied_inc.php';