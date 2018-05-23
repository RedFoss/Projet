/* 
Activité : jeu de devinette
*/

// NE PAS MODIFIER OU SUPPRIMER LES LIGNES CI-DESSOUS
// COMPLETEZ LE PROGRAMME UNIQUEMENT APRES LE TODO

console.log("Bienvenue dans ce jeu de devinette !");

// Cette ligne génère aléatoirement un nombre entre 1 et 100
var solution = Math.floor(Math.random() * 100) + 1;

// Décommentez temporairement cette ligne pour mieux vérifier le programme
//console.log("(La solution est " + solution + ")");

// TODO : complétez le programme
var nombreUtilisateur =Number(prompt("veuillez choisir un nombre entre 1 et 100"));


while(solution!=nombreUtilisateur){
		if (nombreUtilisateur<solution) {
			"".+"est trop petit";
		}
		else if (nombreUtilisateur>solution) {
			"".+"est plus grand";
		}
	}