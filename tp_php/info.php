<?php
// Auteur : Zakaria Elhamdi
// Objectif : Traitement du formulaire GET
// Date : 25/10/2026

$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';
$sexe = $_GET['sexe'] ?? 'M';

$titre = ($sexe === 'M') ? "Monsieur" : "Madame";
echo "Bonjour $titre " . htmlspecialchars($prenom) . " " . htmlspecialchars($nom) . "<br>";
echo "<a href='info.html'>Retour au formulaire</a>";