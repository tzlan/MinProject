<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Identifier"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  


if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $nom=$_POST["username"];
  $password=$_POST["password"];
  // Identifier l'utilisateur
  $log = connecter($nom, $password, $tabErreurs);
  // Si l'identification est r�ussie (les informations utilisateur sont fournies 
  // sous forme de tableau)
  if (is_array($log)) 
  { 
      affecterInfosConnecte($log["id"], $log["nom"], $log["cat"]);
  }
  else 
  {
      ajouterErreur($tabErreurs, "Username et/ou password incorrects");
  }

  if ( nbErreurs($tabErreurs) == 0 ) 
  {
   header("Location:index.php");
  }
}

// Construction de la page Identifier
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");

if ($etape==1 or $etape==2){
  include($repVues."vConnecter.php");
}
else {
  include($repVues."vForgot.php");
}

if (nbErreurs($tabErreurs)!=0) {
  $etape=3;
  ?>
  <div class="container" align="center">
  <a href="forgot.php" class="btn btn-link" type="button" name="forgot">Mot de passe oublie ?</a>
  </div> 
  <?php
}
include($repVues."pied.php") ;

?>