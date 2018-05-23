$(document).ready(function(){
    $("#menu a").click(function(event){
        event.preventDefault();
        var href = $(this).attr('href');
    	var tab=href.split("=");
    	$.ajax({
    		  method: "GET",
    		  url: "/include/texte.inc.php",
    		  data: { page: tab[1]}
    	});
    	$.ajax({
		  url: "/include/footer.inc.php",
		});
    });
});