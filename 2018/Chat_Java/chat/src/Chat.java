package chat;

/**
 *
 * @author avi
 */
import java.io.*;

public class Chat {
    
    private int id;
    private String nom;
    private String message;

    /**
     * @param args the command line arguments
     */
    
    public Chat(){
        id=0;
        nom="";
        message="";
    }
    
    public Chat(String unNom, String unMessage){
        nom = unNom;
        message = unMessage;
    }
    
    public Chat(int unId, String unNom, String unMessage){
        id = unId;
        nom = unNom;
        message = unMessage;
    }
    
    public int getId(){
        return id;
    }
    
    public String getNom(){
        return nom;
    }
    
    public String getMsg(){
        return message;
    }
}
