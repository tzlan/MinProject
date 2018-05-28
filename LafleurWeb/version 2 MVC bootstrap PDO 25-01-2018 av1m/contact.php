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
  // L'utilisateur a choisi contact dans le menu
  $etape = 1;
}
else
{
  /* L'utilisateur a entre les informations pour contacter 
   * On recupere les informations saisit par l'utilisateur 
   */
  $etape = 2;
  $unNom = $_POST["nom"];
  $unMail = $_POST["mail"];
  $unMsg = $_POST["msg"];

  /* On envoie le mail
   * Afin d'envoyer le mail on a modifier le fichier php.ini et on a rajouter le dossier C:\wamp64\sendmail
   */ 
  $to      = 'avimimoun2109@gmail.com';
  $subject = 'Contact client Lafleur';
  $message = "'".$unNom."' vous a envoye un message. Vous pouvez le joindre a l'adresse suivante '".$unMail."'. Son message est le suivant : '".$unMsg."' ";
  $headers = 'From: expendomjna@gmail.com' . "\r\n" .
      'Reply-To: expendomjna@gmail.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  $ok = mail($to, $subject, $message, $headers);
  //$ok = mail("avimimoun2109@gmail.com", "Hey", "Bonjour");
  if ($ok){
    echo "ok";
  }
  else {
    echo "erreur";
  }


}

// Construction de la page Identifier
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");

if ($etape==1){
  include($repVues."vContact.php");
}
include($repVues."pied.php") ;

?>