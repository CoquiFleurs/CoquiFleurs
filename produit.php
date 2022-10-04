<?php

session_start();

require("config/commandes.php");

$Produits=afficher();
$Utilisateurs=afficherutilisateur();

if(isset($_GET['pdt'])){
    
    if(!empty($_GET['pdt']) OR is_numeric($_GET['pdt']))
    {
        $id = $_GET['pdt'];

    }
}

?>

<!doctype html>
<html lang="en"  class="h-100">
  <head>
    <meta charset="utf-8">
    <?php foreach($Produits as $produit){ if($produit->id == $id){ ?> 
    <title><?= $produit->nom ?> - CoquiFleurs</title>
    <?php }} ?>
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
      <form class="d-flex bg-yellow-200 col-md-auto">
        <input class="form-control me-2 text-LightSalmon " type="search" placeholder="Rechercher" aria-label="Search" name="searchbar">
        <button class="btn btn-outline bg-PaleGoldenrod " type="submit">Rechercher</button>
      </form>
      <div class="col-md-auto">
      <a href="inscription.php"><button type="button" class="btn btn-outline bg-PaleGoldenrod arrondi">S'inscrire</button></a>
      <a href="deconnexion.php"><button type="button" class="btn btn-outline bg-PaleGoldenrod arrondi"><?php if (!empty($_SESSION['idsession'])) {?>Se déconnecter <?php } ?> <?php if (empty($_SESSION['idsession'])) {?>Se connecté <?php } ?></button></a>
      </div>
      <div class="col-md-auto">
        <a href="panier.php" class="text-muted">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
        </svg>
        </a>
      </div>
    </div>
  </div>
</header>

<main>

<div class="album py-5 bg-light">
<div class="container" style="display: flex; justify-content: center">

    <div class="row">
<div class="col-md-2"></div>
<?php foreach($Produits as $produit){ if($produit->id == $id){ ?> 
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="card-header bg-transparent bg-DirtyWhite"><h5 class="card-title"><?= $produit->nom ?></h5></div>
                    <div class="col-md-4">
                        <div class="lesImg ">
                            <img src="Image/Bracelet/<?= $produit->image ?>"  class="img-fluid rounded-start diapo">
                            <img src="Image/Bracelet/<?= $produit->image2 ?>"  class="img-fluid rounded-start diapo">
                            <img src="Image/Bracelet/<?= $produit->image3 ?>"  class="img-fluid rounded-start diapo">
                            <button class="BTN gauche" onclick="dplcmt(-1)"></button>
                            <button class="BTN droit" onclick="dplcmt(1)"></button>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><?= $produit->description ?></p>
                            <p class="card-text text-right" style="font-weight: bold; font-size: 36px;"align="right"><?= $produit->prix ?> €</p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent bg-DirtyWhite">
                        <div >
                        <a href="ajouter_panier.php?pdt=<?= $produit->id ?>"><button type="button" class="btn bg-Rose">Ajouter au panier</button></a>
                        <a href="index.php"><button type="button" class="btn bg-Beige">Retour</button></a>
                    </div>
                </div>
                </div>
            </div>
            </div>
<?php }} ?>

<div class="col-md-2"></div>
    </div>
</div>
</div>

</main>
<script type="text/javascript" language="javascript">
    var position = 1;
    afficherPhoto(position);

    function dplcmt(n){

        afficherPhoto(position += n);
    }

    function afficherPhoto(n){
        var i;
        var x = document.getElementsByClassName("diapo");
        for (i = 0; i < x.length; i++) {
            x[i].style.display="none";

        }

        if (n>x.length) {position = 1}
        if (n<1) {position = x.length}

        x[position-1].style.display="block";
    }
</script>
</body>
<footer class="footer mt-auto py-3 bg-light text-center text-sm-left">
  <div class="container">
    <ul class="bd-footer-links">
      <li class="list-unstyled">
        <a href="https://www.instagram.com/CoquiFleurs/" class="text-muted">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
          </svg>
        </a>
      </li>
    </ul>
  </div>
  </footer>
</html>