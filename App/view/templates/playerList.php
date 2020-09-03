<?php
session_start();
include "../admin/ressources/database/connexion_db.php";
include "../admin/ressources/code/functions.php";
$requete = $db->query("SELECT name_site, description_site FROM configuration_site");
$results = $requete->fetch();
?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="<?php echo $results['description_site']; ?>" />
    <link rel="shortcut icon" href="../admin/ressources/images/logo/logo.ico" />
    <link rel="stylesheet" href="../admin/ressources/style/style.css" type="text/css" />
    <title>Liste des joueurs - <?php echo $results['name_site']; ?></title>
</head>

<body id="body_player_list">
    <?php
    include "/wamp/www/mtxserv/admin/ressources/code/top_bar.php"; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    ?>

    <div id="player_list_div">
        <table>
            <thead>
                <tr>
                    <form action="" method="GET">
                        <td colspan="4" id="search_player_td"><input type="search" name="search_player" id="search_player" placeholder="Rechercher un joueur" /><input type="submit" id="submit_search_player" value="Rechercher" /></td>
                    </form>
                </tr>
                <tr>
                    <td id="number_of_player">Id du joueur</td>
                    <td id="name_of_player">Nom du joueur</td>
                    <td id="role_of_player">Rôle du joueur</td>
                    <td id="inscription_date_of_player">Date d'inscription</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!isset($_GET['search_player'])) {
                    $requete = $db->query("SELECT * FROM users");
                } else {
                    $requete = $db->query('SELECT * FROM users WHERE name_user LIKE "%' . $_GET['search_player'] . '%"');
                }
                while ($results = $requete->fetch()) {
                ?>
                    <tr>
                        <td><?php echo $results['id']; ?></td>
                        <td><img src="<?php echo $results['image_profil']; ?>" alt="Photo de profil" id="img_list_profil"/><?php echo $results['name_user']; ?></td>
                        <script>
                            var hauteur = document.getElementById("img_list_profil").offsetHeight;
                            document.getElementById("img_list_profil").style.width = hauteur + "px";
                        </script>
                        <td class="player_type_<?php echo $results['account_type']; ?>"><?php echo $results['account_type']; ?></td>
                        <td><?php echo $results['date_time']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>
    </div>

    <?php
    include "/wamp/www/mtxserv/admin/ressources/code/bottom_bar.php"; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    ?>
</body>

</html>