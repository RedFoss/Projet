<?php

class Campus{

 private idCampus;
 private Nom;
 private Adresse;
 private CodePostal;
 private Complément;

 public function __construct($donnee=array()){
      if(isset($donnee))$this->affect($valeurs);
   }

public function setidCampus($valeurs){
  $this->idCampus=$valeurs;
}1
public function setNom($valeurs){
    $this->Nom=$valeurs;
}
  public function setAdresse($valeurs){
    $this->Adresse=$valeurs;
  }
  public function setCodePostal($valeurs){
    $this->CodePostal=$valeurs;
  }
  public function setComplement($valeurs){
    $this->Complément=$valeurs;
  }

  public function getidCampus(){
    return $this->idCampus;
  }
  public function getNom(){
    return $this->Nom;
  }
  public function getAdresse(){
    return $this->Adresse;
  }
  public  function getCodePostal(){
    return $this->CodePostal;
  }
  public function getComplément(){
    return $this->Complément;
  }
}





 ?>
