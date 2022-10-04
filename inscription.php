<?php
// session_start();

include "config/commandes.php";

$Utilisateurs=afficherutilisateur();



?>
<!doctype html>
<html lang="en"  class="h-100">
  <head>
    <meta charset="utf-8">
    <title>Inscription - CoquiFleurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/zapfino-extra-lt" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" sizes="32x32" href="image/Coquillage.ico">


    
  </head>
<body>
<header>
  <div class="navbar navbar-dark bg-yellow-200 shadow-sm">
    <div class=" row d-flex align-items-md-center ">
      <div class="col"></div>     
      <a href="index.php" class="navbar-brand d-flex align-items-center col-md-auto">
        <strong class="name text-Brown zapfino">Coquifleurs</strong>
      </a>
    </div>
  </div>
</header>

<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">

        <form method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="name" name="nom" class="form-control" style="width: 350%;" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="name" name="prenom" class="form-control" style="width: 350%;" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" style="width: 350%;" required>
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" name="motdepasse" class="form-control" style="width: 350%;" required>
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe de vérification</label>
                <input type="password" name="motdepasse2" class="form-control" style="width: 350%;" required>
            </div>
            <br>
            <input type="submit" name="envoyer" class="btn btn-info" value="S'inscrire">
        </form>

        </div>
    </div>
</div>
    
</body>
</html>

<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=coquifleurs', 'root', '', [PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION]);
} 
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}



if(isset($_POST['envoyer'])){ 

    $email = htmlspecialchars(strip_tags($_POST['email']),FILTER_SANITIZE_EMAIL) ;
    $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));
    $motdepasse2 = htmlspecialchars(strip_tags($_POST['motdepasse2']));
    $nom = htmlspecialchars(strip_tags($_POST['nom']));
    $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
    $session = htmlspecialchars(md5(time().$nom));
    $vkey = md5(time().$nom);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        if ($motdepasse === $motdepasse2) {
            $req = $bdd->query('SELECT email AS email FROM utilisateurs WHERE email = "' . $email . '"');
            $result = $req->fetch(PDO::FETCH_ASSOC);
            $data = $result['email'];
            if ( $data ) { 
                echo "<script>alert('Email déja utilisée !');</script>";
            } 
            else{
                ajouterUser($nom, $prenom, $email, $motdepasse, $session);

                header('location:index.php');
            }
        }else{
            echo "<script>alert('Les mots de passes ne correspondent pas  !');</script>";
        }
    }
}


 ?>