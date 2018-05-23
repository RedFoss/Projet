
 $(function() {
	 $( "#datepicker" ).datepicker({
     defaultDate:new Date(),
	 altField: "#datepicker",
	 closeText: 'Fermer',
	 prevText: 'Précédent',
	 nextText: 'Suivant',
	 currentText: 'Aujourd\'hui',
	 monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
	 monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Aoçut', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
	 dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
	 dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
	 dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
	 weekHeader: 'Sem.',
	 dateFormat: 'dd/mm/yy',
   minDate:new Date(),
	 });
 });
 $(document).ready(function(){
	document.getElementById("dateSend").hidden = true;
 	document.getElementById("datepicker").hidden = false;
 	document.getElementById("validationjs").hidden = false;
 	document.getElementById("validation").hidden = true;
 });