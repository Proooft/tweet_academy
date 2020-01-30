<?php
require_once("include/application.php");
require_once("database/connexion.php");
require_once("database/utilisateur.php");
require_once("database/commentaires.php");

$titre = "Profil";
$update_profil_utilisateur = false;
$update_profil_admin = false;
include_once("layout/include/top.php");
if ($_SESSION['id_ficheperso']) {
	// $nom_pseudo = htmlspecialchars($_GET['user']);
	// $id_ficheperso = intval($_SESSION["id_ficheperso"]);
    // $user = getUtilisateur($id_ficheperso);
    // $pseudo = getConnexion($id_ficheperso);
    // $profil = getProfil($id_ficheperso);
    // $result = getImg($id_ficheperso);
	$id_ficheperso = intval($_SESSION["id_ficheperso"]);
	
	$phrase = getPhraseDeHumeur($id_ficheperso);
    $countTweet = countTweet($id_ficheperso);
    $countFollower = countFollower($id_ficheperso);
    $countFollowing = countFollowing($id_ficheperso);
    $hashtag = countHashtag();

    $follower = afficheFollower($_SESSION["id_ficheperso"]);
    $contenu_follower = $follower->fetch();



	$user = getUtilisateur($id_ficheperso);
	$pseudo = getConnexion($id_ficheperso);
	$profil = getProfil($id_ficheperso);
	$result = getImg($id_ficheperso);

	$tweet = getTweet();
    $allTweet = getAllTweet();
    $avatar = getImg($id_ficheperso);
	include_once("layout/include/menu.php");
}

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

	if (isset($_GET['page_following']) != true) {
		header("refresh:0;url=profil.php?user=$pseudo&consultation=true");
	}
	if (isset($_GET['page_follower']) === true) {
		if ($follower->rowCount() > 0) {
			include_once("layout/include/resume_follower.php");
		} else {
			include_once("layout/include/error/ocun_follower.php");
		}
		// echo('Hola che, paso por ICI FOLLOWER');
		// include_once("layout/include/resume_follower.php");
	} else if (isset($_GET['page_following']) === true) {
		$following = afficheFollowing($id_ficheperso);
		if ($following->rowCount() > 0) {
			include_once("layout/include/resume_following.php");
		} else {
			include_once("layout/include/error/ocun_following.php");
		}
		// include_once("layout/include/resume_follower.php");
	}
} else if (isset($_GET['suivre']) === true) {
	if (isset($_SESSION["id_ficheperso"]) === true) {
		$id_ficheperso = intval($_SESSION["id_ficheperso"]);
	}
	if (isset($_GET["user"]) === true) {
		$pseudo = $_GET["user"];
	}

	$id_follower = $_GET['follower'];
	$id_follower = intval($id_follower);

	addFollower($id_ficheperso, $id_follower);
	addFollowing($id_follower, $id_ficheperso);
	$follower = afficheFollower($id_ficheperso);
	if (isset($_GET['page_following']) != true) {
		header("refresh:0;url=profil.php?user=$pseudo&consultation=true");
	} else if (isset($_GET['page_follower']) != true) {
		header("refresh:0;url=profil.php?user=$pseudo&consultation=true");
	}
	if (isset($_GET['page_follower']) === true) {
		if ($follower->rowCount() > 0) {
			include_once("layout/include/resume_follower.php");
		} else {
			include_once("layout/include/error/ocun_follower.php");
		}
	} else if (isset($_GET['page_following']) === true) {
		$following = afficheFollowing($id_ficheperso);
		if ($following->rowCount() > 0) {
			include_once("layout/include/resume_following.php");
		} else {
			include_once("layout/include/error/ocun_following.php");
		}
		// include_once("layout/include/resume_follower.php");
	} else if (isset($_GET['following'])) {
		$id_ficheperso = getIdFichePerso($_GET['user']);
		$id_ficheperso = intval($id_ficheperso['id_ficheperso']);
		$following = afficheFollowing($id_ficheperso);
		include_once("layout/include/resume_following.php");
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
		if ($following->rowCount() > 0) {
			include_once("layout/include/resume_following.php");
		} else {
			include_once("layout/include/error/ocun_following.php");
		}
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
		if ($follower->rowCount() > 0) {
			include_once("layout/include/resume_follower.php");
		} else {
			include_once("layout/include/error/ocun_follower.php");
		}
	}
} else if (isset($_GET['user'])) {
	// var_dump($_GET['user']);
	// echo('Hola che, paso por ICI PROFIL USER');
	$nom_pseudo = htmlspecialchars($_GET['user']);
	$id_ficheperso = intval($_SESSION["id_ficheperso"]);
	$user = getUtilisateur($id_ficheperso);
	$pseudo = getConnexion($id_ficheperso);
	$profil = getProfil($id_ficheperso);
	$result = getImg($id_ficheperso);
	$phrase = getPhraseDeHumeur($id_ficheperso);
	$countTweet = countTweet($id_ficheperso);
	$countFollower = countFollower($id_ficheperso);
	$countFollowing = countFollowing($id_ficheperso);

	$id_utilisateur = getIdFichePerso($_GET['user']);
	$montreprofil = montreProfil($id_utilisateur["id_ficheperso"]);

	$allTweetPseudo = getAllTweetPseudo($nom_pseudo);

	include_once("layout/include/result_profil_fil_actualite.php");
	// include_once("layout/include/consultation_profil.php");
	// include_once("layout/include/result_profil_public.php");


	if (isset($_GET['consultation']) === true) {
		// echo ('Hola che, paso por ICI CONSULTATION');

		if (isset($_SESSION["id_ficheperso"]) === true) {
			$id_ficheperso = intval($_SESSION["id_ficheperso"]);
		}
		$follower = afficheFollower($id_utilisateur["id_ficheperso"]);
		$contenu_follower = $follower->fetch();
		$id_follower = getIdFichePerso($_GET['user']);
		$id_follower = intval($id_follower['id_ficheperso']);
		// var_dump($contenu_follower);
		$connexion = getConnexion($id_follower);
		$pseudo = $connexion['pseudo'];
		// echo ('Hola che, paso por ICI');
		// var_dump($montreprofil);
		// $montreprofil = montreProfil($id_utilisateur["id_ficheperso"]);
		// include_once("layout/include/consultation_profil.php");
		// include_once("layout/include/result_profil_public.php");
	}
} else if (isset($_SESSION["id_ficheperso"]) === true) {

	$id_ficheperso = intval($_SESSION["id_ficheperso"]);
	$user = getUtilisateur($id_ficheperso);
	$pseudo = getConnexion($id_ficheperso);
	$profil = getProfil($id_ficheperso);
	$result = getImg($id_ficheperso);
	$phrase = getPhraseDeHumeur($id_ficheperso);


	if (isset($_GET['action']) === true) {
		extract($_POST);


		// echo('Hola che, paso por ICI interior if');
		// var_dump($phrase_humeur);
		if ($_GET['action'] === 'update_phrase_humeur') {
			$phrase_humeur = htmlspecialchars($phrase_humeur);
			updatePhraseDEHumeur($id_ficheperso, $phrase_humeur);
			$profil = getProfil($id_ficheperso);
			$hashtag = countHashtag();
			// $montreprofil = montreProfil($id_utilisateur["id_ficheperso"]);
			// include_once("layout/include/consultation_profil.php");
			// include_once("layout/include/result_profil.php");
			// include_once("layout/include/result_profil_tweet.php");
			// include_once("layout/include/result_profil_tweet_foot.php");
			// include_once("layout/include/result_profil.php");
			// include_once("layout/include/result_profil_fil_actualite.php");
			header("refresh:1;url=profil.php?color=true&consultation=true");


		} else if ($_GET['action'] === 'phrase_humeur') {
			$phrase_humeur = htmlspecialchars($phrase_humeur);
			updatePhraseDEHumeur($id_ficheperso, $phrase_humeur);
			$profil = getProfil($id_ficheperso);

			header("refresh:1;url=profil.php?color=true");

			//Imprima algunos contenidos por ejemplo.
			include_once("layout/include/reussi/phrase.php");

			// include_once("layout/include/result_profil.php");
		}
	} else {
		echo('Hola che, paso por ICI');
		include_once("layout/include/result_profil_fil_actualite.php");
	}
	// if ($profil["phrase_humeur"] === NULL) {
	// 	include_once("layout/include/form_phrase_humeur.php");
	// } else if ($profil["phrase_humeur"] !== NULL) {
	// 	include_once("layout/include/form_update_phrase_humeur.php");
	// }
} else {
	include_once("layout/include/acces_refuse.php");
}
