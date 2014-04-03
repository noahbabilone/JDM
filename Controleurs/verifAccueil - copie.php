<?php
require_once ROOT . '/Modeles/bloc.php';
require_once ROOT . '/Modeles/modeles.php';

if(isset($_POST['action']) && !empty($_POST['action']))
{
	$action=$_POST['action'];
	
	if(isset($_POST['id_bloc']) && !empty($_POST['id_bloc']))
	{
		$id_bloc=$_POST['id_bloc'];
		    $bloc= new Bloc();

	
		if($action=='precedent')
		{
			$blocID= $bloc->blocSuivant($id_bloc);
			echo $blocID['id'];
		}

	}
	echo 'Cool';


}else
{
	echo 'Echec';
}


/*

  public function billet($idBillet) {
    $billet = $this->billet->getBillet($idBillet);
    $commentaires = $this->commentaire->getCommentaires($idBillet);
    $vue = new Vue("Billet");
    $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
  }
*/


/*
	
function boutonPrecedent()
{
	console.log("fonction");
	if($("#consigne-id").val())
	{
		var donnees='action=precedent&id_bloc='+$("#consigne-id").val();
			$.ajax({
					type: 'POST',
					url: 'Modeles/verifAccueil.php',
					data: donnees,
					success: function(data) {
							$(".test").wrap('<a href="">'+data+"</a>");
						}
				});
			
		
	}
	
	console.log("Fin");

} //fin de fonction

*/
