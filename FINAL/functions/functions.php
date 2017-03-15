<?php
/**
 * A method to check if a Post request has been made.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}
/**
 * A method to create an SQL INSERT which inserts into account table email, phone, heard, contact, and comments.
 *    
 * @return Boolean
 */
function signup($email, $phone, $heard, $contact, $comments) {
    $db = getDatabase();

    $stmt = $db->prepare("INSERT INTO account SET email = :email, phone = :phone, heard = :heard, contact = :contact, comments = :comments");

    $binds = array
        (
        ":email" => $email,
        ":phone" => $phone,
        ":heard" => $heard,
        ":contact" => $contact,
        ":comments" => $comments
    );

    $result = false;
    //If statement executes and returns data, results are true, else results are false
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {

        $result = true;
    }

    return $result;
}
/**
 * A method to create an SQL SELECT which pulls all data from account table using a specific id.
 *    
 * @return Array
 */
function viewOneFromAccount($id) {
    $db = getDatabase();

    $stmt = $db->prepare("SELECT * FROM account where id = :id");

    $binds = array("id" => $id);

    $singleResult = array();

    if
    // function used to pull one particular record from table
    ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $singleResult = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $singleResult;
}
/**
 * A method to create an SQL SELECT which pulls all data from account table.
 *    
 * @return Array
 */
function viewAllFromAccount() {
    $db = getDatabase();

    $stmt = $db->prepare("SELECT * FROM account");

    $results = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}
