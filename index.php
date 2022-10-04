<?php
	session_start();

	if (!isset($_SESSION['zWuppa7kiyut5gIYG54'])) {
		header("Location: ../login.php");
	}

	if (empty($_SESSION['zWuppa7kiyut5gIYG54'])) {
		header("Location: ../login.php");
	}

	require("../config/commandes.php");
?>

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<title>CoquiFleurs · Create</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><strong>CoquiFleurs</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style="font-weight: bold;">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Suppression</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="afficher.php">Produits</a>
        </li>
      </ul>
      <div style="display: flex; justify-content: flex-end;">
      	<a href="deconnexion.php" class=" btn btn-danger"> Se déconnecter</a>
      </div>
    </div>
  </div>
	</nav>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">La première image du produit</label>
    <input type="name" class="form-control" name="image" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">La deuxième image du produit</label>
    <input type="name" class="form-control" name="image2" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">La troisième image du produit</label>
    <input type="name" class="form-control" name="image3" required>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" name="nom"  required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="number" class="form-control" name="prix" required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" required></textarea>
  </div>

  <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
</form>

      </div></div></div>

    
</body>
</html>

<?php

	if(isset($_POST['valider']))
	{
		if (isset($_POST['image']) AND isset($_POST['image2']) AND isset($_POST['image3']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
		{
			if (!empty($_POST['image']) AND !empty($_POST['image2']) AND !empty($_POST['image3']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
			{
				$image = htmlspecialchars(strip_tags($_POST['image']));
        $image2 = htmlspecialchars(strip_tags($_POST['image2']));
        $image3 = htmlspecialchars(strip_tags($_POST['image3']));
				$nom = htmlspecialchars(strip_tags($_POST['nom']));
				$prix = htmlspecialchars(strip_tags($_POST['prix']));
				$desc = htmlspecialchars(strip_tags($_POST['desc']));

				try {
					ajouter($image, $image2, $image3, $nom, $prix, $desc);
				}	catch (Exception $e)
				{
					$e->getMessage();
				}

				
			}
		}
	}

?>