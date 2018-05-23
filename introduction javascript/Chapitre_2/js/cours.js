var a =3.14;
console.log(a);


var b = 0;
b += 1;
b++;
console.log(b);

/*c  a pour valeur 3*/
var c =3;

/*La variable d aura la valeur c*/
var d = c;
// (d+1) est une exppression
// La valeur est celle de d augmentée de 1 (ici 4)
d= d + 1;//	d contient la valeurs de 4 

console.log(d);//Affiche 4



var e = 3+2*4;//e contient la valeur 11;
e =(3+2)*4;// e contient la valeur 20

console.log(e);


var f = 100;
console.log("La variable f contient la valeur"+f);

var h = "5";
console.log(h + 1);//Concaténation : affiche la chaîne "51"

h=Number("5");

console.log(h+1); //Addition numérique: affiche le nombre 6