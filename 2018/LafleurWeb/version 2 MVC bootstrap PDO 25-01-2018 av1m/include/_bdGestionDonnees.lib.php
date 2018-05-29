<?php

// FONCTIONs POUR L'ACCES A LA BASE DE DONNEES
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='baseLafleur1'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter

    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);

    return $connect;
}

function lister()
{
    $connexion = connecterServeurBD();
   
    $requete="select * from produit";
    
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    $i = 0;
    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $fleur[$i]['image']=$ligne['pdt_image'];
        $fleur[$i]['ref']=$ligne['pdt_ref'];
        $fleur[$i]['designation']=$ligne['pdt_designation'];
        $fleur[$i]['prix']=$ligne['pdt_prix'];
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $fleur;
}


function ajouter($ref, $des, $prix, $image, $cat,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from produit";
    $requete=$requete." where pdt_ref = '".$ref."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : la référence existe déjà !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into produit"
       ."(pdt_ref,pdt_designation,pdt_prix,pdt_image, pdt_categorie) values ('"
       .$ref."','"
       .$des."',"
       .$prix.",'"
       .$image."','"
       .$cat."');";
     
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requête a réussi
        if ($ok)
        {
          $message = "La fleur a été correctement ajoutée";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout de la fleur a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 
      }
}

function supprimer($ref,&$tabErr)
{
      $connexion = connecterServeurBD();
      $requete="select * from produit";
      $requete=$requete." where pdt_ref = '".$ref."';"; 
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
      $ligne = $jeuResultat->fetch();
      
      if ($ligne)
      {
        $requete="DELETE FROM `produit` WHERE produit . pdt_ref ='$ref'";
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si la requête a réussi
        if ($ok)
        {
          $message = "La fleur a été correctement supprimée";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la supression de la fleur a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 
      }
      else
      {
        $message="Echec de la supression : la référence n'existe pas !";
        ajouterErreur($tabErr, $message);
      }
} 

function rechercher($lib, &$tabErr) {
  $connexion = connecterServeurBD();
  $fleur=array();
  $requete = "SELECT * FROM `produit` WHERE `pdt_designation` LIKE'%".$lib."%';";
  /* query renvoie un jeu d'enregistrement (un paquet), le JeuResultat est utilisable qu'avec le fetch 
    Meme logique qu'avec une collection, il faut prendre chaque ligne */
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant     
  $i = 0;
  $ligne = $jeuResultat->fetch();  // fetch() sert à mettre le curseur à la ligne suivante.
  // On extrait ligne par ligne pour pouvoir l'utiliser 
  while($ligne)
  {
      /* Ici le    pdt_image       pdt_image     pdt_designation       pdt_prix         
          correspondent au nom que l'on a donne dans la BDD */ 
      $fleur[$i]['image']=$ligne['pdt_image']; // On cherche dans la ligne extraite à la position pdt_image  
      $fleur[$i]['ref']=$ligne['pdt_ref'];
      $fleur[$i]['designation']=$ligne['pdt_designation'];
      $fleur[$i]['prix']=$ligne['pdt_prix'];
      $ligne=$jeuResultat->fetch();
      $i = $i + 1;
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat, pour liberer les ressources 
  return $fleur;
}   

function rechercherRef($ref, &$tabErr) {
	$connexion = connecterServeurBD();
  $fleur=array();
  $requete = "SELECT * FROM `produit` WHERE `pdt_ref` = '".$ref."';";
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant     
  $ligne = $jeuResultat->fetch();  // fetch() sert à mettre le curseur à la ligne suivante.
  $i=0;
    // On extrait ligne par ligne pour pouvoir l'utiliser 
  if($ligne)
  {
        /* Ici le    pdt_image       pdt_image     pdt_designation       pdt_prix correspondent au nom que l'on a donne dans la BDD */ 
      $fleur['image']=$ligne['pdt_image']; // On cherche dans la ligne extraite à la position pdt_image  
      $fleur['ref']=$ligne['pdt_ref'];
      $fleur['designation']=$ligne['pdt_designation'];
      $fleur['prix']=$ligne['pdt_prix'];
      $fleur['categorie']=$ligne['pdt_categorie'];
      $ligne=$jeuResultat->fetch();
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat, pour liberer les ressources 
  return $fleur;
}


function modifier($ref, $des, $prix, $image, $cat,&$tabErr) {
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Vérifier que la référence saisie n'existe pas déja
  $requete="select * from produit";
  $requete=$requete." where pdt_ref = '".$ref."';";  
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  
  $ligne = $jeuResultat->fetch();
  if($ligne)
  {
     // Créer la requête d'ajout 
     $requete="UPDATE produit
            SET `pdt_designation` = '".$des."', `pdt_prix` = ".$prix.", `pdt_image` = '".$image."', `pdt_categorie` = '".$cat."'
            WHERE `pdt_ref` = '".$ref."';"; 
      // Lancer la requête d'ajout 
      $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
        
      // Si la requête a réussi
      if ($ok)
      {
        $message = "La fleur a été correctement mis à jour";
        ajouterErreur($tabErr, $message);
      }
      else
      {
        $message = "Attention, la mise a jour de la fleur a échoué !!!";
        ajouterErreur($tabErr, $message);
      } 
  }
  else
  {
      $message="Echec de la modification : la référence n'existe pas !";
      ajouterErreur($tabErr, $message);
  }
}       
   



function connecter($nom, $mdp,&$tabErr) {
  
  // Initialisation de l'identification a échec
    $ligne = false;

  // Ouvrir une connexion au serveur mysql en s'identifiant
   $connexion = connecterServeurBD();
  
  // Vérifier que nom et login existent
    $requete="select * from utilisateur where nom ='".$nom."' and mdp ='".md5($mdp)."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    
    $ligne = $jeuResultat->fetch();

    if($ligne)
    {
  // identification réussie
    }
    else
    {
      $message = "Echec de l'identification !!!";
      ajouterErreur($tabErr, $message);
    }
   
  
  // renvoyer les informations d'identification si réussi
    return $ligne;
}         



function signup($nom, $mdp, &$tabErr)
{
  $connexion = connecterServeurBD();
  $requete = "INSERT INTO `utilisateur`(`nom`, `mdp`, `cat`) VALUES ('".$nom."', '".md5($mdp)."', 'client');";
  $jeuResultat = $connexion->query($requete);
  if ($jeuResultat) {
    $message = "Votre compte a bien ete cree";
    ajouterErreur($tabErr, $message);
  }
  else {
    $message = "Erreur lors de la création du compte";
    ajouterErreur($tabErr, $message);
  }
}


?>
