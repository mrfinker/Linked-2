<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header("Location: accueil.php");
    exit;
}

// Vérifier si le formulaire d'enregistrement a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Enregistrer les données dans votre base de données MySQL
    // Ici, vous devez écrire le code pour insérer les données dans votre base de données

    // Rediriger vers la page de connexion après l'enregistrement
    header("Location: connexion.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enregistrement</title>
    <!-- Ajoutez ici les liens vers les fichiers CSS pour le design -->
</head>
<body>
    <h1>Enregistrement</h1>
    <form method="POST" action="enregistrement.php">
        <label for="email">Adresse e-mail :</label>
        <input type="email" name="email" required><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="S'inscrire">
    </form>
    <p>Déjà inscrit ? <a href="connexion.php">Se connecter</a></p>
</body>
</html>
