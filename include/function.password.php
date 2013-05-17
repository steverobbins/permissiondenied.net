<?php

function getPassword() {

    include 'password.words.php';
    $password = '';

    foreach ($words as $group) $password .= ucfirst($group[mt_rand(0, count($group))]);

    return $password . mt_rand(0, 9) . mt_rand(0, 9);
}