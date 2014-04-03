<?php $this->titre = "The words world - Page introuvable"; ?>
<article id="erreur-page">

	<h1>Erreur Page 404 </h1>
	<p class="message-erreur">
	<?php
		if (isset($msgErreur))
		{
			echo $msgErreur; 
		}
	?>

	</p>
	<p>
		<img src="images/404/ninja.png" width="" height="" />
	</p>
</article>
