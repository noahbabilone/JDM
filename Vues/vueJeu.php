<?php 
	$this->titre = "Partie - The Words wolrd "; 
	if (isset ($user) && !$user->estVide()){	
		$this->user=$user;
		$jeu->nouveauJeu($user->getId());
	}else
	{
		$jeu->nouveauJeu();
	}
	
/* 	var_dump($jeu); */
?>



<section id="partieBloc">
		
		<div class="jeu">				
			<div id="test"></div>
			<div id="dialog-message" title="Lisez la consigne">
				<h1> Lisez la consigne</h1>
				<p>
					<ul>
					<li>Si vous ne savez pas répondre, il faut passer la partie. </li>
					<li> Si vous pensez qu'il n'y a pas de réponse possible, vous pouvez mettre </li>
					<li>Vous pouvez supprimer un mot proposé en cliquant dessus dans la liste affichée à droite. </li>
				</ul>
				</p>
			</div>
			<div class="partieJeu">
				<div id="countDown" > Temps: <span class="countDown"><?php echo CompteARebours;?></span> Secondes</div>
				<div><p>Donner des ASSOCIATIONS D'IDEES avec le terme qui suit :</p></div>
				
				
					<h2 class="motPartie"><?php echo $jeu->getMot()->getLibelle();?></h2>
								
					<div class="form-proposition">
					    <form action="" method="post" >
					    	<input type="hidden" id="mot-id" value="<?php echo $jeu->getMot()->getID(); ?>"/>
					    	<input type="hidden" id="mot-libelle" value="<?php echo $jeu->getMot()->getLibelle(); ?>"/>
					    	<input type="hidden" id="user-id" value="<?php echo ((isset($user))?$user->getId():-1); ?>"/>
					    	<input type="hidden" id="partie-id" value="<?php echo $jeu->getIdPartie(); ?>"/>
					    	<input type="hidden" id="temps-compteArebours" value="<?php echo CompteARebours;?>"/>
							<input type="text" id="champ-saisi" class="champ-saisi"  title="" required > 
							<button type="submit" class="btn-jeu" id="btn-proposition" >Ok</button>
							<button type="button" class="btn-jeu" id="btn-suivant">Suiv</button>
					    </form>
					</div>
					
					<div class="resultat-saisi">
						<input type="hidden" class="nb-ligne-tab" value="0">
						<table class="table-proposition">
						</table>
					</div>		
					
			</div> <!-- Partie -->
			<div class="resultatPartie">
			</div>
							
			<div class="rejouerBloc" >
			 <p>
				<a href="index.php?controleur=partie&action=jouer&amp;id=<?php echo ((isset($user) && !$user->estVide())? $user->getId():0); ?>" id="lancer_button_jouer" class="button-jouer">
					Rejouer
				</a>
			 </p>
			</div>

	
	</div>

		
	</section>

	
	
	
	
	
