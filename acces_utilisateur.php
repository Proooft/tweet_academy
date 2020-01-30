<?php
require_once("include/application.php");
require_once("database/connexion.php");
require_once("database/utilisateur.php");
require_once("database/commentaires.php");

$titre = "Acces utilisateur";
// echo ('Hola che, paso por ICI');
// var_dump($_SESSION["id_user"]);
$erreurConnexion = "";
include_once("layout/include/top.php");

if (isset($_GET["action"]) === true) {
    if ($_GET["action"] === "inscription") {
        include_once("layout/include/menu_inscription.php");
        include_once("layout/include/form_inscription.php");
    } else if ($_GET["action"] === "S'inscrire") {
        include_once("layout/include/menu_inscription.php");
        extract($_POST);
        $pseudo = htmlspecialchars($pseudo);
        $sql = $bdd->prepare("SELECT pseudo FROM connexion WHERE pseudo = ?");
        $sql->execute(array($pseudo));
        if ($sql->rowCount() != 0) {
            header("location:" .  $_SERVER['HTTP_REFERER']);
        } else {
            $nom = htmlspecialchars($nom);
            $prenom = htmlspecialchars($prenom);
            $sexe = htmlspecialchars($sexe);
            $date_de_naissance = htmlspecialchars($date_de_naissance);
            $pays = htmlspecialchars($pays);
            $adresse_mail = htmlspecialchars($adresse_mail);
            $date_de_naissance = date("Y-m-d", strtotime($date_de_naissance));
            $inscription = inscriptionMembre($nom, $prenom, $sexe, $date_de_naissance, $pays, $adresse_mail);
            $id_dernier_user = $bdd->lastInsertId();
            $total = $inscription->rowCount();

            if (isset($erreurInscription) === false) {
                //tout est OK on enregistre l'utilisateur
                //on crypte le mot de passe 
                $password = htmlspecialchars($password);

                $password = md5($password);
                $inscription->closeCursor();
                $connexion = connexion($id_dernier_user, $pseudo, $password);

                upload($id_dernier_user);
                $id_dernier_images = $bdd->lastInsertId();

                $utilisateur = profil($id_dernier_user, $id_dernier_images);

                $result = affichageImg($id_dernier_images);
                if (isset($result) && $result !== null) {
                    include_once("layout/include/form_connexion.php");
                }
                // include_once("layout/include/form_connexion.php");
                else {
                    $erreurInscription = '<p>Une erreur est survenue lors de la création de votre compte</p>';
                }
            }
        }
    } else if ($_GET["action"] === "profil") {
        include_once("layout/include/menu.php");
        include_once("layout/include/result_profil.php");
    }
    if ($_GET["action"] === "avatar") {
        include_once("layout/include/menu.php");
        include_once("layout/include/result_profil.php");
        echo affichageImg($id_dernier_images);
    }
    if ($_GET["action"] === "mon_profil") {
        include_once("layout/include/menu.php");
        include_once("layout/include/result_profil.php");
    }

    if ($_GET["action"] === "acces_connexion") {
        include_once("layout/include/menu.php");
        include_once("layout/include/form_connexion.php");
    }
    if ($_GET["action"] === "connexion") {
        $params = array();
        //la variable erreur vaut null par défaut
        //on convertit chaque champ en variable avec la fonction extract()
        extract($_POST);
        $pseudo = htmlspecialchars($pseudo);
        array_push($params, $pseudo);

        $requette = "SELECT * FROM connexion WHERE pseudo = ?";
        $sql = $bdd->prepare($requette);
        $sql->execute($params);
        $total = $sql->rowCount();

        if ($total != 1) {
            //ce membre n'existe pas
            $erreurConnexion = '<p>Ce pseudo n\'existe pas dans notre base de données</p>';
            // header('location: /my_cinema/index.php');
        } else {
            /*
				on verifie si le mot de passe est correct
				tout d'abord pour comparer le mot de passe avec celui dans la table 
				il faut le crypter avant en utilisant la fonction md5() 
            */
            $password = htmlspecialchars($password);
            $password = md5($password);
            //recuperation des données dans la table de l'utilisateur
            $resultat = $sql->fetch();

            if ($resultat['password'] !== $password) {
                //le mot de passe est incorrect
                $erreurConnexion = '<p>Votre mot de passe est incorrect</p>';
            } else {
                //tout est bon on enregistre les données de l'utilisateur en session
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['id_ficheperso'] = $resultat['id_ficheperso'];
                // echo('Hola che, paso por ICI');
                var_dump($_GET['color']);
                //on le redirige sur la page d'accueil
                include_once("layout/include/menu_inscription.php");

                header('location: profil.php?color=true');
            }
        }
        if ($erreurConnexion !== "") {
            $_GET['color'] = false;
            include_once("layout/include/menu_inscription.php");
            include_once("layout/include/error/error.php");
        }
    }
    // include_once("layout/include/bottom.php");
}
