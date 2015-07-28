<div ng-app="app">
    <div class="page-intro indigo white-text">
        <div class="container">
            <div class="row">
                <div class="col m12 s12">
                    <h2>Espace Admin</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row separator">
            <div class="row">
                <div class="col m12">
                    <ul class="collection with-header">
                        <h4>Liste des projets :</h4>
                    </ul>
                    <a ng-click="addprojet = !addprojet" class="waves-effect waves-light btn"><i class="material-icons left"></i><span ng-if="!addprojet">Ajouter un projet</span><span ng-if="addprojet">Voir les projets</span></a>
                    <br/>
                    <br/>
                    <div class="nga-default nga-stagger nga-slide-up" ng-if="addprojet">
                        <form method="POST" action="">
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="email" class="validate">Titre du projet</label>
                                    <input type="text" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="password" class="validate">Montant objectif :</label>
                                    <input type="number" id="password" name="mountneeded" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="password" class="validate">ROI :</label>
                                    <input type="number" id="password" name="roi" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="password" class="validate">Description du projet :</label>
                                    <textarea class="materialize-textarea" id="password" name="description" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 center">
                                    <button class="signup btn-large waves-effect waves-light indigo" name="connexion"><i
                                            class="mdi-content-send left"></i>Ajouter un projet
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="nga-default nga-stagger nga-slide-up bordered" ng-if="!addprojet">
                        <tr>
                            <th>N° :</th>
                            <th>Titre :</th>
                            <th>Montant objectif :</th>
                            <th>description :</th>
                            <th>montant investis :</th>
                            <th>actif ?</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach ($projets as $projet) {
                            ?>
                            <tr>
                                <td><?= $projet['id'];?></td>
                                <td><?= $projet['title'];?></td>
                                <td><?= $projet['mountneeded'];?> €</td>
                                <td><?= $projet['description'];?></td>
                                <td><?= $projet['mountInvested'];?> €</td>
                                <td><?= $projet['active'];?></td>
                                <td>  <a onclick="delnews(<?= $projet['id'];?>)" class="btn-floating btn waves-effect waves-light red">      <i class="material-icons">no_sim</i>
                                        <a href="modifproject/<?= $projet['id'];?>" class="btn-floating btn waves-effect waves-light green">      <i class="material-icons">settings</i>
                                        <a class="btn-floating btn waves-effect waves-light blue"><i class="material-icons">done</i>
                                </td>
                                <script>
                                    function delnews(id) {
                                        var confirme = confirm("Etes-vous sur de vouloir supprimer ce projet ? ");
                                        if(confirme === true) {
                                            document.location.href="delproject/" + id;
                                        }
                                    }
                                </script>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var app = angular.module("app", ['ngAnimate']);
</script>
