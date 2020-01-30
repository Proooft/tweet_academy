<!-- <div class="container"> -->
<div id="bandenoir">
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6  gauche">
        </div>
        <div class="col-md-6 droite">
            <h1 class="titre">Sqweel Academie</h1>
            <p id="seco">Se connecter</p>
            <form name="connexion" action="acces_utilisateur.php?action=connexion&color=true" method="post" class="well">
                <div>
                    <input type="text" name="pseudo" value="" placeholder="Identifiant" class="connex" required>
                </div>
                <div>
                    <input type="password" name="password" value="" placeholder="Mot de passe" class="connex" required>
                </div>
                <div>
                    <input type="submit" name="submit" value="Connexion">
                </div>
            </form>
            <form name="connexion" action="acces_utilisateur.php?action=inscription" method="post" class="well">
                <p id="inscription">Pas de compte ?</p>
                <!-- <a href="">S'inscrire</a> -->
                <div>
                    <input class="submit" type="submit" name="submit" value="Inscription">
                </div>
            </form>
        </div>
    </div>
</div>