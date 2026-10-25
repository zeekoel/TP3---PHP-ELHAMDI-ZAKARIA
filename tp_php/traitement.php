<?php
// Auteur : Zakaria Elhamdi
// Objectif : Traitement des notes en POST et écriture dans CSV
// Date : 25/10/2026

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $info = $_POST['note_info'] ?? '';
    $math = $_POST['note_math'] ?? '';

    // Vérification de l'existence et des types valides
    if (!empty($nom) && is_numeric($info) && is_numeric($math)) {
        // Validation des bornes des notes
        if ($info >= NOTE_MIN && $info <= NOTE_MAX && $math >= NOTE_MIN && $math <= NOTE_MAX) {
            
            // Création du dossier data s'il n'existe pas
            if (!is_dir('data')) {
                mkdir('data', 0777, true);
            }

            // Écriture dans le fichier notes.csv (Mode "a" pour ajout)
            $f = fopen('data/notes.csv', 'a');
            fputcsv($f, [$nom, $info, $math], ';');
            fclose($f);

            echo "<h3>Saisie enregistrée avec succès pour " . htmlspecialchars($nom) . " !</h3>";
            echo "<a href='saisie.html'>Saisir un autre</a> | <a href='liste.php'>Voir la liste</a>";
            exit;
        }
    }
    echo "Erreur : Données invalides ou notes hors limites (" . NOTE_MIN . " à " . NOTE_MAX . ").<br>";
    echo "<a href='saisie.html'>Retour</a>";
}