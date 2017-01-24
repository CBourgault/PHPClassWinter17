<?php

/**
 * Deletes a new row form the test Table.
 *    
 * @return boolean
 */
function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function deleteFromCorps( $id )
{
    $isDeleted = false;
    
    $db = getDatabase();
    
    $stmt = $db->prepare("DELETE FROM corps where id = :id");
    
    $binds = array ( ":id" => $id );
    
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
        // if entire array of data is deleted from that id, outputs success 
        {
            $isDeleted = true;
        }

    return $isDeleted; 
}

function viewAllFromCorps()
{
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM corps");
    
    $results = array();
        if 
            // Function used to pull all records from Table
            ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    return $results;
}

function viewOneFromCorps( $id )
{
    $db = getDatabase();
    
    $stmt = $db->prepare("SELECT * FROM corps where id = :id");
    
    $binds = array ( "id" => $id);
    
    $results = array();
    
        if 
            // function used to pull one particular record from table
            ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    return $results;
}

function updateCorpsRow($id, $corp, $email, $zipcode, $owner, $phone)
{
    $result = false;
    
    $db = getDatabase();
        
    $stmt = $db->prepare("UPDATE corps set corp = :corp, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone where id = :id");
    
    $binds = array(
        // Used to replace all array information of one particular ID
            ":id" => $id,
            ":corp" => $corp,
            ":email" => $email,
            ":zipcode" => $zipcode,
            ":owner" => $owner,
            ":phone" => $phone
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            // If executed properly, results in success
           $result = true;
        }

        return $result;
}

function createCorpData($corp, $email, $zipcode, $owner, $phone)
{
    $results = false;
    
    $db = getDatabase();
    
    $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = now(), email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
    
    $binds = array(
        // Used to place new array information under a new ID in Corps table
                ":corp" => $corp,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $results = true;
            }
            
    return $results;
    
}
