
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
  <head>
    <title>Titre</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  </head>
  <body>
<!--
  JQERY 
	/*****/
	
	Bibiliothèque Js 
-->
	 
  
  
  
     <!-- le contenu -->
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">

	           
	            $('body').html('Hello World');
				$('#titre'); // Sélectionne notre balise mais ne fait rien.
				alert($('#titre').html()); // Affiche le contenu "J'aime les frites."
				$('#titre').html('Je mange une pomme'); // Remplace le contenu ("J'aime les frites.") par "Je mange une pomme".
				$('#titre').html($('title').html()); // Remplace le contenu par le titre de la page (contenu dans la balise <title>).
				// Ajoute du contenu après chaque balise textarea.
				$('textarea').after('<p>Veuillez ne pas poster de commentaires injurieux.</p>');
				// Ajoute "Voici le titre :" avant la balise ayant comme id "titre".
				$('#titre').before('Voici le titre :');
				// Ajoute "! Wahou !" après la balise ayant comme id "titre".
				$('#titre').after('! Wahou !');
				
				
				// Ajoute du contenu après chaque balise textarea.
				$('textarea')
				  .after('<p>Veuillez ne pas poster de commentaires injurieux.</p>')
				  .after('<p><strong>Merci beaucoup.</strong></p>');
				// Ajoute "Voici le titre :" avant et "! Wahou !" après la balise ayant comme id "titre".
				$('#titre')
				  .before('Voici le titre :')
				  .after('! Wahou !');
				 


	
				if($('span').length > 0){
				  // Il y a un ou plusieurs span dans le document.
				}
				  // Ou plus simplement :
				if($('span').length){
				  // Il y a un ou plusieurs span dans le document.
				}
			
			
			
/******
			 Sélecteurs CSS "classiques"
				* 					Toutes les balises.
				elem				Les balises elem.
				#id    				Balise ayant l'id "id".
				.class				Balises ayant la classe "class".
				elem[attr]			Balises elem dont l'attribut "attr" est spécifié.
				elem[attr="val"]	Balises elem dont l'attribut "attr" est à la valeur val.
				elem bal			Balises bal contenues dans une balise elem.
				elem > bal			Balises bal directement descendantes de balises elem.
				elem + bal			Balises bal immédiatement précédées d'une balise elem.
				elem ~ bal			Balises bal précédées d'une balise elem.
				
				
				
				Sélecteurs spécifiques à jQuery
				
				:hidden					Éléments invisibles, cachés.
				
				:visible				Éléments visibles.
				
				:parent					Éléments qui ont des éléments enfants.
				
				:header					Balises de titres : h1, h2, h3, h4, h5 et h6.
				
				:not(s)					Éléments qui ne sont pas sélectionnés par le sélecteur s.
				
				:has(s)					Éléments qui contiennent des éléments sélectionnés par le sélecteur s.
				
				:contains(t)			Éléments qui contiennent du texte t.
				
				:empty					Éléments dont le contenu est vide.
				
				:eq(n) et :nth(n)		Le n-ième élément, en partant de zéro.
				
				:gt(n) (greater than, signifiant plus grand que)	Éléments dont le numéro (on dit l'« index ») est plus grand que n.
				
				:lt(n) (less than, signifiant plus petit que) 	Éléments dont l'index est plus petit que n.
				
				:first					Le premier élément (équivaut à :eq(0)).
				
				:last 					Le dernier élément.
				
				:even (pair) 			Éléments dont l'index est pair.
				
				:odd (impair) 			Éléments dont l'index est impair.		  
*/



				$('#premier').text() // Permet de manipuler le contenu comme du texte
				
/* 				Difference entre $().text() et $().html()  */
//afficher les balises Strong tandisque htmk() exécute les balises strong pour mettre le texte en gras 

					$('#premier').html('<strong>les pommes</strong>');
					$('#premier').text('<strong>les pommes</strong>'); 
					
					
/* 					replaceWith() est une méthode qui permet  de remplacer la balise et son contenu. */
					$('a').replaceWith('<em>censuré</em>');
					$('h1').replaceWith($('.titre:first'));
					$('#titre').replaceWith('<h1>'+$('#titre').html()+'</h1>');
					$('.recherche').replaceWith('<a href="http://google.com">Google</a>');
					
/* 					ReplaceAll (); // remplace toutes les balise  */
					$('#titre').replaceAll($('h1')); //// Tous les <h1> vont être remplacés.
					$('#titre').replaceAll('h1');					// Revient à faire :
	
	
	
/* 	Les méthodes prepend() et append() permettent d'ajouter du contenu à celui existant : 
				- prepend() avant 
				- append() après : */
	
				$('a').prepend('Lien : ');
				$('h1:first').prepend('Premier titre : ');
				$('q').append(" (c'était une citation)");
				$('#titre').append($('#sommaire'));
				$('#basdepage').prepend($('h1'));
				
/* prependTo() et appendTo() permettent de permuter deux sélecteurs */
				$('#nonosse').appendTo('#chien');
				// Revient à faire :
				$('#nonosse').appendTo($('#chien'));
				// Ou alors :
				$('#chien').append($('#nonosse'));
				 
				// Ou alors directement en prenant le texte.
				$('#chien').append('Nonosse...');    

		/* 		Les méthodes after() / before() / insertAfter() / insertBefore() sont les équivalents de ces méthodes, à l'exception qu'elles ajoutent à l'extérieur des balises.     */
				
				$('p').before('test')
				// Tout ce qui suit revient au même :
				$('#titre').insertBefore('h1:first');
				$('#titre').insertBefore($('h1:first'));
				$('h1:first').insertAfter($('#titre'));
				$('h1:first').insertAfter('#titre');
				$('h1:first').before($('#titre'));
				$('#titre').after($('h1:first'));


/*

				Résumé
				
				Pour résumer, voici ce qu'il faut retenir sur ces méthodes :
				
				    prepend() et append() permettent d'ajouter un élément ou du texte à l'intérieur de la balise.
				
				    before() et after() permettent d'ajouter un élément ou du texte à l'extérieur de la balise.
				
				    prepend() et before() ajoutent un élément ou du texte avant le contenu de la balise en question.
				
				    append() et after() ajoutent un élément ou du texte après le contenu de la balise en question.
				
				    Ces quatre méthodes ont respectivement quatre méthodes équivalentes, qui permettent de réaliser la même chose, mais s'employant différemment. Ainsi :
				
				        A.prepend(B) revient au même que B.prependTo(A).
				
				        A.append(B) revient au même que B.appendTo(A).
				
				        A.before(B) revient au même que B.insertBefore(A).
				
				        A.after(B) revient au même que B.insertAfter(A).
				
				    Ces quatre méthodes équivalentes ne s'utilisent pas sur des chaînes de caractères. Elles s'utilisent exclusivement sur des objets jQuery.
				
				    L'argument de ces méthodes peut être un sélecteur jQuery, du code HTML, ou plus généralement un objet jQuery. Pour rappel, c'est une collection d'éléments de la page. Faites donc attention si il y a plusieurs éléments, le comportement de la méthode peut changer.
				
				Image utilisateur		
*/		

		/************** Envelopper à l'extérieur ****************/

			/* wrap() permet d'« envelopper » n'importe quel élément entre deux balises. */

				$('#titre').wrap('<h1></h1>');
 
				// Le contenu sera entre les <div></div>.
				$('.contenu').wrap('<em>le contenu</em> ira là : <div></div> mais pas <strong>là</strong>');
				// Le contenu sera entre les <em></em> mais aussi les <q></q>.
				$('span').wrap('<em id="ici"></em> et là <q></q>');
/* Envelopper à l'intérieur */
		/*  wrapInner(): tout comme avec wrap(), le contenu est dupliqué dans chacun des couples de balises ouvrantes / fermantes sans contenu. */
		
				$('.texte').wrapInner('<i></i>'); // remplace la balise span par <i>
						
/* 			wrapAll() est similaire à wrap() */


/*

				clone() permet de copier des éléments (de les « cloner »), avec leur contenu, leurs attributs et valeurs (donc par conséquent les événements comme onclick etc.).
				clone() va simplement renvoyer un objet jQuery qui est une copie de l'original, mais il ne va pas l'ajouter à votre page web.


*/
				// Multiplie le nombre de boutons par 2.
				$('button').clone().appendTo($('body'));
				// Revient à faire :
				$('body').append($('button').clone());
				
				
				
				
/* 			remove() permet de supprimer des éléments de la page web.  */



			// Supprime les liens de la page ayant la classe "sites".
			$('a').remove('.sites');
			// Supprime les balises <strong> dans des <button>.
			$('button strong').remove();
			
			
/*
			
			Vider des éléments

					empty() permet de vider le contenu de l'élément en question :	
*/
			
			$('button').empty(); // Vide les boutons.
			$('body').empty(); // Vide la page web.
			// Revient à faire :
			$('body').html('');

</script>
  </body>
</html>