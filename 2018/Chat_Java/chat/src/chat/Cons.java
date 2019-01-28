package chat;

// classe Cons : saisies au clavier

import java.io.*;

public class Cons {

	public	static int saisirEntier() throws IOException{  // Contient des exceptions de type INPUT OUTPUT
	
		InputStreamReader lecteur = new InputStreamReader(System.in);
		BufferedReader entree = new BufferedReader(lecteur);
	
		String texte;
		Integer x;
                int res = 0;

		boolean saisie_ok = false; 
		while (saisie_ok == false) {
			try {
				texte = entree.readLine();
				x = new Integer(texte);
                                res = x.intValue();
			}
			catch (Exception e) {
				System.out.println("Vous n'avez pas saisi un entier !!");
				// affichage de la pile d'exceptions
				// e.printStackTrace();
			}
		}
		
		return(res);		
	} 

	public	static float saisirReel() throws IOException{
	
		InputStreamReader lecteur = new InputStreamReader(System.in);
		BufferedReader entree = new BufferedReader(lecteur);
	
		String texte;
		Float x;
		
		texte = entree.readLine();
		x = new Float(texte);
		
		return(x.floatValue());	
	}

	public	static String saisirChaine() throws IOException{
	
		InputStreamReader lecteur = new InputStreamReader(System.in);
		BufferedReader entree = new BufferedReader(lecteur);
	
		String texte;
		Float x;
		
		texte = entree.readLine();
		
		return(texte);	
	} 
}