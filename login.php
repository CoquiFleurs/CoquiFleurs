<?php
session_start();
	if (isset($_SESSION['zWuppa7kiyut5gIYG54'])) {
		if (!empty($_SESSION['zWuppa7kiyut5gIYG54'])) {
			header("Location: admin/index.php");
		}
	}

	

	include "config/commandes.php";
	$Utilisateurs=afficherutilisateur();
?>
<!doctype html>
<html lang="en"  class="h-100">
  <head>
    <meta charset="utf-8">
    <title>Connexion - CoquiFleurs</title>
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
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">

					<form method="post">
		  				<div class="mb-3">
		    				<label for="email" class="form-label">Email</label>
		    				<input type="email" class="form-control" name="email" style="width: 80%" required>
		  				</div>
		  				<div class="mb-3">
		    				<label for="motdepasse" class="form-label">Mot de passe</label>
		    				<input type="password" class="form-control" name="motdepasse" style="width: 80%" required>
		  				</div>

		  				<input type="submit" class="btn bg-polar_seas" name="envoyer" value="Se connecter">
					</form>

				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

	</body>
</html>
<?php

if(isset($_POST['envoyer']))
{
	if (!empty($_POST['email']) AND !empty($_POST['motdepasse'])) { 
		$email = htmlspecialchars(filter_var($_POST['email']),FILTER_SANITIZE_EMAIL);
		$motdepasse = htmlspecialchars($_POST['motdepasse']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) { foreach($Utilisateurs as $utilisateur):{
			if ($email == $utilisateur->email) {
				if ($motdepasse == $utilisateur->motdepasse) {
					$admin = getAdmin($email, $motdepasse);

			if($admin)
			{
				$_SESSION['zWuppa7kiyut5gIYG54'] = $admin;
				$_SESSION['idsession']= $utilisateur->session;
				header("Location: admin/index.php");
			}

			elseif ($email AND $motdepasse){
				$_SESSION['idsession']= $utilisateur->session;
				header("Location: index.php");
			}
			}
				}

				



			
		}endforeach;
	}
} 
}

?>