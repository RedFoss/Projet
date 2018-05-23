	var heure =Number(prompt("Quelle heure est -il? "));
	var minute = Number(prompt("Combient de minutes?"));
	var seconde = Number(prompt("Et les secondes c'est pour les salades? xD"));

	if ((heure >= 0) && (heure <=23) && (minute >=0) && ( minute <= 59) &&(seconde >=0) && (seconde <= 59))
	{
		seconde ++;
		if(seconde === 60){
			seconde = 0;
			minute ++;
			if(minute === 60){
					minute =0;
					heure ++;
					if (heure === 24){
						heure = 0;
					}
				}
			}
			console.log("Dans une seconde, il sera " + heure + " heures, " +
	        minute + " minutes et " + seconde + " secondes");

		}else {
		console.log(" Erreur votre pendule c'est enrayée");
		}
	