<?php 
session_start();
include_once "con_dbb.php";

if (!isset($_SESSION['idsession'])) {
 	echo "<script>alert('Utilisateur non connecter, veuillez vous connecter ou vous inscrire.');</script>";
 }

if(!isset($_SESSION['panier'])){

    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 

    $_SESSION['panier'] = array();

 }


// Récupération de l'id du produit dans le lien

if (isset($_GET['pdt'])) { //Si un id a été envoyé alors :
	$id = $_GET['pdt'];
	// Verif garce a l'id si le produit existe dans la base de données:
	$produit = mysqli_query($con , "SELECT * FROM produits WHERE id = $id");
	if(empty(mysqli_fetch_assoc($produit))){
		//Si ce produit n'existe pas
		die("Ce produit n'existe pas");
	}
	//Ajouter le produit dans le panier (Le tableau)
	if (isset($_SESSION['panier'][$id])) {
		//Si le produit est déja dans le panier
		$_SESSION['panier'][$id] ++;
		header("Location: index.php");
	}else{
		//Si non on ajoute le produit
		$_SESSION['panier'][$id]=1;
		header("Location: index.php");

	}






}

 ?>