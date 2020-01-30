<?php
$id_dernier_images = "";
$id_dernier_user = "";
function inscriptionMembre($nom, $prenom, $sexe, $date_de_naissance, $pays, $adresse_mail)
{
    global $bdd;
    static $id_dernier_user;
    $requette = $bdd->prepare("INSERT INTO fiche_personne (nom, prenom, sexe, date_de_naissance, pays, adresse_mail)
    VALUES (:nom, :prenom, :sexe, :date_de_naissance, :pays, :adresse_mail)");

    $requette->execute([
        "nom" => $nom,
        "prenom" => $prenom,
        "sexe" => $sexe,
        "date_de_naissance" => $date_de_naissance,
        "pays" => $pays,
        "adresse_mail" => $adresse_mail
    ]);
    // $id_dernier_user = $bdd->lastInsertId();
    return $requette;
}

function upload($id_dernier_user)
{
    $id_dernier_user = intval($id_dernier_user);
    global $bdd;
    // if (isset($_POST["S'inscrire"])) {

    //Indique si le fichier a été téléchargé
    if (!is_uploaded_file($_FILES['photo_avatar']['tmp_name']))
        echo 'Un problème est survenu durant l opération. Veuillez réessayer !';
    else {
        //liste des extensions possibles    
        $extensions = array('/png', '/gif', '/jpg', '/jpeg');

        //récupère la chaîne à partir du dernier / pour connaître l'extension
        $extension = strrchr($_FILES['photo_avatar']['type'], '/.');

        //vérifie si l'extension est dans notre tableau            
        if (!in_array($extension, $extensions))
            echo 'Vous devez uploader un fichier de type png, gif, jpg, jpeg.';
        else {

            //on définit la taille maximale
            define('MAXSIZE', 300000);
            if ($_FILES['photo_avatar']['size'] > MAXSIZE)
                echo 'Votre photo_avatar est supérieure à la taille maximale de ' . MAXSIZE . ' octets';
            else {

                //Lecture du fichier
                $photo_avatar = file_get_contents($_FILES['photo_avatar']['tmp_name']);
                $req = $bdd->prepare("INSERT INTO avatar(id_ficheperso, photo_avatar, extension) 
                                            VALUES($id_dernier_user, :photo_avatar, :type)");
                $req->execute([
                    'photo_avatar' => $photo_avatar,
                    'type' => $_FILES['photo_avatar']['type']
                ]);
                // $id_dernier_images = $bdd->lastInsertId();
                // include_once("layout/include/reussi/insertion_img.php");
            }
        }
    }
}
// }

function affichageImg($id_dernier_images)
{
    global $bdd;

    if ($id_dernier_images !== "") {
        // if(!empty($_GET['id_avatar'])) {

        //on sécurise notre donnée
        // $id_avatar = intval($_GET['id_avatar']);
        $id_avatar = $id_dernier_images;

        //la requète qui récupère l'image à partir de l'identifiant
        $req = $bdd->prepare('SELECT extension, photo_avatar FROM avatar WHERE id_avatar = ?');
        $req->execute(array($id_avatar));

        if ($req->rowCount() != 1)
            include_once("layout/include/error/error_img_inex.php");
        else {
            //on stocke les données dans un tableau
            $donnees = $req->fetch();
            // var_dump($donnees['extension']);	
            //on indique qu'on affiche une image
            // header ("Content-type: ".$donnees['extension']);
            //on affiche l'image en elle même
            return $donnees;
        }

        $req->closeCursor();
    } else
        echo 'Vous n avez pas sélectionné d image !';
}
function getImg($id_ficheperso)
{
    global $bdd;

    if ($id_ficheperso !== "") {
        // if(!empty($_GET['id_avatar'])) {
        //on sécurise notre donnée
        // $id_avatar = intval($_GET['id_avatar']);
        //la requète qui récupère l'image à partir de l'identifiant
        $req = $bdd->prepare('SELECT extension, photo_avatar FROM avatar WHERE id_ficheperso = ?');
        $req->execute(array($id_ficheperso));
        if ($req->rowCount() != 1)
            include_once("layout/include/error/error_img_inex.php");
        else {
            //on stocke les données dans un tableau
            $donnees = $req->fetch();
            // var_dump($donnees['extension']);	
            //on indique qu'on affiche une image
            // header ("Content-type: ".$donnees['extension']);
            //on affiche l'image en elle même
            return $donnees;
        }
        // $req->closeCursor();
    } else
        echo 'Vous n avez pas sélectionné d image !';
}

function connexion($id_dernier_user, $pseudo, $password)
{
    global $bdd;
    $requette = $bdd->prepare("INSERT INTO connexion (id_ficheperso, pseudo, password, date_inscription)
    VALUES ($id_dernier_user, :pseudo, :password, NOW())");

    $requette->execute([
        "pseudo" => $pseudo,
        "password" => $password,
    ]);

    return $requette;
}


function profil($id_dernier_user, $id_dernier_img)
{
    global $bdd;
    $id_dernier_user = intval($id_dernier_user);
    $requette = $bdd->query("INSERT INTO profil (id_ficheperso, id_img)
    VALUES ($id_dernier_user, $id_dernier_img)");

    // $requette->execute([
    //     "id_img" => $id_dernier_img,
    // ]);

    return $requette;
}


function updatePhraseDEHumeur($id_utilisateur, $phrase_humeur)
{
    global $bdd;
    $phrase_humeur = htmlspecialchars($phrase_humeur);
    $phrase_humeur = str_replace("'", '\\\'', $phrase_humeur );

    $requette = "UPDATE profil SET phrase_humeur=? WHERE id_ficheperso= ?";
    $statement = $bdd->prepare($requette);
    $statement->execute([$phrase_humeur, $id_utilisateur]);
}

function getPhraseDeHumeur($id_user)
{
    global $bdd;
    $requette = "SELECT phrase_humeur from profil where id_ficheperso = $id_user";
    $statement = $bdd->query($requette);
    // $statement->execute(["id_user" => $id_user]);
    return $statement->fetch();
}

function getConnexion($id_user)
{
    global $bdd;
    $requette = "SELECT * from connexion where id_ficheperso = $id_user";
    $statement = $bdd->query($requette);
    // $statement->execute(["id_user" => $id_user]);
    return $statement->fetch();
}

function getUtilisateur($id_user)
{
    global $bdd;
    $requette = "SELECT * from fiche_personne where id_ficheperso = $id_user";
    $statement = $bdd->query($requette);
    // $statement->execute(["id_user" => $id_user]);
    return $statement->fetch();
}

function getProfil($id_user)
{
    global $bdd;
    $requette = "SELECT * from profil where id_ficheperso = $id_user";
    $statement = $bdd->query($requette);
    // $statement->execute(["id_user" => $id_user]);
    return $statement->fetch();
}

function updateUtilisateur($id_user, $pseudo, $password, $nom, $prenom, $sexe)
{
    global $bdd;

    $requette = "UPDATE  users  SET  pseudo = ?, password = ?, nom = ?, prenom = ?, sexe = ? WHERE  id_user = ?";
    $statement = $bdd->prepare($requette);
    $statement->execute([$pseudo, $password, $nom, $prenom, $sexe, $id_user]);
}

function countFollower($id_ficheperso)
{
    global $bdd;
    $teewt = $bdd->query("SELECT COUNT(id_follower) AS 'CountFollower' FROM follower WHERE id_ficheperso = $id_ficheperso");
    $result = $teewt->fetch();
    return $result;
}

function countFollowing($id_ficheperso)
{
    global $bdd;
    $teewt = $bdd->query("SELECT COUNT(id_following) AS 'CountFollowing' FROM following WHERE id_ficheperso = $id_ficheperso");
    $result = $teewt->fetch();
    return $result;
}

function montreUtilisateur()
{
    global $bdd;
    $utilisateur = $bdd->query("SELECT connexion.*, avatar.photo_avatar, avatar.extension FROM connexion
    INNER JOIN avatar 
    INNER JOIN following
    WHERE connexion.id_ficheperso != 197
    GROUP BY following.id_ficheperso = 197
    ");
    // $result = $teewt->fetch();
    return $utilisateur;
}

function addFollower($id_ficheperso, $id_follower)
{
    global $bdd;
    $follo = $bdd->query("INSERT INTO follower (id_ficheperso, id_follower)
                          VALUES ($id_ficheperso, $id_follower)");
    // $result = $follo->fetch();
    return $follo;
}


function addFollowing($id_ficheperso, $id_following)
{
    global $bdd;
    $follo = $bdd->query("INSERT INTO following (id_ficheperso, id_following)
                          VALUES ($id_ficheperso, $id_following)");
    // $result = $follo->fetch();
    return $follo;
}

function afficheFollowing($id_ficheperso)
{
    // SELECT id_following FROM `following` WHERE id_ficheperso = 197
    global $bdd;
    $follo = $bdd->query("SELECT following.id_following, avatar.photo_avatar, avatar.extension, profil.phrase_humeur, connexion.pseudo 
    FROM `following` 
    LEFT JOIN avatar ON avatar.id_ficheperso = following.id_following
    LEFT JOIN profil ON profil.id_ficheperso = following.id_following
    LEFT JOIN connexion ON profil.id_ficheperso = connexion.id_ficheperso
    WHERE following.id_ficheperso = $id_ficheperso GROUP BY following.id_following");
    // $result = $follo->fetch();
    return $follo;
}

function afficheFollower($id_ficheperso)
{
    // SELECT id_following FROM `following` WHERE id_ficheperso = 197
    global $bdd;
    $follo = $bdd->query("SELECT follower.id_follower, avatar.photo_avatar, avatar.extension, profil.phrase_humeur, connexion.pseudo
    FROM `follower` 
    LEFT JOIN avatar ON avatar.id_ficheperso = follower.id_follower
    LEFT JOIN profil ON profil.id_ficheperso = follower.id_follower
    LEFT JOIN connexion ON profil.id_ficheperso = connexion.id_ficheperso
    WHERE follower.id_ficheperso = $id_ficheperso GROUP BY follower.id_follower");
    // $result = $follo->fetch();
    return $follo;
}


function getIdFichePerso($pseudo)
{
    global $bdd;

    $requette = $bdd->query("SELECT id_ficheperso FROM `connexion` WHERE `pseudo` = '$pseudo'");
    return $requette->fetch();
}

function montreProfil($id_ficheperso)
{
    global $bdd;
    $utilisateur = $bdd->query("SELECT connexion.pseudo, connexion.date_inscription, fiche_personne.nom, fiche_personne.prenom, fiche_personne.date_de_naissance, fiche_personne.sexe, fiche_personne.pays, 
                                avatar.photo_avatar, avatar.extension 
                                FROM connexion 
                                INNER JOIN avatar 
                                INNER JOIN fiche_personne 
                                WHERE connexion.id_ficheperso = $id_ficheperso 
                                AND avatar.id_ficheperso = $id_ficheperso 
                                AND fiche_personne.id_ficheperso = $id_ficheperso");
    // $result = $teewt->fetch();
    return $utilisateur->fetch();;
}

function jeLeSuivre($id_ficheperso, $utilisateur)
{
    global $bdd;
    $je_suivre = $bdd->query("SELECT id_ficheperso FROM `follower` WHERE id_follower = $utilisateur AND id_ficheperso = $id_ficheperso");
    $count = $je_suivre->rowCount();
    return $count;
}


function desabonnerFollower($id_ficheperso, $id_follower)
{

    global $bdd;
    $requette = $bdd->prepare("DELETE FROM follower 
                               where id_ficheperso = $id_ficheperso 
                               AND id_follower = $id_follower");
    $requette->execute();
}
function desabonnerFollowing($id_ficheperso, $id_follower)
{

    global $bdd;
    $requette = $bdd->prepare("DELETE FROM following 
                               where id_ficheperso = $id_ficheperso 
                               AND id_following = $id_follower");
    $requette->execute();
}
