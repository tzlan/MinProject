<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_init.inc.php");
    

// DEBUT du contrôleur panier.php

//Si on clique sur le bouton "Supprimer du panier"
if (isset($_GET["ref"])) {
    supprimerPanier($_GET["ref"]);
}

/*Recuperer tout les $_GET,
 *Rechercher la reference,
 *Ajoute dans un tableau de fleurs (grace à la reference)
*/
$lafleur = array();
if (comptePanier()>0) {
	$panier = obtenirPanier();
	$i = 0;
	while ($i < comptePanier()) {
		$lafleur[$i] = rechercherRef($panier[$i], $tabErreurs);
		$i = $i + 1;
	}
}

if(isset($_POST['vider'])){
	viderPanier();
}

// Début de l'affichage (les vues)
include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
include($repVues."vPanier.php");
include($repVues."pied.php");

?>
  
