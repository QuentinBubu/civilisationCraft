<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? 'MTXSERV' ?></title>
    <link rel="stylesheet" href="./assets/css/reset.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
    <script src="./assets/js/js.js" defer></script>
</head>
<body>
    <header class="top_bar">
        <div class="img_top_bar">
            <a href="<?= $router->generate('home') ?>">
                <img
                    src="./assets/picture/logo/logo.ico"
                    alt="Logo du serveur"
                    id="logo_top_bar"
                />
            </a>
        </div>
        <div class="others_top_bar">
            <span>
                <a href="<?= $router->generate('playerList') ?>">Liste des joueurs</a>
            </span>
            <span>
                <a href="<?= $router->generate('forum') ?>">Forum</a>
            </span>
        </div>
        <div class="connexion_button">
            <?php if (!isset($_SESSION['id'])): ?>
                <p>
                    <a href="/players/connexion.php">Se connecter</a>
                    <a href="/players/inscription.php">S'inscrire</a>
                </p>
            <?php else: ?>
                <div class="profil_logo_div">
                    <img src="<?= $dbProfilPicture['profilPicture']; ?>" alt="Image de profil" id="profil_top_bar" />
                    <div>
                        <a href="/players/cpannel.php">Paramètres</a>
                        <hr />
                        <a href="/players/deconnexion.php">Déconnexion</a>
                        <hr />
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <?= $main ?>

    <footer class="bottom_bar">
        <img src="/admin/ressources/images/logo/logo.ico" alt="Logo du serveur"/>
        <span>
            Tous droits réservés à MTXSERV | 
            <a href="/admin/ressources/code/mentions-legales.php">
                Mentions légales
            </a>
        </span>
    </footer>
</body>
</html>