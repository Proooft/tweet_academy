<?php
require_once("include/application.php");	
require_once("database/connexion.php");
require_once("database/utilisateur.php");
$titre = "Bienvenue";
include_once("layout/include/top.php");
include_once("layout/include/menu.php");
if (isset($_GET["action"]) === true) {
    if ($_GET["action"] === "avatar") { 
        include_once("layout/include/form_avatar.php");
    }
    if ($_GET["action"] === "upload") { 
        upload($id_dernier_user);
        $result = affichageImg($id_dernier_images);
        include_once("layout/include/result_profil.php");

        // echo '<img src="data:'. $result['extension'] . ';base64,'.base64_encode($result['photo_avatar']).'" alt="photo"><br>';
    }
}
include_once("layout/include/bottom.php");
