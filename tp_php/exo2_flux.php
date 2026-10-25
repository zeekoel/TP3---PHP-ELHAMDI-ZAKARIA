<?php
// Auteur : Zakaria Elhamdi
// Objectif : Exercice 2 - Structures de contrôle et boucles
// Date : 25/10/2026

require_once 'config.php';

// --- Exercice 2.1 : if / elseif / else ---
function mention($note) {
    if ($note >= 16) return "Très bien";
    elseif ($note >= 14) return "Bien";
    elseif ($note >= 12) return "Assez bien";
    elseif ($note >= SEUIL) return "Passable";
    else return "Ajourné";
}

echo "Note de 15 : " . mention(15) . "<br><hr>";

// --- Exercice 2.2 : switch (Mois courant) ---
$mois = date("m");
echo "Mois actuel en français : ";
switch ($mois) {
    case '01': echo "Janvier"; break;
    case '02': echo "Février"; break;
    case '03': echo "Mars"; break;
    case '04': echo "Avril"; break;
    case '05': echo "Mai"; break;
    case '06': echo "Juin"; break;
    case '07': echo "Juillet"; break;
    case '08': echo "Août"; break;
    case '09': echo "Septembre"; break;
    case '10': echo "Octobre"; break;
    case '11': echo "Novembre"; break;
    case '12': echo "Décembre"; break;
    default: echo "Inconnu"; break;
}
echo "<br><hr>";

// --- Exercice 2.3 : Boucles ---
// 1. Triangle d'étoiles
for ($i = 1; $i <= 6; $i++) {
    echo str_repeat("*", $i) . "<br>";
}
echo "<hr>";

// 2. Nombres de 0 à 20 par pas de 2 (10 en gras)
$j = 0;
while ($j <= 20) {
    if ($j === 10) {
        echo "<strong>$j</strong> ";
    } else {
        echo "$j ";
    }
    $j += 2;
}