<?php
// Auteur : Zakaria Elhamdi
// Objectif : Page de connexion avec gestion des sessions et cookies
// Date : 25/10/2026

// ATTENTION : session_start() doit être la TOUTE PREMIÈRE instruction avant tout affichage HTML
session_start();
require_once 'config.php';

$message_erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    
    if (!empty($login)) {
        // Enregistrement du login dans la session
        $_SESSION['login'] = $login;
        
        // Création d'un cookie "dernier_login" valable 24 heures (86400 secondes)
        setcookie("dernier_login", $login, time() + 86400, "/");
        
        // Redirection vers la page de profil
        header("Location: profil.php");
        exit;
    } else {
        $message_erreur = "Veuillez entrer un login valide.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion à l'application</h2>
    
    <?php if (!empty($message_erreur)): ?>
        <p style="color: red;"><?= $message_erreur ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Login : 
            <!-- Pré-remplissage du champ avec le cookie s'il existe -->
            <input type="text" name="login" value="<?= $_COOKIE['dernier_login'] ?? '' ?>" required>
        </label>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>