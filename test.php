<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouton Recommander</title>
    <style>
        .like-button.liked {
            color: green;
        }
    </style>
</head>
<body>
    <!-- Bouton Recommander -->
    <button class="like-button" onclick="toggleLike(this)">
        <span class="like-icon">👍</span>
        <span class="like-text">Recommander</span>
    </button>

    <script>
        function toggleLike(button) {
            button.classList.toggle('liked');
            const likeText = button.querySelector('.like-text');
            let variableChange;

            if (button.classList.contains('liked')) {
                likeText.textContent = "Vous recommandez";
                variableChange = 1;
            } else {
                likeText.textContent = "Recommander";
                variableChange = -1;
            }

            // Envoi de la modification au serveur
            fetch('', { // '' indique que la requête est envoyée au même fichier
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ change: variableChange })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Réponse du serveur :', data);
                if (!data.success) {
                    alert("Erreur lors de la mise à jour : " + data.error);
                }
            })
            .catch(error => console.error('Erreur :', error));
        }
    </script>

    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    // Traitement PHP pour gérer les requêtes POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Content-Type: application/json'); // Réponse en JSON

        // Récupérer les données JSON envoyées par JavaScript
        $data = json_decode(file_get_contents('php://input'), true);
        $change = isset($data['change']) ? intval($data['change']) : null;

        if (!is_int($change)) {
            echo json_encode(['success' => false, 'error' => 'Données invalides reçues']);
            exit;
        }

        // Informations de connexion à la base de données
        $nom_serveur = "51.83.43.233";
        $utilisateur = "u1803_BA4CbKs48i";
        $mot_de_passe = "HSJllC=H0O5dTsAR9VVGa1h!";
        $nom_base_de_données = "s1803_padrino";

        // Connexion à la base de données
        $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_de_données);

        if (!$con) {
            echo json_encode(['success' => false, 'error' => 'Erreur de connexion à la base de données']);
            exit;
        }

        // ID utilisateur (statique ici, peut être dynamique)
        $idu = 2;

        // Mettre à jour la table utilisateurs
        $sql = "UPDATE utilisateurs SET recommendation = recommendation + ? WHERE idu = ?";
        $stmt = $con->prepare($sql);

        if (!$stmt) {
            echo json_encode(['success' => false, 'error' => 'Requête préparée invalide']);
            $con->close();
            exit;
        }

        $stmt->bind_param("ii", $change, $idu);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }

        $stmt->close();
        $con->close();
        exit; // Assurez-vous que le script s'arrête après avoir envoyé la réponse
    }
    ?>
</body>
</html>