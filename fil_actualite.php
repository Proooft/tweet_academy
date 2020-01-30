<?php
require_once("include/application.php");
require_once("database/connexion.php");
require_once("database/utilisateur.php");
require_once("database/commentaires.php");
$titre = "Sqweel Academie";
include_once("layout/include/top.php");
if (isset($_SESSION["id_ficheperso"]) === true) {
    $id_ficheperso = intval($_SESSION["id_ficheperso"]);
    $user = getUtilisateur($id_ficheperso);
    $pseudo = getConnexion($id_ficheperso);
    $profil = getProfil($id_ficheperso);
    $result = getImg($id_ficheperso);
    $phrase = getPhraseDeHumeur($id_ficheperso);
    $countTweet = countTweet($id_ficheperso);
    $countFollower = countFollower($id_ficheperso);
    $countFollowing = countFollowing($id_ficheperso);
    $hashtag = countHashtag();


    $following = afficheFollowing($_SESSION["id_ficheperso"]);

    $follower = afficheFollower($_SESSION["id_ficheperso"]);
    $contenu_follower = $follower->fetch();
    // $id_follower = getIdFichePerso($contenu_follower["id_ficheperso"]);
    // $id_follower = intval($id_follower['id_ficheperso']);

    include_once("layout/include/menu.php");

    // include_once("layout/include/result_profil.php");
    // include_once("layout/include/result_profil_tweet.php");
    // include_once("layout/include/result_profil_tweet_foot.php");

    $tweet = getTweet();
    $allTweet = getAllTweet();
    $avatar = getImg($id_ficheperso);
    // include_once("layout/include/result_profil_fil_actualite.php");

    if (isset($_GET['desabonner']) === true) {
        if (isset($_SESSION["id_ficheperso"]) === true) {
            $id_ficheperso = intval($_SESSION["id_ficheperso"]);
        }
        if (isset($_GET["user"]) === true) {
            $pseudo = $_GET["user"];
        }
        $id_follower = $_GET['follower'];
        $id_follower = intval($id_follower);

        desabonnerFollower($id_ficheperso, $id_follower);
        desabonnerFollowing($id_follower, $id_ficheperso);
        $follower = afficheFollower($id_ficheperso);
        $pseudo = getConnexion($id_ficheperso);
        $pseu = $pseudo['pseudo'];

        if (isset($_GET['page_following']) != true) {
            header("refresh:0;url=fil_actualite.php?color=true&user=$pseu&following=true");
        }
        if (isset($_GET['page_follower']) != true) {
            header("refresh:0;url=fil_actualite.php?color=true&user=$pseu&follower=true");
        }
        if (isset($_GET['page_follower']) === true) {
            // if ($follower->rowCount() > 0) {
            include_once("layout/include/result_profil_fil_actualite.php");
            // } else {
            // include_once("layout/include/error/ocun_follower.php");
            // }
            // echo('Hola che, paso por ICI FOLLOWER');
            // include_once("layout/include/resume_follower.php");
        } else if (isset($_GET['page_following']) === true) {
            $following = afficheFollowing($id_ficheperso);
            // if ($following->rowCount() > 0) {
            include_once("layout/include/result_profil_fil_actualite.php");
            // } else {
            // include_once("layout/include/error/ocun_following.php");
            // }
            // include_once("layout/include/resume_follower.php");
            // }
        }
    }


    if (isset($_GET['suivre']) === true) {
            if (isset($_SESSION["id_ficheperso"]) === true) {
                $id_ficheperso = intval($_SESSION["id_ficheperso"]);
            }
            if (isset($_GET["user"]) === true) {
                $pseudo = $_GET["user"];
            }

            $id_follower = $_GET['follower'];
            $id_follower = intval($id_follower);

            $pseudo = getConnexion($id_ficheperso);
            $pseu = $pseudo['pseudo'];

            addFollower($id_ficheperso, $id_follower);
            addFollowing($id_follower, $id_ficheperso);
            $follower = afficheFollower($id_ficheperso);
            if (isset($_GET['page_following']) != true) {
                header("refresh:0;url=fil_actualite.php?color=true&user=$pseu&following=true");
            } else if (isset($_GET['page_follower']) != true) {
                header("refresh:0;url=fil_actualite.php?color=true&user=$pseu&follower=true");
            }
            if (isset($_GET['page_follower']) === true) {
                // if ($follower->rowCount() > 0) {
                include_once("layout/include/result_profil_fil_actualite.php");
                // } else {
                //     include_once("layout/include/error/ocun_follower.php");
                // }
            } else if (isset($_GET['page_following']) === true) {
                $following = afficheFollowing($id_ficheperso);
                // if ($following->rowCount() > 0) {
                include_once("layout/include/result_profil_fil_actalite.php");
                // } else {
                // include_once("layout/include/error/ocun_following.php");
                // }
                // include_once("layout/include/resume_follower.php");
            } else if (isset($_GET['following'])) {
                $id_ficheperso = getIdFichePerso($_GET['user']);
                $id_ficheperso = intval($id_ficheperso['id_ficheperso']);
                $following = afficheFollowing($id_ficheperso);
                include_once("layout/include/result_profil_fil_actalite.php");
            }
    } else if (isset($_GET['following'])) {
            if (isset($_SESSION["id_ficheperso"]) === true) {
                $id_ficheperso = intval($_SESSION["id_ficheperso"]);
            }
            // echo('Hola che, paso por $id_utilisateur');
            global $id_utilisateur;
            // var_dump($id_utilisateur);

            $id_following = getIdFichePerso($_GET['user']);
            $id_following = intval($id_following['id_ficheperso']);
            // echo('Hola che, paso por ICI id_following');
            // var_dump($id_following);
            $following = afficheFollowing($id_following);
            // echo('Hola che, paso por ICI following');
            // var_dump($follower);
            if (isset($following)) {
                // echo ('Hola che, paso por ICI');
                // if ($following->rowCount() > 0) {
                include_once("layout/include/result_profil_fil_actualite.php");

                // include_once("layout/include/resume_following.php");
                // } else {
                // include_once("layout/include/error/ocun_following.php");
                // }
            }
        } else if (isset($_GET['follower'])) {
            if (isset($_SESSION["id_ficheperso"]) === true) {
                $id_ficheperso = intval($_SESSION["id_ficheperso"]);
            }
            // echo('Hola che, paso por $id_utilisateur');
            global $id_utilisateur;
            // var_dump($id_utilisateur);

            $id_follower = getIdFichePerso($_GET['user']);
            $id_follower = intval($id_follower['id_ficheperso']);
            // echo('Hola che, paso por ICI id_FOLLOWER');
            // var_dump($id_follower);
            $follower = afficheFollower($id_follower);
            // echo('Hola che, paso por ICI FOLLOWER');
            // var_dump($follower);
            if (isset($follower)) {
                // if ($follower->rowCount() > 0) {
                include_once("layout/include/result_profil_fil_actualite.php");
                // include_once("layout/include/resume_follower.php");
                // } else {
                //     include_once("layout/include/error/ocun_follower.php");
                // }
            }
        } else if (isset($_GET['action']) === true) {
            if ($_GET['action'] === 'commentaire') {
                extract($_POST);
                // var_dump($_POST);
                if (isset($_POST['sqweel']) === true) {
                    $new_tweet = addTweet();
                    $tweet = getTweet();

                    // echo('Hola che, paso por ICI $tweet');
                    // var_dump($tweet);
                    $id_dernier_tweet = getIdDernierTweet();
                    $id_dernier_tweet = intval($id_dernier_tweet['id_dernier_tweet']);
                    // echo('Hola che, paso por ICI ID DER TWEET');
                    // var_dump($id_dernier_tweet);

                    $hashtag = addHashtag($id_dernier_tweet);
                    $allTweet = getAllTweet();
                    $hashtag = countHashtag();

                    header("refresh:0;url=fil_actualite.php?color=true");
                    //Imprima algunos contenidos por ejemplo.
                    // include_once("layout/include/reussi/tweet.php");
                }
            }
            // if ($_GET['action'] === 'faire_commentaire') {
            if (isset($_POST['commentaires'])  === true) {
                $new_retweet = addReTweet(htmlspecialchars($_POST['id']));
                $allReTweet = getAllReTweet(htmlspecialchars($_POST['id']));
                $id_dernier_retweet = getIdDernierRETweet();
                $id_dernier_retweet = intval($id_dernier_retweet['id_dernier_retweet']);
                // echo('Hola che, paso por ICI ID DER TWEET');
                // var_dump($id_dernier_tweet);

                $hashtag = addHashtag($id_dernier_retweet);
                $allTweet = getAllTweet();

                $hashtag = countHashtag();
                header("refresh:1;url=fil_actualite.php?color=true");
                //Imprima algunos contenidos por ejemplo.
                include_once("layout/include/reussi/tweet.php");
            }
        }



        //partie desabonner et suivre


     else {
        $hashtag = countHashtag();
        include_once("layout/include/result_profil_fil_actualite.php");

        // include_once("layout/include/form_sqweel.php");
        // include_once("layout/include/resume_sqweel.php");
    }

    $hashtag = countHashtag();
    // include_once("layout/include/form_sqweel.php");
    // include_once("layout/include/result_profil.php");
    // include_once("layout/include/result_profil_tweet.php");
    // include_once("layout/include/result_profil_tweet_foot.php");
    // include_once("layout/include/result_profil_fil_actualite.php");

    // include_once("layout/include/resume_sqweel.php");
    ob_end_flush();
}
