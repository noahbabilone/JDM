<?php $this->titre = "Inscription"; ?>
<div id="bloc_inscription">
	<section id="inscription">
		<form method="post" id="form-inscription" action="index.php?controleur=session&action=inscription">
			<h2> S'inscrire </h2>
			<?php
			if (isset($result) && !empty($result))
			{
				echo '<p class="inscription-reussi"> Votre compte a été créé avec succès, vous allez recevoir par mail le lien pour valider votre inscription; </p>';
	/* 				 header('Refresh: 3; index.php'); */
			}		
			?>
			
			<div id="erreur" class="alert-error">
		  	  <p> <center>Veuillez confirmer votre mot de passe!</center></p>
		    </div>
		    
		   
		    <div>
		    
		    	<table>
		    	
			    	<tr>
			    		<td>
			    			<label for="pseudo">Nom utilisateur</label>
			    		</td>
			    		<td>
			    			<label for="email">Adresse email</label>
			    		</td>			
			    	</tr>	
			    	<tr>
						<td> 
							<input type="text" id="pseudo" class="champs-inscription" name="pseudo" placeholder="Pseudo" required /> <span class="verifLogin"></span> 
						</td>
						<td>
						<input type="email" id="email" class="champs-inscription" name="email" placeholder="Email" required />
						</td>
			    	</tr>
			    	<tr>
			    		<td>
			    		<label for="passe1">Mot de passe</label>
			    		</td>
			    	</tr>
					<tr>
						<td><input type="password" id="passe1" class="champs-inscription" name="passe1" required/> 
						</td>
					</tr>
					<tr>
						<td>
							<label for="passe">Confirmation du mot de passe</label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" id="passe2" class="champs-inscription" name="passe2" required />
						</td>
					</tr>
		    	</table>
			</div>
			<div>
				<input type="submit" id="btn-inscription" value="S'inscire" />
		
		    </div>
		</form>
	
	</section>
</div>