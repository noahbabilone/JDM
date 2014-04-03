
<div id="bloc_connexion">


	<section id="session">
	<form method="post" id="form"  action="index.php?controleur=admin&action=mots">
				<h1>Ajouter Mots</h1>
	
                
<h2>
<label for="mot">choisir la langue</label>
</h2>
<h2>
<select id="langue" name="langue">
<?php
for($i=0;$i<count($result1);$i++){
?>

<option value="<?php echo $result1[$i]['id'].'.'.$result1[$i]['langue'];?>">
<?php echo $result1[$i]['langue'];?>
</option>
<?php
}
?>
</select>




</select>
<h2/>

<h2>

liste de mots
<textarea id="txt" name="txt"> Mon texte ici </textarea>

</h2>

<h2>
<input type="submit"  name="envoyer" id="btn-connexion"  value="Ajouter" >  
</h2>

</form>

</section>

<form method="post" id="form"  action="index.php?controleur=admin&action=gerer">
<section id="session">

<h2>
<input type="submit"  name="envoyer" id=""  value="gerer mots" >  
</h2>

</section>

</form>


</div>