<?php $this->titre = "Page introuvable"; ?>
<article>
	<p> Oups, cette page n'est malheuresement pas disonible !! <br>
	<?php
		if (isset($msgErreur))
		{
			echo $msgErreur; 
		}
	?>
	</p>
</article>
