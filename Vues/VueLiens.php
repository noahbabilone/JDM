		
	
			
        <script type="text/javascript">
	
		
		</script>


<form id="form" method="post"  action="index.php?controleur=admin&action=ajouterLiens" >
<h2><textarea id="txt" name="txt"> Mon texte ici </textarea></h2>
<h2><input type="submit" id="btn-inscription" value="ajouter"  /><input type="hidden" id="idm" name="idm" value="<?php echo $id; ?>" /> <input type="hidden" id="mot" name="mot" value="<?php echo $mot; ?>"/>         </h2>
</form>

<table id="tableau" summary="Classement Blogspot par Wikio - Mai 2010">
  <thead>
    <tr>
      <th scope="col"><h2>Mot1</h2></th>
      <th scope="col"><h2>Mot2</h2></th>
      <th scope="col"><h2>Type Relation</h2></th>
	  <th scope="col"><h2>Poid</h2></th>
	 </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="4" align="center">tableau des Relations Pour le Mot <?php echo $mot;?> </td>
    </tr>
  </tfoot>
  <tbody id="tbody">
  
      <?php
if(isset($result)&&!empty($result)){

for($i=0;$i<count($result);$i++){
?>
<tr>
    <td id="<?php echo "inp".$result[$i]['idmot1'];  ?>"><h2><?php echo $result[$i]['mot1']; ?></h2> </td>
    <td id="<?php echo "inp".$result[$i]['idmot2'];  ?>"><h2><?php echo $result[$i]['mot2']; ?></h2> </td>
    <td><h2> <?php echo $result[$i]['type']; ?>     </h2> </td> 
	<td><h2><?php echo $result[$i]['poid']; ?></h2></td>

	


	
</tr>
<?php }} ?>	
	
	
  
  </tbody>
  </table>