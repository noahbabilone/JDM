<?php $this->titre = "Inscription"; ?>
<div id="bloc_inscription">
	<section id="inscription">
			<form method="post" id="form-inscription" action="index.php?controleur=session&action=inscription" autocomplete="off">

		<h2> S'inscrire </h2>
				<?php
				if (isset($result) && !empty($result)) {
					if ($result)
					{
						?>
					<div  class="alert alert-success">
						<p class=""> Votre compte a été créé avec succès </p>
					</div>
						<?php
					}else
					{
						?>
						<div class="alert alert-error">
							<p> <center>Erreur dans ajoute utilisateur !!</center></p>
							</div>
				    <?php
					}
				}	
					
				?>
				<div id="erreur" class="alert alert-error"  >
			  	  <p> <center>Veuillez remplir les champs correctements !!</center></p>
			    </div>
		    
			    <div>
			    	<table class="tab-inscription">
				    	<tr>
				    		<td class="td-1"> <label for="inputPseudo">Nom utilisateur</label></td>
				    		<td>
				    			<input type="text" id="inputPseudo" name="inputPseudo" placeholder="Pseudo" class="champs-inscription" required /> 
				    			<span class="inputPseudo-verif"></span> 
				    			
				    		</td>
				    	</tr>	
				    	<tr>
				    		
				    		<td class="td-1"> <label for="inputEmail">Adresse email</label></td>			
	
							<td>
								<input type="email" id="inputEmail" name="inputEmail" placeholder="Email" class="champs-inscription" required />							
								<span class="inputEmail-verif"></span> </td>
							</tr>
				    	<tr>
				    		<td class="td-1"><label for="inputPassword">Mot de passe</label>
				    		</td>
				    	
							<td ><input type="password" id="inputPassword" name="inputPassword" placeholder="Mot de Passe" class="champs-inscription" required/>
								<span class="inputPassword-verif"></span> 
							</td>
						</tr>
						<tr>
							<td class="td-1"><label for="inputConfirmation">Confirmation du mot de passe</label>
							</td>
							<td><input type="password" id="inputConfirmation"  name="inputConfirmation" placeholder="Confirmer votre mot passe" class="champs-inscription" required />
								<span class="inputConfirmation-verif"></span> 
							</td>
						</tr>
			    	</table>
				</div>
			<div>
				<input type="submit" id="btn-inscription" value="S'inscire" />
				
				
<!-- 				Champs Invisble -->
				<input type="hidden" class="inputPseudo-valide" value="0" />
				<input type="hidden" class="inputEmail-valide" value="0" />
				<input type="hidden" class="inputPassword-valide" value="0" />
				<input type="hidden" class="inputConfirmation-valide" value="0" />
		
		    </div>
		</form>
	
	</section>
</div>