<?php
@ob_start();
session_start();

/** 
 * Initialise les ressources nécessaires au fonctionnement de l'application
 * @package default
 * @todo  RAS
 */

  require("_bdGestionDonnees.lib.php");
  require("_gestionPanier.lib.php");
  require("_gestionSession.lib.php");
  require("_utilitairesEtGestionErreurs.lib.php");
  
  // initialement, aucune erreur ...
  $tabErreurs = array();
    
?>
