<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" href="icon.png">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/styles.css">

        <link rel="stylesheet" href="css/styleform.css">

    </head>

<?php 

 //Nous allons démarrer la session avant toute chose
   session_start() ;
  if(isset($_POST['boutton-valider'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['email']) && isset($_POST['mdp'])) { //On verifie ici si l'utilisateur a rentré des informations
      //Nous allons mettres l'email et le mot de passe dans des variables
      $email = $_POST['email'] ;
      $mdp = $_POST['mdp'] ;
      $erreur = "" ;
       //Nous allons verifier si les informations entrée sont correctes
       //Connexion a la base de données
       $nom_serveur = "51.83.43.233";
       $utilisateur = "u1803_BA4CbKs48i";
       $mot_de_passe ="HSJllC=H0O5dTsAR9VVGa1h!";
       $nom_base_données ="s1803_padrino" ;
       $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM utilisateurs WHERE email = '$email' AND mdp ='$mdp' ") ;
        $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        if($num_ligne > 0){
            header("Location:session.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
            // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
            $_SESSION['email'] = $email ;
        }else {//si non
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
    }
  }
?>

    <body>
        <main class="main">
            <div class="cadre">
            <div class="wrapper">
            <section>
       <h1> Connexion</h1>
       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
       <form action="" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
           <label>Adresse Mail</label>
           <input type="text" name="email">
           <label >Mots de Passe</label>
           <input type="password" name="mdp">
           <u><h6 >Si vous avez oubliez votre mot de passe, merci de vous adresser au gardien</h6></u>
           <input type="submit" value="Valider" name="boutton-valider">
       </form>
   </section> 
                        </div>
                    </div>
                </div>


    </body>
</html>