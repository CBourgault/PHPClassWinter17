<?php

function signup($email, $password) {
    $db = dbconnect();

    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");

    $password = sha1($password);

    $binds = array
        (
        ":email" => $email,
        ":password" => $password
    );

    $results = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = true;
    }
    return $results;
}

function userExist($email) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");

    $binds = array
        (
        ":email" => $email,
    );
    $results = false;
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = true;
    }
    return $results;
}

function login($email, $password) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");

    $password = sha1($password);

    $binds = array
        (
        ":email" => $email,
        ":password" => $password
    );

    $results = 0;

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $results = $data['user_id'];
    }
    return $results;
}

function validPass ($password) {
    $db = dbconnect();
    
    
}