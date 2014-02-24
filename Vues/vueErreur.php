<?php $this->titre = "Page introuvable"; ?>
<article>
	<p>
	<?php
		if (isset($msgErreur))
		{
			echo $msgErreur; 
		}
	?>
	</p>
</article>
