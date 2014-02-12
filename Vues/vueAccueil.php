<?php $this->titre = "Accueil - The Words wolrd "; ?>

<?php 
	$i=1;
/* 	$fin=count($blocs); */
/* 	$fin=longueurTableau($blocs); */
/* 	echo $fin; */
	$fin=3;
	
	foreach ($blocs as $bloc): 
?>
    <article class="consigne" id="<?php echo 'consigne-'.$i; ?>" >
        <header>
                <h3 class="titrebloc"><?= $bloc['titre'] ?></h3>
        </header>
        <p class="consigne-contenu"><?= $bloc['contenu'] ?>
        </p>
         <p>
        <?php
        if ($i==1){      
        	echo '<a href="#" class="consigne-'.($i+1).'">Suivant</a>';	
        }
        elseif ($i==$fin){
         	echo '<a href="#" class="consigne-'.($i-1).'">Précedent</a>' ;
       	}
        else{
        	echo  '<a href="#" class="consigne-'.($i-1).'">Précedent</a> -  <a href="#" class="consigne-'.($i+1).'">Suivant</a>';
       	}
       	$i++;
         ?> 
        </p>
        
        <input type="hidden" id="consigne-id" class="" value="<?= $bloc['id'] ?>" />
    </article>
<?php endforeach; ?>


	<article class="classementAccueil">
		<h3> Top 10 de la semaine </h3>
		<table>
			<tr> 
				<th> Joeur </th>
				<th> Score </th>
				<th> Niv....</th>
			</tr>
			<tr> 
				<td> #IDID </td>
				<td> 7000 </td>
				<td> Niv19</td>
			</tr>					
			<tr> 
				<td> #IDID </td>
				<td> 7000 </td>
				<td> Niv19</td>
			</tr>
		</table>
	</article>
	
	<article >
		<p>
		        <a id="submitButton" href="#" class="button-jouer">Jouer</a>
		</p>
	</article>