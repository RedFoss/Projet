<?php

/**
 *
 */
class Vehicule {
  private numImatriculation;
  private marque;
  private description;


public function __construct($donnee=array()){
     if(isset($donnee))$this->affect($valeurs);
  }
public function set_numImatriculation($valeurs){
   $this->numImatriculation=$valeurs;
}
public function set_marque($valeurs){
 $this->marque=$valeurs;
}
 public function setdescription($valeurs){
   $this->description=$valeurs;
 }

 public function getnumImatricution(){
  return $this->numImatriculation;
 }
 public function getmarque(){
   return $this->marque;
 }
 public function getdescription(){
   return $this->description;
 }

}

 ?>
