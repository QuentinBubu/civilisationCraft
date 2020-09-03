<?php

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
    if (is_callable($results['target'])){
        call_user_func_array($results['target'], $results['params']);
    } else {
        ob_start();
        require '../App/view/templates/{$results[\'target\']}.php';
        $main = ob_get_clean();
        require '../App/view/layout.php';
    }
} else {
    ob_start();
    require '../App/view/errors/404.php';
    $main = ob_get_clean();
    require '../App/view/layout.php';
}