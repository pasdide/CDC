<?php
// Connexion à la base de données
$host = '51.83.43.233'; // Remplacez par votre hôte
$db = 's1803_padrino'; // Nom de la base de données
$user = 'u1803_BA4CbKs48i'; // Utilisateur de la base de données
$pass = 'HSJllC=H0O5dTsAR9VVGa1h!'; // Mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Récupération des 5 meilleures personnes avec leurs recommandations
$query = $pdo->query("SELECT pseudo, recommendation FROM utilisateurs ORDER BY recommendation DESC LIMIT 5");
$data = $query->fetchAll(PDO::FETCH_ASSOC);

// Transformation des données en JSON pour le graphique
$categories = [];
$values = [];
foreach ($data as $row) {
    $categories[] = $row['pseudo'];
    $values[] = $row['recommendation'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <title>DashBoard</title>
</head>

<body>
    <div class="grid-container">
        <header class="header">
            <div class="menu-icon">
                <span class="material-icons-outlined">menu</span>
            </div>
            <div class="header-left">
                <span class="material-icons-outlined">search</span>
            </div>
            <div class="header-right">
                <span class="material-icons-outlined">notifications</span>
                <a href="pagecontact.php"><span class="material-icons-outlined">email</span></a>
                <span class="material-icons-outlined">account_circle</span>
            </div>
        </header>

        <aside id="sidebar">
            <div class="sidebar-title">
                <a href="index.php"><span class="material-icons-outlined" title="DashBoard">home</span></a>
                <span class="label-title">DashBoard</span>
            </div>
            <ul class="sidebar-list">
                <li class="sidebar-list-item">
                    <span class="material-icons-outlined" title="DashBoard">terminal</span>
                    <span class="label-item">Profil</span>
                </li>
            </ul>
        </aside>

        <main class="main-container">
            <div class="main-title">
                <h1 class="fw-600">Tableau de Bord</h1>
            </div>

            <!-- Cartes dynamiques pour les 4 meilleures recommandations -->
            <div class="main-cards">
                <?php for ($i = 0; $i < 4; $i++): ?>
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-<?php echo $i == 0 ? 'yellow' : ($i == 1 ? 'red' : ($i == 2 ? 'turc' : 'indigo')); ?>"><?php echo $data[$i]['pseudo']; ?></p> <!-- Affiche le prénom -->
                            <span class="material-icons-outlined text-<?php echo $i == 0 ? 'yellow' : ($i == 1 ? 'red' : ($i == 2 ? 'turc' : 'indigo')); ?>" title="DashBoard">thumb_up</span>
                        </div>
                        <span class="fw-600"><?php echo $data[$i]['recommendation']; ?></span> <!-- Affiche le nombre de recommandations -->
                    </div>
                <?php endfor; ?>
            </div>

            <!-- Graphiques -->
            <div class="charts">
                <div class="charts-card">
                    <p class="chart-title">Meilleurs Recommandations</p>
                    <div id="chart-bar"></div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Récupération des données depuis PHP
        const categories = <?php echo json_encode($categories); ?>;
        const values = <?php echo json_encode($values); ?>;

        // Configuration du graphique
        const options = {
            series: [
                {
                    data: values,
                },
            ],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false,
                },
            },
            colors: ['#eba91d', '#bc1e51', '#04a07e', '#434738', '#0b0c0e'], // Ajouter une couleur pour la 5ème personne
            plotOptions: {
                bar: {
                    distributed: true,
                    horizontal: true, // Barres horizontales
                    columnWidth: '40%',
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                categories: categories,
            },
            yaxis: {
                title: {
                    text: "Recommandations",
                },
            },
        };

        // Création et rendu du graphique
        const chartBar = new ApexCharts(document.querySelector("#chart-bar"), options);
        chartBar.render();
    </script>
</body>
</html>
