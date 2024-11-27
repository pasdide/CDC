<?php
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

$page_url = strtolower(trim($search)) . '.html'; 

if (file_exists($page_url)) {
    header("Location: $page_url");
    exit;
} else {
    echo "Page non trouvée. Vérifiez le nom de la page.";
}


?>
