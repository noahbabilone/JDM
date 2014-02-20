<?php $this->titre = "Connexion  "; ?>
<div id="bloc_connexion">

	<section id="section-conexion">
		<?php
	 	if (isset($_SESSION['user']))
	 	{
		 	echo '<p class="succes_connexion"> Connexion réussi </p>';
	 	}
	 	else {
	 		?>
			<form method="post" class="form-connexion" action="index.php?module=utilisateur&action=connexion">
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
					<input type="submit"  name="valide-connexion" id="valide-connexion"  value="Connexion">            

					<a href="">Mot de passe oublié ?</a>
					<a href="index.php?module=utilisateur&action=inscription">S'inscrire</a>
				</div>
				
				<div class="clear"> </div>
			</form>			
			<?php
			}
				?>
	</section>
</div>	
