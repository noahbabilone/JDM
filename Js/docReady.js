$(document).ready(function() 
{

/***************Consigne sur la pagne d'accueil ************************/
	$(".consigne").each(function(){
			if ($(this).attr("id")=="consigne-1")
				$("#"+$(this).attr("id")).show();
			else 
				$("#"+$(this).attr("id")).hide();
		});	

	$(".consigne a").click(function(e){
		var section= $(this).attr("class");
		$(".consigne").each(function(){
			if ($(this).attr("id")==section)
				$("#"+$(this).attr("id")).show();
			else 
				$("#"+$(this).attr("id")).hide();
		});			
	});
/****************Formulaire connexion ***************************/
	
	/*
$(".form-connexion").submit(function(e){
		alert('test');	

		var blockErreur=false;
		$(".champ-connexion").each(function(){
			if ($(this).val()==""){
				blockErreur=true;
			  	$(this).css({ // on rend le champ rouge
	    	   		 borderColor : 'red',
	    	   		 color : 'red'
	    	    });
	    	  }
		});		
		
		if (blockErreur){
		  	$("#erreurConnexion").css('display', 'block'); // on affiche le message d'erreur
		  	e.preventDefault();
		}
		
		
	});
	
*/
	
	
	

});// fin Document Ready

function verificationFormulaireConnexion ()
{
	
	
}	
	



