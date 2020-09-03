<?php

if (isset($_SESSION['id'])) {
    if($results['token'] == "ok"){
    $_SESSION['account'] = $results['account_type'];
    }
}

$requete = $db->query("SELECT name_site, description_site FROM configuration_site");
$results = $requete->fetch();

?>

    <meta charset="UTF-8" />
    <meta name="description" content="<?php echo $results['description_site']; ?>" />
    <link rel="shortcut icon" href="admin/ressources/images/logo/logo.ico" />
    <link rel="stylesheet" href="admin/ressources/style/style.css" type="text/css" />
    <title>Accueil - <?php echo $results['name_site']; ?></title>

<body id="body_index">
    <?php include "admin/ressources/code/top_bar.php"; ?>
    <div id="right_div_index">
        <div id="reseaux_sociaux">
            <div><img src="/admin/ressources/images/other/share.png" alt="share logo" class="rs_logo_share" />Réseaux
                sociaux:</div>
            <?php
            $requete = $db->query("SELECT * FROM reseaux_sociaux");
            while ($results = $requete->fetch()) {
            ?>
                <hr />
                <a href="<?php echo $results['link'] ?>" target="_blank"><img src="<?php echo $results['link_image'] ?>" alt="Logo" class="logo_rs"><?php echo $results['rs_name'] ?></a>
            <?php } ?>
        </div>
        <div id="news_people">
            <div>Nouveaux arrivants:</div>
            <?php
            $requete = $db->query("SELECT * FROM users ORDER BY date_time DESC LIMIT 3");
            while ($results = $requete->fetch()) {
            ?>
                <hr />
                <span><img src="<?php echo $results['image_profil']; ?>" alt="Photo de profil">Bienvenue
                    <?php echo $results['name_user']; ?> dans le serveur!</span>

            <?php } ?>
        </div>
    </div>

    <div id="news">
        <span id="actu">Actualités:</span>
        <div class="break_flex"></div>
        <?php
        $requete = $db->query("SELECT * FROM actus ORDER BY date_parution DESC LIMIT 6");
        $nb = $requete->rowCount();
        $i = 0;
        while ($results = $requete->fetch()) {
            $i++;
        ?>
            <div class="actu_case">
                <div class="actu_title"><?php echo $results['title']; ?></div>
                <div class="actu_text">
                    <?php echo $results['text']; ?>
                </div>
                <div class="actu_date">
                    <?php echo $results['date_parution']; ?>
                </div>
            </div>
        <?php
            if ($nb > 3) {
                if ($nb == 4) {
                    if ($i == 2) {
                        echo "<div class=\"break_flex\"></div>";
                    }
                } else if ($nb >= 5) {
                    if ($i == 3) {
                        echo "<div class=\"break_flex\"></div>";
                    }
                }
            }
        }
        ?>
    </div>



    <?php include "admin/ressources/code/bottom_bar.php"; ?>