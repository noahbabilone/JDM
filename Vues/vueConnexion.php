<?php $this->titre = "Connexion  "; ?>
<div id="bloc_connexion">
		<?php
/*
	 	if (isset($_SESSION['user']) && !empty($_SESSION['user']))
	 	{
		 	echo '<p class="succes_connexion"> Connexion réussi </p>';
		 	$user= unserialize($_SESSION['user']);
		 	echo "$$$$$$$ getId Apres Init " .$user->getId()." - " .$user->getLogin().
		 		 " - " .$user->getPasse()." - " .$user->getEmail()." - " .$user->getScore()." - " .$user->getTypeUser()." - " .$user->getDateCreation()." - " .$user->getDateModif();			//				header('Location:index.php');	 		
		 	
	 	}
*/
		 if (isset($_SESSION['id']) && isset($_SESSION['login']))// connecté
		 {
			 header('Location:index.php');
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
							echo '<div  class="alert-error">';
							echo '<p class="erreur_connexion"> Pseudo ou mot de passe incorrect !</p>';
							echo '</div>';
						}
					}
					?>
					<div>
						<input type="text" id="login" name="login" class="champs-connexion" placeholder="Pseudo" autofocus required/>
					</div>
					<div>
						<input type="password" id="passe" name="passe"  class="champs-connexion" placeholder="Mot de passe" required />
					</div>
					<div>
						<input type="submit"  name="valide-connexion" id="btn-connexion"  value="Connexion">            
	
						<a href="">Mot de passe oublié ?</a>
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
