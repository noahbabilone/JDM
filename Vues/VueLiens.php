		
	
			
        <script type="text/javascript">
		valide=0;
function fonction(methode,param) {
	
		
  text="method="+methode+"&params="+param;


$.ajax({
       url : 'Modeles/modeleAjax.php',
       type : 'POST',
	   data: text,
       dataType: "json",
       success : function(code_html, statut){ 
	   
	   id="t"+param;
	   $('#'+param).after("<tr><h2><td colspan='3' id='"+id+"'></td></h2></tr>");
        for(i=0;i<code_html.length;i++){
		
		 $('#t'+param).append(code_html[i].mot_prop+", ");
		
		}
              
		 
		 },
       error : function(resultat, statut, erreur){
       
	   alert('il y a une erreure '+erreur);
	   }
    });
		






}	
		function voir(id){
		if(valide==0)
		fonction("prop",id);
		valide=1;
		}
		
		
		</script>
		
<style>



#tableau {
    font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;
    margin: 10px 0;
    width: 100%;
    text-align: left;
    border-collapse: collapse;
}
#tableau th {
    font-size: 13px;
    font-weight: normal;
    padding: 8px;
    background: #b9c9fe url('http://4.bp.blogspot.com/_xDpoN6UfFFY/S-J2gjh1nPI/AAAAAAAACbg/7lNsVpks2oY/s1600/gradhead.png') repeat-x;
    border-top: 2px solid #d3ddff;
    border-bottom: 1px solid #fff;
    color: #039;
}
#tableau td {
    padding: 8px;
    border-bottom: 1px solid #fff;
    color: #669;
    border-top: 1px solid #fff;
    background: #e8edff url('http://1.bp.blogspot.com/_xDpoN6UfFFY/S-J2f5yBC3I/AAAAAAAACbY/zWXYXsR-w5E/s1600/gradback.png') repeat-x;
}
#tableau tfoot tr td {
    background: #e8edff;
    font-size: 16px;
    color: #99c;
    text-align:center;
}
#tableau tbody tr:hover td {
    background: #d0dafd url('http://4.bp.blogspot.com/_xDpoN6UfFFY/S-J2hsztUzI/AAAAAAAACbo/ztV1CK0RUrE/s1600/gradhover.png') repeat-x;
    color: #339;
}
#tableau a:hover {
    text-decoration:underline;
}
</style>

<form id="form" method="post"  action="index.php?controleur=admin&action=ajouterLiens" >
<h2><textarea id="txt" name="txt"> Mon texte ici </textarea></h2>
<h2><input type="submit" id="btn-inscription" value="ajouter"  /><input type="hidden" id="idm" name="idm" value="<?php echo $id; ?>" /> <input type="hidden" id="mot" name="mot" value="<?php echo $mot; ?>"/>         </h2>
</form>

<table id="tableau" summary="Classement Blogspot par Wikio - Mai 2010">
  <thead>
    <tr>
      <th scope="col"><h2>User</h2></th>
      <th scope="col"><h2>date</h2></th>
      <th scope="col"><h2>Propositions</h2></th>
	 </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="3">tableau des parties joué <?php 
	  if(isset($mot)){
	  echo "pour le mot ".$mot; 
	  }else if(isset($user)){
	  
	  echo "par l'utilisateur ".$user;
	  
	  }
	  
	  ?> </td>
    </tr>
  </tfoot>
  <tbody id="tbody">
  
      <?php
if(isset($result)&&!empty($result)){

for($i=0;$i<count($result);$i++){
?>
<tr id="<?php echo $result[$i]['idp'];   ?>" >
    <td id="<?php echo "inp".$result[$i]['idu'];  ?>"><h2><a href="" ><?php echo $result[$i]['login']; ?></a></h2> </td>
    <td> aujourd'hui </td>
   

	<td>
	<input type="button" value="voir" id="btn-inscription" onclick="voir(<?php echo "'".$result[$i]['idp']."'"; ?>)">
    <input type="hidden" id="partie" name="partie" value="<?php echo $result[$i]['idp']; ?>">      </td>

	
</tr>
<?php }} ?>	
	
	
  
  </tbody>
  </table>