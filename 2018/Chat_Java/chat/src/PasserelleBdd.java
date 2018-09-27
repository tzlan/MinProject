package chat;

/**
 * @(#)PasserelleBdd.java
 *
 *
 * @author 
 * @version 1.00 2015/03/09
 */

// librairie pour utiliser les classes pour la base de données
import java.sql.*;
import java.util.*;


public class PasserelleBdd
{	
	// Méthode lireUs
	// Lecture de données dans la table Usager
	// Valeur retournée : liste des usagers
	 
        //static = a portee de classe
	public static ArrayList<Chat> lireChat() throws SQLException
	{ 
		String requete;	
		ResultSet rs  = null;
		boolean alire;		
		Chat unChat = null;               
                ArrayList<Chat> lesChats = new ArrayList<>();;
                              
		// Définition de la requête          
		requete = "select * from unchat;";
	
		// Lire les données dans la base de données
		Bdd laBdd = new Bdd();		
		rs = laBdd.lire(requete);
				
		// Avancer au premier enregistrement
		alire = rs.next();
		
		//Si il  ya un enregistrement à lire
		while (alire==true)
		{
			unChat = new Chat(rs.getInt(1),rs.getString(2),rs.getString(3));
                        lesChats.add(unChat);
			// Aller à l'enregistrement suivant
			alire = rs.next();
		}
		// Fermeture du jeu d'enregistrements
		rs.close();
	
		return lesChats;
	}	
	
	// Méthode modifChat
	// Modification de données dans la table unchat
	// Paramètres :
	// - Type de la modification : char typeModif
	// 		'A' : ajouter
        //               A rajouter selon besoin...
	// Valeur retournée : 1 si modification effectuée, 0 sinon

	public static int modifChat(char typeModif, Chat C) throws SQLException
	{
            String requete = null;
            int res;
            int unId;
            String unNom, unMessage;
            unNom=C.getNom();
            unMessage=C.getMsg();

            switch (typeModif)
            {
                case 'A' : // Ajouter
                      requete = "INSERT INTO unchat(nom, message)VALUES('"+unNom+"','"+unMessage+"')";	
                      break;
                default : // Erreur
                      break;
            }
            Bdd laBdd = new Bdd();		
            res = laBdd.modif(requete);
            return res;
	}
        
       // On ne garde pas l'historique des chats ! 
        public static int truncate() throws SQLException
	{
            int res;
            Bdd laBdd = new Bdd();		
            // Sert a supprimer tous les elements d'une table sans supprimer la table
            res = laBdd.modif("TRUNCATE table unchat");
            return res;
	}
}