	<section id="">
	<form method="post" id="form"  action="index.php?controleur=admin&action=mots">
		<h2>Ajouter Mots</h2>      
		<label for="langue">choisir la langue</label>
			<select id="langue" name="langue">
			<option value="motfr">français</option>
				<option>anglais</option>
				<option>portugais</option>
				<option>arabe</option>
				<option>japonais</option>
				<option>allemand</option>
				<option>italien</option>
			</select>
			
			liste de mots
			<textarea id="txt" name="txt"> Mon texte ici </textarea>
			<input type="submit"  name="envoyer" id="btn"  value="Ajouter" >  
		</form>
	</section>
		
	<section id="">
		<form method="post" id="form"  action="index.php?controleur=admin&action=gerer">
			<h2> Gerer Mots </h2>  
			Entrer Mot : <input type="text" id="recherche" name="recherche"  />
		
			<input type="submit"  name="envoyer" id="btn"  value="Gerer" >  
			
		</form>
	</section>