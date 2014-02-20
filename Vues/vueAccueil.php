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
      
		<br/>         
        <?php
        if ($i==1){      
        	echo '<a href="#" class="consigne-'.($i+1).'">
        			<img src="images/suivant.png" width="30" height="15" class="btn-suivant" />
        		 </a>';	
        }
        elseif ($i==$fin){
         	echo '<a href="#" class="consigne-'.($i-1).'">        			
         			<img src="images/precedent.png" width="30" height="15" class="btn-precedent"/>
         	</a>' ;
       	}
        else{
        	echo  '<a href="#" class="consigne-'.($i-1).'"> 
        				<img src="images/precedent.png" width="30" height="15" class="btn-precedent" />
        			</a> 
        			 <a href="#" class="consigne-'.($i+1).'">         			
        			 	<img src="images/suivant.png" width="30" height="15" class="btn-suivant" />
        			 </a>';
       	}
       	$i++;
         ?> 
         <span class="clear"> </span>
        </p>
        
        <input type="hidden" id="consigne-id" class="" value="<?= $bloc['id'] ?>" />
    </article>
<?php endforeach; ?>


	<article class="classementAccueil">
		<h3> Top 10 de la semaine </h3>
		<div id=""> 
		<table>
			<tr> 
				<th> # </th>
				<th> Joeur </th>
				<th> Score </th>
				<th> Niveau</th>
			</tr>
			
		<?php 
			for ($i=1;$i<=10;$i++){
		
			echo '<tr class="classement-'.$i.'"> 
					<td class="col-1">'.$i.'</td>
					<td> #IDID </td>
					<td> 7000 </td>
					<td> Niv19</td>
				</tr>';					
			}
		?>
		
		</table>
		</div>
	</article>
	
	<section id="button_jouer">
		<p>
		        <a id="submitButton" href="#" class="button-jouer">Lancez le Jeu</a>
		</p>
	</section>