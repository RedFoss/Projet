 var prixHT = Number(prompt("Entrez le prix HT :"));



//Calcul du prix TTC
var tauxTVA = 19.6/100;
var prixTTC = prixHt * (1+ tauxTVA);



 console.log("Le prix TTC est de" + prixHt + "euros");