<?php

/**
 *
 */
class Etudiant{

   private id;
   private Nom;
   private Prenom;
   private Telephone;
   private Mail;

public function __construct($donnee=array()){
     if(isset($donnee))$this->affect($valeurs);
  }
public function setid($valeur){
    $this->id=$valeur;
  }
  public function setNom($valeur){
    $this->Nom=$valeur;
  }
  public function setPrenom($valeur){
    $this->Prenom=$valeur;
  }
  public function setTelephone($valeur){
    $this->Telephone=$valeur;
  }
  public function setMail($valeur){
    $this->Mail=$valeur;
  }
  public function getid(){
      return $this->id;
  }
  public function getNom(){
    return $this->Nom;
  }
  public function getPrenom(){
    return $this->Prenom;
  }
  public function getTelephone(){
    return $this->Telephone;
  }
  public function getMail(){
    return $this->Mail;
  }
}



 ?>
