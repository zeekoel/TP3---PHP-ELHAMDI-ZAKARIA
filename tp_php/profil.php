<?php
// Auteur : Zakaria Elhamdi
// Objectif : Page de profil sécurisée par session
// Date : 25/10/2026

session_start();

// Si l'utilisateur n'est pas connecté, on le redirige vers login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h1>Bienvenue, <?= htmlspecialchars($_SESSION['login']) ?> !</h1>
    <p>Vous êtes connecté à l'espace de suivi des notes.</p>
    
    <p><a href="liste.php">Voir la liste des notes</a> | <a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>