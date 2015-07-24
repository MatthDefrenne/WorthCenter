<div ng-app="app">


    <?php

    function getPseudoById($id) {
        $user = R::findOne( 'users', ' id= ? ', [ $id] );
        return $user->pseudo;
    }
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
    <?php
    if (isset($_SESSION['error'])) {
    ?>
    <div class="card-panel"><?php echo $_SESSION['error']; ?></div>
    <?php
    };
    session_unset();
    ?>
    <div class="container">
        <div class="row separator">
            <div class="row">
                <div class="col s12 m2">
                    <p class="center-align indigo-text">
                        <img src="<?= $infos['avatar']; ?>"
                             alt="" class="avatar responsive-img">
                        <b><?php echo $infos['pseudo']; ?></b><br/>
                    <hr>

                    <ul class="collection" ng-controller="messageController">
                        <li class="collection-item"><a href="profil">Profil</a></li>
                        <li class="collection-item"><a ng-click="see()" href="message">Message <span  class="new badge"><?= $messageNoRead ?></span></a></li>

                    </ul>
                </div>
                <div class="col s12 m10">
                    <ul class="collection with-header">
                        <li class="collection-header"><h5>Messagerie:                               </b></h5></li>
                    </ul>
                    <button class="btn waves-effect waves-light indigo" ng-click="edition = !edition" type="submit"
                            name="Forfait4">Envoyer un message
                    </button>
                    <br/><br/>


                        <div class="nga-default nga-stagger nga-slide-up" ng-if="!edition">
                            <ul class="collection with-header">
                                <li class="collection-header"><h5>Message reçus</h5></li>
                                <li class="collection-item">
                                    <?php

                                    foreach($recevedMessage as $message) {
                                        ?>
                                        <div><b>Reçus de <?= getPseudoById($message['id_from']); ?> </b> : <?= $message['message']; ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>

                        <div class="nga-default nga-stagger nga-slide-up" ng-if="!edition">
                            <ul class="collection with-header">
                                <li class="collection-header"><h5>Message Envoyés</h5></li>
                                <li class="collection-item">
                                    <?php
                                    foreach($sendMessage as $message) {
                                    ?>
                                    <div><b>Envoyé à  <?= getPseudoById($message['id_to']); ?> </b> : <?= $message['message']; ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </li>
                            </ul>
                        </div>

                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="nga-default nga-stagger nga-slide-up" ng-if="edition">

                            <div class="row">
                                <form class="col s12">

                                    <div class="col s6">
                                        Distinataire : <input type="text" name="destination" value="Nom de votre distinataire"><br>
                                    </div>

                                </form>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class=" col s12">
                                            Contenu de votre message : <textarea name="message"
                                                                          class="materialize-textarea"
                                                                          id="textarea">Votre message</textarea>
                                        </div>
                                        <br/><br/>

                                    </div>
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit"
                                    name="action">Envoyer le message
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

    app.controller('messageController', function($scope, $http) {
    $scope.see = function() {
        $http.put('').success(function(){

        });
    }
    });
</script>
