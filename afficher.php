<?php

	session_start();

	if (!isset($_SESSION['zWuppa7kiyut5gIYG54'])) {
		header("Location: ../login.php");
	}
	
	if (empty($_SESSION['zWuppa7kiyut5gIYG54'])) {
		header("Location: ../login.php");
	}

	require("../config/commandes.php");
	$Produits=afficher();
?>

<!DOCTYPE html>
<html>
  <head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	  <title>CoquiFleurs · Items</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a class="nav-link" aria-current="page" href="index.php">Nouveau</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="supprimer.php">Suppression</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="afficher.php" style="font-weight: bold;">Produits</a>
          </li>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
          </form>



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

          <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Images</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Description</th>
                <th scope="col">Editer</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($Produits as $Produit): ?>
              <tr>
                <th scope="row"><?= $Produit->id ?></th>
                <td>
                  <img src="../Image/Bracelet/<?= $Produit->image ?>" style="width: 18%;">
                  <img src="../Image/Bracelet/<?= $Produit->image2 ?>" style="width: 18%;">
                  <img src="../Image/Bracelet/<?= $Produit->image3 ?>" style="width: 18%;">
                </td>
                <td><?= $Produit->nom ?></td>
                <td style="fond-weight: bold; color: green;"><?= $Produit->prix ?> €</td>
                <td><?= substr($Produit->description, 0, 100); ?>...</td>
                <td>
                  <a href="editer.php?id=<?= $Produit->id ?>"><i class="fa fa-pencil" style="font-size: 150%;"></i></a>
                </td>
              </tr>

                <?php endforeach ?>
              </tbody>
            </table>

        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        </div>

      </div>
    </div>
  
  </body>
</html>