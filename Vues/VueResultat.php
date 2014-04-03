		

<form method="post" id="form"  action="index.php?controleur=admin&action=gerer">
<h2><input type="radio" name="rech" value="2" checked> mots valides</h2>
<h2><input type="radio" name="rech" value="3">mots invalides</h2> 
<h2><input type="radio" name="rech" value="4" >mots à valider </h2>
<input type="text" id="recherche" name="recherche"  /> 
<input type="submit"  name="envoyer" id="btn"  value="chercher" >  




</form>



<table id="tableau" summary="Classement Blogspot par Wikio - Mai 2010">
  <thead>
    <tr>
      <th scope="col"><h2>libelle mot</h2></th>
      <th scope="col"><h2>langue</h2></th>
      
	  <th scope="col"><h2>modification</h2></th>
	  <th scope="col"><h2>suppression</h2></th>
	  <th scope="col"><h2>liens</h2></th>
      
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="5" align="center">tableau des états d'ajout </td>
    </tr>
  </tfoot>
  <tbody id="tbody">
  
    <?php
if(isset($result)){
for($i=0;$i<count($result);$i++){
?>
<tr id="<?php echo $result[$i]['id'];   ?>" >
    <td id="<?php echo "inp".$result[$i]['id'];  ?>"><h2><?php echo $result[$i]['mot']; ?></h2> </td>
    <td><h2> <?php echo $result[$i]['langue'];  ?></h2> </td>
   

	<td id="<?php echo "b".$result[$i]['id'];  ?>">  <input type="button" id="btn" value="modifier" onclick="modifier(<?php echo "'".$result[$i]['mot']."','".$result[$i]['id']."'";?>)" />        </td>
	<td>  <input type="button"  value="supprimer" id="btn-inscription" onclick="supprimer(<?php echo "'".$result[$i]['id']."'"; ?>)"></td>
	<td><form id="form" method="post"  action="index.php?controleur=admin&action=lien" >
	<input type="submit" value="liens" id="btn">
    <input type="hidden" id="mot1" name="mot1" value="<?php echo $result[$i]['mot']; ?>"><input type="hidden" id="mot" name="mot" value="<?php echo $result[$i]['id']; ?>"></form></td>	
	
</tr>
<?php }} ?>	
	
	

  </tbody>
</table> 
