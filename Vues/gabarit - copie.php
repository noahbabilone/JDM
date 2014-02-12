
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <!-- CSS stylesheet file-->
        <link rel="stylesheet" href="../Css/style.css" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster" />
        <title><?= $titre ?></title>
        
    </head>
    <body>
        <div id="global">
	        <!-- En-tête de la page -->	
			<header>
				<div id="titre_principal">
					<h1>The Words World</h1>
			    </div>
			    <div id="bloc_session">
					<p>
						<img src="../Images/avatar_defaut.png" title="" alt="" name="" width=50  height=50 />
						<ul>
					<!-- 	<li> <a href="#bloc_connexion" class="popup_connexion">Connexion</a></li> -->
							<li> <a href="../Pages/connexion.php" class="popup_connexion">Connexion</a></li>
							<li> <a href="#">Inscription</a></li>
						</ul>
					</p>
			    </div> 
			        
			    <div id="bloc_connexion">
			    	<h2> Connexion </h2>
					<form method="post" id="contact">
						<table>
							<tr> 
								<td><label for="login"> Login :</label></td>
								<td>                   
									<input type="text" id="login" name="login"  class="login-inp" />
								</td>
							</tr>
							<tr>
							<td><label for="passe">Mot de passe :</label></td>
								<td>                   
									<input type="password" id="passe" name="passe"  class="login-inp" />
								</td>
							</tr>
					       <tr>
				                <td></td>
				                <td>
				                <button type="submit"  name="valider" id="valider" class="" ><span>Connexion</span></button> <!-- - -->                 
			<!-- 	                <button type="reset" name="valider" id="annule" class=""  ><span>Annuler</span></button> -->
				                </td>
				            </tr>
						</table>
					</form>
				</div>
			</header>
			
			<!-- Menu --->
			<nav>
				<ul id="menu">
			    	<li id="accueil"><a href="#accueil" class="homeIcon">Accueil</a></li>
			    	<li id="classement"><a href="#Classement">Classement</a></li>
			    	<li id="event"><a href="#Event">Evènement</a></li>
			    	<li id="forum"><a href="#Forum" >Forum</a></li>
			        <li id="option"><a href="#">Options +</a>
			           <!--
 <ul class="sousMenu">
			            	<li><a href="#" class="">SOUK</a></li>
			            	<li><a href="#" class="">BAM</a></li>
			            	<li><a href="#" class="">Portail</a></li>
			            	<li><a href="#" class="">Dico</a></li>
			            </ul>
-->
			        </li>
			        <li id="aides"><a href="#Aides" >Aides</a></li>

				</ul>
			</nav>
				<!--*************  Contient tous les contenues de chaque page *****************************-->
            <div id="contenu"> 
            
                <?/* = $contenu */ ?>
            
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
