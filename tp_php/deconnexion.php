<?php
// Auteur : Zakaria Elhamdi
// Objectif : Déconnexion et destruction de la session
// Date : 25/10/2026

session_start();

// Vide toutes les variables de session
session_unset();

// Détruit la session
session_destroy();

// Redirection vers la page de connexion
header("Location: login.php");
exit;