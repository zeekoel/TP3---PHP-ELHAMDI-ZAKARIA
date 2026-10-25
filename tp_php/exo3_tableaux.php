<?php
// Auteur : Zakaria Elhamdi
// Objectif : Exercice 3 - Tableaux, affichage HTML, statistiques et tris
// Date : 25/10/2026

require_once 'config.php';
require_once 'exo2_flux.php'; // Pour utiliser la fonction mention()

// --- Exercice 3.1 : Création des tableaux ---
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

$modules = ["Informatique", "Mathématiques", "Réseaux"];

echo "<h3>Affichage du tableau indexé des modules :</h3>";
foreach ($modules as $index => $module) {
    echo "Module $index : $module<br>";
}
echo "<hr>";

// --- Exercice 3.2 : Affichage HTML dans un tableau ---
echo "<h3>Liste des apprenants et leurs mentions</h3>";
echo "<table border='1' cellpadding='8' style='border-collapse: collapse;'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    // Si la note est inférieure au seuil, on l'affiche en rouge
    $style = ($note < SEUIL) ? "style='color: red; font-weight: bold;'" : "";
    $mention_app = mention($note);
    
    echo "<tr $style>";
    echo "<td>$nom</td>";
    echo "<td>$note</td>";
    echo "<td>$mention_app</td>";
    echo "</tr>";
}
echo "</table><hr>";

// --- Exercice 3.3 : Statistiques ---
$somme = 0;
$nombre_notes = 0;
$max = -1;
$min = 21;
$effectifs = [];

foreach ($notes as $nom => $note) {
    $somme += $note;
    $nombre_notes++;
    
    if ($note > $max) $max = $note;
    if ($note < $min) $min = $note;

    // Calcul des effectifs par mention
    $m = mention($note);
    $effectifs[$m] = ($effectifs[$m] ?? 0) + 1;
}

$moyenne_classe = $somme / $nombre_notes;

echo "<h3>Statistiques de la classe</h3>";
echo "Somme des notes : $somme<br>";
echo "Moyenne de la classe : " . round($moyenne_classe, 2) . "<br>";
echo "Meilleure note : $max<br>";
echo "Plus faible note : $min<br>";

echo "<h4>Effectifs par mention :</h4>";
foreach ($effectifs as $mention_nom => $effectif) {
    echo "- $mention_nom : $effectif apprenant(s)<br>";
}
echo "<hr>";

// --- Exercice 3.4 : Tris ---
function afficher_tableau($tab) {
    foreach ($tab as $k => $v) {
        echo "$k ($v) | ";
    }
    echo "<br>";
}

echo "<h3>Fonctions de tri</h3>";

// 1. Tri par noms croissants (ksort)
$t1 = $notes;
ksort($t1);
echo "Tri par noms croissants (ksort) : ";
afficher_tableau($t1);

// 2. Tri par notes décroissantes (arsort)
$t2 = $notes;
arsort($t2);
echo "Tri par notes décroissantes (arsort) : ";
afficher_tableau($t2);

// 3. Tri par noms décroissants (krsort)
$t3 = $notes;
krsort($t3);
echo "Tri par noms décroissants (krsort) : ";
afficher_tableau($t3);

// 4. Tri par notes croissantes (asort)
$t4 = $notes;
asort($t4);
echo "Tri par notes croissantes (asort) : ";
afficher_tableau($t4);

/*
  Question : Quelle fonction de tri utiliser sur un tableau indexé comme $modules ?
  Réponse : On utilise `sort()` (tri croissant) ou `rsort()` (tri décroissant).
*/