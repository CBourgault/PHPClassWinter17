<?php

/** 
 * 
 * Adds a new row to the test Table.
 * 
 * @return boolean
 */

function createLabData($firstname, $lastname, $dob, $height)
{
    $results = false;
    
    $db = getDatabase();
    
    $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname, dob = :dob, height = :height");
    
    $binds = array(
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $results = true;
            }
            
    return $results;
    
}


/** 
 * @return type* 
 * 
 * Gets all data from test Table.
 * 
 * @return Array
 */


function viewAllFromActors()
{

    
    $db = getDatabase(); 
    
    $stmt = $db->prepare("SELECT * FROM actors");
    
    $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) 
        {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    return $results;

}



