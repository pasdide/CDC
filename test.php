<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incrémentation</title>
    <script>
        async function increment() {
            const response = await fetch("increment.php", { method: "POST" });
            const result = await response.text();
            document.getElementById("result").innerText = result;
        }
    </script>
</head>
<body>
    <h1>Incrémenter une valeur</h1>
    <button onclick="increment()">Ajouter +1</button>
    <p>Résultat : <span id="result">0</span></p>
</body>
</html>
<?php
// Configuration de la base de données
$host = '51.83.43.233';
$dbname = 's1803_padrino';
$user = 'u1803_BA4CbKs48i';
$password = 'HSJllC=H0O5dTsAR9VVGa1h!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer la valeur actuelle
    $stmt = $pdo->query("SELECT recommendation FROM utilisateurs WHERE idu = 2");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $currentValue = $row['recommendation'];
        $newValue = $currentValue + 1;

        // Incrémenter la valeur
        $updateStmt = $pdo->prepare("UPDATE utilisateurs SET recommendation = :newValue WHERE idu = 2");
        $updateStmt->execute(['newValue' => $newValue]);

        echo $newValue;
    } else {
        // Initialisation si aucune valeur n'existe
        $insertStmt = $pdo->prepare("INSERT INTO utilisateurs (recommendation) VALUES (1)");
        $insertStmt->execute();
        echo 1;
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}