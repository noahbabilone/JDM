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
	
	$("#btn-inscription").click(function(e){	

			if (!verificationVadiliteChamps()){
				alert ("testt");
			  	$("#erreur").css('display', 'block'); // on affiche le message d'erreur
			  	e.preventDefault();

			}
							alert ("1111");

	});			
     
     
	$("#form-inscription input").keyup(function(){
	
		console.log($(this).attr("id"));
		
		switch ($(this).attr("id"))
		{
			case "inputPseudo":
				
					if($(this).val().length > 3 && $(this).val().match(/^[a-zA-Z0-9]{4,}$/)){  // si la chaîne de caractères est inférieure à 4
					 	var donnees='action=session&methode=verificationLogin&pseudo='+$(this).val();
			            console.log(donnees);
			     		 $.ajax({
								type: 'POST',
								url: 'Modeles/verificationDonnees.php',
								data: 	donnees,
								success: function(data) { 

								             if(data == "Success"){

									             $(".inputPseudo-verif").html("<img id='theImg' src='Images/icons/accept.png'/>");
									              $(".inputPseudo-valide").val(1);
								             }else
								             {
									             $(".inputPseudo-verif").html("<img id='theImg' src='Images/icons/cancel.png'/>")
			  						             $(".inputPseudo-valide").val(0);
								             }
			
								          } //Fin success
								}); 
			
					}else
					{
						 $(".inputPseudo-verif").html("<img id='theImg' src='Images/icons/cancel.png'/>")
						 $(".inputPseudo-valide").val(0);
			
					}						
			
				break;
			case "inputEmail" :
						if($(this).val().match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$/)){  // si la chaîne de caractères est inférieure à 4
					 	var donnees='action=session&methode=verificationEmail&email='+$(this).val();
			            console.log(donnees);
			     		 $.ajax({
								type: 'POST',
								url: 'Modeles/verificationDonnees.php',
								data: 	donnees,
								success: function(data) { 
								             if(data == "Success"){ 
									             $(".inputEmail-verif").html("<img id='theImg' src='Images/icons/accept.png'/>");
									              $(".inputEmail-valide").val(1);
								             }else
								             {
									             $(".inputEmail-verif").html("<img id='theImg' src='Images/icons/cancel.png'/>")
			  						             $(".inputEmail-valide").val(0);
			
								             }
			
								          } //Fin success
								}); 
			
					}else
					{
						 $(".inputEmail-verif").html("<img id='theImg' src='Images/icons/cancel.png'/>")
						 $(".inputEmail-valide").val(0);
			
					}
					
				
				break;
				 
			case "inputPassword": // Verification Mot de passe saisi, il doit contenri une lettre ou un chiffre
				
				if($(this).val().length > 3 && $(this).val().match(/^[a-zA-Z0-9]{4,}$/))
				{
					$("."+$(this).attr("id")+"-verif").html("<img id='theImg' src='Images/icons/accept.png'/>");
					$("."+$(this).attr("id")+"-valide").val(1); //inputPassword-valide

				}else{
					$("."+$(this).attr("id")+"-verif").html("<img id='theImg' src='Images/icons/cancel.png'/>")
					$("."+$(this).attr("id")+"-valide").val(0);
			
				}	
				break;
				
			case "inputConfirmation": //Confirmation de mot de passe
				
				if($(this).val()==$("#inputPassword").val()){

					$("."+$(this).attr("id")+"-verif").html("<img id='theImg' src='Images/icons/accept.png'/>");
					$("."+$(this).attr("id")+"-valide").val(1);

				}else{
					//$('#inputConfirmation').removeClass('inputSuccess');
					console.log("add");
					$("."+$(this).attr("id")+"-verif").html("<img id='theImg' src='Images/icons/cancel.png'/>")
					$("."+$(this).attr("id")+"-valide").val(0);
			
				}		
				
				break;
			
				
		}// fin switch
	
	});
	

	/***********************************************************/

		var listeMotSaisi="";
		
		$(".btn-propositon").click(function(e){		
			var nbLigne=$(".nb-ligne-tab").val();
			var motProp= $.trim($(".champ-saisi").val());
			console.log(motProp);
			if (motProp!==""  && motProp.match(/^[a-zA-Z\-\']+$/))
			{
				listeMotSaisi+=motProp+",";
				nbLigne++;
				$(".nb-ligne-tab").val(nbLigne);
				$(".table-proposition").append("<tr><td>"+nbLigne+"</td><td>"+motProp+"</td></tr>");
					//prepend
				console.log(motProp);	
			}else 
			{
				alert("Mot saisi Invalide");
			}
			e.preventDefault();
		});	

	/************************** Jeux *********************************/
		/**--- Compte à rebours -----****/
	
	var sec = $('.countDown').text()
	
	function countDown(){
		var timer = setInterval(function() { 
		   $('.countDown').text(--sec);
		   if (sec == 0) {
	/* 		      $('#countDown').fadeOut('fast'); */
		      // redirection ajax ici qui compte le point
		      alert('Tous les mots qui ont été sasi : '+ listeMotSaisi);
		      clearInterval(timer);
		   } 
		}, 1000);
	}
		
		
	/*
if ($("#dialog-message").length){
		 var message=$("#dialog-message").text();
		 noty({
				title: 'Lisez la consigne',
				text:message,
				layout:'center',
		        type : 'warning',
				"textAlign":'center',
				"easing":"swing",
				animateOpen:{"height":"toggle"},
				animateClose:{"height":"toggle"},
				speed:"1000",
				timeout:"5500",
				 modal: true,
				callback: {
					afterClose: function()
					{
						countDown();
		
					}
				},
		
			});
	 }	
*/


});// fin documentReady



/************ Fonctions *************/	

 function verificationVadiliteChamps()
 {
	 var confirmationPassWord=$(".inputConfirmation-valide"),
	 	 pseudoValide=$(".inputPseudo-valide"),
	 	 pwdValide=$(".inputPassword-valide"),
	 	 emailValide=$(".inputEmail-valide");
	 	 
 	 if ( pseudoValide.val()=="1" &&  emailValide.val()=="1" && pwdValide.val()=="1" && confirmationPassWord.val()=="1" )
 	 {
	 	 return true;
 	 }else
 	 {
	 	 return false;
 	 }
	 	 
	 
 }
 
 

/**** Focntion salah **/
	function chercher()
	{
		mot=jQuery.trim($("#supprimer").val());
		txt="mot="+mot;
		
		$.ajax({
		       url : 'Admin/chercherMot.php',
		       type : 'POST',
			   data:txt,
		        dataType: "json",
		       success : function(code_html, statut)
		       {       
		 			if(code_html.ok=='0'){
			 			$('#table2').after('<tr><td align="center" colspan="5"><label for="mot">"'+mot+'" introuvable  </label></td></tr>');
			 		}else
			 		{
				 	 supprimer(code_html.id,mot);
				 	}  		  
				},
		       error : function(resultat, statut, erreur)
		       {
			   		alert('il y a une erreure '+erreur);
			   }
		 });
	}


	function supprimer(info,info1){
			
		var txt='id='+info;
		$.ajax({
			url : 'Admin/supprimermot.php', // je suis pas sure mais a verifier Salah
			type : 'POST',
			data:txt,
			dataType: "json",
			success : function(code_html, statut)
			{ 
				if(code_html.ok=='1')
				{ 
					$('#table2').after('<tr><td align="center" colspan="5"><label for="mot">"'+info1+'" à été supprimé avec succes  </label></td></tr>');
				}
	       },
	       error : function(resultat, statut, erreur){
		  	 alert('il y a une erreure '+erreur);
		   }
	    });
			
	}
		
			
	function enregistrer(mot,langue){
	var txt='mot='+mot+'&langue='+langue;
	
	 $.ajax({
	       url : 'Admin/saveword.php',
	       type : 'POST',
		   data:txt,
	        dataType: "json",
	       success : function(code_html, statut){ 
	          
	       
			  if(code_html.ok=='1'){
	            		   
			   $('#table2').after('<tr><td align="center" colspan="5"><label for="mot">"'+mot+'" à été ajouté avec succes  </label></td></tr>');
			   $("#mot2").append("<option value="+code_html.id+">"+mot+"</option>");
			   
			   }else if(code_html.ok=='2'){
			   
			   alert('mot deja proposé');
			   
			   
			   }else{
				console.log("test");   
						   }
	       },
	       error : function(resultat, statut, erreur){
	       
		   alert('il y a une erreure '+erreur);
		   }
	    });
	
	}
	
	function ajoutArea(){
	
		var langue=jQuery.trim($("#langue").val());
		var text=jQuery.trim($("#mon_textarea").val());
		
		var regExpr = /,/g;
		text=text.replace(regExpr,"\n");
		text=text.split("\n");
		for(i=0;i<text.length;i++){
		
		enregistrer(jQuery.trim(text[i]),langue);
		
			}
		
		}
		
		function verifier(){
		
		if(jQuery.trim($("#mon_textarea").val()).length==0)
			alert('veuillez saisir les mots a jouter');
			("#form").submit();
		
		}
				