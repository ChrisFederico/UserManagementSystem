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

    // 01
    for($i = 0; $i < 2; $i++) {
        $code .= chr(mt_rand(48, 57));
    }

    // G
    $code .= chr(mt_rand(65, 90));

    // 23
    for($i = 0; $i < 2; $i++) {
        $code .= chr(mt_rand(48, 57));
    }

    // H
    $code .= chr(mt_rand(65, 90));

    // 456
    for($i = 0; $i < 3; $i++) {
        $code .= chr(mt_rand(48, 57));
    }

    // I
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
            die("Error on query: {$conn->error}");
        } else {
            $howMany--;
        }
    }
}

/**
 * @param mysqli $conn
 * @param array $params
 * @param int $limit
 * @return array
 */
function selectUsers(mysqli $conn, array $params = [], int $limit = 10) : array {
    $records = [];

    $orderBy = array_key_exists('orderBy', $params)? $params['orderBy'] : 'id';
    $orderDir = array_key_exists('orderDir', $params)? $params['orderDir'] : 'ASC';
    $searchUser = array_key_exists('searchUser', $params)? $params['searchUser'] : '';
    $limit = (int) $limit;

    $where = '';
    if($searchUser != '') {
        $search = $params['searchUser'];
        $search = $conn->escape_string($search);
        $where = "WHERE username LIKE '%{$search}%'
            OR email LIKE '%{$search}%'
            OR code LIKE '%{$search}%'";
    }

    $sql = "SELECT * FROM `users` {$where} ORDER BY {$orderBy} {$orderDir} LIMIT {$limit}";
    echo $sql;

    $result = $conn->query($sql) or die($conn->error);

    while($row = $result->fetch_assoc()) {
        $records[] = $row;
    }

    return $records;
}

/**
 * @param string $param
 * @param string $default
 * @return string
 */
function getParam(string $param, $default='') : string {
    return !empty($_REQUEST[$param])? $_REQUEST[$param] : $default;
}