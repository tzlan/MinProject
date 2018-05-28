<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_init.inc.php");
    

// DEBUT du contrôleur modifier.php

if (count($_POST)==0)
{
  $etape = 1;
}
if (count($_POST)==1)
{
  $etape=2;
  $uneRef=$_POST["ref"];
  $lafleur = rechercherRef($uneRef, $tabErreurs);
}
if (count($_POST)>=2)
{
  $etape = 3;
  $uneRef=$_POST["ref"];
  $uneDes=$_POST["des"];
  $unPrix=$_POST["prix"];
  $uneImage=$_POST["image"];
  $uneCat=$_POST["cat"];
  modifier($uneRef, $uneDes, $unPrix, $uneImage, $uneCat, $tabErreurs);
}

// Début de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
if ($etape==1)
{
  include($repVues."vModifierRef.php");
}
if ($etape==2)
{
  include($repVues."vModifier.php");  
}
include($repVues."pied.php");
?>
  
