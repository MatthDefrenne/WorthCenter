<?php

if (isset($_SESSION['value'])) {
    ?>
    <div class="card-panel red"><?php echo $_SESSION['value']; ?></div>
<?php
};
session_unset();
foreach ($infosProject as $infos) {
    ?>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col s7">
                <div class="card">
                    <div class="card-image">
                        <img src="http://materializecss.com/images/sample-1.jpg" height="120">
                        <span class="card-title"></span>
                    </div>
                    <div class="card-content">
                        <p><?= $infos['description']; ?></p>
                    </div>
                    <div class="card-action">
                        <?php
                        $progression = $infos['mountInvested'] * 100 / $infos['mountneeded'];
                        ?>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"></span>

                            <p>Montant Investis : <b class="indigo-text"><?= $infos['mountInvested'] ?> €</b><br/>Objectif
                                : ROI de <b
                                    class="indigo-text"><?php echo $infos['roi'] ?>%</b></br>Montant objectif : <b
                                    class="indigo-text"><?php echo $infos['mountneeded'] ?>€</b></br></p>
                            <br/>

                            <div class="progress">
                                <div class="determinate" style="width: <?= $progression ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div
                <?php
                if (isset($_COOKIE['user'])) {
                    ?>
                    <?php
                    ?>
                    <div class="card ">
                        <form method="post" action="">
                            <div class="card-content">
                                Montant à investire dans le projet :
                                <input type="number" min="20" name="amount">
                                <button class="signup btn waves-effect waves-light indigo" name="connexion"><i
                                        class="material-icons">done</i>
                                    Investir
                                </button>
                            </div>
                        </form>
                    </div>
                    Les 5 derniers investissements
                    <hr>
                    <?php
                    foreach ($projectInvestissement as $project) {
                        if (!isset($project['timestamp'])) {
                            echo "Aucun investissements";
                        } else {
                            ?>
                            <ul>
                                <li class="collection-item avatar">
                                    <p>
                                        <small><?= $project['timestamp'] ?></small>
                                        <br>
                                        Montant : <?= $project['mount'] ?>  €
                                    </p>
                                </li>
                            </ul>
                        <?php
                        }

                    }
                    ?>

                <?php
                } else {
                    ?>
                    <div class="card small">
                        <div class="card-image indigo">
                                    <span
                                        class="card-title">Vous devez être connecté pour investire dans un projet</span>
                        </div>
                        <div class="card-content">
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php
}
?>