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
/****************Formulaire Inscription ***************************/
	
	$("#form-inscription").submit(function(e){	
/* 			alert('test');	 */
			var $passe1=$("#passe1"),
				$passe2=$("#passe2");
			
			if ($passe1.val()=="" || $passe2.val()=="" || $passe1.val()!=$passe2.val()){
			  	$("#erreur").css('display', 'block'); // on affiche le message d'erreur
			  	e.preventDefault();

			}
	});			
	
	$("#pseudo").keyup(function(){
        if($(this).val().length > 3){  // si la chaîne de caractères est inférieure à 4
            var donnees='action=verificationLogin&login='+$(this).val();
            console.log(donnees);
     		 $.ajax({
					type: 'POST',
					url: 'Modeles/verificationDonnees.php',
					data: 	donnees,
					success: function(data) { 
									$("#test").html(data);
					             if(data == "succes"){
						           $(".verifLogin").html("<img id='theImg' src='Images/icons/cancel.png'/>");
					             }else
					             {
						           $(".verifLogin").html("<img id='theImg' src='Images/icons/accept.png'/>");

					             }

					          } //Fin success
					}); 
        }else
        {
           $(".verifLogin").html("<img id='theImg' src='Images/icons/cross.png'/>");
           // console.log("-----ok------");
        }
       
     });
	/***********************************************************/
	
		$(".btn-propositon").click(function(e){
			var nbLigne=$(".nb-ligne-tab").val();
			if ($(".champ-saisi").val()!=="")
			{
				nbLigne++;
				$(".nb-ligne-tab").val(nbLigne);
				$(".table-proposition").append("<tr><td>"+nbLigne+"</td><td>"+$(".champ-saisi").val()+"</td></tr>");

				console.log($(".champ-saisi").val());	
			}
			e.preventDefault();
		});	

	/************************** Compte à rebours*********************************/

		var secondes=10;
		
		function countdown()
		{
		
			setTimeout(countdown, 1000);
			
			$("#compteARebours").html("Test: "+secondes+ "s");
			secondes--;
			
			if (secondes<0)
			{
				alert("fini");
				secondes=0;	
				clearTimeout(countdown);
				return false;
			}
		}
		
		
		var sec = $('.countDown').text()
		var timer = setInterval(function() { 
		   $('.countDown').text(--sec);
		   if (sec == 0) {
		      $('#countDown').fadeOut('fast');
		      // redirection ajax ici qui compte le point
		      clearInterval(timer);
		   } 
		}, 1000);
		
		//countdown();

});// fin documentReady




