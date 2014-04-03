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
			  	$("#erreur").css('display', 'block'); // on affiche le message d'erreur
			  	e.preventDefault();

			}

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
		
		$("#btn-proposition").click(function(e){	
			var nbLigne=$(".nb-ligne-tab").val();
			var motProp= $.trim($(".champ-saisi").val());
			console.log(motProp);
			if (motProp!==""  && motProp.match(/^[a-zA-Z\-\']+$/))
			{
				$(".champ-saisi").val("");
				listeMotSaisi+=motProp+",";
				nbLigne++;
				$(".nb-ligne-tab").val(nbLigne);
				$(".table-proposition").append("<tr><td>"+nbLigne+"</td><td>"+motProp+"</td></tr>");
				console.log(motProp);	
			}else 
			{
				alert("Mot saisi Invalide");
			}
			e.preventDefault();
		});	
		
	
	
	/************************** Jeux *********************************/
		/**--- Compte à rebours -----****/
	$(".rejouerBloc").hide();
	$(".resultatPartie").hide();

	var sec = $('#temps-compteArebours').val();
	var timer;
	function countDown(){
			timer = setInterval(function() {
			sec--; 
			console.log(sec);
		   $('.countDown').text(sec);
		   $('#temps-compteArebours').val(sec);
		   
		   if (sec == 0) {
	
		      clearInterval(timer);
			  var donnees='action=jeu&methode=resultatJeu&idMots='+$("#mot-id").val()+'&listesMots='+listeMotSaisi
			  				+'&idJoueur='+$("#user-id").val()+'&idPartie='+$("#partie-id").val()+'&mot='+$("#mot-libelle").val();
			  console.log(donnees);
		      $.ajax({
					type: 'POST',
					url: 'Modeles/verificationDonnees.php',
					data: 	donnees,
					success: function(data) { 
									/* $("#test").html(resultat); */

									if (data == 'Error')
									{										
										alert ("Probleme");
										$(".rejouerBloc").show();

									}else {
										var resultat = $.parseJSON( data);
										
											
										if (resultat.typeRetour =="Empty")
										{
											/* alert ("Vous avez rien saisi"); */
											$(".resultatPartie").prepend("<p>"+resultat.contenu+"</p>");
											$(".resultatPartie").addClass("alert");		
											$(".resultatPartie").show();								
											$(".partieJeu").hide();	
											$(".rejouerBloc").show();
	
										}else if (resultat.typeRetour =="Success")

										{
										
											/* $("#test").html(resultat); */
											$(".scoreJeu").text(resultat.score);
											$(".niveauJeu").text(resultat.niveau);
											
											$(".resultatPartie").prepend("<p>"+resultat.contenu+"</p>");
											$(".resultatPartie").addClass("alert-success");
											$(".resultatPartie").show();
											$(".partieJeu").hide();	
											$(".rejouerBloc").show();

										}
								}
					          } //Fin success
					}); 

		      
		   } else if (sec <10)	
		   {
			   $(".countDown").css({"color":"red"});
		   }		   
		}, 1000);
	}
	

	$('#btn-suivant').click(function(e){
	
		var bSuivant =confirm('Vous voulez vraiment changer Ce mot ?');
		if(bSuivant){
		
			 var donnees='action=jeu&methode=btnSuivant&idJoueur='+$("#user-id").val()+'&idPartie='+$("#partie-id").val();
			 console.log(donnees);
		     $.ajax({
					type: 'POST',
					url: 'Modeles/verificationDonnees.php',
					data: 	donnees,
					success: function(data) {
/* 						$("#test").html(data); */
						var resultat=$.parseJSON(data);
						if (resultat.typeRetour=="Success")
						{
							//countDown().stop(true,true);
							clearInterval(timer);
	/* 						alert(resultat.mot.id+" --- "+resultat.mot.libelle); */
							$("#mot-id").val(resultat.mot.id);
							$("#mot-libelle").val(resultat.mot.libelle);
							$(".motPartie").text(resultat.mot.libelle);
							sec=60;
							$("#temps-compteArebours").val(sec);
							$('.countDown').text(sec);
							listeMotSaisi="";
							
							if(sec==60)
								countDown();
						}else 
						{
							$("#test").html(data+ "erreu");
						
						}
	
					
					}
				});
		}
		e.preventDefault();
	});
	
	
	console.log("A finir");
	//a finir 


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
				timeout:"1500",
				 modal: true,
				callback: {
					afterClose: function()
					{
						countDown();
		
					}
				},
		
			});
	 }	


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
 
 
 // fonction pour all
  function ajaxValidation(donnees,callback){
	  $.ajax({
			type: 'POST',
			url: 'Modeles/verificationDonnees.php',
			data: 	donnees,
			success: function(data) { 
					var result=data;
		            callback(result);
	    } //Fin success
  }); 
 }
 /******************* admin vue resultat **********************************/
		
		function chercher(){
		
			param=jQuery.trim($("#recherche").val());
			if(param.length==0) 
				alert('recherche vide');
			else 
				fonction("listeMots",param,null,1);
			
		}
		
	function fonction(methode,param,param1,f) {
	  	text="method="+methode+"&params="+param;
	 
		if(param1!=null) 
			text=text+"&params1="+param1;
		$.ajax({
			url : 'Modeles/modeleAjax.php',
			type : 'POST',
			data: text,
			dataType: "json",
			success : function(code_html, statut){ 
				if(f==1){
				 $('#tbody').empty();
				 for(i=0;i<code_html.length;i++){
					 ajouter(code_html[i].mot_libelle,code_html[i].mot_id);
					 }
				}else if(f==2){
				  if(code_html.ok=='1')
				  {
					$('#inp'+param1).empty();
					$('#inp'+param1).append("<h2>"+param+"</h2>");
					$('#b'+param1).empty();
					$('#b'+param1).append('<input type="button" id="btn-inscription" value="modifier" onclick="modifier(\''+param+'\',\''+param1+'\')">');
				  }else{
					 alert('echeck de modification');
					 }		 
				}else if(f==3){
					$('#'+param).empty();
				}
			},
			
		});
	   }

   function envoyer(id){
 
   
   param=jQuery.trim($("#input"+id).val());
   		fonction("modifier",param,id,2);
   }

    function modifier(id1,id){
		input="input"+id;
	    $('#inp'+id).empty();
		$('#inp'+id).append("<h2><input id='"+input+"' type='text' value='"+id1+"'></h2>");
	    $('#b'+id).empty(); 
		$('#b'+id).append("<input type='button' id='btn-inscription' value='envoyer' onclick='envoyer(\""+id+"\")'>");
	}

	function supprimer(id){
		fonction("supprimerMot",id,null,3);
	}
	
	function ajouter(i,v){
		inp='inp'+v;
		bout="b"+v;
		sup="s"+v;
	
		$('#tableau').append('<tr id="'+v+'"><td id="'+inp+'">'+i+'</td><td>francais</td><td>ok</td><td id="'+bout+'"><input type="button"  value="modifier" onclick="modifier(\''+i+'\',\''+v+'\')"></td><td id="'+sup+'"><input type="button"  value="supprimer" onclick="supprimer(\''+v+'\')"></td></tr>');
		
		
	}	
		
		
		
		
		
		
		
		
		
		
