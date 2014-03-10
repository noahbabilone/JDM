<?php
 if (isset($_SESSION['id']) && isset($_SESSION['login'])
  &&
  	!empty($_SESSION['id']) && !empty($_SESSION['login']))
 {
	 $idUser=$_SESSION['id'];
	 $loginUser=$_SESSION['login'];
 }
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <!-- CSS stylesheet file-->
        <link rel="stylesheet" href="Css/style_1.css" />        
        <link rel="stylesheet" href="Css/style_2.css" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster" />
        
        <!--Jquery - Javascript -->
        <script type="text/javascript" src="Js/jquery.js"></script>
        <script type="text/javascript" src="Js/docReady.js"></script>
        
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
		    	 if ( isset($idUser))
		    	 {
				?>
			    	<ul class="connecte">
				 		<li><a href="#" id="bulle-membre">Mon compte</a></li> 
				 		<li> <a href="Modeles/deconnexion.php" >D&eacute;connexion</a></li>
					</ul>
					</p>
				</div>
			    <div id="bloc_session" class="bloc_infoJouer">
			    	<h4><?php echo ucfirst($loginUser); ?></h4>

			    	<ul>
				 		<li>Niveau: </li> 
				 		<li>Cr&eacute;dit: </li> 
				 		<li>Honneur: </li> 
				 		<li>Classement: </li> 

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
			    	<li id="classement"><a href="#Classement">Classement</a></li>
			    	<li id="event"><a href="#Event">Evènement</a></li>
			    	<li id="forum"><a href="#Forum" >Forum</a></li>
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
