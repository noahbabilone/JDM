<?php 
	// Initialisation Objet 	
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <!-- CSS stylesheet file-->
        <link rel="stylesheet" href="Css/style_1.css" />        
        <link rel="stylesheet" href="Css/style_2.css" />
        <link rel="stylesheet" href="Css/admin.css" />
        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="Css/notify.css"/>

        <!--Jquery - Javascript -->
        <script type="text/javascript" src="Js/jquery.js"></script>
        <script type="text/javascript" src="Js/documentReady.js"></script>
       	<script type="text/javascript" src="Js/jquery-ui-1.10.4.custom.min.js"></script>
       	<!--  	NOTIFY -->
       	<script type="text/javascript" src="Js/noty/packaged/jquery.noty.packaged.min.js"></script>
      	<!--  	NOTIFY layouts -->
       	  <!-- layouts -->
       	  
       	  
	  <!-- themes -->
	  <script type="text/javascript" src="Js/noty/themes/default.js"></script>     
        <!-- Fonction PHP -->      
        <title><?= $titre ?></title>
        
        
    </head>
    <body>
        <div id="global">
	      	
	        <!-- En-tête de la page -->	
			<header>
				<div id="logo">
<!-- 					<h1>The Words World</h1> -->
					<a href="index.php" ><img src="Images/logos/12.png" title="Accueil"  /></a>
			    </div>
			    <div id="bloc_session" class="bloc_connexion">
			    	<p>
			    	<img src="Images/avatar_defaut.png" title="" alt="" name="" width=50  height=50 />
						
		    	<?php
		    	 if ( !$this->user->estVide())
		    	 {
				?>
			    	<ul class="connecte">
				 		<li><a href="#" id="bulle-membre">Mon compte</a></li> 
				 		<li> <a href="Modeles/deconnexion.php" >D&eacute;connexion</a></li>
					</ul>
					</p>
				</div>
				<?php
		    		// On récupère les parties du joueur
		    		
		    		$score=0;
		    		$niveau=0;
			    	if ($this->partie->getPartiesByIdUser($this->user->getId()))
		    		{	
			    		$score=$this->partie->getScore();
			    		$niveau=$this->partie->getNiveau();
			    	
			    	}
		    		

			    	?>

				    <div id="bloc_session" class="bloc_infoJouer">
				    	<h4><?php echo ucfirst($this->user->getLogin()); ?></h4>
	
				      	<ul> <!-- CSS a finir  -->
					 		<li>Score: <span class="scoreJeu"><?php echo $score; ?></span></li> 
					 		<li>Niveau:<span class="niveauJeu"><?php echo $niveau; ?></span></li> 
					 		<li>Honneur: <span class="honneurJeu">#AFINIR</span></li> 
					 		<li>Classement: <span class="classement">#AFINIR</li> 
	
				    	</ul>
				    </div>
							<?php
			 	}else {
		    	?>		
			    	<ul class='non-connecte'>		
						<li> <a href="index.php?controleur=session&amp;action=connexion" >Connexion</a></li>
						<li> <a href="index.php?controleur=session&amp;action=inscription">Inscription</a></li>    
					</ul>
					</p>
		        </div> 
				<?php 
					}// fin else de Session 
				?>
	    
			</header>			
			<!-- Menu --->
			<nav>
				<ul id="menu">
			    	<li id="accueil"><a href="index.php" class="homeIcon">Accueil</a></li>
			    	<li id="classement"><a href="index.php?controleur=partie&action=jouer&amp;id=<?php echo ((isset($user) && !$user->estVide())? $user->getId():0); ?>" >Jouer</a></li>
			    	<li id="classement"><a href="#Classement">Classement</a></li>
			    	<li id="event"><a href="#Event">Evènement</a></li>
<!-- 			    	<li id="forum"><a href="#Forum" >Forum</a></li> -->
					<?php
			    		if ( !$this->user->estVide())// && !$user->estVide())
			    		{
			    	?>
			    		<li id="forum"><a href="index.php?controleur=admin&amp;action=ajout" >ajouter</a></li>
			    	<?php
			    		}
			    	?>
			        <li id="option"><a href="#">Options +</a>
			           	<ul class="sousMenu">
			            	<li><a href="#" class="">SOUK</a></li>
			            	<li><a href="#" class="">BAM</a></li>
			            	<li><a href="#" class="">Portail</a></li>
			            	<li><a href="#" class="">Dico</a></li>
			            </ul>
			           
			        </li>
			        <li id="aides"><a href="#Aides" >Aides</a></li>
				</ul>
			</nav>
				<!--*************  Contient tous les contenues de chaque page *****************************-->
            <div id="contenu">             
                <?= $contenu ?>
            </div> <!-- #contenu -->
			<!-- Pied de la page -->
			<footer>
				<div id="pied">
					<a href="#">Plan du Site</a> - 
					<a href="#"> Partenariat</a> -
					<a href="#"> Infos légales</a> -
					<a href="#"> Nous contacter </a> -
					<a href="#"> Administration</a>
				</div>
			</footer>
        </div> <!-- #global -->
    </body>
</html>

<?php
