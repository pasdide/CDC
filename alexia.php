<!DOCTYPE HTML>
<html>
	<head>
		<title>Page d'Alexia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main_Alexia.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div style="display: flex; align-items: center; justify-content: flex-start; position: absolute; left: 0; top: 0; padding: 10px; gap: 10px;">
							<a href="index.php" class="logo-link" style="display: inline-block; text-align: left;">
								<span class="label"></span>
								<svg xmlns="http://www.w3.org/2000/svg" height="34px" viewBox="0 -960 960 960" width="34px" fill="#5f6368">
									<path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/>
								</svg>
							</a>
							<a href="connexion.php" class="logo-link" style="display: inline-block; text-align: left;">
								<span class="label"></span>
								<svg xmlns="http://www.w3.org/2000/svg" height="34px" viewBox="0 -960 960 960" width="34px" fill="#5f6368">
								<path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg>
							</a>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Alexia Lucchinacci</h1>
								<p></p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#competence">competence</a></li>
								<li><a href="#projet">projet</a></li>
								<li><a href="#qualite">qualité</a></li>
								<li><a href="#contact">contact</a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- competence -->
							<article id="competence">
								<h2 class="major">Mes competenses</h2>
								<span class="image main"><img src="images/pic02.jpg" alt="" /></span>
								<h3>Langages : </h3>
                                <p>HTML, CSS, JavaScript, PHP, C et python</p>
								<h3>Automatisation et intégration de la sécurité dans les pipelines CI/CD</h3>
								<p>Outils CI/CD sécurisés, Infrastructure résiliente</p>
								<h3>Connaissance des normes de sécurité</h3>
								<p>RGPD, ISO 27001, NIST, OWASP, Gestion des risques et des vulnérabilités</p>
							</article>

						<!-- projet -->
							<article id="projet">
								<h2 class="major">Mes projet</h2>
								<span class="image main"><img src="images/projet.jpeg" alt="" /></span>
								<h3>Système de gestion des accès basé sur des rôles (RBAC) sécurisé pour une plateforme SaaS</h3>
								<h4>Objectif :</h4>
								<p>Développer un système de gestion des accès basé sur des rôles (RBAC) intégré dans une plateforme SaaS pour permettre une gestion granulaire des permissions utilisateurs, tout en assurant une sécurité optimale à chaque niveau.</p>
								<h3>Plateforme de surveillance de la sécurité des API avec alertes en temps réel</h3>
								<h4>Objectif :</h4>
								<p>Créer une plateforme de surveillance qui inspecte les appels API en temps réel pour détecter les attaques, telles que les injections SQL, les attaques XSS, ou les fuites de données via des API mal configurées.</p>
							</article>
	
						<!-- qualite -->
							<article id="qualite">
								<h2 class="major">Mes qualités</h2>
								<span class="image main"><img src="images/pic01.jpg" alt="" /></span>
								<li>esprit d'équipe</li>
								<li>ponctualité</li>
								<li>Proactivité</li>
							</article>

						<!-- Contact -->
						<article id="contact">
							<h2 class="major">Pour me contactez</h2>
							<p><a class="icon fa fa-envelope"><span class="label">Email</span></a> &nbsp &#160 &#160 &#160 alexia.lucchinacci@gmail.com</p>
							<p><i class="fa fa-phone-square"></i> &nbsp &#160 &#160 &#160 07.85.39.11.60</p>
							<p><a class="icon brands fa-linkedin"><span class="label">Twitter</span></a> &nbsp &#160 &#160 &#160 Alexia Lucchinacci</p>
							<p><a class="icon brands fa-facebook"><span class="label">Facebook</span></a> &nbsp &#160 &#160 &#160 Alexia Lucchinacci</p> 
							<p><a class="icon brands fa-instagram"><span class="label">Instagram</span></a> &nbsp &#160 &#160 &#160 alexia.lucchinacci</p>
						</article>
					</div>

				<!-- Footer -->
                <footer id="footer">
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
					// Récupérer les données JSON envoyées par JavaScript
					$data = json_decode(file_get_contents('php://input'), true);
					$change = intval($data['change']); // Convertir en entier pour sécurité

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

                </footer>
                        
			</div>

		<!-- CYBER -->
			<div id="cyber"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
