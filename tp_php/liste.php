<?php
// Auteur : Zakaria Elhamdi
// Objectif : Lecture du fichier CSV et calcul de la moyenne générale
// Date : 25/10/2026

include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

require_once 'config.php';
require_once 'exo2_flux.php'; // Pour la fonction mention()

$fichier = 'data/notes.csv';

if (!file_exists($fichier)) {
    echo "<p>Aucune note enregistrée pour le moment. Utilisez <a href='saisie.html'>Saisie des notes</a>.</p>";
    include 'includes/pied_inc.php';
    exit;
}

$f = fopen($fichier, 'r') or die("Impossible d'ouvrir le fichier CSV !");

echo "<h2>Liste des notes des apprenants</h2>";
echo "<table border='1' cellpadding='8' style='border-collapse: collapse;'>";
echo "<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";

$total_classe = 0;
$compteur = 0;

// Lecture ligne par ligne avec fgetcsv
while (($ligne = fgetcsv($f, 1000, ';')) !== FALSE) {
    list($nom, $info, $math) = $ligne;
    $moy = ($info + $math) / 2;
    $total_classe += $moy;
    $compteur++;

    $style = ($moy < SEUIL) ? "style='color: red;'" : "";

    echo "<tr $style>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>$info</td>";
    echo "<td>$math</td>";
    echo "<td>" . round($moy, 2) . "</td>";
    echo "<td>" . mention($moy) . "</td>";
    echo "</tr>";
}
fclose($f);
echo "</table>";

if ($compteur > 0) {
    $moyenne_generale = $total_classe / $compteur;
    echo "<h3>Moyenne générale de la classe : " . round($moyenne_generale, 2) . "</h3>";
}

include 'includes/pied_inc.php';