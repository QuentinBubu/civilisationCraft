<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title . ' -- CivilisationCraft' ?? 'CivilisationCraft' ?></title>
    <link rel="shortcut icon" href="./assets/picture/logo/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/reset.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="<?= $cssLink ?? null ?>" />
    <script src="<?= $jsLink ?? null ?>" defer></script>
</head>
<body>
    <header>
        <div id="phoneMenu">
            <img src="./assets/picture/other/iconMenu.svg" alt="Menu" />
        </div>
        <nav>
            <li>
                <a href="<?= $router->generate('home') ?>">
                    <img
                        src="./assets/picture/logo/logo.ico"
                        alt="Logo du serveur"
                        id="logo"
                    />
                </a>
            </li>
            <li>
                <a href="<?=$router->generate('playerList')?>">Liste des joueurs</a>
            </li>
            <li>
                <a href="<?= $router->generate('forum') ?>">Forums</a>
            </li>
            <?php if (!isset($_SESSION['id'])): ?>
                <li>
                    <a href="<?= $router->generate('login') ?>">Se connecter</a>
                </li>
                <li>
                    <a href="<?= $router->generate('signup') ?>">S'inscrire</a>
                </li>
            <?php else: ?>
                <li></li>
                <li>
                    <img
                        src="<?= $dbProfilPicture['profilPicture']; ?>"
                        alt="Image de profil"
                        id="profil"
                    />
                    <article>
                        <a href="<?= $router->generate('settings') ?>">Paramètres</a>
                        <hr />
                        <a href="<?= $router->generate('logout') ?>">Déconnexion</a>
                        <hr />
                    </article>
                </li>
            <?php endif; ?>
        </nav>
    </header>

    <?= $main ?>

    <footer class="bottom_bar">
        <p>Tous droits réservés à CivilisationCraft</p>
        <img src="./assets/picture/logo/logo.ico" alt="Logo du serveur" />
        <a href="<?= $router->generate('cgu') ?>">Mentions légales</a>
    </footer>
</body>
</html>