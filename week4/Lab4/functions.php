
<?php

function viewAllFromCorps() {
    //Calls database to be used
    $db = getDatabase();
    // Prepare statement using SQL to pull data
    $stmt = $db->prepare("SELECT * FROM corps");
    // displays results as an array
    $results = array();
    if
    // Function used to pull all records from Table
    ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Returns results from database
    return $results;
}

function searchCorps($searchColumn, $search) {
    //Calls database to be used
    $db = getDatabase();
    // Prepare statement using SQL to pull data and filter using search
    $stmt = $db->prepare("SELECT * FROM corps WHERE $searchColumn LIKE :search");
    //uses search variable with wildcard 
    $search = '%' . $search . '%';
    //Calls binds variable as an array 
    $binds = array
        (
        ":search" => $search
    );
    // displays results as an array
    $results = array();
    if 
    // Function used to pull all records from Table
    ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Returns results from database
    return $results;
}

function orderCorps($orderColumn, $order) {
    //Calls database to be used
    $db = getDatabase();
    // Prepare statement using SQL to pull data and filter using order by 
    $stmt = $db->prepare("SELECT * FROM corps ORDER BY $orderColumn $order");
    // displays results as an array
    $results = array();
    if 
    // Function used to pull all records from Table
    ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Returns results from database
    return $results;
}
