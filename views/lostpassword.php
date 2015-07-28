<div class="page-intro indigo white-text">
    <div class="container">
        <div class="row">
            <div class="col m12 s12">

                <h2>Mot de passe perdu ?</h2>
                <h5>Pas de panique ! Envoyez nous votre adresse email pour</h5>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['session'])) {
    ?>
    <div class="card-panel red darken-3"><?php echo $_SESSION['session']; ?></div>
<?php
};
session_unset();
?>
<div class="container">
    <div class="row separator">
        <div class="row">
            <div class="col m12 s12">
                <br/>
        </div>
        <form method="POST" action="">
            <div class="row">
                <div class="input-field col s12">
                    <i class="mdi-content-mail prefix"></i>
                    <label for="email" class="validate">Email</label>
                    <input type="email" id="email" name="AdresseEmail" required>
                </div>
            </div>
                <div class="input-field col s12 center">
                    <button class="signup btn-large waves-effect waves-light indigo" name="connexion"><i
                            class="mdi-content-send left"></i>Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>