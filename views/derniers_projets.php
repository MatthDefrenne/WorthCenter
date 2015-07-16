<div class="row">
    <h3 class="center-align  indigo-text">Les derniers projets</h3>
    <?php
    foreach ($projets as $projet) {
        $progression = $projet['mountInvested'] * 100 / $projet['mountneeded'];
        ?>
        <div class="col s4">
            <a href="#">
                <div class="card small">
                    <div class="card-image indigo">
                        <span class="card-title">Projet n°<?php echo $projet['id'] ?></span>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator indigo-text"><?= $projet['title']; ?><i
                                class="mdi-navigation-more-vert right"></i></span>

                        <p>Montant Investis : <b class="indigo-text"><?= $projet['mountInvested'] ?> €</b></br>Objectif : ROI de <b
                                class="indigo-text"><?php echo $projet['roi'] ?>%</b></br>Montant objectif : <b
                                class="indigo-text"><?php echo $projet['mountneeded'] ?>€</b></br></p>

                        <div class="progress">
                            <div class="determinate" style="width: <?= $progression ?>%"></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
    ?>
    <a href="projets"><h6 class="center-align indigo-text"><b><u>VOIR TOUS LES PROJETS</u></b></h6></a>
</div>
</div>
