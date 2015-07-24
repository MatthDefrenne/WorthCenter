<div class="row">
    <h3 class="center-align  indigo-text">Les derniers projets</h3>
    <?php
    foreach ($projets as $projet) {
        $progression = $projet['mountInvested'] * 100 / $projet['mountneeded'];
        ?>
        <div class="col s4">

            <div class="card small">
                <div class="card-image indigo">
                    <span class="card-title">Projet n°<?php echo $projet['id'] ?></span>
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?= $projet['title']; ?><i class="material-icons right">more_vert</i></span>
                    <p>Montant Investis : <b class="indigo-text"><?= $projet['mountInvested'] ?> €</b><br/>Objectif : ROI de <b
                            class="indigo-text"><?php echo $projet['roi'] ?>%</b></br>Montant objectif : <b
                            class="indigo-text"><?php echo $projet['mountneeded'] ?>€</b></br></p>
                    <br/>
                    <div class="progress">
                        <div class="determinate" style="width: <?= $progression ?>%"></div>
                    </div>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?= $projet['title']; ?><i class="material-icons right">close</i></span>
                    <p><?= $projet['description']; ?></p>
                    <a href="showproject/<?php echo $projet['id'] ?>" class="waves-effect waves-light btn">En savoir plus..</a>
                </div>
            </div>

        </div>
    <?php
    }
    ?>

</div>
<a href="projets"><h6 class="center-align indigo-text"><b><u>VOIR TOUS LES PROJETS</u></b></h6></a>
</div>
