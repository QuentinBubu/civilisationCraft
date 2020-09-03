<?php

if (isset($_SESSION['id'])) {
    $dbProfilPicture = $db->getRequest(
        'SELECT `profilPicture`
        FROM `users`
        WHERE `id` = :id',
        [
        `id` => $_SESSION['id']
        ],
        'fetch'
    );
}