
<script type="text/javascript" src="Js/jquery.fancybox.js?v=2.0.6"></script>
		
	
			
        <script type="text/javascript">
		
		function listeMots(){
		
		fonction("listeMots","*",null,1);
		}
	
		function chercher(){
		
		param=jQuery.trim($("#recherche").val());
		if(param.length==0) alert('recherche vide');
		else fonction("listeMots",param,null,1);
		
		}
		
		
		function fonction(methode,param,param1,f) {
	
		
  text="method="+methode+"&params="+param;
  if(param1!=null) text=text+"&params1="+param1;

$.ajax({
       url : 'Modeles/modeleAjax.php',
       type : 'POST',
	   data: text,
       dataType: "json",
       success : function(code_html, statut){ 
	   
         if(f==1){
		$('#tbody').empty(); 
		 for(i=0;i<code_html.length;i++){
		
		
		
		
	ajouter(code_html[i].mot_libelle,code_html[i].mot_id);
		
		
		
		
		}
		 
		 }else if(f==2){
		 
		 
		  if(code_html.ok=='1'){
		 $('#inp'+param1).empty();
	     $('#inp'+param1).append("<h2>"+param+"</h2>");
		  $('#b'+param1).empty();
		 
		 $('#b'+param1).append('<input type="button" id="btn-inscription" value="modifier" onclick="modifier(\''+param+'\',\''+param1+'\')">');
		 
		 
		 }else{

           alert('echeck de modification');

          }		 
		 
		 
		
		 
		 }else if(f==3){
		 
		 $('#'+param).empty();
		 }else{
		 
		 
		 }

              
		 
		 },
       error : function(resultat, statut, erreur){
       
	   alert('il y a une erreure '+erreur);
	   }
    });
		






}

   function envoyer(id){
 
   
   param=jQuery.trim($("#input"+id).val());
   fonction("modifier",param,id,2);
   
   }

   

   
    function modifier(id1,id){

	input="input"+id;
    $('#inp'+id).empty();
	$('#inp'+id).append("<h2><input id='"+input+"' type='text' value='"+id1+"'></h2>");
    $('#b'+id).empty(); 
	$('#b'+id).append("<input type='button' id='btn-inscription' value='envoyer' onclick='envoyer(\""+id+"\")'>");
	}

	function supprimer(id){
	alert("suppression "+id);
	fonction("supprimerMot",id,null,3);
	
	}
	function ajouter(i,v){
	inp='inp'+v;
	bout="b"+v;
	sup="s"+v;
	
	$('#tableau').append('<tr id="'+v+'"><td id="'+inp+'">'+i+'</td><td>francais</td><td>ok</td><td id="'+bout+'"><input type="button"  value="modifier" onclick="modifier(\''+i+'\',\''+v+'\')"></td><td id="'+sup+'"><input type="button"  value="supprimer" onclick="supprimer(\''+v+'\')"></td></tr>');
		
		
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

<form method="post" id="form"  action="index.php?controleur=admin&action=gerer">


 <input type="text" id="recherche" name="recherche"  /> 


<input type="submit"  name="envoyer" id="btn-inscription"  value="chercher" >  




</form>



<table id="tableau" summary="Classement Blogspot par Wikio - Mai 2010">
  <thead>
    <tr>
      <th scope="col"><h2>libelle mot</h2></th>
      <th scope="col"><h2>langue</h2></th>
      
	  <th scope="col"><h2>modification</h2></th>
	  <th scope="col"><h2>suppression</h2></th>
      
    </tr>
  </thead>
  <tfoot>
    <tr>
      <td colspan="3">tableau des états d'ajout </td>
    </tr>
  </tfoot>
  <tbody id="tbody">
  
    <?php
if(isset($result)){
for($i=0;$i<count($result);$i++){
?>
<tr id="<?php echo $result[$i]['id'];   ?>" >
    <td id="<?php echo "inp".$result[$i]['id'];  ?>"><h2><?php echo $result[$i]['mot']; ?></h2> </td>
    <td> Francais </td>
   

	<td id="<?php echo "b".$result[$i]['id'];  ?>">  <input type="button" id="btn-inscription" value="modifier" onclick="modifier(<?php echo "'".$result[$i]['mot']."','".$result[$i]['id']."'";?>)" />        </td>
	<td>  <input type="button"  value="supprimer" id="btn-inscription" onclick="supprimer(<?php echo "'".$result[$i]['id']."'"; ?>)"></td>
	<td><form id="form" method="post"  action="index.php?controleur=admin&action=lien" >
	<input type="submit" value="liens" id="btn-inscription">
    <input type="hidden" id="mot1" name="mot1" value="<?php echo $result[$i]['mot']; ?>"><input type="hidden" id="mot" name="mot" value="<?php echo $result[$i]['id']; ?>"></form></td>	
	
</tr>
<?php }} ?>	
	
	

  </tbody>
</table> 
