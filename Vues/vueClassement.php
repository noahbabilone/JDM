<?php $this->titre = "Classement"; ?>


<div class="classement">
	<CENTER>
	<table>
		<tr> 
			<th> Rang </th>
			<th> Joueur </th>
			<th> Score </th>
		</tr>
			
		<?php 
			$num = 1;
			foreach ($classes as $classe):

				echo '<tr> 
						<td class="col-1">'.$num.'</td>
						<td> '.$classe['user_login'].' </td>
						<td><b> '.$classe['score'].' </b></td>
					</tr>';	
				$num++;

			endforeach;	
		?>
		
	</table>
</CENTER>
</div>
