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
	public static ArrayList<Produit> lireProd() throws SQLException
	{ 
		String requete;	
		ResultSet rs  = null;
		boolean alire;		
		Produit unProd;               
                ArrayList<Produit> lesProds;
                	
		unProd = new Produit();
                lesProds = new ArrayList<>();
                              
		// Définition de la requête          
		requete = "select * from produit;";
	
		// Lire les données dans la base de données
		Bdd laBdd = new Bdd();		
		rs = laBdd.lire(requete);
				
		// Avancer au premier enregistrement
		alire = rs.next();
		
		//Si il  ya un enregistrement à lire
		while (alire==true)
		{
			unProd = new Produit(rs.getInt(1),rs.getString(2),rs.getFloat(3),rs.getInt(4));
                        lesProds.add(unProd);
			// Aller à l'enregistrement suivant
			alire = rs.next();
		}
		// Fermeture du jeu d'enregistrements
		rs.close();
	
		return lesProds;
	}
        
        
        
        public static ArrayList<Client> lireCli() throws SQLException{
            String requete;	
		ResultSet rs  = null;
		boolean alire;		
		Client unClient;               
                ArrayList<Client> lesClients;
                	
		unClient = new Client();
                lesClients = new ArrayList<>();
                              
		// Définition de la requête          
		requete = "select * from client;";
	
		// Lire les données dans la base de données
		Bdd laBdd = new Bdd();		
		rs = laBdd.lire(requete);
				
		// Avancer au premier enregistrement
		alire = rs.next();
		
		//Si il  ya un enregistrement à lire
		while (alire==true)
		{
			unClient = new Client(rs.getInt(1),rs.getString(2),rs.getInt(3));
                        lesClients.add(unClient);
			// Aller à l'enregistrement suivant
			alire = rs.next();
		}
		// Fermeture du jeu d'enregistrements
		rs.close();
	
		return lesClients;
        }
		
	
	// Méthode modifUs
	// Modification de données dans la table Usager
	// Paramètres :
	// - Type de la modification : char typeModif
	// 		'A' : ajouter
	//		'M' : modifier
	//		'S' : supprimer	
	// - Usager à modifier : Usage U
	// Valeur retournée : 1 si modification effectuée, 0 sinon

	public static int modifProd(char typeModif, Produit P) throws SQLException
	{
            String requete = null;
            int res;
            int unId;
            String unLib;
            float unPrix;
            int unStk;

            unId=P.getId();
            unLib=P.getLib();
            unPrix=P.getPrix();
            unStk=P.getStock();

            switch (typeModif)
            {
                case 'A' : // Ajouter
                      requete = "INSERT INTO produit(id, lib, pu, qte)VALUES("+unId+",'"+unLib+"',"+unPrix+","+unStk+")";	
                      break;
                case 'M' : // Modifier
                        requete = "UPDATE produit SET lib = '"+unLib+"', pu = "+unPrix+", qte = "+unStk+" WHERE id = "+unId+";";
                case 'S' :
                        requete = "DELETE FROM produit WHERE id = "+P.getId()+";";
                default : // Erreur
                      break;
            }
            Bdd laBdd = new Bdd();		
            res = laBdd.modif(requete);
            return res;
	}
        
        
        
        
        /*public static int supprimerProd(int id) throws SQLException
	{
            String requete;
            ResultSet rs = null;
            boolean alire;
            Produit unProd;
            int res = 0;

            requete = "DELETE FROM produit WHERE id = "+id+";";
            Bdd laBdd = new Bdd();		
            res = laBdd.modif(requete);		
            return res;
	}*/
	
        
        
        
        // Méthode modifCli
	// Modification de données dans la table Usager
	// Paramètres :
	// - Type de la modification : char typeModif
	// 		'A' : ajouter
	//		'M' : modifier
	//		'S' : supprimer	
	// - Usager à modifier : Usage U
	// Valeur retournée : 1 si modification effectuée, 0 sinon

	public static int modifCli(char typeModif, Client C) throws SQLException
	{
            String requete = null;
            int res;
            int unId = C.getId();
            String unNom = C.getNom();
            int unAge = C.getAge();
            
            switch (typeModif)
            {
                case 'A' : // Ajouter
                      requete = "INSERT INTO client(identifiant, nom, age)VALUES("+unId+",'"+unNom+"',"+unAge+")";	
                      break;
                case 'M' : // Modifier
                        requete = "UPDATE produit SET nom = '"+unNom+"', age = "+unAge+", WHERE id = "+unId+";";
                case 'S' :
                        requete = "DELETE FROM produit WHERE id = "+C.getId()+";";
                default : // Erreur
                      break;
            }
            Bdd laBdd = new Bdd();		
            res = laBdd.modif(requete);
            return res;
	}
        
        
        
        
        
	public static Produit rechercherProd(int id) throws SQLException
	{
            String requete;	
            ResultSet rs  = null;
            boolean alire;		
            Produit unProd;               
            ArrayList<Produit> lesProds;

            unProd = new Produit();
            lesProds = new ArrayList<>();

            // Définition de la requête          
            requete = "select * from produit where id="+id+";";

            // Lire les données dans la base de données
            Bdd laBdd = new Bdd();		
            rs = laBdd.lire(requete);

            // Avancer au premier enregistrement
            alire = rs.next();

            //Si il  ya un enregistrement à lire
            if (alire==true)
            {
                    unProd = new Produit(rs.getInt(1),rs.getString(2),rs.getFloat(3),rs.getInt(4));

                    // Aller à l'enregistrement suivant
                    alire = rs.next();
            }
            // Fermeture du jeu d'enregistrements
            rs.close();

            return unProd;
	}
        
        
        public static float rechercherPxMax() throws SQLException
	{
            String requete;
            float prixMax = 0; 
            ResultSet rs  = null;
            boolean alire;		
            Produit unProd;               
            ArrayList<Produit> lesProds;

            unProd = new Produit();
            lesProds = new ArrayList<>();

            // Définition de la requête          
            requete = "SELECT MAX(pu) FROM produit";

            // Lire les données dans la base de données
            Bdd laBdd = new Bdd();		
            rs = laBdd.lire(requete);

            // Avancer au premier enregistrement
            alire = rs.next();

            //Si il  ya un enregistrement à lire
            if (alire==true)
            {
                    prixMax = rs.getFloat(1);
                    // Aller à l'enregistrement suivant
                    alire = rs.next();
            }
            // Fermeture du jeu d'enregistrements
            rs.close();

            return prixMax;
	}
}