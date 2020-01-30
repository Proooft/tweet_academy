<?php
function addTweet()
{
    global $bdd;
    extract($_POST);
    // var_dump($tweet_text);
    $id_ficheperso = intval($_SESSION['id_ficheperso']);
    // var_dump($id_ficheperso);
    $tweet_text = htmlspecialchars($tweet_text);


    $tweet_text = str_replace("'", '\\\'', $tweet_text );
    $requette = $bdd->query("INSERT INTO tweet (id_ficheperso, tweet_text, date_publication)
        VALUES ($id_ficheperso, '$tweet_text', NOW())");

    return $requette;
}

function getIdDernierTweet()
{
    global $bdd;
    $tweet = $bdd->query("SELECT MAX(id_tweet) AS 'id_dernier_tweet' FROM tweet");
    $result = $tweet->fetch();
    return $result;
}
function getIdDernierReTweet()
{
    global $bdd;
    $tweet = $bdd->query("SELECT MAX(retweet) AS 'id_dernier_retweet' FROM tweet");
    $result = $tweet->fetch();
    return $result;
}

function addHashtag($id_dernier_tweet)
{
    $id_ficheperso = intval($_SESSION['id_ficheperso']);
    global $bdd;
    extract($_POST);
    $array_hashtag = array();

    $tweet_text = htmlspecialchars($tweet_text);
    $tweet_text = str_replace("'", '\\\'', $tweet_text );

    preg_match_all('/#\w+/', $tweet_text, $array_hashtag);
    $array_hashtag = $array_hashtag[0];
    // print_r($array_hashtag);
    // array_push($array_hashtag, $hashtag);
    if (!empty($array_hashtag)) {
        foreach ($array_hashtag as $value) {
            $requette = $bdd->query("INSERT INTO hashtag (id_ficheperso, nom_hash, id_tweet, date_publication)
                                    VALUES ($id_ficheperso, '$value', $id_dernier_tweet, NOW())");
        }
        // return $requette;
    }
}

function addReTweet($id_contact)
{
    global $bdd;
    extract($_POST);
    $tweet_text = htmlspecialchars($tweet_text);
    $tweet_text = str_replace("'", '\\\'', $tweet_text );


    // $id_contact = $_GET['id_contact'];
    $id_ficheperso = intval($_SESSION['id_ficheperso']);
    // var_dump($id_ficheperso);

    $requette = $bdd->query("INSERT INTO tweet (id_ficheperso, tweet_text, retweet, date_publication)
        VALUES ($id_ficheperso, '$tweet_text', $id_contact, NOW())");

    return $requette;
}

function getTweet()
{
    global $bdd;
    $teewt = $bdd->query("SELECT * FROM tweet WHERE retweet is NULL ORDER BY id_tweet DESC");
    return $teewt;
}

function countTweet($id_ficheperso)
{
    global $bdd;
    $teewt = $bdd->query("SELECT COUNT(id_tweet) AS 'CountTweet' FROM tweet WHERE id_ficheperso = $id_ficheperso");
    $result = $teewt->fetch();
    return $result;
}

function getReTweet($id_tweet)
{
    global $bdd;
    $teewt = $bdd->query("SELECT * FROM tweet WHERE retweet = $id_tweet ORDER BY id_tweet DESC");
    return $teewt;
}

// SELECT * FROM comentarios WHERE retweet = '" . $contenu_tweet['id_tweet'] . "' ORDER BY id DESC
function getTweetByIdFicheperso($id_ficheperso)
{
    global $bdd;
    $teewt = $bdd->query("SELECT * FROM tweet WHERE retweet  is NULL AND id_ficheperso = $id_ficheperso ORDER BY id_tweet DESC");
    return $teewt;
}
function getAllReTweet($id_tweet)
{
    global $bdd;
    $alltweet = $bdd->query("SELECT tweet.id_tweet, tweet.id_ficheperso, tweet.tweet_text, tweet.date_publication, avatar.photo_avatar, avatar.extension, connexion.pseudo 
                                FROM `tweet` INNER JOIN avatar INNER JOIN connexion 
                                WHERE tweet.retweet IS NOT NULL 
                                AND tweet.retweet = $id_tweet
                                AND tweet.id_ficheperso = avatar.id_ficheperso 
                                AND connexion.id_ficheperso = avatar.id_ficheperso 
                                ORDER BY tweet.id_tweet DESC");
    return $alltweet;
}
function getAllTweet()
{
    global $bdd;
    $alltweet = $bdd->query("SELECT tweet.id_tweet, tweet.id_ficheperso, tweet.tweet_text, tweet.date_publication, avatar.photo_avatar, avatar.extension, connexion.pseudo 
                                FROM `tweet` INNER JOIN avatar INNER JOIN connexion 
                                WHERE tweet.retweet IS NULL 
                                AND tweet.id_ficheperso = avatar.id_ficheperso 
                                AND connexion.id_ficheperso = avatar.id_ficheperso 
                                ORDER BY tweet.id_tweet DESC");
    return $alltweet;
}

function getAllTweetPseudo($pseudo)
{
    global $bdd;
    $alltweet = $bdd->query("SELECT tweet.id_tweet, tweet.id_ficheperso, tweet.tweet_text, tweet.date_publication, avatar.photo_avatar, avatar.extension, connexion.pseudo 
                                FROM `tweet` INNER JOIN avatar INNER JOIN connexion 
                                WHERE tweet.retweet IS NULL 
                                AND tweet.id_ficheperso = avatar.id_ficheperso 
                                AND connexion.id_ficheperso = avatar.id_ficheperso 
                                AND connexion.pseudo = '$pseudo'
                                ORDER BY tweet.id_tweet DESC");
    return $alltweet;
}

function countReTweet($id_tweet)
{
    // SELECT * FROM tweet WHERE retweet = '" . $contenu_tweet['id_tweet'] . "'")

    global $bdd;
    $alltweet = $bdd->query("SELECT COUNT(id_tweet) AS 'cantite_retweet' FROM `tweet` 
                                WHERE retweet = $id_tweet");
    return $alltweet;
}

function countHashtag() {
    global $bdd;
    $hashtag = $bdd->query("SELECT COUNT(id_hash) AS 'Cant_hashtag', nom_hash FROM `hashtag` INNER JOIN tweet ON hashtag.id_tweet = tweet.id_tweet GROUP BY hashtag.nom_hash");
    return $hashtag;
}
// function after($thise, $inthat)
// {
//     if (!is_bool(strpos($inthat, $thise)))
//         return substr($inthat, strpos($inthat, $thise) + strlen($thise));
// };

// function after_last($thise, $inthat)
// {
//     if (!is_bool(strrevpos($inthat, $thise)))
//         return substr($inthat, strrevpos($inthat, $thise) + strlen($thise));
// };

// function before($thise, $inthat)
// {
//     return substr($inthat, 0, strpos($inthat, $thise));
// };

// function before_last($thise, $inthat)
// {
//     return substr($inthat, 0, strrevpos($inthat, $thise));
// };

// function between($thise, $that, $inthat)
// {
//     return before($that, after($thise, $inthat));
// };

// function between_last($thise, $that, $inthat)
// {
//     return after_last($thise, before_last($that, $inthat));
// };

// function strrevpos($instr, $needle)
// {
//     $rev_pos = strpos (strrev($instr), strrev($needle));
//     if ($rev_pos===false) return false;
//     else return strlen($instr) - $rev_pos - strlen($needle);
// };