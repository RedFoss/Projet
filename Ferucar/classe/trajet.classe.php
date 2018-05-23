<?php
class Trajet{
  private idTrajet;
  private idCampus;
  private idEtudiant;
  private horaire;


  public function __construct($donnee=array()){
       if(isset($donnee))$this->affect($valeurs);
    }

  public  function setidTrajet($valeurs){
    $this->idTrajet=$valeurs;
  }
  public function setidCampus($valeurs){
    $this->idCampus=$valeurs;
  }
  public function setidEtudiant($valeurs){
    $this->idEtudiant=$valeurs;
  }
  public function sethoraire($valeurs){
    $this->horaire=$valeurs;
  }
  public function getidTrajet(){
    return $this->idTrajet;
  }
  public function getidCampus(){
    return $this->idCampus;
  }
  public function getidEtudiant(){
    return $this->idEtudiant;
  }
  public function gethoraire(){
    return $this->horaire;
  }
}
 ?>
