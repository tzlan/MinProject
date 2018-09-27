<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_init.inc.php");

    
// DEBUT du contrôleur lister.php
  //Ajouter au panier 
  if (isset($_GET['ref']))
  {
    $ref = $_GET['ref'];
    ajouterPanier($ref);
  }   

  $lafleur = lister();
  
// Construction de la page Lister
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vLister.php");
  include($repVues."pied.php") ;
  ?>
    
