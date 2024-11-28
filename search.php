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
    echo "";
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introuvable</title>
    <link rel="stylesheet" href="assets/css/search.css" />
</head>
<body>
    <div class="container">
    <div class="message">
      <h1>Oups ! Page Introuvable</h1>
      <p>La page que vous recherchez n'a pas été trouvée.</p>
      <p>Essayez de revenir à la <a href="index.html">page d'accueil</a> ou vérifiez votre recherche.</p>
    </div>
  </div>
</body>
</html>