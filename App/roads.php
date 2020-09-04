<?php

$router->map('GET', '/', 'home', 'home');
$router->map('GET', '/home', 'home');
$router->map('GET', '/index', 'home');
$router->map('GET', '/playerList', 'playerList', 'playerList');
$router->map('GET', '/forum', 'forum', 'forum');
$router->map('GET', '/login', 'login', 'login');
$router->map('GET', '/signup', 'signup', 'signup');
$router->map('GET', '/settings', 'settings', 'settings');
$router->map('GET', '/logout', 'logout', 'logout');

$router->map('POST', '/login-back', '../App/php/LoginSignup/login', 'login-back');
$router->map('POST', '/signup-back', '../App/php/LoginSignup/signup', 'signup-back');

$results = $router->match();