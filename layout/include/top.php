<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="assets/js/menu.js"></script>
  <script src="assets/js/Verifpseudo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript" src="http://prototypejs.org/assets/2008/1/25/prototype-1.6.0.2.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/pagedaccueil.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/tweet_academie.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/front_profil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?= $titre; ?></title>
</head>
<body class="<?php if (isset($_GET['color']) === true) { 
  echo "background-profil"; 
  } else { 
     echo "background-general";
  };
   ?>">