<nav class="indigo darken-4" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="/" class="brand-logo">WorthCenter</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?= $uri; ?>/concept">Concept</a></li>
            <li><a href="<?= $uri; ?>/projets">Projets</a></li>
            <li><a href="<?= $uri; ?>/contact">Contact</a></li>
            <?php
            if(isset($_COOKIE['roles'])) {
                if($_COOKIE['roles'] == 2) {
                    ?>
                    <li><a href="admin">Admin</a></li>
                    <?php
                }
            }
            if (isset($_COOKIE['user']))     {
                ?>
                <li><a href="<?= $uri; ?>/membre">Compte</a></li>
                <li><a href="<?= $uri; ?>/deconnexion"><i class="mdi-action-exit-to-app"></i></a></li>
            <?php
            } else {
                ?>
                <li><a href="<?= $uri; ?>/connexion"><i class="mdi-social-person-outline"></i></a></li>
            <?php
            }
            ?>
        </ul>
        <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
</nav>