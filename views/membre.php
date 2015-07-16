<?php
foreach ($informations as $infos) {
    ?>
    <div class="page-intro indigo white-text">
        <div class="container">
            <div class="row">
                <div class="col m12 s12">
                    <h2>Espace Membre</h2>
                    <h5>Bienvenue sur votre espace privée !</h5>
                    <h5>Vous êtes connecté en tant que <b><i><?php echo $infos['pseudo']; ?></i></b></h5>
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
                    </p>
                    <ul class="collection">
                        <li class="collection-item"><a href="friends">Amis</a></li>
                        <li class="collection-item"><a href="profil">Profil</a></li>
                        <li class="collection-item"><a href="message">Message</a></li>
                    </ul>
                </div>
                <div class="col s12 m10">

                    <ul class="collection with-header">
                        <li class="collection-header"><h5>Solde de ma balance : <b
                                    class="green-text"><?php echo $infos['solde']; ?> €</b></h5><a href="formules">Crediter mon compte</a></li>
                    </ul>
                    <h5 class="left-align indigo-text">Mes investissements en cours</h5>

                    <ul class="collection">
                        <?php
                        foreach ($projects as $projet) {
                            if (!empty($projet['id'])) {
                                $progression = $projet['mountInvested'] * 100 / $projet['mountneeded'];
                                ?>
                                <li class="collection-item avatar contrats">
                                    <i class="mdi-action-trending-up circle indigo"></i>
                                <span class="title">Projet <?php echo $projet['id']; ?>
                                    - <b><?php echo $projet['title']; ?></b></span>

                                    <p>Montant Investis : <b class="indigo-text"><?php echo $projet['mount']; ?>€</b> |
                                        Nombre de formules : <b class="indigo-text">1</b> </br> Objectif : ROI de <b
                                            class="indigo-text">150%</b> | Montant actuel : <b
                                            class="indigo-text"><?php echo $projet['mountInvested']; ?>€</b></br></p>
                                    Objectif montant : <b class="indigo-text"><?php echo $projet['mountneeded']; ?>
                                        €</b></br></p>
                                    <div class="progress">
                                        <div class="determinate" style="width: <?php echo $progression ?>%"></div>
                                    </div>
                                    <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>

                                </li>
                            <?php
                            } // Si l'utilisateur n'as pas de projet investis.
                            if (isset($projects['empty'])) {
                                echo '<b>'.$projects['empty'] .'</b>';
                            }
                        }
                        ?>
                    </ul>
                    <h5 class="left-align indigo-text">Mes investissements terminés</h5>

                    <ul class="collection">
                        <?php
                        foreach ($projectsOver as $projectOver) {
                            if (!empty($projectOver['id'])) {
                                $progression = $projectOver['mountInvested'] * 100 / $projectOver['mountneeded'];
                                ?>
                                <li class="collection-item avatar contrats">
                                    <i class="mdi-action-trending-up circle indigo"></i>
                                <span class="title">Projet <?php echo $projectOver['id']; ?>
                                    - <b><?php echo $projectOver['title']; ?></b></span>

                                    <p>Montant Investis : <b class="indigo-text"><?php echo $projectOver['mount']; ?>€</b> |
                                        Nombre de formules : <b class="indigo-text">1</b> </br> Objectif : ROI de <b
                                            class="indigo-text">150%</b> | Montant actuel : <b
                                            class="indigo-text"><?php echo $projectOver['mountInvested']; ?>€</b></br></p>
                                    Objectif montant : <b class="indigo-text"><?php echo $projectOver['mountneeded']; ?>
                                        €</b></br></p>
                                    <div class="progress">
                                        <div class="determinate" style="width: <?php echo $progression ?>%"></div>
                                    </div>
                                    <a href="#!" class="secondary-content"><i class="mdi-action-grade"></i></a>

                                </li>
                            <?php
                            } // Si l'utilisateur n'as pas de projet investis.
                            if (isset($projectsOver['empty'])) {
                                echo '<b>'.$projectsOver['empty'] .'</b>';
                            }
                        }
                        ?>
                    </ul>
                    <h5 class="left-align indigo-text">Statistiques</h5>

                    <div id="canvas-holder">
                        <span class="center-align">Montant Total Investis : <b><?php echo $infos['invested']; ?>
                                €</b></span><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>