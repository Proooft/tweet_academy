

<html>
	  <head>
	  <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8" /><!-- TRES IMPORTANT POUR LE MOT AVEC ACCENT ET VIRGULE... -->

	   <?php
	  //require_once("entete/entete.php") ;
	   ?>
	
	  	<title>Base de données liste de pays et villes du monde</title>
	  </head>

<div class="form-group">


<select name='ville' id='ville' class="form-control">   

<?php
 
	if(isset($_REQUEST["idPays"])){
		try {
            $strConnection = 'mysql:host=localhost;dbname=bd_pays_villes';
            $pdo = new PDO($strConnection, 'root', '');
            }
            catch (PDOException $e){
            $msg = 'ERREUR PDO dans ' . $e->getMessage();
            die ($msg);
            }
		    $req="SELECT * FROM ville WHERE id_pays=".$_REQUEST["idPays"]." ORDER BY nom_ville";
		    $ps=$pdo->prepare($req);
            $ps->execute();

		while($p=$ps->fetch()){
			echo "<option value='".$p['id']."'>".$p['nom_ville']."</option>";
		}
	}
	else{
		echo "<option value='-1'>Choisir une ville</option>";
	}
	echo "</select>";
	
?>
</div>
 <html/>



 