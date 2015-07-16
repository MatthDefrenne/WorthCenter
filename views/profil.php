<div ng-app="app">
    <?php
    foreach ($informations as $infos) {
    ?>
    <div class="page-intro indigo white-text">
        <div class="container">
            <div class="row">
                <div class="col m12 s12">
                    <h2>Espace Membre</h2>
                    <h5>Bienvenue sur votre espace privée !</h5>
                    <h5>Vous êtes connecté en tant que <b><?= $infos['pseudo']; ?></i></b></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row separator">
            <div class="row">
                <div class="col s12 m2">
                    <p class="center-align indigo-text">
                        <img src="<?= $infos['avatar']; ?>"
                             alt="" class="avatar responsive-img">
                        <b><?php echo $infos['pseudo']; ?></b><br/>
                    <hr>

                    <ul class="collection">
                        <li class="collection-item"><a href="friends">Amis</a></li>
                        <li class="collection-item"><a href="profil">Profil</a></li>
                        <li class="collection-item"><a href="message">Message</a></li>
                    </ul>
                </div>
                <div class="col s12 m10">
                    <ul class="collection with-header">
                        <li class="collection-header"><h5>Votre profil :                               </b></h5></li>
                    </ul>
                    <button class="btn waves-effect waves-light indigo" ng-click="edition = !edition" type="submit"
                            name="Forfait4">Activer édition de profil
                    </button>
                    <br/><br/>

                    <div class="nga-default nga-stagger nga-slide-up" ng-if="!edition">
                        <ul class="collection">
                            <li class="collection-item">Prénom : <?= $infos['firstname']; ?></li>
                            <li class="collection-item">Nom : <?= $infos['name']; ?></li>
                            <li class="collection-item">Facebook : <?= $infos['facebook']; ?></li>
                            <li class="collection-item">Twitter : <?= $infos['twitter']; ?></li>
                            <li class="collection-item">Description personnel : <?= $infos['description']; ?></li>
                        </ul>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="nga-default nga-stagger nga-slide-up" ng-if="edition">

                            <div class="row">
                                <form class="col s12">
                                    <div class="row">

                                        <div class="col s6">
                                            Twitter : <input type="text" name="twitter" value="<?= $infos['twitter']; ?>"><br>
                                        </div>
                                        <div class="col s6">
                                            Facebook : <input type="text" name="facebook" value="<?= $infos['facebook']; ?>"><br>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class="col s6">
                                            Prénom : <input type="text" name="fname" value="<?= $infos['firstname']; ?>"><br>
                                        </div>
                                        <div class="col s6">
                                            Nom : <input type="text" name="sname" value="<?= $infos['name']; ?>"><br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" col s12">
                                            Votre description : <textarea name="description" class="materialize-textarea"
                                                                          id="textarea" ><?= $infos['description']; ?></textarea>
                                        </div>
                                        <br/><br/>
                                        <div class="col s6">
                                            Photo de profil : <input type="file" name="avatar" id="avatar"></li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit"
                                    name="action">Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<script>
    var app = angular.module("app", ['ngAnimate']);
</script>
