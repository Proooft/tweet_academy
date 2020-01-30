<?php

include "connexion.php";

$mail=$_POST['mail'];  
        $sql='SELECT adresse_mail FROM fiche_personne WHERE adresse_mail = "' . $mail . '"';
        $res= $bdd->query($sql);  
        $total=count($res->fetchAll());  
        if($total>0)  
        {     
        echo "adresse mail déja utilisée !";  
        }
?>