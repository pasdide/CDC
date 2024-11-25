<?php
// Connexion à la base de données
$host = '13.38.23.177';
$dbname = 's1828_recherche';
$username = 'u1828_JtZYpeVW4d';
$password = '=nOc^+r^tZw@CL8tNu1KFYvA';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

// Vérifier si la page existe dans le dossier des pages HTML
$page_url = strtolower(trim($search)) . '.html'; // Convertir le nom de page en minuscule et ajouter l'extension .html

// Vérifier si le fichier existe dans le répertoire des pages
if (file_exists($page_url)) {
    // Si le fichier existe, rediriger vers cette page
    header("Location: $page_url");
    exit;
} else {
    // Si le fichier n'existe pas, afficher un message d'erreur
    echo "Page non trouvée. Vérifiez le nom de la page.";
}
?>