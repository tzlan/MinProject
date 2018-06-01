/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author avi
 */
public class Client {
    // Attributs
    private int identifiant;
    private String nom;
    private int age;
    // Methodes
    public Client(){
        identifiant = 0;
        nom = "";
        age=0;
    }
    
    public Client(int unId, String unNom, int unAge){
        identifiant = unId;
        nom = unNom;
        age = unAge;
    }
    
    public int getAge(){
        return age;
    }
    
    public String getNom(){
        return nom;
    }
    
    public int getId(){
        return identifiant;
    }
    
    public void setAge(int unAge){
        age = unAge;
    }
    
    public void setIdentifiant(int unId){
        identifiant = unId;
    }
    
    public void setNom(String unNom){
        nom = unNom;
    }
    
    public void afficher(){
        System.out.println("Identifiant : "+identifiant+"\nNom : "+nom+"\nAge : "+age+"\n");
    }
}
