$(document).ready(function() 
{
	consigneBloc ();

});// fin Document Ready

function consigneBloc ()
{
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

}	
	



