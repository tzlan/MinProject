package chat;

/**
 *
 *
 * @author 
 * @version 1.00 2015/03/09
 */

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.ResultSet;
import java.sql.Statement;


class Bdd
{
	Connection connection;
	String nom; // Nom de la base

	public Bdd()
	{
		 connection = null;
		 nom="chat";
			
	}

	// Connexion a la base de donnees
	private Connection ouvrir () 
	{
    	try
        {
			// Chargement des drivers SQL
			Class.forName ("org.gjt.mm.mysql.Driver").newInstance();
		}
		catch (ClassNotFoundException a)
		{
			System.out.println ("Driver non trouve");
		}
		catch (Exception b)
		{      
			System.out.println ("Probleme de chargement de driver");			
		}

		try
        {		
			// Etablissement de la connexion avec la base
			connection = DriverManager.getConnection ("jdbc:mysql://127.0.0.1/"+nom, "root", "");
		}
		catch (SQLException c)
		{	
			System.out.println ("Connexion refusee ou base inconnue");
		}
		catch (Exception d)
		{
			System.out.println ("Probleme de connexion");		
		}
		return connection;
	}


	// Fermer la connexion à la base
	private void fermer()
	{
		try
		{
			// Fermeture de la connexion
			connection.close();
		}
		catch (Exception d)
		{
			System.out.println ("Problème à la fermeture de la connexion");	
		}
	}
	
	// Obtenir le ResultSet correspondant la requete passe en parametres
	public ResultSet lire(String requete) throws SQLException
	{
		Connection cnx;		
		ResultSet rs  = null;
	
		// Ouverture d'une connexion a la base
		cnx = ouvrir();
		
		// Si la connexion a réussi
		if (cnx!=null)
		{			
			// Création d'un objet de classe Statement permettant
			// de transmettre une requete a la base
			Statement stmt = cnx.createStatement();
								
			// Execution de la requete et recuperation 
			// du resultat dans un jeu d'enregistrements
			rs = stmt.executeQuery(requete);
		
			// fermeture de la connexion
			// laBdd.fermer();
		}
		return rs;
	}
	

	// Méthode modif
	// Paramètre : requete de modification (Insert, Update ou Delete)
	// Valeur retournee : 1 si modification effectuee, 0 sinon
	
	public int modif(String requete) throws SQLException
	{
		Connection cnx;
		int res;
		
		res = 0;		

		// Ouverture d'une connexion a la base
		cnx = ouvrir();

		// Si la connexion a reussi
		if (cnx!=null)
		{
			// Creation d'un objet de classe Statement permettant
			// de transmettre une requete a la base
			Statement stmt = cnx.createStatement();	
		
			// Trace de la requete
			// System.out.println("Requete : "+requete);
			
			// Exécution de la requete 
			try {
				res = stmt.executeUpdate(requete);
			    }
			catch (Exception e) {
				// Problemes tels que :
				// - valeur de cle primaire deja existante
			    // System.out.println("Probleme d'execution !");
			    //affichage de la pile d'exceptions :
			    // e.printStackTrace();
				}
		
			// fermeture de la connexion
			fermer();
		}		
		return res;	
	}	

	
}