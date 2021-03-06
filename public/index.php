<?php

ini_set("memory_limit", "8190");

session_start();

require '../vendor/autoload.php';

use App\Database;
use App\User;

$db = new Database('root', '', 'localhost', 'mtxserv');
$user = new User;
$router = new AltoRouter();

require_once '../App/conditions.php';

require '../App/roads.php';

if ($results !== null) {
    if (is_callable($results['target'])) {
        call_user_func_array($results['target'], $results['params']);
    } else {
        $target = $results['target'];
        ob_start();
        require "../App/view/templates/{$target}.php";
        $main = ob_get_clean();

        if ($target === 'home') {
            $title = 'Accueil';
            $jsLink = './assets/js/js.js';
            $cssLink = './assets/css/index.css';
        } elseif ($target === 'playerList') {
            $title = 'Liste des joueurs';
        } elseif ($target === 'forum') {
            $title = 'Forum';
        } elseif ($target === 'login') {
            $title = 'Connexion';
        } elseif ($target === 'mentions-legales') {
            $title = 'Mentions Légales';
        } elseif ($target === 'test') {
            $cssLink = './assets/css/index.css';
        }

        require '../App/view/layout.php';
    }
} else {
    ob_start();
    require '../App/view/errors/404.php';
    $main = ob_get_clean();
    require '../App/view/layout.php';
}