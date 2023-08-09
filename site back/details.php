<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

// Vérifier si l'utilisateur s'est déconnecté ou si la date de connexion est dépassée
// Ici, vous devez écrire le code pour vérifier si l'utilisateur est toujours connecté

// Si l'utilisateur n'est plus connecté, rediriger vers la page de connexion
// et supprimer l'ID de l'utilisateur de la session
if (!$user_is_connected) {
    unset($_SESSION['user_id']);
    header("Location: connexion.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Détails</title>
    <!-- Ajoutez ici les liens vers les fichiers CSS pour le design -->
</head>
<body>
    <h1>Détails</h1>
    <p>Contenu de la page de détails</p>
    <!-- Ajoutez ici le contenu de la page de détails -->
</body>
</html>
