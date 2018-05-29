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
  if (count($_POST)==0)
  {
    $etape=1;
  }
  else
  {
    $etape=2;
    $lib=$_POST["lib"];    
    $lafleur=rechercher($lib, $tabErreurs);    
  }
  
  // Construction de la page Lister
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  if ($etape==1)
  {
      include($repVues."vRechercher.php");  
  }
  if ($etape==2)
  {
      include($repVues."vLister.php");
  }
  
  include($repVues."pied.php") ;
  ?>
    
