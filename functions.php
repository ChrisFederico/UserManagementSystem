<?php

/**
 * @return string
 */
function generateRandomName() : string {
    $names = array('Antonio', 'Francesco', 'Paolo', 'Ernesto', 'Pippo', 'Pluto');
    $lastnames = array('Paduano', 'Liccardo', 'Orlov', 'Cossai', 'Falco', 'Federico');

    $name = $names[mt_rand(0, count($names)-1)];
    $lastname = $lastnames[mt_rand(0, count($lastnames)-1)];
    return "$name $lastname";
}

/**
 * @param string $name
 * @return string
 */
function generateRandomEmail(string $name) : string {
    $domains = array('google.com', 'yahoo.com', 'hotmail.it', 'libero.it');

    $username = str_replace(' ', '.', $name);

    $domainIndex = mt_rand(0, count($domains)-1);
    $domain = $domains[$domainIndex];
    $randomNumber = mt_rand(1,99);

    return strtolower("$username$randomNumber@$domain");
}

function generateCode() : string {
    $code = "";

    // ABCDEF
    for($i = 0; $i < 6; $i++) {
        $code .= chr(mt_rand(65, 90));
    }

    // 00
    for($i = 0; $i < 2; $i++) {
        $code .= chr(mt_rand(48, 57));
    }

    // A
    $code .= chr(mt_rand(65, 90));

    // 00
    for($i = 0; $i < 2; $i++) {
        $code .= chr(mt_rand(48, 57));
    }

    // A
    $code .= chr(mt_rand(65, 90));

    // 000
    for($i = 0; $i < 3; $i++) {
        $code .= chr(mt_rand(48, 57));
    }

    // A
    $code .= chr(mt_rand(65, 90));

    return strtoupper($code);
}