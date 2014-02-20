<?php $this->titre = "Inscription"; ?>
<section>
	<form method="post" class="form-connexion" action="index.php?module=utilisateur&action=inscription">
		<h2> S'inscrire </h2>
		<table>
			<tr>
				<td><label for="pseudo">Pseudo</label></td>
				<td><input type="text" id="pseudo" class="champ" name="pseudo"></td>
			</tr>
		
			<tr>
				<td><label for="email"> </label>Email</td>
				<td><input type="email" id="" class="champ" name="email"></td>
			</tr>
			<tr>
				<td><label for="passe1">Mot de passe</label></td>
				<td><input type="password" id="passe1" class="champ" name="passe1"></td>
			</tr>
			<tr>
				<td><label for="passe"></label>Confirmer mot de passe</td>
				<td><input type="text" id="passe2" class="champ" name="passe"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" id="validation-inscritption" name="validation-inscritption" value="S'inscire" </td>
			</tr>
		</table>
	
	</form>

</section>
