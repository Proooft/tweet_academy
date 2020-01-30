<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>bd_pays_villes_du_monde</title>
<style type="text/css">
<!--
.Style1 {font-size: 18px}
body {
	background-color: #FFFFFF;
}
.Style4 {font-size: 24px; font-family: "Monotype Corsiva"; color: #660000; }
.Style5 {color: #000066}
.Style8 {font-size: 14px}
.Style9 {font-size: 16px}
.Style10 {color: #0000CC}
form {background-color:#FFFFCC}
-->
</style>
<script type='text/javascript'>
<!--
var xhr = null; 
	 
			function getXhr(){
				if(window.XMLHttpRequest) // Firefox et autres
				   xhr = new XMLHttpRequest(); 
				else if(window.ActiveXObject){ // Internet Explorer 
				   try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } catch (e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
				}
				else { // XMLHttpRequest non supporté par le navigateur 
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
				   xhr = false; 
				} 
			}
			
			/**
			* Méthode qui sera appelée sur le click du bouton
			*/
			function go(){
				getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('villeok').innerHTML = leselect;
					}
				}
 
				// Ici on va voir comment faire du post
				xhr.open("POST","ajaxmakaville.php",true);
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id du pays
				sel = document.getElementById('pays');
				idpays = sel.options[sel.selectedIndex].value;
				xhr.send("idPays="+idpays);
			}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
</head>
<body onload="MM_preloadImages('image/bttel1.gif')">
<table width="270">
<tr>
	<td width="38">Pays</td>
	<td width="10">:</td>
  <td width="245">
				
			<select name='pays' id='pays' onchange='go()'>
			<option value='-1'>Choisir un pays</option>
			<?php
            try {
            $strConnection = 'mysql:host=localhost;dbname=bd_pays_villes';
            $pdo = new PDO($strConnection, 'root', '');
            }
            catch (PDOException $e){
            $msg = 'ERREUR PDO dans ' . $e->getMessage();
            die ($msg);
            }

            $req="SELECT * FROM pays ORDER BY nom_pays";
            $ps=$pdo->prepare($req);
            $ps->execute();
            while($p=$ps->fetch()){
              echo "<option value='".$p['id']."'>".$p['nom_pays']."</option>";              
             }
            ?>
	  </select>
	</td>			  
</tr>
<tr>	
<td>Ville</td>
<td> :</td>
<td>
				<div id='villeok' style='display:inline'>
				<select name='ville'>
					<option value='-1'>Choisir une ville</option>
				</select>
                </div>
</td>
</tr>
</table>              
</body>
</html>