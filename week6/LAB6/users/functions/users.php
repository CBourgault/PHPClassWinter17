<?php

/**
 * A method to create an SQL INSERT which inserts into users table email and password, and uses the now function for time created
 *    
 * @return Boolean
 */
function signup($email, $password) {
    $db = dbconnect();

    $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");

    // Sets password variable to a hashed password using SHA-1.
    $password = sha1($password);

    $binds = array
        (
        ":email" => $email,
        ":password" => $password
    );

    $results = false;
    //If statement executes and returns data, results are true, else results are false
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = true;
    }
    return $results;
}

/**
 * A method to create an SQL SELECT which pulls all from users table where email is set.
 *    
 * @return Boolean
 */
function userExist($email) {
    $db = dbconnect();

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");

    $binds = array
        (
        ":email" => $email,
    );
    $results = false;
    //If statement executes and returns data, results are true, else results are false
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = true;
    }
    return $results;
}

/**
 * A method to create an SQL SELECT which pulls all data from users table where email and password are linked.
 *    
 * @return Array
 */
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
