
    <div class="page-intro indigo white-text">
        <div class="container">
            <div class="row">
                <div class="col m12 s12">
                    <h2>Inscription</h2>
                    <h5>Démarrer l'aventure en effectuant une inscription gratuite !</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row separator">
            <div class="row">
                <div class="col m12 s12">
                    <?php
                    session_start();
                    if (isset($_SESSION['subscribe'])) {
                        ?>
                        <div class="card-panel"><?php echo $_SESSION['subscribe']; ?></div>
                    <?php
                    };
                    session_unset();
                    ?>
                    <p class="center-align">Utilisez le formulaire ci-dessous pour créer un nouveau compte.</p>
                    <p class="center-align"><b>Déjà inscrit ?</b> Connectez-vous depuis la page <a class="indigo-text" href="connexion"><b>connexion</b></a>.</p>
                </div>
            </div>
            <form method="POST" action="">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="mdi-social-person prefix"></i>
                        <label for="Pseudonyme">Pseudonyme</label>
                        <input type="text" class="validate" id="Pseudonyme" name="Pseudonyme">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="mdi-content-mail prefix"></i>
                        <label for="AdresseEmail">Email</label>
                        <input type="email" class="validate" id="AdresseEmail" name="AdresseEmail">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock prefix"></i>
                        <label for="Motdepasse">Mot de passe</label>
                        <input type="password" class="validate" id="Motdepasse" name="Motdepasse">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock prefix"></i>
                        <label for="MotdepasseConfirmation">Confimer mot de passe</label>
                        <input type="password" class="validate" id="MotdepasseConfirmation" name="MotdepasseConfirmation">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 center-align">
                        En ouvrant un compte, vous acceptez nos <a href="#" target="_blank">CGU</a>, <a href="#" target="_blank">CGV</a> et notre <a href="#" target="_blank">Politique de confidentialité</a>.
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 center">
                        <button class="signup btn-large waves-effect waves-light indigo" name="inscription"><i class="mdi-content-send left"></i>Créer un compte</button>
                    </div>
                </div>
            </form>
        </div>
    </div>