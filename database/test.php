<?php
include "connexion.php";
$nick=$_POST['username'];  
        $sql='SELECT pseudo FROM connexion WHERE pseudo = "' . $nick . '"';
        $res= $bdd->query($sql);  
        $total=count($res->fetchAll());  
        if($total>0)  
        {     
        echo "Ce Pseudo n'est pas disponible !";  
        }  
?>