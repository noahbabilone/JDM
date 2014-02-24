<?php $this->titre = "Connexion  "; ?>
<div id="bloc_connexion">

		<?php
	 	if (isset($_SESSION['user']) && !empty($_SESSION['user']))
	 	{
		 	echo '<p class="succes_connexion"> Connexion réussi </p>';
			//header('Location:index.php');	 		
		 	
	 	}
	 	else {
	 		?>
 			<section id="session">
				<form method="post" class="form-connexion" action="index.php?controleur=session&action=connexion">
				<h2>Se connecter</h2>
			 		<?php
					if(isset($result) && !empty($result)){
						if ($result=="Echec")
						{
							echo '<p class="erreur_connexion"> Pseudo ou mot de passe incorrect !</p>';
						}
					}
					?>
					<div>
						<input type="text" id="login" name="login" class="champ-connexion" placeholder="Pseudo" autofocus required/>
					</div>
					<div>
						<input type="password" id="passe" name="passe"  class="champ-connexion" placeholder="Mot de passe" required />
					</div>
					<div>
						<input type="submit"  name="valide-connexion" id="btn-connexion"  value="Connexion">            
	
						<a href="">Mot de passe oublié ?</a>
<!-- 						<a href="index.php?module=utilisateur&action=inscription">S'inscrire</a> -->
					</div>
					
					<div class="clear"> </div>	
				</form>			
			</section>
			<section id="session">
				<div id="div_inscription">
					<p>
						Vous êtes nouveau sur The words world ? <br	/>
						Commencez dès maintenant. C'est simple et rapide !
					</p>
					<p>
						<a class="btn-iscription" href="index.php?controleur=session&amp;action=inscription">S'inscrire</a>
					</p>
				</div>
			</section>
		<?php
			}
				?>
</div>	
