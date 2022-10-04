<?php 

   session_start();

   include_once "con_dbb.php";



   //supprimer les produits

   //si la variable del existe

   if(isset($_GET['del'])){

    $id_del = $_GET['del'] ;

    //suppression

    unset($_SESSION['panier'][$id_del]);

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

    <link rel="icon" type="image/png" sizes="32x32" href="image/Coqui.ico">


    
  </head>
<body   class="d-flex flex-column h-100 didot">
    
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

    </div>
  </div>
</header>
<?php 
    if (isset($_SESSION['panier'])) { ?>
        <section>

            <table class="table">

                <tr>

                    <th></th>

                    <th>Nom</th>

                    <th>Prix</th>

                    <th>Quantité</th>

                    <th>Action</th>

                </tr>

                <?php 


                    
                  $total = 0 ;

                  // liste des produits

                  //récupérer les clés du tableau session

                  $ids = array_keys($_SESSION['panier']);

                  //s'il n'y a aucune clé dans le tableau

                  if(empty($ids)){

                    echo "Votre panier est vide";

                  }else {

                    //si oui 

                    $products = mysqli_query($con, "SELECT * FROM produits WHERE id IN (".implode(',', $ids).")");



                    //lise des produit avec une boucle foreach

                    foreach($products as $product):

                        //calculer le total ( prix unitaire * quantité) 

                        //et aditionner chaque résutats a chaque tour de boucle

                        $total = $total + $product['prix'] * $_SESSION['panier'][$product['id']] ;

                    ?>

                    <tr>

                        <td class="colimage"><img src="Image/Bracelet/<?=$product['image']?>" style="width: 24%"></td>

                        <td><?=$product['nom']?></td>

                        <td><?=$product['prix']?>€</td>

                        <td><?=$_SESSION['panier'][$product['id']] // Quantité?></td>

                        <td><a href="panier.php?del=<?=$product['id']?>"><img src="Image/delete.png" style="width: 3%;"></a></td>

                    </tr>



                <?php endforeach ;} ?>



                <tr class="total">

                    <th>Total : <?=$total?>€</th>

                </tr>

            </table>

        </section>
    <?php } else {?>
    <p>Panier vide.</p>
<?php } ?>
</body>

</html>