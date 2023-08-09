<?php
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

// Vérification de l'authentification de l'utilisateur
$host = 'localhost';
$username = 'mrfinker';
$password = 'jenesaispas';
$database = 'linked';

// Établissement d'une connexion à la base de données
$conn = new mysqli($host, $username, $password, $database);

// Vérification si la connexion a échoué
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Préparation de la requête pour vérifier les identifiants de l'utilisateur
$stmt = $conn->prepare("SELECT id FROM utilisateurs WHERE (email = ? OR telephone = ?) AND mot_de_passe = ?");
$stmt->bind_param("sss", $emailOrPhone, $emailOrPhone, $password);

// Exécution de la requête
$stmt->execute();

// Récupération le résultat de la requête
$result = $stmt->get_result();

// Vérification si l'authentification est réussie
if ($result->num_rows === 1) {
    // Récupération l'ID de l'utilisateur
    $row = $result->fetch_assoc();
    $user_id = $row['id'];

    // Enregistrement de l'ID de l'utilisateur dans la session
    $_SESSION['user_id'] = $user_id;

    // Redirection vers la page d'accueil
    header("Location: accueil.php");
    exit;
} else {
    // Authentification échouée, afficher un message d'erreur
    echo "Identifiants invalides";
}

// Fermeture la connexion à la base de données
$stmt->close();
$conn->close();

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