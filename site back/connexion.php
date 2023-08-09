<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header("Location: accueil.php");
    exit;
}

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $emailOrPhone = $_POST['email_or_phone'];
    $password = $_POST['password'];

    // Vérifier l'authentification de l'utilisateur
    // Ici, vous devez écrire le code pour vérifier les identifiants dans votre base de données MySQL

    // Si l'authentification est réussie, rediriger vers la page d'accueil
    // et enregistrer l'ID de l'utilisateur dans la session
    $_SESSION['user_id'] = $user_id; // Remplacez $user_id par l'ID de l'utilisateur authentifié
    header("Location: accueil.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <!-- Ajoutez ici les liens vers les fichiers CSS pour le design -->
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST" action="connexion.php">
        <label for="email_or_phone">Adresse e-mail ou numéro de téléphone :</label>
        <input type="text" name="email_or_phone" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Se connecter">
    </form>
    <p>Pas encore inscrit ? <a href="enregistrement.php">Créer un compte</a></p>
</body>
</html>
