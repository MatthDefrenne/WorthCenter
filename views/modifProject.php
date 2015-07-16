<?php
foreach ($modifProject as $project) {
    ?>
    <div class="page-intro indigo white-text">
        <div class="container">
            <div class="row">
                <div class="col m12 s12">
                    <h2>Modification du projet n° <?= $project['id']?></h2>
                    <h5>Pour revenir sur l'interface d'admin cliquer ici  : <a href="../admin">Interface admin</a></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row separator">
            <div class="row">
                <div class="col m12 s12">
                    <br/>
                </div>
                <div class="nga-default nga-stagger nga-slide-up" ng-if="addprojet">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email" class="validate">Titre du projet</label>
                                <input type="text" id="title" value="<?= $project['title']?>" name="title" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password" class="validate">Montant objectif :</label>
                                <input type="number" id="password"  value="<?= $project['mountneeded']?>" name="mountneeded" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password" class="validate">ROI :</label>
                                <input type="number" id="password" value="<?= $project['roi']?>" name="roi" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password" class="validate">Description du projet :</label>
                                <textarea class="materialize-textarea" id="password" name="description"
                                          required><?= $project['description']?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 center">
                                <button class="signup btn-large waves-effect waves-light indigo" name="connexion"><i
                                        class="mdi-content-send left"></i>Modifier le projet
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>