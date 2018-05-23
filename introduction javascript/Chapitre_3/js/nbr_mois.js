var nbr =Number(prompt("Veuillez sélectionnez un nombre correspondant à un mois:"));

switch(nbr){
	case "1":
		console.log("Vous avez sélectionné le mois de Janvier comportant 31 jours");
	 	break;
	case "2":
		console.log("Vous avez sélectionné le mois de Février comportant 28 jours");
		break;
	case "3":
		console.log("Vous avez sélectionné le mois de Mars comportant 31 jours");
	 	break;
	 case "4":
		console.log("Vous avez sélectionné le mois de Avril comportant 30 jours");
	 	break;
	 case "5":
		console.log("Vous avez sélectionné le mois de Mai comportant 31 jours");
	 	break;
	 case "6":
		console.log("Vous avez sélectionné le mois de Juin comportant 30 jours");
	 	break;
	 case "7":
		console.log("Vous avez sélectionné le mois de Juillet comportant 31 jours");
	 	break;
	 case "8":
		console.log("Vous avez sélectionné le mois d' Août comportant 31 jours");
	 	break;
	 case "9":
		console.log("Vous avez sélectionné le mois de Septembre comportant 31 jours");
	 	break;
	 case "10":
		console.log("Vous avez sélectionné le mois d' Octobre comportant 30 jours");
	 	break;
	 case "11":
		console.log("Vous avez sélectionné le mois de Novembre comportant 30 jours");
	 	break;
	 case "12":
		console.log("Vous avez sélectionné le mois de Décembre comportant 31 jours");
	 	break;
	 default:
	 	console.log("Erreur de mois sélectionné");
	 	break;
