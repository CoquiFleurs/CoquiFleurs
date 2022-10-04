<?php

session_start();

require("config/commandes.php");

  $Produits=afficher();
  $Utilisateurs=afficherutilisateur();

  if(isset($_GET['searchbar']))
  {
    if (!empty($_GET['searchbar'])) 
    {
      $searchbar = $_GET['searchbar'];
    }
  } 
?>

<!doctype html>
<html lang="en"  class="h-100">
  <head>
    <meta charset="utf-8">
    <title>CoquiFleurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/zapfino-extra-lt" rel="stylesheet">
                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" sizes="32x32" href="image/Coquiv2.jpeg">


    
  </head>
  <body   class="d-flex flex-column h-100">
    
<header>
  <div class="navbar navbar-dark bg-yellow-200 shadow-sm">
    <div class=" row d-flex align-items-md-center ">
      <div class="col"></div>     
      <a href="index.php" class="navbar-brand d-flex align-items-center col-md-auto">
        <strong class="name text-Brown zapfino" >Coquifleurs</strong>
      </a>
      <form class="d-flex bg-yellow-200 col-md-auto">
        <input class="form-control me-2 text-LightSalmon " type="search" placeholder="Rechercher" aria-label="Search" name="searchbar">
        <button class="btn btn-outline bg-polar_seas didot" type="submit">Rechercher</button>
      </form>
      <div class="col-md-auto">
      <a href="inscription.php"><button type="button" class="btn btn-outline bg-polar_seas arrondi didot">S'inscrire</button></a>
      <a href="deconnexion.php"><button type="button" class="btn btn-outline bg-polar_seas arrondi didot"><?php if (!empty($_SESSION['idsession'])) {?>Se déconnecter <?php } ?> <?php if (empty($_SESSION['idsession'])) {?>Se connecter <?php } ?></button></a>
      </div>
      <?php if (!empty($_SESSION['idsession'])) {?>
      <div class="col-md-auto">
        <a href="panier.php" class="text-muted link">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
        </svg>
        <?php if (isset($_SESSION['panier'])){ ?>
          <span><?= array_sum($_SESSION['panier'])?></span>
        <?php } else{ ?>
        <span>0</span>
      <?php } ?>
        </a>
      </div>
    <?php } ?>
    </div>
  </div>
</header>

<main>
  <?php ?>
  <?php if (!empty($_SESSION['idsession'])) { foreach($Utilisateurs as $utilisateur) {
    if ($_SESSION['idsession'] ==  $utilisateur->session ) { ?>
      <div class="navbar navbar-dark bg-DirtyWhite shadow-sm">
        <div class="container">
      <h5 class="text-Brown didot">Connecté en tant que : <?= $utilisateur->prenom ?> <?= $utilisateur->nom ?></h5> 
    </div>
  </div>
<?php }}} ?>


  <div class="album py-5 bg-light didot">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php if (empty($searchbar)) { foreach($Produits as $produit): ?> 
        <div class="col">
          <div class="card shadow-sm">
             <div class="card-header bg-transparent bg-DirtyWhite"><p class=" size-title"><?= $produit->nom ?></p></div>
            <img src="Image/Bracelet/<?= $produit->image ?>" style="width: 24%">

            <div class="card-body">
              <p class="card-text"><?= substr($produit->description, 0, 160); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="produit.php?pdt=<?= $produit->id ?>"><button type="button" class="btn btn-sm bg-PaleGoldenrod">Voir plus</button></a>
                </div>
                <small class="text price"><?= $produit->prix ?> €</small>
              </div>
            </div>
          </div>
        </div>
  <?php endforeach; ?>
  <?php } ?>
  <?php if (!empty($searchbar)){ foreach($Produits as $produit){ if($produit->nom == $searchbar){ ?> 
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent bg-DirtyWhite"><p class=" size-title"><?= $produit->nom ?></p></div>
            <img src="Image/Bracelet/<?= $produit->image ?>" style="width: 24%">

            <div class="card-body">
              <p class="card-text"><?= substr($produit->description, 0, 160); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="produit.php?pdt=<?= $produit->id ?>"><button type="button" class="btn btn-sm bg-PaleGoldenrod">Voir plus</button></a>
                </div>
                <small class="text price"><?= $produit->prix ?> €</small>
              </div>
            </div>
          </div>
        </div>
<?php }}} ?>


      </div>
    </div>
  </div>

  <div class="didot">
    <p class="centered-element">Les pierres</p>
    <div class="container-pierre">
      <img src="Image/Pierres/amazonite.jpeg" alt="Amazonite" class="img_pierre_size">
      <img src="Image/Pierres/aventurine_verte.jpeg" alt="Aventurine Verte" class="img_pierre_size">
      <img src="Image/Pierres/citrine.jpeg" alt="Citrine" class="img_pierre_size">
      <img src="Image/Pierres/Cornaline.jpeg" alt="Cornaline" class="img_pierre_size">
      <img src="Image/Pierres/cristal_de_roche.jpeg" alt="Cristal de Roche" class="img_pierre_size">
      <img src="Image/Pierres/grenat.jpeg" alt="Grenat" class="img_pierre_size">
      <img src="Image/Pierres/hemanite.jpeg" alt="Hemanite" class="img_pierre_size">
      <img src="Image/Pierres/jade.jpeg" alt="Jade" class="img_pierre_size">
      <img src="Image/Pierres/jaspe_rouge.jpeg" alt="Jaspe Rouge" class="img_pierre_size">
      <img src="Image/Pierres/labradorite.jpeg" alt="Labradorite" class="img_pierre_size">
      <img src="Image/Pierres/lapis_lazuli.jpeg" alt="Lapis Lazuli" class="img_pierre_size">
      <img src="Image/Pierres/lepidolite.jpeg" alt="Lepidolite" class="img_pierre_size">
      <img src="Image/Pierres/obsidienne.jpeg" alt="Obsidienne" class="img_pierre_size">
      <img src="Image/Pierres/oeil_de_chat.jpeg" alt="Oeil de Chat" class="img_pierre_size">
      <img src="Image/Pierres/oeil_de_tigre.jpeg" alt="Oeil de Tigre" class="img_pierre_size">
      <img src="Image/Pierres/pierre_de_lune.jpeg" alt="Pierr de Lune" class="img_pierre_size">
      <img src="Image/Pierres/quartz_rose.jpeg" alt="Quartz Rose" class="img_pierre_size">
      <img src="Image/Pierres/rhodonite.jpeg" alt="Rhodonite" class="img_pierre_size">
      <img src="Image/Pierres/turquoise.jpeg" alt="Turquoise" class="img_pierre_size">

    </div>
  </div>

</main>
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
  </body>
  </html>

