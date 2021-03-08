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

/**
 * @return string
 */
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

/**
 * @return int
 */
function generateAge() : int {
    return mt_rand(15, 40);
}

/**
 * @param int $howMany
 * @param mysqli $conn
 */
function insertUsers(int $howMany, mysqli $conn) {
    while($howMany > 0) {
        $username = generateRandomName();
        $email = generateRandomEmail($username);
        $password = hash('sha256', $username);
        $code = generateCode();
        $age = generateAge();

        $sql = "INSERT INTO `users` (username, email, password, code, age) VALUES ('$username', '$email', '$password', '$code', '$age')";
        $res = $conn->query($sql);

        if(!$res) {
            echo "<pre>"; print_r($sql);
            die("Error on query: {$conn->error}");
        } else {
            echo "created user $username, email $email, code $code, age $age<br>";
            $howMany--;
        }
    }
}