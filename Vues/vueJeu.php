<?php $this->titre = "Partie - The Words wolrd "; ?>
<!--



<link rel="stylesheet" href="Js/countDown/jquery.countdown.css">
<script type="text/javascript" src="Js/countDown/jquery.countdown.js"></script>
<script type="text/javascript" src="Js/countDown/jquery.countdown-fr.js"></script>



<style type="text/css">
	#defaultCountdown { width: 240px; height: 45px; border: 1px solid black; }
</style>
<script type="text/javascript">
$(function () {
	var austDay = new Date();
	austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	$('#defaultCountdown').countdown({until: austDay});
	$('#year').text(austDay.getFullYear());
});
</script>
-->



<section id="partie">

		<h1>Test</h1>
		<hR />
	<div class="jeu">
				
		<div id="countDown"> Temps: <span class="countDown">60</span> Secondes</div>

		<div class="consigne-jeu">
			<p>Donner des ASSOCIATIONS D'IDEES avec le terme qui suit :</p>
		</div>
		
			<h2>SOUMETTRE</h2>
					
		<div class="form-proposition ">
		    <form action="#" method="post" >
				<input type="text" id="" class="champ-saisi" /> 
				<button type="submit" class="btn-propositon" required >Ok</button>
		    </form>
		</div>
		
		<div class="resultat-saisi">
			<input type="hidden" class="nb-ligne-tab" value="0">
			<table class="table-proposition">
			</table>
		</div>		
		<div id="defaultCountdown"></div>
		<div id="compteARebours"></div>

	
	</div>
</section>

